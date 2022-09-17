<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'body'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * If the user_id of the user who liked the post is the same as the user_id of the user who is
     * logged in, then return true
     *
     * @param User user The user who is liking the post.
     *
     * @return A boolean value.
     */
    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }
}
