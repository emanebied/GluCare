<?php

namespace App\Http\Requests\Apis\GluCare\Appointments;

use App\Http\traits\ApiTrait;
use Illuminate\Foundation\Http\FormRequest;

class AppointmentUpdateRequest extends FormRequest
{
    use ApiTrait;
    public function authorize()
    {
        if (auth()->check()) {
            if ($this->user()->can('appointments_edit')) {
                return true;
            }
            return $this->errorMessage([], 'Admin Only, Unauthorized.', 403);
        }
        return $this->errorMessage([], 'Unauthenticated.', 401);
    }



    public function rules()
    {
        return [
            'specialization' => 'required|string',
            'doctor_name' => 'required|string',
            ];
    }
}
