<?php

namespace App\Http\Requests\Apis\GluCare\blog;

use App\Http\traits\ApiTrait;
use App\Models\GluCare\blog\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoriesUpdateRequest extends FormRequest
{

    use ApiTrait;
    public function authorize()
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            // Check if the authenticated user has the required permission
            if ($this->user()->can('categories_edit')) {
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
        $category = Category::find($this->route('category'));
        if (!$category) {
            return [];
        }
        return [
            'name' => ['required', 'string', 'max:255', Rule::unique('categories')->ignore($category->id)],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            'status' => ['required', 'in:active,archived'],
            'parent_id' => ['nullable', 'exists:categories,id']
        ];
    }
}
