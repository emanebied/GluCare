<?php


use App\Http\Resources\MassageResource;
use App\Models\ChatMessages;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatMessageStatus implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    public function __construct(MassageResource $message)
    {
        $this->message = $message;
    }

    public function broadcastWith(){
        return ['message'=> $this->message];
    }

    public function broadcastOn(): array
    {
        return [
            new PresenceChannel('chat.'.$this->message->chat_id),
        ];
    }
}
