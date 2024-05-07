<?php

namespace App\Http\Requests\Apis\GluCare\blog;

use App\Http\traits\ApiTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoriesStoreRequest extends FormRequest
{
 use ApiTrait;
    public function authorize()
    {
        if (auth()->check()) {
            if ($this->user()->can('categories_create')) {
                return true;
            }
            return $this->errorMessage([], 'Admin Only, Unauthorized.', 403);
        }
        return $this->errorMessage([], 'Unauthenticated.', 401);
    }
    public function rules()
    {
           $category = $this->route('category');
           $categoryId = $category ? $category->id : null;

        return [
            'name' => ['required', 'string', 'max:255', Rule::unique('categories')->ignore($categoryId)],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            'status' => ['required', 'in:active,archived'],
            'parent_id' => ['nullable', 'exists:categories,id'],
        ];
    }

}
