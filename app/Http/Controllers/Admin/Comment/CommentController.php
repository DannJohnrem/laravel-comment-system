<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function __contruct()
    {
        $this->middleware('auth');
    }

    /**
     * The function returns a view called admin.comment.index
     *
     * @return The view admin.comment.index
     */
    public function index()
    {
        return view('admin.comment.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
        ]);

        Comment::create([
            'user_id' => auth()->user()->id,
            'body' => $request->body
        ]);

    }
}
