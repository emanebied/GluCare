<?php

namespace App\Http\Requests\Apis\GluCare\blog;

use App\Http\traits\ApiTrait;
use Illuminate\Foundation\Http\FormRequest;

class CommentStoreRequest extends FormRequest
{
    use ApiTrait;
    public function authorize()
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            // Check if the authenticated user has the required permission
            if ($this->user()->can('comments_create')) {
                return true;
            }
            // User doesn't have the required permission
            return $this->errorMessage([], 'Admin Only, Unauthorized.', 403);
        }

        // User is not authenticated
        return $this->errorMessage([], 'Unauthenticated.', 401);
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
