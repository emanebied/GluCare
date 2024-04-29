<?php

namespace App\Listeners\Auth;

use App\Events\Auth\RegisterEvent;
use App\Notifications\Auth\RegisterNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Throwable;

class lRegistrationListener implements ShouldQueue
{
    use InteractsWithQueue;
    public function __construct()
    {
        //
    }

    public function handle(RegisterEvent $event)
    {
        try {
//            Notification::send($event->user, new RegisterNotification($event->user));
            $event->user->notify(new RegisterNotification($event->user));
            Log::info(' Register notification sent successfully to user ID: ' . $event->user->id);
        } catch (Throwable $e) {
            Log::error('Failed to send register notification to user ID: ' . $event->user->id . ' Error: ' . $e->getMessage());
            throw $e;
        }
    }

}
