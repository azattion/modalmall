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
        $products = Product::orderBy('id', 'desc')->where('cat', $id)->get();
        return view('site.products.category',
            ['category' => $category, 'products' => $products]);
    }

    public function product($id, $prod)
    {
        $category = Category::findOrFail($id);
        $product = Product::findOrFail($prod);
        return view('site.products.item',
            ['category' => $category, 'product' => $product]);
    }

    public function cart_add(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|numeric|min:1',
            'qt' => 'required|numeric|min:1']
        );

        $request->session()->forget('user.cart');
        $qt = $request->get('qt');
        $product_id = $request->get('id');

        $cart = session('user.cart');
        if ($cart && count($cart)) {
            foreach ($cart as $key => $products) {
                if (in_array($product_id, $products)) {
                    $cart[$key][$product_id] += $qt;
                    break;
                }
            }
        } else {
//            $cart[][$product_id] = $qt;
            $request->session()->push('user.cart', [$product_id => $qt]);
        }
//        dd($cart);

        return redirect()->back()->with('success', 'Данные успешно обновлены');
    }

    public function cart(Request $request)
    {
        $cart = session('user.cart');
        return view('site.products.cart', ['cart' => $cart]);
    }

    public function favorite()
    {
        return view('site.products.favorite');
    }

    public function review()
    {
        return view('site.products.review');
    }

    public function cabinet()
    {
        return view('site.user.cabinet');
    }

    public function rss()
    {
        return view('site.user.cabinet');
    }

    public function sitemap()
    {
        return view('site.user.cabinet');
    }
}
