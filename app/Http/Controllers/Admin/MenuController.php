<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;
use App\Image as ImageModel;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class MenuController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * @return array
     */
    private function validate_data()
    {
        return [
            'title' => 'required|string|max:255',
            'link' => 'required|string',
            'status' => 'nullable|numeric|max:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::with('images')->orderBy('ordr');
        if (isset($_GET['q'])) {
            $menus = $menus->where('name', 'LIKE', '%' . e($_GET['q']) . '%');
        }
        $menus = $menus->get();
        return view('admin.menu.index', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        $menu = new Menu;
        $menu->title = $request->get('title');
        $menu->link = $request->get('link');
        $menu->ordr = 1;
        $menu->status = $request->get('status') ? 1 : 0;
        $menu->uid = auth()->id();
        $menu->type = $request->get('type');
        $menu->save();

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $this->upload_image($request->file('image'), $menu->id);
            }
        }

        return redirect()->route('admin.menu.show', $request->get('type'))->with('success', 'Запись успешно добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $type
     * @return \Illuminate\Http\Response
     */
    public function show($type)
    {
        $menu = Menu::with('images')->where('type', $type)->get();
        return view('admin.menu.show', ['type' => $type, 'menu' => $menu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.menu.create', ['menu' => $menu]);
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

        $menu = Menu::findOrFail($id);
        $menu->title = $request->get('title');
        $menu->link = $request->get('link');
        $menu->ordr = 1;
        $menu->status = $request->get('status') ? 1 : 0;
        $menu->uid = Auth::id();
        $menu->type = $request->get('type');
        $menu->save();

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $this->upload_image($request->file('image'), $menu->id);
            }
        }

        return redirect()->route('admin.menu.show', $menu->type)->with('success', 'Запись успешно изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $type = $request->get('type');
        Menu::findOrFail($id)->delete();
        return redirect()->route('admin.menu.show', $type)->with('success', 'Запись удалена');
    }


    /**
     * @param UploadedFile $image
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
            'imageable_type' => 'App\Menu',
            'imageable_id' => $pid,
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
