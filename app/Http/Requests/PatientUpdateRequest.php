<?php

namespace App\Http\Requests;

use App\Http\traits\ApiTrait;
use Illuminate\Foundation\Http\FormRequest;

class PatientUpdateRequest extends FormRequest
{
    use ApiTrait;
    public function authorize()
    {
        if($this->user()->can('PatientDataOfDiabetes_edit')){
            return true;
        }
        return $this->errorMessage([],'Admin Only, Unauthorized .', 403);
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
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
