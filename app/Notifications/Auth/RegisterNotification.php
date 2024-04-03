<?php

namespace App\Notifications\Auth;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegisterNotification extends Notification
{
    use Queueable;
    public $message;
    public $subject;
    public $fromEmail;
    public $mailer;


    public function __construct()
    {
        $this->message = "Congratulations on becoming a member of GluCare! 🎉 We're excited to welcome you to our community.";
        $this->subject = 'Welcome to GluCare!';
        $this->fromEmail = "no-reply@gmail.com";
        $this->mailer = 'smtp';
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->mailer($this->mailer)
            ->subject($this->subject)
            ->greeting('Hello ' . $notifiable->first_name)
            ->line($this->message);
    }
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
