<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Post;
use App\Admin\Image as ImageModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

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
        $images = [];
        return view('admin.posts.create', ['post' => $post, 'images' => $images]);
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

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                    $this->upload_image($image, $post->id);
                }
            }
        }

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
        $images = ImageModel::where('type', config('services.images_type')['post'])
            ->where('pid', $id)->get();
        return view('admin.posts.create', ['post' => $post, 'images' => $images]);
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
        $post->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                    $this->upload_image($image, $post->id);
                }
            }
        }

        if ($request->get('save-2double')) {
            return view('admin.posts.create', compact('post'));
        } elseif ($request->get('save-2new')) {
            return redirect()->route('admin.posts.create')->with('success', 'Запись успешно добавлена');
        } else {
            return redirect()->route('admin.posts.index')->with('success', 'Запись успешно добавлена');
        }
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

    /**
     * @param $image
     * @param int $pid
     */
    private function upload_image(UploadedFile $image, $pid = 0)
    {
        list($width, $height, $type, $attr) = getimagesize($image->path());
        $destination_path = '/public/images/' . (rand(0, 100) % 100) . '/';
        $uploaded = $image->store($destination_path);
        if (!$uploaded) return;
        $file_info = pathinfo($uploaded);
        $image_data = [
            'ext' => $image->extension(),
            'path' => str_replace('public', '', $file_info['dirname']),
            'status' => 1,
            'uid' => Auth::id(),
            'caption' => $image->getClientOriginalName(),
            'name' => $file_info['filename'],
            'width' => $width,
            'height' => $height,
            'size' => $image->getClientSize(),
            'type' => config('services.images_type')['post'],
            'pid' => $pid,
        ];

        ImageModel::create($image_data);

        $resize = Image::make($image);
        $resize->resize(1000, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        Storage::put("{$destination_path}/lg/{$file_info['filename']}." . $image->extension(), (string)$resize->encode());

        $resize->resize(500, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        Storage::put("{$destination_path}/md/{$file_info['filename']}." . $image->extension(), (string)$resize->encode());

        $resize->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        Storage::put("{$destination_path}/sm/{$file_info['filename']}." . $image->extension(), (string)$resize->encode());
    }
}
