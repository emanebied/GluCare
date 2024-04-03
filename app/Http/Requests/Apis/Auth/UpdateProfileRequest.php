<?php

namespace App\Http\Requests\Apis\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{

        public function authorize()
        {
            return true;
        }


    public function rules()
    {
        /*
          $this->user()->id
            it allows the current user to keep their existing email address or phone
            without triggering a "not unique" validation error.
        */
        return [
            'first_name' => ['required','string','between:3,32'],
            'last_name' => ['required','string','between:3,32'],
            'username' => ['required','string','between:3,32'],
            'email' => ['required', 'email', 'unique:users,email,'.$this->user()->id],
            'password' => ['required', 'confirmed','string','min:8'],
            'phone' => ['string','digits_between:5,20','unique:users,phone,'.$this->user()->id],
            'gender' => ['sometimes','string','in:female,male'],
            'birth_date'=>['sometimes','date_format:d-m-Y'],
            'image.*' => ['image','mimes:jpeg,png,jpg,gif,webp','max:2048'],
        ];
    }
}
