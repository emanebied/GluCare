<?php

namespace App\Http\Controllers\Apis\GluCare\Blog\comments;

use App\Http\Controllers\Controller;
use App\Http\Requests\Apis\GluCare\blog\Comments\CommentStoreRequest;
use App\Http\Requests\Apis\GluCare\blog\Comments\CommentUpdateRequest;
use App\Http\traits\ApiTrait;
use App\Http\traits\AuthorizeCheckTrait;
use App\Models\GluCare\blog\Comment;
use App\Models\GluCare\blog\Post;

class CommentController extends Controller
{

    use ApiTrait , AuthorizeCheckTrait;

    public function index()
    {
        $this->authorizeCheck('comments_view');
        $request = request();

        $comments = Comment::with('user', 'post')
            ->filter($request->query())
            ->latest()
            ->paginate(8);

        if ($comments->isEmpty()) {
            return $this->errorMessage([], 'No comments found', 404);
        }

        return $this->data(compact('comments'), 'Comments fetched successfully');
    }

    public function store(CommentStoreRequest $request)
    {
        $request->merge([
            'user_id' => $request->user()->id,
             'status' => 'pending',
        ]);

        $comment = Comment::create($request->all());

        // Increment the comments count in the post
        $post = Post::findOrFail($request->post('post_id'));
        $post->increment('comments');

        return $this->data(compact('comment'), 'Comment added successfully');
    }



    public function update(CommentUpdateRequest $request, Comment $comment)
    {

        $comment->update($request->validated());
        return $this->data(compact('comment'), 'Comment updated successfully');
    }


    public function show(Comment $comment)
    {
        $this->authorizeCheck('comments_show');
        return $this->data(compact('comment'), 'Comment fetched successfully');
    }

    public function destroy(Comment $comment)
    {
        $this->authorizeCheck('comments_delete');
        $comment->delete();

        return $this->successMessage( 'Comment deleted successfully');
    }

    public function approve(Comment $comment)
    {
        $this->authorizeCheck('comments_approve');
        $comment->update(['status' => 'approved']);
        return $this->successMessage( 'Comment approved ');
    }


    public function reject(Comment $comment)
    {
        $this->authorizeCheck('comments_reject');
        $comment->update(['status' => 'rejected']);
        return $this->successMessage( 'Comment rejected ');
    }

}
