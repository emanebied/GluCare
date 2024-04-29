<?php

namespace App\Http\Controllers\Apis\GluCare\LiveChat;

use App\Http\Controllers\Controller;
use App\Http\Requests\Apis\GluCare\LiveChat\CreateChatRequest;
use App\Http\Requests\Apis\GluCare\LiveChat\SendTextMessageRequest;
use App\Http\Resources\ChatResource;
use App\Http\Resources\MassageResource;
use App\Http\traits\ApiTrait;
use App\Http\traits\AuthorizeCheckTrait;
use App\Models\GluCare\LiveChat\Chat;
use App\Models\GluCare\LiveChat\ChatMessages;
use App\Models\User;
use App\Notifications\GluCare\LiveChat\NewMessage;
use ChatMessageSent;
use ChatMessageStatus;
use Illuminate\Http\Request;
use UserOnlineEvent;

class ChatController extends Controller
{
    use ApiTrait,AuthorizeCheckTrait;

        public function createChat(CreateChatRequest $request)
        {
            $users = $request->users;

            // check if they had a chat before
            $chat = $request->user()->chats()->whereHas('participants', function ($q) use ($users) {
                $q->where('user_id', $users[0]);
            })->first();

            // if not, create a new one
            if (empty($chat)) {
                array_push($users, $request->user()->id);
                $chat = Chat::create()->makePrivate($request->isPrivate);
                $chat->participants()->attach($users);
            }
            return $this->data(['chat' => new ChatResource($chat)], 'Chat created successfully');
        }


        public function getChats(Request $request)
        {
            $user = $request->user();
            $chats = $user->chats()->with('participants')->get();
            return $this->data(['chats' => $chats], 'Chats retrieved successfully', 200);
        }

        public function sendTextMessage(SendTextMessageRequest $request)
        {
            $chat = Chat::find($request->chat_id);
            if ($chat->isParticipant($request->user()->id)) {
                $message = ChatMessages::create([
                    'message' => $request->message,
                    'chat_id' => $request->chat_id,
                    'user_id' => $request->user()->id,
                    'data' => json_encode(['seenBy' => [], 'status' => 'sent']) //sent, delivered,seen
                ]);

                $success = true;
                $message = new MassageResource($message);

                // broadcast the message to all users
                broadcast(new ChatMessageSent($message));

                foreach ($chat->participants as $participant) {
                    if ($participant->id != $request->user()->id) {
                        $participant->notify(new NewMessage($message));
                    }
                }

                return $this->data(["message" => $message], "Message sent successfully");
            } else {
                return $this->errorMessage([], 'Chat not found', 404);
            }
        }


        public function messageStatus(Request $request, ChatMessages $message)
        {
            if ($message->chat->isParticipant($request->user()->id)) {
                $messageData = json_decode($message->data);
                array_push($messageData->seenBy, $request->user()->id);
                $messageData->seenBy = array_unique($messageData->seenBy);
                if (count($message->chat->participants) - 1 < count($messageData->seenBy)) {
                    $messageData->status = 'delivered';
                } else {
                    $messageData->status = 'seen';
                }
                $message->data = json_encode($messageData);
                $message->save();
                $message = new MassageResource($message);

                // triggering the event
                broadcast(new ChatMessageStatus($message));

                return $this->data(['message' => $message], 'Message status updated successfully');
            } else {
                return $this->errorMessage([], 'Message not found', 404);
            }
        }


        public function getChatById(Chat $chat, Request $request)
        {
            if ($chat->isParticipant($request->user()->id)) {
                $messages = $chat->messages()->with('sender')->orderBy('created_at', 'asc')->paginate('150');
                return $this->data([
                    'chat' => new ChatResource($chat),
                    'messages' => MassageResource::collection($messages)->response()->getData(true)
                ], 'Chat details retrieved successfully');
            } else {
                return $this->errorMessage([], 'Chat not found', 404);
            }
        }

        public function searchUsers(Request $request)
        {
            $users = User::where('email', 'like', "%{$request->email}%")->limit(3)->get();
            return $this->data(['users' => $users], 'Users retrieved successfully');
        }


        public function userJoinsChat(User $user)
        {
            $user->update(['is_online' => true]);
            broadcast(new UserOnlineEvent($user));  // Dispatch the UserOnlineEvent
        }

        public function userLeavesChat(User $user)
        {
            $user->update(['is_online' => false]);
    //        broadcast(new UserOnlineEvent($user));  // Dispatch the UserOnlineEvent
        }
}
