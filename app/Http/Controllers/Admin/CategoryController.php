<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Image as ImageModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
//        $this->middleware('admin');
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
//            'level' => 'required|numeric|min:0',
            'status' => 'nullable|numeric|max:1',

            'meta_title' => 'nullable|string|max:255',
            'meta_desc' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',

            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('images')->orderBy('ordr')->orderBy('level');
        if (isset($_GET['q'])) {
            $categories = $categories->where('name', 'LIKE', '%' . e($_GET['q']) . '%')
                ->orWhere('desc', 'LIKE', '%' . e($_GET['q']) . '%');
        }
//        $categories_tree = $categories->tree();
        $categories = $categories->get();
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
        if (isset($_GET['pid']) && intval($_GET['pid'])) {
            $category->pid = intval($_GET['pid']);
        }
        $categories = Category::where('status', 1)->orderBy('ordr')->get();
        return view('admin.categories.create', [
            'category' => $category,
            'categories' => $categories,
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
        $parent_category = Category::find($request->get('pid'));
        if ($parent_category) {
            $category->level = $parent_category['level'] + 1;
            $category->ordr = $parent_category['ordr'] + 1;
            Category::where('ordr', '>', $parent_category['ordr'])
                ->update([
                    'ordr' => DB::raw('ordr+1')
                ]);
        }
        $category->status = $request->get('status') ? 1 : 0;
        $category->inc_menu = $request->get('inc_menu') ? 1 : 0;
        $category->uid = auth()->id();

        $category->meta_title = $request->get('meta_title');
        $category->meta_desc = $request->get('meta_desc');
        $category->meta_keywords = $request->get('meta_keywords');
        $category->save();

        if (!$request->get('pid')) {
            $category->ordr = $category->id;
            $category->save();
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
//                    $this->upload_image($image, $category->id);
                    ImageModel::upload_image($image, $category->id, 'App\Category');
                }
            }
        }
        if ($request->has('image-del')) {
            foreach ($request->get('image-del') as $id) {
                $image = ImageModel::findOrFail($id);
                ImageModel::delete_image($image);
                $image->delete();
            }
        }

        if ($request->get('save-2double')) {
            $categories = Category::where('status', 1)->orderBy('ordr')->get();
            return view('admin.categories.create', compact('category', 'categories'));
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
        $category = Category::findOrFail($id);
        $categories = Category::where('status', 1)->orderBy('ordr')->get();
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
        $category = Category::findOrFail($id);
        $categories = Category::where('status', 1)->orderBy('ordr')->get();

        return view('admin.categories.create', [
            'category' => $category,
            'categories' => $categories
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

        $category = Category::findOrFail($id);
        $category->name = $request->get('name');
        $category->desc = $request->get('desc');
        $category->pid = $request->get('pid');
        $category->status = $request->get('status') ? 1 : 0;
        $category->inc_menu = $request->get('inc_menu') ? 1 : 0;
        $category->uid = auth()->id();
        $category->level = 1;
        $category->ordr = 1;

        $parent_category = Category::where('id', $request->get('pid'))->first();
        if ($parent_category) {
            $category->level = $parent_category['level'] + 1;
            $category->ordr = $parent_category['ordr'] + 1;
            $new_order = $category->ordr;

            $cat = Category::where('ordr', '>=', $parent_category['ordr'])
                ->orderBy('ordr')->orderBy('level')->get();
            foreach ($cat as $one) {
                Category::find($one['id'])->update(['ordr' => $new_order++]);
            }
        }

        $category->meta_title = $request->get('meta_title');
        $category->meta_desc = $request->get('meta_desc');
        $category->meta_keywords = $request->get('meta_keywords');
        $category->save();


        if (!$request->get('pid')) {
            $category->ordr = $category->id;
            $category->save();
        }


        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                    ImageModel::upload_image($image, $category->id, 'App\Category');
                }
            }
        }
        if ($request->has('image-del')) {
            foreach ($request->get('image-del') as $id) {
                $image = ImageModel::findOrFail($id);
                ImageModel::delete_image($image);
                $image->delete();
            }
        }

        if ($request->has('save-2double')) {
            $categories = Category::where('status', 1)->orderBy('ordr')->get();
            $category->id = null;
            return view('admin.categories.create', [
                'category' => $category,
                'categories' => $categories,
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
        Category::where('ordr', '>=', $category['ordr'])
            ->update([
                'ordr' => DB::raw('ordr-1')
            ]);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Запись удалена');
    }
}
