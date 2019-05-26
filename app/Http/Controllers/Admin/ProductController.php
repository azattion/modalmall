<?php
namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            'cat' => 'required|numeric|min:1',
            'price' => 'required|numeric',
            'quantity' => 'nullable|numeric|min:1',
            'status' => 'nullable|numeric|max:1',
            'vendor_code' => 'nullable|string|max:255',
            'barcode' => 'nullable|string|max:255',
            'collection' => 'nullable|string|max:255',
            'sex' => 'nullable|numeric|min:1',
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
        if (isset($_GET['search'])) {
            $products = $products->where('name', 'LIKE', '%' . e($_GET['search']) . '%')
                ->orWhere('desc', 'LIKE', '%' . e($_GET['search']) . '%');
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
        $categories = config('services.product_categories');
        $sex = config('services.product_sex');
        return view('admin.products.create', compact('product', 'categories', 'sex'));
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
        $product->cat = $request->get('cat');
        $product->price = $request->get('price');
        $product->status = $request->get('status') ? 1 : 0;
        $product->vendor_code = $request->get('vendor_code');
        $product->barcode = $request->get('barcode');
        $product->collection = $request->get('collection');
        $product->sex = $request->get('sex');
        $product->quantity = $request->get('quantity');

        $product->meta_title = $request->get('meta_title');
        $product->meta_desc = $request->get('meta_desc');
        $product->meta_keywords = $request->get('meta_keywords');

        $product->as_new = $request->get('as_new')?1:0;
        $product->as_new_start_date = $request->get('as_new_start_date');
        $product->as_new_end_date = $request->get('as_new_end_date');

        $product->sale = $request->get('sale')?:0;
        $product->sale_start_date = $request->get('sale_start_date');
        $product->sale_end_date = $request->get('sale_end_date');

//        if ($request->file('images')->isValid()) {
            dd($request->get('images'));
//        }
//            $product->img = $request->img->path();
        $product->save();

        if ($request->get('save-2double')) {
            $categories = config('services.product_categories');
            $sex = config('services.product_sex');
            return view('admin.products.create', compact('product', 'categories', 'sex'));
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
        $product = Product::find($id);
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
        $product = Product::find($id);
        $categories = config('services.product_categories');
        $sex = config('services.product_sex');
        return view('admin.products.create', compact('product', 'categories', 'sex'));
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

        $product = Product::find($id);
        $product->name = $request->get('name');
        $product->desc = $request->get('desc');
        $product->cat = $request->get('cat');
        $product->price = $request->get('price');
        $product->status = $request->get('status') ? 1 : 0;
        $product->vendor_code = $request->get('vendor_code');
        $product->barcode = $request->get('barcode');
        $product->collection = $request->get('collection');
        $product->sex = $request->get('sex');
        $product->quantity = $request->get('quantity');

        $product->meta_title = $request->get('meta_title');
        $product->meta_desc = $request->get('meta_desc');
        $product->meta_keywords = $request->get('meta_keywords');

        $product->as_new = $request->get('as_new')?:0;
        $product->as_new_start_date = $request->get('as_new_start_date');
        $product->as_new_end_date = $request->get('as_new_end_date');

        $product->sale = $request->get('sale')?:0;
        $product->sale_start_date = $request->get('sale_start_date');
        $product->sale_end_date = $request->get('sale_end_date');

        $product->save();

        foreach($request->file('images') as $image) {
            $filename = $image->store('images');
            dd($filename);
        }

//        $validator = Validator::make(
//            $request->get('images'), [
//            'images.*' => 'required|mimes:jpg,jpeg,png,bmp|max:20000'
//        ],[
//                'images.*.required' => 'Please upload an image',
//                'images.*.mimes' => 'Only jpeg,png and bmp images are allowed',
//                'images.*.max' => 'Sorry! Maximum allowed size for an image is 20MB',
//            ]
//        );

//        dd($request->all());

        if ($request->has('save-2double')) {
            $categories = config('services.product_categories');
            $sex = config('services.product_sex');
            $product->id = null;
            return view('admin.products.create', compact('product', 'categories', 'sex'));
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
        $product = Product::find($id);
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
}
