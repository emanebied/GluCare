<?php

namespace App\Http\Requests\Apis\GluCare\blog;

use Illuminate\Foundation\Http\FormRequest;

class LikeStoreRequest extends FormRequest
{
    public function authorize()
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            // Check if the authenticated user has the required permission
            if ($this->user()->can('likes_create')) {
                return true;
            }
            // User doesn't have the required permission
            return $this->errorMessage([], 'Admin Only, Unauthorized.', 403);
        }

        // User is not authenticated
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
