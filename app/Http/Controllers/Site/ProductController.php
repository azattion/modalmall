<?php

namespace App\Http\Controllers\Site;

use App\Admin\Product;
use App\Admin\Review;
use App\Category;
use App\Favorite;
use App\Order;
use App\OrderItem;
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
        if ($word) {
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
            if (isset($cart[$id])) {
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

        if (isset($cart[$id])) {
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

    public function order(Request $request)
    {
        $this->validate($request, [
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'id.*' => 'required|numeric|max:255',
            'qt.*' => 'required|numeric|max:255',
        ]);
        $order = new Order;
        $order->email = $request->get('email');
        $order->phone = $request->get('phone');
        $order->address = $request->get('address');
        $order->uid = auth()->id();
        $order->save();

        $request->session()->forget('cart');

        $qt = $request->get('qt');
        $prod_id = $request->get('id');
        if ($request->has('id')) {
            foreach ($prod_id as $id) {
                $orderItem = [
                    'pid' => $id,
                    'uid' => auth()->id(),
                    'oid' => $order->id,
                    'qt' => isset($qt[$id]) ? $qt[$id] : 1,
                ];

                OrderItem::create($orderItem);
            }
        }


        return redirect()->route('site.user.orders')->with('success', 'Ваш заказ успешно отправлен');
    }

    public function orders()
    {
        $orders = Order::orderBy('id', 'desc')->where('uid', auth()->id())->paginate(config('services.pagination'));
        return view('site.products.orders', ['orders' => $orders]);
    }

    public function favorite()
    {
        return view('site.products.favorite');
    }

    public function review(Request $request)
    {
        $this->validate($request, [
            'star' => 'required|numeric|min:1|max:5',
            'text' => 'required|string|min:1|max:255',
            'pid' => 'required|numeric|min:1'
        ]);

        $review = new Review();
        $review->text = $request->get('text');
        $review->uid = auth()->id();
        $review->prod_id = $request->get('pid');
        $review->star = $request->get('star');
        $review->save();

        return redirect()->back()->with('success', 'Ваш отзыв успешно добавлен');
    }

    public function favorite_add(Request $request){

        $this->validate($request, [
            'pid' => 'required|numeric|min:1'
        ]);

        $favorite = new Favorite();
        $favorite->uid = auth()->id();
        $favorite->prod_id = $request->get('pid');
        $favorite->save();

        return redirect()->back()->with('success', 'Товар успешно добавлен в избранное');
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
