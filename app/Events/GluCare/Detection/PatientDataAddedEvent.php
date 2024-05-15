<?php

namespace App\Events\GluCare\Detection;

use App\Models\User;
use App\Models\GluCare\Detection\PatientDataOfDiabetes;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PatientDataAddedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $patientData;
    public $prediction;
    public $type;

    public function __construct(User $user, PatientDataOfDiabetes $patientData, $prediction, $type)
    {
        $this->user = $user;
        $this->patientData = $patientData;
        $this->prediction = $prediction;
        $this->type = $type;
    }

    /**
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith()
    {
        return [
            'user_id' => $this->user->id,
            'patient_data' => $this->patientData,
            'prediction' => $this->prediction,
            'type' => $this->type,
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
