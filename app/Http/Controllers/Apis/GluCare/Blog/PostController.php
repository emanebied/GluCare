<?php

namespace App\Http\Controllers\Apis\Website\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Apis\Website\blog\PostStoreRequest;
use App\Http\Requests\Apis\Website\blog\PostUpdateRequest;
use App\Http\traits\ApiTrait;
use App\Http\traits\AuthorizeCheckTrait;
use App\Models\GluCare\blog\Post;
use App\Models\GluCare\blog\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\InteractsWithMedia;

class PostController extends Controller
{
    use ApiTrait , InteractsWithMedia , AuthorizeCheckTrait;

    public function index()
    {
        $request = request();

        $posts = Post::withCount('likes','comments')
         ->with('category', 'tags', 'user', 'comments','likes')
         ->filter($request->query())
         ->latest()
         ->paginate(8);

        if ($posts->isEmpty()) {
            return $this->errorMessage([], 'No posts found', 404);
        }

        foreach ($posts as $post) {
            $post->increment('views');
        }

        return $this->data(compact('posts'), 'Posts fetched successfully');
    }



    public function store(PostStoreRequest $request)
    {
        $request->merge([
            'slug' => Str::slug($request->post('title')),
            'published_at' => $request->post('is_published') === 'published' ? now() : null,
//            'user_id' => auth()->id(),
              'user_id' => $request->user()->id,
        ]);

        $post = Post::create($request->all());

        // Upload image
        if ($request->hasFile('image')) {
            try {
                $post->addMediaFromRequest('image')->toMediaCollection('posts_images');
            } catch (\Exception $e) {
                Log::error('Error uploading image: ' . $e->getMessage());
            }
        }
        $post->getFirstMediaUrl('posts_images');

        if($post) {
            $tags = explode(',', $request->post('tags')); //turn string to array
            $tag_ids = [];
                foreach ($tags as $t_name) {
                    $slug = Str::slug($t_name);
                    $tag = Tag::firstOrCreate(['slug' => $slug], ['name' => $t_name]);
                    $tag_ids[] = $tag->id;
                }
            $post->tags()->sync($tag_ids);
        }

        return $this->data(compact('post'), 'Post created successfully',201);

    }

    public function show(Post $post)
    {
        $post->load('category','tags','user','comments','likes');
        return $this->data(compact('post'), 'Post fetched successfully');

    }


    public function update(PostUpdateRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $request->merge([
            'slug' => Str::slug($request->post('title')),
            'published_at' => $request->post('is_published') === 'published' ? now() : null
        ]);

        if ($request->hasFile('image')) {
            try {
                $post->clearMediaCollection('posts_images');// still remain in storage disk
                $post->addMediaFromRequest('image')->toMediaCollection('posts_images');
            } catch (\Exception $e) {
                Log::error('Error uploading image: ' . $e->getMessage());
            }
        }

        $post->update($request->except('tags'));
        $post->getFirstMediaUrl('posts_images');
        $post->refresh();

        $tags = explode(',', $request->post('tags')); //turn string to array
        $tag_ids = [];
        foreach ($tags as $t_name) {
            $slug = Str::slug($t_name);
            $tag = Tag::firstOrCreate(['slug' => $slug], ['name' => $t_name]);
            $tag_ids[] = $tag->id;
        }
        $post->tags()->sync($tag_ids);

        return $this->data(compact('post'), 'post updated successfully');
    }


    public function destroy(Post $post)
    {
        $this->authorizeCheck('posts_delete');
        $post->delete();
        return $this->SuccessMessage( 'Post deleted successfully');
    }
    public function trash()
    {
        $this->authorizeCheck('posts_delete');
        $posts= Post::onlyTrashed()->paginate(8);
        return $this->data(compact('posts'), 'Trashed posts fetched successfully');
    }
    public function restore(Request $request,$id)
    {
        $this->authorizeCheck('posts_delete');
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();
        return $this->SuccessMessage( 'Post restored successfully');
    }
    public function forceDelete($id)
    {
        $this->authorizeCheck('posts_delete');
        $post = Post::withTrashed()->findOrFail($id);
        $post->forceDelete();

        if($post->image){
            Storage::disk('media')->delete($post->image);
        }
        return $this->SuccessMessage( 'Post deleted permanently');
    }
}
