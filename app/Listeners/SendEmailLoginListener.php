<?php

namespace App\Listeners;

use App\Events\LoginEvent;
use App\Notifications\LoginNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Throwable;

class SendEmailLoginListener implements ShouldQueue
{
    use InteractsWithQueue;
    public function __construct()
    {
        //
    }

    public function handle(LoginEvent $event)
    {
        try {
//          Notification::send($event->user, new LoginNotification($event->user));
            $event->user->notify(new LoginNotification($event->user));
            Log::info(' Login notification sent successfully to user ID ' . $event->user->id);
        } catch (Throwable $e) {
            Log::error('Failed to send login notification to user ID: ' . $event->user->id . ' Error: ' . $e->getMessage());
            throw $e;
        }

    }
}

