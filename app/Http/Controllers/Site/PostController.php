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

    function show($id)
    {
        $post = Post::findOrFail($id);
        return view('site.posts.show', ['post' => $post]);
    }

    function page_show($name)
    {
        $post = Post::where('slug', $name)->first();
        if (!($post)) {
            abort(404);
        }
//        dd($post);
        return view('site.posts.show', ['post' => $post]);
    }
}
