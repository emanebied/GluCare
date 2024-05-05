<?php

namespace App\Notifications\GluCare\Payments;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentStatusNotification extends Notification
{
    use Queueable;

    public $payment;

    public function __construct($payment)
    {
        $this->payment = $payment;
    }

    public function via($notifiable)
    {
        return ['database','mail'];
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'Your payment was successful.',
            'payment_id' => $this->payment->id,
            'status' => 'success',
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Your payment was successful.');
    }
}
