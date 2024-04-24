<?php

namespace App\Http\Controllers\Apis\Website\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Apis\Website\blog\LikeStoreRequest;
use App\Http\traits\ApiTrait;
use App\Models\website\blog\Comment;
use App\Models\website\blog\Post;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class LikesController extends Controller
{
    use ApiTrait;

    public function toggleLike(LikeStoreRequest $request)
    {
        $user = $request->user();
        $likeableType = $request->post('likeable_type');
        $likeableId = $request->post('likeable_id');

        if ($likeableType == 'posts') {
            $likeable = Post::findOrFail($likeableId);
        } else {
            $likeable = Comment::findOrFail($likeableId);
        }

        // Check if the user has already liked the post or comment
        $existingLike = DB::table('likes')
            ->where('user_id', $user->id)
            ->where('likeable_id', $likeableId)
            ->where('likeable_type', get_class($likeable))
            ->first();

        // If the user has already liked, delete the like (unlike) and decrement the likes count
        if ($existingLike) {
            DB::table('likes')->where('id', $existingLike->id)->delete();
            $likeable->decrement('likes');
            return $this->successMessage('Unliked');
        } else {
            // If the user hasn't liked, create a new like and increment the likes count
            DB::table('likes')->insert([
                'user_id' => $user->id,
                'likeable_id' => $likeableId,
                'likeable_type' => get_class($likeable),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            $likeable->increment('likes');
            return $this->successMessage('Liked');
        }
    }



}
