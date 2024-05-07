<?php

namespace App\Notifications\GluCare\Appointments;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppointmentCreated extends Notification
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
            ->subject('Added new Appointment')
            ->greeting('Hello ' . $notifiable->name. '!')
             ->line(' Appointment added successfully.');


    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
