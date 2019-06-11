<?php

namespace App\Http\Controllers\Site;

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
        if(isset($_GET['sort']) && in_array($_GET['sort'], array('price', 'top'))){
           $sort = 'price';
        }
        if(isset($_GET['order']) && in_array($_GET['order'], array('desc', 'asc'))){
            $order = $_GET['order'];
        }

        $category = Category::findOrFail($id);
        $products = Product::orderBy($sort, $order)->where('cat', $id)->get();

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

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('site.products.show',
            ['product' => $product]);
    }

//    public function cart_add(Request $request)
//    {
//        $this->validate($request, [
//            'id' => 'required|numeric|min:1',
//            'qt' => 'required|numeric|min:1'
//        ]);
//
////        $request->session()->forget('cart');
//        $qt = $request->get('qt');
//        $id = $request->get('id');
//
//        $cart = $request->session()->get('cart', []);
//        $isEmpty = false;
//
//        if (count($cart)) {
//            if (isset($cart[$id])) {
//                $cart[$id] += $qt;
//            } else {
//                $cart[$id] = $qt;
//            }
//            session(['cart' => $cart]);
//            $isEmpty = true;
//        }
////        dd($cart);
//
//        !$isEmpty && session(['cart' => [$id => $qt]]);;
//        return redirect()->route('site.products.cart')->with('success', 'Данные успешно обновлены');
//    }

//    public function cart_del(Request $request, $id)
//    {
//        $cart = $request->session()->get('cart', []);
//
//        if (isset($cart[$id])) {
//            unset($cart[$id]);
//        }
//        session(['cart' => $cart]);
//        return redirect()->route('site.products.cart')->with('success', 'Данные успешно обновлены');
//    }

//    public function cart(Request $request)
//    {
//        $cart = $request->session()->get('cart', []);
//        return view('site.products.cart', ['cart' => $cart]);
//    }

//    public function order(Request $request)
//    {
//        $this->validate($request, [
//            'address' => 'required|string|max:255',
//            'email' => 'required|email|max:255',
//            'phone' => 'required|string|max:255',
//            'id.*' => 'required|numeric|max:255',
//            'qt.*' => 'required|numeric|max:255',
//        ]);
//        $order = new Order;
//        $order->email = $request->get('email');
//        $order->phone = $request->get('phone');
//        $order->address = $request->get('address');
//        $order->uid = auth()->id();
//        $order->save();
//
//        $request->session()->forget('cart');
//
//        $qt = $request->get('qt');
//        $prod_id = $request->get('id');
//        if ($request->has('id')) {
//            foreach ($prod_id as $id) {
//                $orderItem = [
//                    'pid' => $id,
//                    'uid' => auth()->id(),
//                    'oid' => $order->id,
//                    'qt' => isset($qt[$id]) ? $qt[$id] : 1,
//                ];
//
//                OrderItem::create($orderItem);
//            }
//        }
//
//
//        return redirect()->route('site.user.orders')->with('success', 'Ваш заказ успешно отправлен');
//    }

//    public function orders()
//    {
//        $orders = Order::orderBy('id', 'desc')->where('uid', auth()->id())->paginate(config('services.pagination'));
//        return view('site.products.orders', ['orders' => $orders]);
//    }

}
