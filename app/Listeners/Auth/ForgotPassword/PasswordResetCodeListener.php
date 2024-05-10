<?php

namespace App\Listeners\Auth\ForgotPassword;

use App\Events\Auth\ForgotPassword\PasswordResetCodeEvent;
use App\Notifications\Auth\PasswordResetNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Throwable;

class PasswordResetCodeListener implements ShouldQueue
{
  use InteractsWithQueue;
    public function __construct()
    {
        //
    }

    public function handle( PasswordResetCodeEvent $event)
    {

        try {
            $event->user->notify(new PasswordResetNotification( $event->user));
            Log::info(' Password reset notification sent successfully to user ID ' . $event->user->id);
        } catch (Throwable $e) {
            Log::error('Failed to send Password reset notification to user ID: ' . $event->user->id . ' Error: ' . $e->getMessage());
            throw $e;
        }
    }
}
