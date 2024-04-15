<?php

namespace App\Http\Controllers\Apis\Website\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Apis\Website\blog\CategoriesStoreRequest;
use App\Http\Requests\Apis\Website\blog\CategoriesUpdateRequest;
use App\Http\traits\ApiTrait;
use App\Http\traits\AuthorizeCheckTrait;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\InteractsWithMedia;

class CategoryController extends Controller
{
    use ApiTrait , InteractsWithMedia , AuthorizeCheckTrait;

    public function index()
    {
        $categories = Category::all();
        return $this->data(compact('categories'), 'Categories fetched successfully');
    }

     public function store(CategoriesStoreRequest $request)
     {
         $request->merge([
                'slug' => Str::slug($request->post('name'))
            ]);
         $category = Category::create( $request->all());

         //upload image
         if ($request->hasFile('image')) {
             try {
                 $category->addMediaFromRequest('image')->toMediaCollection('categories_images');
             } catch (\Exception $e) {
                 Log::error('Error uploading image: ' . $e->getMessage());
             }
         }
           $category->getFirstMediaUrl('categories_images');
            return $this->data(compact('category'), 'Category created successfully',201);
     }


     public function show($id)
     {
         $category = Category::findOrFail($id);
         return $this->data(compact('category'), 'Category fetched successfully');
     }


       public function update(CategoriesUpdateRequest $request, $id)
       {
           $category = Category::findOrFail($id);
           $request->merge([
               'slug' => Str::slug($request->post('name'))
           ]);

           if ($request->hasFile('image')) {
               try {
                   $category->clearMediaCollection('categories_images');
                   $category->addMediaFromRequest('image')->toMediaCollection('categories_images');
               } catch (\Exception $e) {
                   Log::error('Error uploading image: ' . $e->getMessage());
               }
           }
           $category->update($request->all());
           $category->getFirstMediaUrl('categories_images');
           $category->refresh();
           return $this->data(compact('category'), 'Category updated successfully');
       }

        public function destroy($id)
        {
            $this->authorizeCheck('categories_delete');

            $category = Category::findOrFail($id);
            $category->delete();
            return $this->SuccessMessage( 'Category deleted successfully');
        }


}
