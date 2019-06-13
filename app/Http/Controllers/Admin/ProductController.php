<?php
namespace App\Http\Controllers\Admin;

use App\Product;
use App\Image as ImageModel;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

/*
 *    Название/наименование

       цена (возможность показать диапазон от и до)

       количество в упаковке (1,2,3,4,5,6,12)

       количество (к покупке +/)

       доступен к заказу/в корзину

Ф    размер

       цвет (в квадратиках)

       таблица размеров (таблиц будет несколько, во-первых на детское, женское и мужское, плюс на разные категории товаров)

Ф     сезон (весна-лето, осень-зима)

Ф     бренд

        производитель (Турция, Россия, Польша, Украина...)

        состав
 */

class ProductController extends Controller
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
            'cats.*' => 'required|numeric|min:1',
            'price' => 'required|numeric',
            'quantity' => 'nullable|numeric|min:1',
            'colors.*' => 'nullable|numeric',
            'sizes.*' => 'nullable|numeric',
            'brand' => 'nullable|numeric',
            'composition' => 'nullable|string',
            'unit' => 'nullable|string',

            'status' => 'nullable|numeric|max:1',
            'vendor_code' => 'nullable|string|max:255',
            'barcode' => 'nullable|string|max:255',
            'collection' => 'nullable|string|max:255',
//            'sex' => 'nullable|numeric|min:1',
            'meta_title' => 'nullable|string|max:255',
            'meta_desc' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',

            'as_new' => 'nullable|numeric|max:1',
            'as_new_start_date' => 'nullable|date',
            'as_new_end_date' => 'nullable|date',

            'sale' => 'nullable|numeric|max:1',
            'sale_start_date' => 'nullable|date',
            'sale_end_date' => 'nullable|date',

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
        $products = Product::orderBy('id', 'desc');
        if (isset($_GET['q'])) {
            $products = $products->where('name', 'LIKE', '%' . e($_GET['q']) . '%')
                ->orWhere('desc', 'LIKE', '%' . e($_GET['q']) . '%');
        }
        $products = $products->paginate(config('services.pagination'));

        return view('admin.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product;
        $images = [];
        $categories = Category::where('status', 1)->get();
        return view('admin.products.create', [
            'product' => $product,
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

        $product = new Product;
        $product->name = $request->get('name');
        $product->desc = $request->get('desc');
        $product->cats = "|" . implode("|", $request->get('cats')) . "|";
        $product->price = $request->get('price');
        $product->status = $request->get('status') ? 1 : 0;
        $product->vendor_code = $request->get('vendor_code');
        $product->barcode = $request->get('barcode');
        $product->collection = $request->get('collection');
//        $product->sex = $request->get('sex');
        $product->quantity = $request->get('quantity');
        $product->colors = "|" . implode("|", $request->get('colors')) . "|";
        $product->sizes = "|" . implode("|", $request->get('sizes')) . "|";
        $product->brand = $request->get('brand');
        $product->composition = $request->get('composition');
        $product->producer = $request->get('producer');
        $product->unit = $request->get('unit');

        $product->meta_title = $request->get('meta_title');
        $product->meta_desc = $request->get('meta_desc');
        $product->meta_keywords = $request->get('meta_keywords');

        $product->as_new = $request->get('as_new') ? 1 : 0;
        $product->as_new_start_date = $request->get('as_new_start_date');
        $product->as_new_end_date = $request->get('as_new_end_date');

        $product->sale = $request->get('sale') ?: 0;
        $product->sale_start_date = $request->get('sale_start_date');
        $product->sale_end_date = $request->get('sale_end_date');
        $product->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                    $this->upload_image($image, $product->id);
                }
            }
        }

        if ($request->get('save-2double')) {
            $categories = Category::where('status', 1)->get();
            $images = [];
            return view('admin.products.create', [
                'product' => $product,
                'categories' => $categories,
                'images' => $images
            ]);
        } elseif ($request->get('save-2new')) {
            return redirect()->route('admin.products.create')->with('success', 'Запись успешно добавлена');
        } else {
            return redirect()->route('admin.products.index')->with('success', 'Запись успешно добавлена');
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
        $product = Product::findOrFail($id);
        return view('admin.products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::where('status', 1)->get();
//        $sex = config('services.product_sex');
//        $images = ImageModel::where('type', config('services.images_type')['product'])
//            ->where('pid', $id)->get();

        return view('admin.products.create', [
            'product' => $product,
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

        $product = Product::findOrFail($id);
        $product->name = $request->get('name');
        $product->desc = $request->get('desc');
        $product->cats = "|" . implode("|", $request->get('cats')) . "|";
        $product->price = $request->get('price');
        $product->status = $request->get('status') ? 1 : 0;
        $product->vendor_code = $request->get('vendor_code');
        $product->barcode = $request->get('barcode');
        $product->collection = $request->get('collection');
//        $product->sex = $request->get('sex');
        $product->quantity = $request->get('quantity');
        $product->colors = "|" . implode("|", $request->get('colors')) . "|";
        $product->sizes = "|" . implode("|", $request->get('sizes')) . "|";
        $product->brand = $request->get('brand');
        $product->composition = $request->get('composition');
        $product->producer = $request->get('producer');
        $product->unit = $request->get('unit');

        $product->meta_title = $request->get('meta_title');
        $product->meta_desc = $request->get('meta_desc');
        $product->meta_keywords = $request->get('meta_keywords');

        $product->as_new = $request->get('as_new') ?: 0;
        $product->as_new_start_date = $request->get('as_new_start_date');
        $product->as_new_end_date = $request->get('as_new_end_date');

        $product->sale = $request->get('sale') ?: 0;
        $product->sale_start_date = $request->get('sale_start_date');
        $product->sale_end_date = $request->get('sale_end_date');
        $product->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                    $this->upload_image($image, $product->id);
                }
            }
        }
        if ($request->has('image-del')) {
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
            $categories = Category::where('status', 1)->get();
            $product->id = null;
            $images = [];
            return view('admin.products.create', [
                'product' => $product,
                'categories' => $categories,
                'images' => $images
            ]);
        } elseif ($request->has('save-2new')) {
            return redirect()->route('admin.products.create')->with('success', 'Запись успешно изменена');
        } else {
            return redirect()->route('admin.products.index')->with('success', 'Запись успешно изменена');
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
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect() . route('admin.products.index')->with('success', 'Запись удалена');
    }

    /**
     * Show the form for creating multiple form.
     *
     * @return \Illuminate\Http\Response
     */
    public function multiple()
    {
        return view('admin.products.multiple');
    }

    /**
     * Import a few products
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->validate($request, [
            'files.*' => 'required|file|max:10240'
        ]);

        $file = $request->get('files');

        $row = 1;
        $insert_data = [];
        if (($handle = fopen($file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
//                echo "<p> $num fields in line $row: <br /></p>\n";
                $row++;
                for ($c = 0; $c < $num; $c++) {
                    echo $data[$c] . "<br />\n";
                }
                $insert_data[] = [];
            }
            fclose($handle);
        }

        Product::insert($insert_data);

        return redirect()->route('admin.products.index')->with('success', 'Данные успешно сохранены');
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
            'imageable_type' => 'App\Product',
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
