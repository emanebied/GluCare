<?php

namespace App\Http\Requests\Apis\Website\blog;

use App\Http\traits\ApiTrait;
use Illuminate\Foundation\Http\FormRequest;

class CommentUpdateRequest extends FormRequest
{
    use ApiTrait;
    public function authorize()
    {
        if($this->user()->can('comments_edit')){
            return true;
        }
        return $this->errorMessage([],'Admin Only, Unauthorized .', 403);
    }

    public function rules()
    {
        return [
            'body' => 'required',
            'post_id' => ['required','exists:posts,id'],
        ];
    }
}
