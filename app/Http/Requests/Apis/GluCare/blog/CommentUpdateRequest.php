<?php

namespace App\Http\Requests\Apis\GluCare\blog;

use App\Http\traits\ApiTrait;
use Illuminate\Foundation\Http\FormRequest;

class CommentUpdateRequest extends FormRequest
{
    use ApiTrait;
    public function authorize()
    {
        if (auth()->check()) {
            if ($this->user()->can('comments_edit')) {
                return true;
            }
            return $this->errorMessage([], 'Admin Only, Unauthorized.', 403);
        }
        return $this->errorMessage([], 'Unauthenticated.', 401);
    }
    public function rules()
    {
        return [
            'body' => 'required',
            'post_id' => ['required','exists:posts,id'],
        ];
    }
}
