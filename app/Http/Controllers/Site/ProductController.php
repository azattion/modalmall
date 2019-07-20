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
        if (isset($_GET['sort']) && in_array($_GET['sort'], array('cost', 'top'))) {
            $sort = 'cost';
        }
        if (isset($_GET['order']) && in_array($_GET['order'], array('desc', 'asc'))) {
            $order = $_GET['order'];
        }

        $category = Category::find($id);
        $categories = Category::where('status', 1)->where('pid', $id)->get();
        $products = Product::with('images')->with('reviews')->orderBy($sort, $order);
        $brands = Brand::where('status', 1)->orderBy('id', 'desc')->get();

        if ($id) {
            $products = $products->where('cats', 'LIKE', "%|{$id}|%");
        }

        if (isset($_GET['brand']) && $_GET['brand']) {
            $products = $products->where('brand', $_GET['brand']);
        }
        if (isset($_GET['q']) && $_GET['q']) {
            $products = $products->where('name', 'LIKE', '%' . e($_GET['q']) . '%')
                ->orWhere('desc', 'LIKE', '%' . e($_GET['q']) . '%');
        }
        if (isset($_GET['promotion'])) {
            $products = $products->where('sale_start_date', '<', date('Y-m-d H:i:s'))
                ->where('sale_end_date', '>', date('Y-m-d H:i:s'))
                ->where('sale_percent', '>', 0);
        }
        $products = $products->paginate(config('services.pagination'));

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
        $products = New Product();
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
        $product = Product::where('id', $id)->where('status', 1)->first();
        $categories = Category::where('status', 1)->where('pid', $id)->get();
        $brands = Brand::where('status', 1)->orderBy('id', 'desc')->get();

        $category = '';
        $related_products = new Product();
        if ($product['cats']) {
            $category_exploded = explode('|', trim($product['cats'], '|'));
//            dd($category_exploded);
//            $category = $category_exploded[0];
            if (isset($category_exploded[0])) {
                $category = Category::where('status', 1)
                    ->where('id', $category_exploded[0])->first();
                $related_products = Product::where('status', 1)
//                    ->where('cats', 'LIKE', '%|' . $category_exploded[0] . '|%')
                    ->get();
            }
        }


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
