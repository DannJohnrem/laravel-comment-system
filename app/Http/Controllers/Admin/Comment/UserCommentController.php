<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserCommentController extends Controller
{
    public function index(User $user)
    {
       dd($user);
    }
}
