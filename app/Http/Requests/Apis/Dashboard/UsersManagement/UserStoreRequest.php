<?php

namespace App\Http\Requests\Apis\Dashboard\UsersManagement;

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
            'first_name' => ['nullable', 'string', 'between:3,32'],
            'last_name' => ['nullable', 'string', 'between:3,32'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'string', 'min:8'],
            'role' => ['required', 'max:60'],
            'role.*' => ['exists:roles,name'],
        ];

        // Check if the user is a doctor
        if ($this->role == 'doctor') {
            $rules['experience_years'] = ['required', 'integer'];
            $rules['qualifications'] = ['required', 'string'];
            $rules['specialization'] = ['required', 'string'];
            $rules['amount'] = ['required', 'numeric'];
            $rules['currency'] = ['required', 'string'];
            $rules['availabilities'] = ['array', 'required', `date_format:Y-m-d H:i`];



        }

        return $rules;
    }

}
