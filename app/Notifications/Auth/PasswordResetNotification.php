<?php

namespace App\Notifications\Auth;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordResetNotification extends Notification
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
            ->subject('Password Reset Notification')
            ->greeting('Hello ' . $notifiable->first_name . '!')
            ->line('Your Verification Code is'. ' ' .$notifiable->code)
            ->line('It Will Expire at '. ' ' . $notifiable->code_expired_at)
            ->line('After '. ' ' .config('auth.code_timeout'). ' ' . 'seconds');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
