<?php

namespace App\Notifications\Auth;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class EmailVerificationNotification extends Notification
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
        $code = $this->user->code;
        $codeExpiredAt = $this->user->code_expired_at;
        $codeTimeout = config('auth.code_timeout');

        // Implicitly uses the default mail configuration
        return (new MailMessage)
            ->subject( 'Email Verification')
            ->greeting('Hello ' . $this->user->name)
            ->line('Your Verification Code: ' . $code)
            ->line('It will expire at ' . $codeExpiredAt)
            ->line('After ' . $codeTimeout . ' Seconds');
    }

    public function toArray($notifiable)
    {
        return [
            // Data for database notifications
        ];
    }
}
