<?php

namespace App\Http\Requests\Apis\GluCare\blog;

use Illuminate\Foundation\Http\FormRequest;

class LikeStoreRequest extends FormRequest
{
    public function authorize()
    {
        if (auth()->check()) {
            if ($this->user()->can('likes_create')) {
                return true;
            }
            return $this->errorMessage([], 'Admin Only, Unauthorized.', 403);
        }
        return $this->errorMessage([], 'Unauthenticated.', 401);
    }

    public function rules()
    {
        return [
            'likeable_id' => ['required'],
            'likeable_type' => ['required','in:comments,posts'],
        ];
    }
}
