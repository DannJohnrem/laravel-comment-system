<?php

namespace App\Http\Controllers\Admin\Likes;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function store(Comment $comment)
    {
        dd($comment);
    }
}
