<?php

namespace App\Http\Requests\Apis\Dashboard;

use App\Http\traits\ApiTrait;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
use ApiTrait;
    public function authorize()
    {
        if($this->user()->can('users_create')){
            return true;
        }
        return $this->errorMessage([],'Admin Only, Unauthorized .', 403);
    }



    public function rules()
    {
        $rules = [
            'name' => ['required', 'string', 'between:3,32'],
            'first_name' => ['required', 'string', 'between:3,32'],
            'last_name' => ['required', 'string', 'between:3,32'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'string', 'min:8'],
            'role' => ['required', 'max:60'],
            'role.*' => ['exists:roles,name'],
        ];

        // Check if the user is a doctor
        if ($this->role == 'doctor') {
            $rules['experience_years'] = ['nullable', 'integer'];
            $rules['qualifications'] = ['nullable', 'string'];
            $rules['specialization'] = ['nullable', 'string'];
        }

        return $rules;
    }

}
