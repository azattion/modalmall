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

    public function search(Request $request)
    {
        $word = $request->get('q');
        $products = [];
        if($word) {
            $products = Product::orderBy('id', 'desc')->where('name', 'LIKE', "%{$word}%")->get();
        }
        return view('site.products.search',
            ['category' => [], 'products' => $products]);
    }

    public function product($id)
    {
        $product = Product::findOrFail($id);
        return view('site.products.item',
            ['product' => $product]);
    }

    public function cart_add(Request $request)
    {
        $this->validate($request, [
                'id' => 'required|numeric|min:1',
                'qt' => 'required|numeric|min:1'
        ]);

//        $request->session()->forget('cart');
        $qt = $request->get('qt');
        $id = $request->get('id');

        $cart = $request->session()->get('cart', []);
        $isEmpty = false;

        if (count($cart)) {
            if(isset($cart[$id])){
                $cart[$id] += $qt;
            } else {
                $cart[$id] = $qt;
            }
            session(['cart' => $cart]);
            $isEmpty = true;
        }
//        dd($cart);

        !$isEmpty && session(['cart' => [$id => $qt]]);;
        return redirect()->route('site.products.cart')->with('success', 'Данные успешно обновлены');
    }

    public function cart_del(Request $request, $id)
    {
        $cart = $request->session()->get('cart', []);

        if(isset($cart[$id])){
            unset($cart[$id]);
        }
        session(['cart' => $cart]);
        return redirect()->route('site.products.cart')->with('success', 'Данные успешно обновлены');
    }

    public function cart(Request $request)
    {
        $cart = $request->session()->get('cart', []);
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
