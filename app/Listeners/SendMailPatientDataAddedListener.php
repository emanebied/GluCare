<?php

namespace App\Listeners;

use App\Events\PatientDataAddedEvent;
use App\Notifications\PatientDataAddedNotification;
use App\Notifications\VerificationMailNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Throwable;

class SendMailPatientDataAddedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function handle( PatientDataAddedEvent $event)
    {
        try {

            $event->user->notify(new PatientDataAddedNotification($event->user));
            Log::info(' PatientDataAdded notification sent successfully to user ID ' . $event->user->id);
        } catch (Throwable $e) {
            Log::error('Failed to send PatientDataAdded notification to user ID: ' . $event->user->id . ' Error: ' . $e->getMessage());
            throw $e;
        }
    }
}
