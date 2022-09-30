<?php

namespace App\Mail;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommentLiked extends Mailable
{
    use Queueable, SerializesModels;

    public $liker;
    public $post;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $liker, Comment $post)
    {
        $this->liker = $liker;
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.comments.comment_liked');
    }
}
