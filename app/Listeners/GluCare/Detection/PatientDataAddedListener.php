<?php

namespace App\Listeners\GluCare\Detection;

use App\Events\GluCare\Detection\PatientDataAddedEvent;
use App\Notifications\GluCare\Detection\PatientDataAddedNotification;
use Illuminate\Support\Facades\Log;
use Throwable;

class PatientDataAddedListener
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
