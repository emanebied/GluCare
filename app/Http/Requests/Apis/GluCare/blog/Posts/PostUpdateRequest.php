<?php

namespace App\Http\Requests\Apis\GluCare\blog\Posts;

use App\Http\traits\ApiTrait;
use App\Models\GluCare\blog\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostUpdateRequest extends FormRequest
{
    use ApiTrait;
    public function authorize()
    {
        if (auth()->check()) {
            if ($this->user()->can('posts_edit')) {
                return true;
            }
            return $this->errorMessage([], 'Admin Only, Unauthorized.', 403);
        }
        return $this->errorMessage([], 'Unauthenticated.', 401);
    }

    public function rules()
    {

        $post = Post::find($this->route('post'));
        if (!$post) {
            return [];
        }
        return [
            'title' => ['required', 'string', 'max:255', Rule::unique('posts')->ignore($post->id)],
            'body' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'user_id'=> ['nullable','exists:users,id'],
            'is_published' => ['required', 'in:published,draft'],
            'published_at' => ['nullable', 'date_format:Y-m-d H:i:s'],
        ];
    }
}
