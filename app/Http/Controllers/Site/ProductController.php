<?php

namespace App\Http\Controllers\Site;

use App\Admin\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('site.products.list', ['categories' => $categories]);
    }

    public function category($id)
    {
        $category = Category::findOrFail($id);
        return view('site.products.category', ['category' => $category]);
    }

    public function product($id, $prod)
    {
        $category = Category::findOrFail($id);
        $product = Product::findOrFail($prod);
        return view('site.products.item',
            ['category' => $category, 'product' => $product]);
    }

    public function cart(){
        return view('site.products.cart');
    }

    public function favorite(){
        return view('site.products.favorite');
    }

    public function review(){
        return view('site.products.review');
    }

    public function cabinet(){
        return view('site.user.cabinet');
    }
}
