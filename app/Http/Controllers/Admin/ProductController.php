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
            'price' => 'nullable|numeric',
            'quantity' => 'nullable|numeric|min:1',
            'status' => 'nullable|numeric|max:1',
            'vendor_code' => 'string|max:255',
            'barcode' => 'string|max:255',
            'collection' => 'nullable|string|max:255',
            'sex' => 'numeric|min:1',
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
        $products = Product::orderBy('id', 'desc')
            ->paginate(config('services.pagination'));
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

        $product->meta_title = $request->get('meta_title');
        $product->meta_desc = $request->get('meta_desc');
        $product->meta_keywords = $request->get('meta_keywords');

        if ($request->file('images')->isValid()) {
            dd($request->get('images'));
        }
//            $product->img = $request->img->path();

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Information has been created');
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

        $product->meta_title = $request->get('meta_title');
        $product->meta_desc = $request->get('meta_desc');
        $product->meta_keywords = $request->get('meta_keywords');
        $product->save();

//        dd($request->get('status'));

        return redirect()->route('admin.products.index')->with('success', 'Данные успешно сохранены');
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
