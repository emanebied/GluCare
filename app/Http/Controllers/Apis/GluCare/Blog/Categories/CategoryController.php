<?php

namespace App\Http\Controllers\Apis\GluCare\Blog\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Apis\GluCare\blog\Categories\CategoriesStoreRequest;
use App\Http\Requests\Apis\GluCare\blog\Categories\CategoriesUpdateRequest;
use App\Http\traits\ApiTrait;
use App\Http\traits\AuthorizeCheckTrait;
use App\Models\GluCare\blog\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\InteractsWithMedia;

class CategoryController extends Controller
{
    use ApiTrait , InteractsWithMedia , AuthorizeCheckTrait;

    public function index()
    {
        $this->authorizeCheck('categories_view');
        $request = request();

  /*      $categories = Category::leftJoin('categories as parents', 'parents.id', '=', 'categories.parent_id')
            ->select([
                'categories.*',
                'parents.name as parent_name'
            ])
            ->filter($request->query())
            ->orderBy('categories.name', 'desc')
            ->paginate(10, ['*'], 'page', $request->query('page'));
  */
        $categories = Category::with('parent')->filter($request->query())->latest()->paginate(8);

        if ($categories->isEmpty()) {
            return $this->errorMessage([], 'No categories found', 404);
        }
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


    public function show(Category $category)
    {
        $this->authorizeCheck('categories_view');
/*        $category = Category::leftJoin('categories as parents', 'parents.id', '=', 'categories.parent_id')
            ->select([
                'categories.*',
                'parents.name as parent_name'
            ])
            ->where('categories.id', $category->id)
            ->first();

        if (!$category) {
            return $this->errorMessage([], 'Category not found', 404);
        }*/
        $category->load('parent');
        return $this->data(compact('category'), 'Category fetched successfully');
    }




       public function update(CategoriesUpdateRequest $request,$id)
       {
           $category = Category::findOrFail($id);
           $request->merge([
               'slug' => Str::slug($request->post('name'))
           ]);

           if ($request->hasFile('image')) {
               try {
                   $category->clearMediaCollection('categories_images');// still remain in storage disk
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


        public function destroy(Category $category)
        {
            $this->authorizeCheck('categories_delete');
            $category->delete();
            return $this->SuccessMessage( 'Category deleted successfully');
        }
        public function trash()
        {
            $this->authorizeCheck('categories_delete');
            $categories = Category::onlyTrashed()->paginate(10);
            return $this->data(compact('categories'), 'Trashed categories fetched successfully');
        }
        public function restore(Request $request,$id)
        {
            $this->authorizeCheck('categories_delete');
            $category = Category::withTrashed()->findOrFail($id);
            $category->restore();
            return $this->SuccessMessage( 'Category restored successfully');
        }
        public function forceDelete($id)
        {
            $this->authorizeCheck('categories_delete');
            $category = Category::withTrashed()->findOrFail($id);
            $category->forceDelete();

            if($category->image){
                Storage::disk('media')->delete($category->image);
            }
            return $this->SuccessMessage( 'Category deleted permanently');
        }


}
