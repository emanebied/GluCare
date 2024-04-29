<?php

namespace App\Notifications\GluCare\Detection;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PatientDataAddedNotification extends Notification
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
            ->subject('add new Data')
            ->greeting('Hello ' . $notifiable->name. '!')
            ->line('Your Data added successfully.')
            ->line('Thank you for using our GluCare app !');
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
