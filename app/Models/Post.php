<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'photo', 'caption', 'location'
    ];

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function tags()
    {
    	return $this->belongsToMany(User::class);
    }

    public function likes()
    {
    	return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id');
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
