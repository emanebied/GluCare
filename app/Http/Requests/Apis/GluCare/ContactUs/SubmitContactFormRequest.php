<?php

namespace App\Http\Requests\Apis\GluCare\ContactUs;

use App\Http\traits\ApiTrait;
use Illuminate\Foundation\Http\FormRequest;

class SubmitContactFormRequest extends FormRequest
{
    use ApiTrait;
    public function authorize()
    {
        if (auth()->check()) {
            if ($this->user()->can('submit_contact_form')) {
                return true;
            }
            return $this->errorMessage([], 'Admin Only, Unauthorized.', 403);
        }
        return $this->errorMessage([], 'Unauthenticated.', 401);
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'exists:users,email'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ];
    }
}
