<?php

namespace App\Http\Requests\Apis\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{

    public function authorize()
    {
        if($this->user()->can('users_edit')){
            return true;
        }
        //return false;
        return abort(403, 'Admin Only, Unauthorized .');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => ['required','string','between:3,32'],
            'last_name' => ['required','string','between:3,32'],
            'email' => ['required|email|unique:users,email,' . $this->route('user') . ',id'],
            'password' => ['required', 'confirmed','string','min:8'],
//            'status'
            'role' => ['required', 'max:60'],
            'role.*' => ['exists:roles,name'],
        ];
    }
}
