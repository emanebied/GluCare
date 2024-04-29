<?php

namespace App\Http\Requests\Apis\GluCare\LiveChat;

use App\Http\traits\ApiTrait;
use Illuminate\Foundation\Http\FormRequest;

class SendTextMessageRequest extends FormRequest
{
    use ApiTrait;
    public function authorize()
    {
        if($this->user()->can('chat_send_text_message')){
            return true;
        }
        return $this->errorMessage([],'Admin Only, Unauthorized .', 403);
    }
    public function rules()
    {
        return [
            'message' => ['required','string','max:500'],
            'chat_id' => ['required','exists:chats,id'],
        ];
    }
}
