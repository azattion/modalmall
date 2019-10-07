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
        $post = Post::where('id', $id)->where('status', 1)->first();
        if (isset($post['slug']) && $post['slug']) {
            header('Location: /page/' . $post['slug']);
            exit();
        }
        $post->increment('views');
        return view('site.posts.show', ['post' => $post]);
    }

    function category($id)
    {
        $posts = Post::where('status', 1)->where('type', $id)->get();
        $posts_type = config('services.posts_type');
        $type = $posts_type[$id];
        return view('site.posts.list', ['posts' => $posts, 'type' => $type]);
    }

    function page_show($name)
    {
        $post = Post::where('slug', $name)->where('status', 1)->first();
        if (!($post)) {
            abort(404);
        }
        return view('site.posts.show', ['post' => $post]);
    }
}
