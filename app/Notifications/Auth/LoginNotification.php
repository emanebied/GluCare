<?php

namespace App\Notifications\Auth;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LoginNotification extends Notification
{
    use Queueable;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['database','mail' ];
    }


    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from('no-reply@example.com', 'GlueCare')
            ->subject('Login Notification')
            ->greeting('Hello ' . $notifiable->first_name . '!')
            ->line('Your Login was successful.');

    }


    public function toArray($notifiable)
    {
        return [
            'message' => 'Your login was successful.',
            'name' => $this->user->name,
            'email' => $this->user->email,
        ];
    }

}
