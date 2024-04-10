<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegisterNotification extends Notification
{
    use Queueable;

   public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function via($notifiable)
    {
        return ['mail'];
    }
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from('no-reply@example.com', 'GlueCare')
            ->subject('Register Notification')
            ->greeting('Hello ' . $notifiable->first_name . '!')
            ->line('Your registration was successful.');
    }



    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

}
