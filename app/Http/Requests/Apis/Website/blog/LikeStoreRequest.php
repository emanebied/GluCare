<?php

namespace App\Http\Requests\Apis\Website\blog;

use Illuminate\Foundation\Http\FormRequest;

class LikeStoreRequest extends FormRequest
{
    public function authorize()
    {
        if($this->user()->can('likes_create')){
            return true;
        }
        return $this->errorMessage([],'Admin Only, Unauthorized .', 403);
    }


    public function rules()
    {
        return [
            'likeable_id' => ['required'],
            'likeable_type' => ['required','in:comments,posts'],
        ];
    }
}
