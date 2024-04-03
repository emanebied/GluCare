<?php

namespace App\Http\Requests\Apis\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SettingsStoreRequest extends FormRequest
{

    public function authorize()
    {
        if($this->user()->can('settings_create')){
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
           'name'=>['required','string','max:255'],
            'email'=>['required','email','unique:website_settings,email'],
            'description'=>['required'],
            'image'=>['required','image','mimes:jpeg,png,jpg,gif,svg,webp','max:2048'],
            'facebook_link' => ['required', 'url', 'regex:/^(https?:\/\/)?(www\.)?facebook\.com\/[a-zA-Z0-9(\.\?)?]/'],
            'twitter_link' => ['required', 'url', 'regex:/^(https?:\/\/)?(www\.)?twitter\.com\/[a-zA-Z0-9(\.\?)?]/'],
            'instagram_link' => ['required', 'url', 'regex:/^(https?:\/\/)?(www\.)?instagram\.com\/[a-zA-Z0-9(\.\?)?]/'],
        ];
    }
}
