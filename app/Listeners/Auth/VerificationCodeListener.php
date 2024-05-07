<?php

namespace App\Listeners\Auth;

use App\Events\Auth\EmailVerificationCodeEvent;
use App\Notifications\Auth\VerificationMailNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Throwable;

class VerificationCodeListener implements shouldQueue

{
    use InteractsWithQueue;

    public function __construct()
    {
        //
    }

    public function handle( EmailVerificationCodeEvent $event)
    {
        try {
            $event->user->notify(new VerificationMailNotification( $event->user));
            Log::info(' Verication Mail notification sent successfully to user ID ' . $event->user->id);
        } catch (Throwable $e) {
            Log::error('Failed to send Email Verification notification to user ID: ' . $event->user->id . ' Error: ' . $e->getMessage());
            throw $e;
        }


    }
}
