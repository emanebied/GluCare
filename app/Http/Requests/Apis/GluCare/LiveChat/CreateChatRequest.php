<?php

namespace App\Http\Requests\Apis\GluCare\LiveChat;

use App\Http\traits\ApiTrait;
use App\Http\traits\AuthorizeCheckTrait;
use Illuminate\Foundation\Http\FormRequest;

class CreateChatRequest extends FormRequest
{
    use ApiTrait;
    public function authorize()
    {
        if($this->user()->can('chat_create_chat')){
            return true;
        }
        return $this->errorMessage([],'Admin Only, Unauthorized .', 403);
    }
    public function rules()
    {
        return [
            'users' => ['required','array'],
            'users.*' => ['sometimes','exists:users,id'],
            'isPrivate' => ['required','boolean'],
        ];
    }
}
