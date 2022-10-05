<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;

class CommentController extends Controller
{
    /**
     * The `__construct()` function is a special function that is automatically called when a class is
     * instantiated.
     *
     * In this case, we are using it to call the `middleware()` function, which is a Laravel function
     * that checks to see if the user is logged in. If the user is not logged in, they will be
     * redirected to the login page
     */
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }

    /**
     * The function returns a view called admin.comment.index
     *
     * @return The view admin.comment.index
     */
    public function index()
    {
        $comments = Comment::latest()->with(['likes', 'user'])->paginate(20);

        return view('pages.comment.index', compact('comments'));
    }

    /**
     * The show function takes a Comment object as an argument and returns a view called comment.show
     * with the Comment object passed to it
     *
     * @param Comment comment The model instance passed to the route
     *
     * @return The view comment.show with the comment variable.
     */
    public function show(Comment $comment)
    {
        return view('pages.comment.show', compact('comment'));
    }

    /**
     * The store function creates a new comment and the destroy function deletes a comment
     *
     * @param StoreCommentRequest request The incoming HTTP request.
     *
     * @return The user's comments.
     */
    public function store(StoreCommentRequest $request)
    {
        $request->user()->comments()->create($request->safe()->only('body'));

        return back();
    }

    /**
     * The destroy function is used to delete a comment
     *
     * @param Comment comment The comment model instance.
     *
     * @return The user is being returned.
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return back();
    }
}
