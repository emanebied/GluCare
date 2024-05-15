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


    public function handle(PatientDataAddedEvent $event)
    {
        try {
            $user = $event->user;
            $patientData = $event->patientData;
            $prediction = $event->prediction;
            $type = $event->type;

            $user->notify(new PatientDataAddedNotification($user, $patientData, $prediction, $type));
            Log::info('PatientDataAdded notification sent successfully to user ID ' . $user->id);
        } catch (Throwable $e) {
            Log::error('Failed to send PatientDataAdded notification to user ID: ' . $user->id . ' Error: ' . $e->getMessage());
            throw $e;
        }
    }
}
