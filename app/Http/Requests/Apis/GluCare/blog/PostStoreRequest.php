<?php

namespace App\Http\Requests\Apis\GluCare\blog;

use App\Http\traits\ApiTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostStoreRequest extends FormRequest
{

    use ApiTrait;
    public function authorize()
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            // Check if the authenticated user has the required permission
            if ($this->user()->can('posts_create')) {
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
        $post = $this->route('post');
        $postId = $post ? $post->id : null;
        return [
            'title' => ['required', 'string', 'max:255', Rule::unique('posts')->ignore($postId)],
            'body' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'user_id'=> ['nullable','exists:users,id'],
            'is_published' => ['required', 'in:published,draft'],
            'published_at' => ['nullable', 'date_format:Y-m-d H:i:s'],

        ];
    }

}
