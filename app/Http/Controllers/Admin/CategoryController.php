<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Image as ImageModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
/*
 * Детское

  1. Девочкам
    1.1 нижнее белье
        1.1.1 комплекты
        1.1.2 бикини
        1.1.3 маечки и футболки
        1.1.4 топы и бюстгалтеры
     1.2 купальники
     1.3 колготки
         1.3.1 хлопковые
         1.3.2 капроновые
         1.3.3 для малышек
      1.4 гольфы и носочки
         1.4.1 хлопковые
         1.4.2 капроновые
         1.4.3 для малышек
       1.5 футболки принтованные
       1.6 одежда для дома и пижамы
       1.7 сорочки и халаты
       1.8 термобелье

  2. Мальчикам

      1.1 нижнее белье
         1.1.1 боксеры и плавки
         1.1.2 майки и футболки
      1.2 пляжные шорты
      1.3 колготки
      1.4 носки
      1.5 носочки малышам
      1.6 футболки принтованные
      1.7 одежда для дома и пижамы
      1.8 термобелье

Женское

     1.1 нижнее белье
         1.1.1 бикини JOHN FRANK
         1.1.2 бесшовное белье
         1.1.3 наборы бикини
         1.1.4 корректирующее белье
         1.1.5 футболки, майки, топы

     1.2 купальники и пляжная одежда
     1.3 колготки и чулки
     1.4 носки и гольфы
         1.4.1 носки JOHN FRANK
         1.4.2 хлопковые
         1.4.3 капроновые
      1.5 одежда для дома и пижамы
      1.6 сорочки, комплекты и халаты
      1.7 термобелье

Мужское

       1.1 боксеры JOHN FRANK
          1.1.1 принтованные
          1.1.2 однотонные
          1.1.3 наборы по 2 шт
          1.1.4 наборы по 3 шт

        1.2 футболки JOHN FRANK
        1.3 пляжные шорты JOHN FRANK
        1.4 пляжные полотенца JOHN FRANK
        1.5 носки JOHN FRANK
          1.5.1 принтованные по 1шт
          1.5.2 следки и укороченные
          1.5.3 наборы по 2 шт
          1.5.4 наборы по 3 шт
       1.6 майки и футболки DOREA
       1.7 одежда для дома и пижамы
       1.8 термобелье

PLUS SIZE
        1.1 белье
            1.1.1 наборы бикини
            1.1.2 корректирующее белье
            1.1.3 футболки и майки
        1.2 одежда для дома, пижамы и сорочки

Family LOOK
1+1
 */

class CategoryController extends Controller
{
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
     * @return array
     */
    private function validate_data()
    {
        return [
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'pid' => 'required|numeric|min:0',
            'status' => 'nullable|numeric|max:1',

            'meta_title' => 'nullable|string|max:255',
            'meta_desc' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',

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
        $categories = Category::orderBy('id', 'desc');
        if (isset($_GET['q'])) {
            $categories = $categories->where('name', 'LIKE', '%' . e($_GET['q']) . '%')
                ->orWhere('desc', 'LIKE', '%' . e($_GET['q']) . '%');
        }
        $categories = $categories->paginate(config('services.pagination'));
        return view('admin.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category;
        $categories = Category::all();
        $images = [];
        return view('admin.categories.create', [
            'category' => $category,
            'categories' => $categories,
            'images' => $images
        ]);
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

        $category = new Category;
        $category->name = $request->get('name');
        $category->desc = $request->get('desc');
        $category->pid = $request->get('pid');
        $category->status = $request->get('status') ? 1 : 0;
        $category->inc_menu = $request->get('inc_menu') ? 1 : 0;
        $category->uid = auth()->id();

        $category->meta_title = $request->get('meta_title');
        $category->meta_desc = $request->get('meta_desc');
        $category->meta_keywords = $request->get('meta_keywords');
        $category->save();

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $this->upload_image($request->file('image'), $category->id);
            }
        }

        if ($request->get('save-2double')) {
            $categories = Category::all();
            $images = [];
            return view('admin.categories.create', compact('category', 'categories', 'sex', 'images'));
        } elseif ($request->get('save-2new')) {
            return redirect()->route('admin.categories.create')->with('success', 'Запись успешно добавлена');
        } else {
            return redirect()->route('admin.categories.index')->with('success', 'Запись успешно добавлена');
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
        $category = Category::find($id);
        $categories = Category::all();
        return view('admin.categories.show', compact('category', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::all();
        $images = ImageModel::where('type', config('services.images_type')['category'])
            ->where('pid', $id)->get();

        return view('admin.categories.create', [
            'category' => $category,
            'categories' => $categories,
            'images' => $images
        ]);
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

        $category = Category::find($id);
        $category->name = $request->get('name');
        $category->desc = $request->get('desc');
        $category->pid = $request->get('pid');
        $category->status = $request->get('status') ? 1 : 0;
        $category->inc_menu = $request->get('inc_menu') ? 1 : 0;
        $category->uid = auth()->id();

        $category->meta_title = $request->get('meta_title');
        $category->meta_desc = $request->get('meta_desc');
        $category->meta_keywords = $request->get('meta_keywords');
        $category->save();

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $this->upload_image($request->file('image'), $category->id);
            }
        }
        if($request->has('image-del')){
            foreach ($request->get('image-del') as $id) {
                $image = ImageModel::findOrFail($id);
                Storage::delete("/public{$image['path']}/{$image['name']}.{$image['ext']}");
                Storage::delete("/public{$image['path']}/lg/{$image['name']}.{$image['ext']}");
                Storage::delete("/public{$image['path']}/md/{$image['name']}.{$image['ext']}");
                Storage::delete("/public{$image['path']}/sm/{$image['name']}.{$image['ext']}");
                $image->delete();
            }
        }

        if ($request->has('save-2double')) {
            $categories = Category::all();
            $category->id = null;
            $images = [];
            return view('admin.categories.create', [
                'category' => $category,
                'categories' => $categories,
                'images' => $images,
            ]);
        } elseif ($request->has('save-2new')) {
            return redirect()->route('admin.categories.create')->with('success', 'Запись успешно изменена');
        } else {
            return redirect()->route('admin.categories.index')->with('success', 'Запись успешно изменена');
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
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect() . route('admin.categories.index')->with('success', 'Запись удалена');
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
            'imageable_type' => 'App\Category',
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
