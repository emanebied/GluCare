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
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        $appointment = $this->user->appointments()->latest()->first();
        return (new MailMessage)
            ->from('no-reply@example.com', 'GlueCare')
            ->subject('Confirmation of appointment.')
            ->greeting('Hello ' . $notifiable->name. '!')
            ->line(' Appointment approved successfully.')
            ->line('Your Appointment date and time: ' . $appointment->appointments);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
