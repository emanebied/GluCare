<?php

namespace App\Http\Requests\Apis\GluCare\Appointments;

use App\Http\traits\ApiTrait;
use Illuminate\Foundation\Http\FormRequest;

class AppointmentStoreRequest extends FormRequest
{
  use ApiTrait;
    public function authorize()
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            // Check if the authenticated user has the required permission
            if ($this->user()->can('appointments_create')) {
                return true;
            }
            // User doesn't have the required permission
            return $this->errorMessage([], 'Admin Only, Unauthorized.', 403);
        }

        // User is not authenticated
        return $this->errorMessage([], 'Unauthenticated.', 401);
    }


    public function rules()
    {
        return [
            'specialization' => 'required|string',
            'doctor_name' => 'required|string',
//            'appointment_date' => 'required|date',
//            'appointment_time' => 'required|date_format:H:i',
        ];
    }
}
