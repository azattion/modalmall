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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('status', 1)
            ->orderBy('id', 'desc')
            ->take(10)
            ->get();
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
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'desc' => ['required', 'string'],
//            'status' => ['boolean'],
            'cat' => ['required', 'numeric'],
            'img' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ]);

        $product = new Product;
        $product->name = $request->get('name');
        $product->desc = $request->get('desc');
        $product->cat = $request->get('cat');
        $product->price = $request->get('price');
        $product->vendor_code = $request->get('vendor_code');
        $product->barcode = $request->get('barcode');
        $product->collection = $request->get('collection');
        $product->sex = $request->get('sex');

        if ($request->file('img')->isValid())
            $product->img = $request->img->path();

        $product->save();

        return redirect('products')->with('success', 'Information has been created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view('admin.products.create', compact('product', 'id'));
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
        $product = Product::find($id);
        $product->name = $request->get('name');
        $product->desc = $request->get('desc');
        $product->cat = $request->get('cat');
        $product->price = $request->get('price');
        $product->save();

        return redirect('products')->with('success', 'Information has been updated');
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
        return redirect('products')->with('success', 'Information has been  deleted');
    }
}
