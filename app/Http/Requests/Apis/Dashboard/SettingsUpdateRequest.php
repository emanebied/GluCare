<?php

namespace App\Http\Requests\Apis\Dashboard;

use App\Http\traits\ApiTrait;
use Illuminate\Foundation\Http\FormRequest;

class SettingsUpdateRequest extends FormRequest
{
    use ApiTrait;
    public function authorize()
    {
        if($this->user()->can('settings_edit')){
            return true;
        }
        //return false;
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
            'name'=>['required','string','max:255'],
            'email'=>['required','email','unique:website_settings,email,'. $this->route('website_setting') . ',id'],
            'description'=>['required'],
            'image'=>['required','image','mimes:jpeg,png,jpg,gif,svg,webp','max:2048'],
            'facebook_link' => ['required', 'url', 'regex:/^(https?:\/\/)?(www\.)?facebook\.com\/[a-zA-Z0-9(\.\?)?]/'],
            'twitter_link' => ['required', 'url', 'regex:/^(https?:\/\/)?(www\.)?twitter\.com\/[a-zA-Z0-9(\.\?)?]/'],
            'instagram_link' => ['required', 'url', 'regex:/^(https?:\/\/)?(www\.)?instagram\.com\/[a-zA-Z0-9(\.\?)?]/'],
        ];
    }
}
