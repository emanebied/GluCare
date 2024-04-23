<?php

namespace App\Http\Requests\Apis\Website\blog;

use App\Http\traits\ApiTrait;
use Illuminate\Foundation\Http\FormRequest;

class CommentStoreRequest extends FormRequest
{
    use ApiTrait;
    public function authorize()
    {
        if($this->user()->can('comments_create')){
            return true;
        }
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
            'body' => 'required',
            'post_id' => ['required','exists:posts,id'],
        ];
    }
}
