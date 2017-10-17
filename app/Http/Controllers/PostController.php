<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    function show($post_id)
    {
        $post = Post::whereId($post_id)->get()->first();
    	return view('post')->with('post', $post);
    }
}
