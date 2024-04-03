<?php

namespace App\Http\Requests\Apis\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->user()->can('settings_create')){
            return true;
        }
        //return false;
        return abort(403, 'Admin Only, Unauthorized .');
    }


    public function rules()
    {
        return [
            'first_name' => ['required','string','between:3,32'],
            'last_name' => ['required','string','between:3,32'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed','string','min:8'],
//            'status'
            'role' => ['required', 'max:60'],
            'role.*' => ['exists:roles,name'],

            ];
    }
}
