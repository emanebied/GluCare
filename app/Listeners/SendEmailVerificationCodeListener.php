<?php

namespace App\Listeners;

use App\Events\EmailVerificationCodeEvent;
use App\Notifications\VerificationMailNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Throwable;

class SendEmailVerificationCodeListener implements shouldQueue

{
    use InteractsWithQueue;

    public function __construct()
    {
        //
    }

    public function handle( EmailVerificationCodeEvent $event)
    {
        try {
//          Notification::send($event->user, new VerificationMailNotification($event->user));
            $event->user->notify(new VerificationMailNotification( $event->user));
            Log::info(' Verication Mail notification sent successfully to user ID ' . $event->user->id);
        } catch (Throwable $e) {
            Log::error('Failed to send Email Verification notification to user ID: ' . $event->user->id . ' Error: ' . $e->getMessage());
            throw $e;
        }


    }
}
