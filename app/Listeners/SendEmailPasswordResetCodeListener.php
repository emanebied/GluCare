<?php

namespace App\Listeners;

use App\Events\PasswordResetCodeEvent;
use App\Notifications\PasswordResetNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Throwable;

class SendEmailPasswordResetCodeListener implements ShouldQueue
{
  use InteractsWithQueue;
    public function __construct()
    {
        //
    }

    public function handle( PasswordResetCodeEvent $event)
    {

        try {
        // Notification::send($event->user, new PasswordResetNotification($event->user));
            $event->user->notify(new PasswordResetNotification( $event->user));
            Log::info(' Password reset notification sent successfully to user ID ' . $event->user->id);
        } catch (Throwable $e) {
            Log::error('Failed to send Password reset notification to user ID: ' . $event->user->id . ' Error: ' . $e->getMessage());
            throw $e;
        }
    }
}
