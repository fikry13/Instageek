<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
    function index()
    {
        if (Auth::check()){
            $followee = Auth::user()->followees()->pluck('id');
            $followee[] = Auth::id();
            $post = Post::whereIn('user_id', $followee)
                ->with(['user', 'likes', 'comments.user'])
                ->orderBy('created_at')
                ->get();
            return view('default')->with('post', $post);
        }
        else{
            return view('default');
        }
    }
}
