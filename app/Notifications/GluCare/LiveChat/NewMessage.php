<?php

namespace App\Notifications\GluCare\LiveChat;

use App\Http\Resources\MassageResource;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewMessage extends Notification implements ShouldBroadcast
{
    use Queueable;

    public function __construct(MassageResource $message)
    {
        $this->message = $message;
    }

    public function via($notifiable): array
    {
        return ['broadcast', 'database'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    public function toArray($notifiable): array
    {
        return [
            'chat_id' => $this->message->chat_id,
            'from' => $this->message->sender->first_name,
            'message' => $this->message->message,
        ];
    }


    public function toBroadcast($notifiable): array
    {
        return [
            'chat_id' => $this->message->chat_id,
            'from' => $this->message->sender->first_name,
            'message' => $this->message->message,
        ];
    }
}
