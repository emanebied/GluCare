<?php

namespace App\Listeners\GluCare\Appointments;

use App\Notifications\GluCare\Appointments\AppointmentCreated;
use Illuminate\Support\Facades\Log;
use Throwable;

class AppointmentListener
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


    public function handle( $event)
    {
    try {

        $event->user->notify(new AppointmentCreated( $event->user));
        Log::info(' Appointment notification sent successfully to user ID ' . $event->user->id);
        } catch (Throwable $e) {
        Log::error('Failed to send Appointment notification to user ID: ' . $event->user->id . ' Error: ' . $e->getMessage());
        throw $e;
    }


    }
}
