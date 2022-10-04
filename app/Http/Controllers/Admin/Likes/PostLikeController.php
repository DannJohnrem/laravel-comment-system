<?php

namespace App\Http\Controllers\Admin\Likes;

use App\Models\Comment;
use App\Mail\CommentLiked;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class PostLikeController extends Controller
{
    /**
     * > The __construct() function is a special function that is automatically called when an object
     * is created
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * If the user has already liked the comment, return a 409 response, otherwise create a new like
     * for the comment
     *
     * @param Comment comment The comment that is being liked.
     * @param Request request The request object.
     *
     * @return The back() method will return the user to the previous page.
     */
    public function store(Comment $comment, Request $request)
    {
        if ($comment->likedBy($request->user())) {
            return response(null, 409);
        }

        $comment->likes()->create(['user_id' => $request->user()->id]);

        if (!$comment->likes()->onlyTrashed()->where('user_id', $request->user()->id)->count()) {
            Mail::to($comment->user)->send(new CommentLiked(auth()->user(), $comment));
        }

        return back();
    }

    public function destroy(Comment $comment, Request $request)
    {
        $request->user()->likes()->where('comment_id', $comment->id)->delete();

        return back();
    }
}
