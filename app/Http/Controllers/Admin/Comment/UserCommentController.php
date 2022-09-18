<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserCommentController extends Controller
{
    public function index(User $user)
    {
        $comments = $user->comments()->with(['user', 'likes'])->paginate(20);

        return view('users.comments.index', compact('user', 'comments'));
    }
}
