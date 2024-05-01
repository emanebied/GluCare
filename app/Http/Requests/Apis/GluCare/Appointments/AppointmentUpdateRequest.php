<?php

namespace App\Http\Requests\Apis\GluCare\Appointments;

use App\Http\traits\ApiTrait;
use Illuminate\Foundation\Http\FormRequest;

class AppointmentUpdateRequest extends FormRequest
{
    use ApiTrait;
    public function authorize()
    {
        if($this->user()->can('appointments_edit')){
            return true;
        }
        return $this->errorMessage([],'Admin Only, Unauthorized .', 403);
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
