<?php

namespace App\Http\Controllers\Site;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    function index()
    {
        return view('site.posts.index');
    }

    function item($id)
    {
        $post = Post::findOrFail($id);
        return view('site.posts.item', ['post' => $post]);
    }
}
