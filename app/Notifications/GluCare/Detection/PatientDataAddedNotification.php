<?php

namespace App\Notifications\GluCare\Detection;

use App\Models\User;
use App\Models\GluCare\Detection\PatientDataOfDiabetes;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PatientDataAddedNotification extends Notification
{
    use Queueable;

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

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from('no-reply@example.com', 'GluCare')
            ->subject('New Patient Data Added')
            ->greeting('Hello ' . $notifiable->name. '!')
            ->line('Your patient data has been added successfully.')
            ->line('Patient Data:')
            ->line('Gender: ' . $this->patientData->gender)
            ->line('Age: ' . $this->patientData->age)
            ->line('Hypertension: ' . $this->patientData->hypertension)
            ->line('Heart Disease: ' . $this->patientData->heart_disease)
            ->line('Smoking History: ' . $this->patientData->smoking_history)
            ->line('Height: ' . $this->patientData->height)
            ->line('Weight: ' . $this->patientData->weight)
            ->line('BMI: ' . $this->patientData->bmi)
            ->line('HbA1c Level: ' . $this->patientData->HbA1c_level)
            ->line('Blood Glucose Level: ' . $this->patientData->blood_glucose_level)
            ->line('Prediction: ' . $this->prediction)
            ->line('Type: ' . $this->type)
            ->line('Thank you for using our GluCare app!');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
