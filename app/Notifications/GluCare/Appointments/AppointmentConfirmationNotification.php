<?php

namespace App\Notifications\GluCare\Appointments;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppointmentConfirmationNotification extends Notification
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
        $appointment = $this->user->appointments()->latest()->first();

        return (new MailMessage)
            ->from('no-reply@example.com', 'GlueCare')
            ->subject('Confirmation of appointment.')
            ->greeting('Hello ' . $notifiable->name. '!')
            ->line('Your appointment has been created successfully.')
            ->action('View Appointment', url('/appointments/' . $appointment->id))
            ->line('Your Appointment date and time: ' . $appointment->appointment_datetime)
            ->line('Doctor Name: ' . $appointment->doctor_name)
            ->line('Specialization: ' . $appointment->specialization)
            ->line('Zoom Meeting URL: ' . $appointment->zoom_meeting_url)
            ->line('Duration: ' . $appointment->duration_in_minute . ' minutes');

    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
