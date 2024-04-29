<?php

namespace App\Http\Requests\Apis\GluCare\LiveChat;

use Illuminate\Foundation\Http\FormRequest;

class CreateChatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'users' => ['required','array'],
            'users.*' => ['sometimes','exists:users,id'],
            'isPrivate' => ['required','boolean'],
        ];
    }
}
