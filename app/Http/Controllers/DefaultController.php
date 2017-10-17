<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class DefaultController extends Controller
{
    function index()
    {
        $post = Post::orderByRaw('RAND()')->take(9)->get();
        $user = User::orderByRaw('RAND()')->take(4)->get();
        return view('default')->with('post', $post)->with('user', $user);
    }
}
