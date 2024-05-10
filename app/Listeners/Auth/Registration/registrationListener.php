<?php

namespace App\Listeners\Auth\Registration;

use App\Events\Auth\Registration\RegisterEvent;
use App\Notifications\Auth\RegisterNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Throwable;

class registrationListener implements ShouldQueue
{
    use InteractsWithQueue;
    public function __construct()
    {
        //
    }

    public function handle(RegisterEvent $event)
    {
        try {
            $event->user->notify(new RegisterNotification($event->user));
            Log::info(' Register notification sent successfully to user ID: ' . $event->user->id);
        } catch (Throwable $e) {
            Log::error('Failed to send register notification to user ID: ' . $event->user->id . ' Error: ' . $e->getMessage());
            throw $e;
        }
    }

}
