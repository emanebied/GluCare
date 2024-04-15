<?php

namespace App\Http\Requests\Apis\Website\blog;

use App\Http\traits\ApiTrait;
use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoriesUpdateRequest extends FormRequest
{

    use ApiTrait;
    public function authorize()
    {
        if($this->user()->can('categories_edit')){
            return true;
        }
        return $this->errorMessage([],'Admin Only, Unauthorized .', 403);
    }

    public function rules()
    {
        // Get the category model instance from the route parameter
        $category = Category::find($this->route('category'));
        if (!$category) {
            return []; // empty array for rules
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
