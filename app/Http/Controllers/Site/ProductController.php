<?php

namespace App\Http\Controllers\Site;

use App\Brand;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->get();
        return view('site.products.list', ['categories' => $categories]);
    }

    public function category($id)
    {
        $sort = 'id';
        $order = 'desc';
        $get_params = [];
        if (isset($_GET['sort']) && in_array($_GET['sort'], array('cost', 'top'))) {
            $sort = $_GET['sort'] == 'top' ? 'views' : 'cost';
            $get_params[] = "sort={$sort}";
        }
        if (isset($_GET['order']) && in_array($_GET['order'], array('desc', 'asc'))) {
            $order = $_GET['order'];
            $get_params[] = "order={$order}";
        }

        $category = Category::find($id);
        $categories = Category::where('status', 1)->where('pid', $id)->get();
        $products = Product::with('images')->with('reviews')->orderBy($sort, $order);
        $brands = Brand::where('status', 1)->orderBy('id', 'desc')->get();

        if ($id) {
            $products = $products->where('cats', 'LIKE', "%|{$id}|%");
        }

        if (isset($_GET['size']) && $_GET['size']) {
            $size = $_GET['size'];
            $products = $products->where('sizes', 'LIKE', "%|{$size}|%");
            $get_params[] = "size={$size}";
        }
        if (isset($_GET['brand']) && $_GET['brand']) {
            $brand = $_GET['brand'];
            $products = $products->where('brand', $brand);
            $get_params[] = "brand={$brand}";
        }
        if (isset($_GET['producer']) && $_GET['producer']) {
            $producer = $_GET['producer'];
            $products = $products->where('producer', $producer);
            $get_params[] = "producer={$producer}";
        }
        if (isset($_GET['q']) && $_GET['q']) {
            $q = e($_GET['q']);
            $products = $products->where('name', 'LIKE', '%' . $q . '%')
                ->orWhere('desc', 'LIKE', '%' . $q . '%');
            $get_params[] = "q={$q}";
        }
        if (isset($_GET['promotion'])) {
            $products = $products->where('sale_start_date', '<', date('Y-m-d H:i:s'))
                ->where('sale_end_date', '>', date('Y-m-d H:i:s'))
                ->where('sale_percent', '>', 0);
            $get_params[] = "promotion";
        }
//        $products->dd();
        $products = $products->paginate(config('services.pagination'));
        if(count($get_params))
            $products->withPath("?".implode("&", $get_params));

        return view('site.products.category',
            [
                'category' => $category,
                'products' => $products,
                'categories' => $categories,
                'brands' => $brands
            ]);
    }

    public function novelty()
    {
        $products = Product::where('as_new_start_date', '<=', date('Y-m-d H:i:s'))->where('as_new_end_date', '>=', date('Y-m-d H:i:s'))->orderBy('id', 'desc')->get();

        return view('site.products.search',
            ['category' => [], 'products' => $products]);
    }

    public function brands()
    {
        $brands = Brand::where('status', 1)->orderBy('ordr')->get();
        return view('site.products.brand', ['brands' => $brands]);
    }

    public function search(Request $request)
    {
        $word = $request->get('q');
        $category = new Category();
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->orderBy('id', 'desc')->get();
        $products = [];
        if ($word) {
            $products = Product::orderBy('id', 'desc')->where('name', 'LIKE', "%{$word}%")->get();
        }
        return view('site.products.category',
            [
                'category' => $category,
                'products' => $products,
                'categories' => $categories,
                'brands' => $brands
            ]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        if (!(auth()->user()['role'] == 1 || $product->status == 1)) {
            abort(404);
        }

        $categories = Category::where('status', 1)->where('pid', $id)->get();
        $brands = Brand::where('status', 1)->orderBy('id', 'desc')->get();
        $product->increment('views');

        $category = '';
        $related_products = [];
        if ($product['cats']) {
            $category_exploded = explode('|', trim($product['cats'], '|'));
            if (isset($category_exploded[0])) {
                $category = Category::where('status', 1)
                    ->where('id', $category_exploded[0])->first();
                $related_products = Product::where('status', 1)
                    ->where('cats', 'LIKE', '%|' . $category_exploded[0] . '|%')
                    ->where('id', '!=', $id)
                    ->orderBy('id', 'desc')
                    ->take(12)->get();
            }
        }
        $product->images = $product->images()->orderBy('order')->get();
//        dd(auth()->id());
        $product->favorite = $product->favorite()->where('uid', auth()->id())->first();
        $product->pcolors = Product::where('status', 1)->where('vendor_code', $product['vendor_code'])->get();

        return view('site.products.show',
            [
                'product' => $product,
                'category' => $category,
                'categories' => $categories,
                'related_products' => $related_products,
                'brands' => $brands
            ]);
    }

}
