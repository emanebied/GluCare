<?php

namespace App\Http\Requests\Apis\GluCare\Detection;

use App\Http\traits\ApiTrait;
use Illuminate\Foundation\Http\FormRequest;

class PatientStoreRequest extends FormRequest
{
    use ApiTrait;
    public function authorize()
    {
        if (auth()->check()) {
            if ($this->user()->can('PatientDataOfDiabetes_create')) {
                return true;
            }
            return $this->errorMessage([], 'Admin Only, Unauthorized.', 403);
        }
        return $this->errorMessage([], 'Unauthenticated.', 401);
    }


    public function rules()
    {
        return [
            'gender' => ['required', 'in:female,male'],
            'age' => ['required', 'integer', 'min:0'],
            'hypertension' => ['required', 'in:have,Do not have'],
            'heart_disease' => ['required', 'in:have,Do not have'],
            'smoking_history' => ['required', 'in:former,No info,never'],
            'HbA1c_level' => ['required', 'numeric', 'min:0'],
            'blood_glucose_level' => ['required', 'integer', 'min:0'],
            'height' => 'required|numeric|min:1',
            'weight' => 'required|numeric|min:1',
        ];
    }
}
