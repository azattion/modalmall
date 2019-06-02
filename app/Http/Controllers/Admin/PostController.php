<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Post;
use App\Admin\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * @return array
     */
    private function validate_data()
    {
        return [
            'title' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'text' => 'required|string',
            'keywords' => 'nullable|string',
            'status' => 'nullable|boolean',
            'date' => 'required|date',

            'meta_title' => 'nullable|string|max:255',
            'meta_desc' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',

            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc');
        if (isset($_GET['q'])) {
            $posts = $posts->where('title', 'LIKE', '%' . e($_GET['q']) . '%')
                ->orWhere('desc', 'LIKE', '%' . e($_GET['q']) . '%')
                ->orWhere('text', 'LIKE', '%' . e($_GET['q']) . '%');
        }
        $posts = $posts->paginate(config('services.pagination'));
        return view('admin.posts.index', compact('posts', $posts));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post;
        return view('admin.posts.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->validate_data());

        $post = new Post();
        $post->title = $request->get('title');
        $post->desc = $request->get('desc');
        $post->text = $request->get('text');
        $post->date = $request->get('date');
        $post->status = $request->get('status') ? 1 : 0;
        $post->keywords = $request->get('keywords');

        $post->meta_title = $request->get('meta_title');
        $post->meta_keywords = $request->get('meta_keywords');
        $post->meta_desc = $request->get('meta_desc');

        $post->save();

        if ($request->get('save-2double')) {
            return view('admin.posts.create', compact('post'));
        } elseif ($request->get('save-2new')) {
            return redirect()->route('admin.posts.create')->with('success', 'Запись успешно добавлена');
        } else {
            return redirect()->route('admin.posts.index')->with('success', 'Запись успешно добавлена');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.create', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->validate_data());

        $post = Post::findOrFail($id);
        $post->title = $request->get('title');
        $post->desc = $request->get('desc');
        $post->text = $request->get('text');
        $post->date = $request->get('date');
        $post->status = $request->get('status') ? 1 : 0;
        $post->keywords = $request->get('keywords');

        $post->meta_title = $request->get('meta_title');
        $post->meta_keywords = $request->get('meta_keywords');
        $post->meta_desc = $request->get('meta_desc');

        $images = [];
        foreach ($request->file('images') as $image) {
            list($width, $height, $type, $attr) = getimagesize($image->path());
//            dd($attr);
            $images[] = [
                'ext' => $image->extension(),
                'path' => $image->path(),
                'status' => 1,
                'author' => Auth::id(),
                'caption' => $image->getClientOriginalName(),
                'name' => $image->store('images/' . (rand(0, 100) % 100)),
                'width' => $width,
                'height' => $height,
            ];
        }

        $post->save();
        $new_image = Image::create($images);
        dd($new_image);

//        if ($request->get('save-2double')) {
//            return view('admin.posts.create', compact('post'));
//        } elseif ($request->get('save-2new')) {
//            return redirect()->route('admin.posts.create')->with('success', 'Запись успешно добавлена');
//        } else {
//            return redirect()->route('admin.posts.index')->with('success', 'Запись успешно добавлена');
//        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Запись удалена');

    }
}
