<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
//use App\Mail\OrderShipped;
use App\Notifications\OrderCreated;
use App\Order;
use App\OrderItem;
use App\Product;
use App\User;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('items')->orderBy('id', 'desc')->where('uid', auth()->id())->paginate(10);
        return view('site.orders.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cart = session()->get('cart', []);
        if (count($cart) == 0) return redirect()->route('user.cart.index');
        $products = [];
        if (count($cart)) {
            $products_id = [];
            foreach ($cart as $key => $item) {
                $products_id[] = $item['id'];
            }
            $results = Product::find($products_id);
            foreach ($results as $result) {
                $products[$result['id']] = $result;
            }
        }
        return view('site.orders.create', ['cart' => $cart, 'products' => $products]);
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
            'name'     => 'required|string|max:255',
            'surname'  => 'required|string|max:255',
            'address'  => 'required|string|max:255',
            'delivery' => 'required|numeric|min:1',
            'email'    => 'required|email|max:255',
            'phone'    => 'required|string|max:255',
            'agree'    => 'required',
            'city_id'  => 'required|numeric|min:1'
//            'id.*' => 'required|numeric|max:255',
//            'qt.*' => 'required|numeric|max:255',
//            'status.*' => 'required|numeric|max:255',
//            'color.*' => 'nullable|numeric|max:255',
//            'size.*' => 'nullable|numeric|max:255',
//            'cost.*' => 'nullable|numeric|max:255',
        ]);
        $order = new Order;
        $order->name = $request->get('name');
        $order->surname = $request->get('surname');
        $order->email = $request->get('email');
        $order->phone = $request->get('phone');
        $order->address = $request->get('address');
        $order->delivery = $request->get('delivery');
        $order->city_id = $request->get('city_id');
        $order->status = 0;
        $order->uid = auth()->id();
        $order->save();

//        $qt = $request->get('qt');
//        $pid = $request->get('id');
//        $color = $request->get('color');
//        $size = $request->get('size');

        $cart = $request->session()->get('cart', []);
        if (count($cart)) {
            foreach ($cart as $item) {
                $product = Product::find($item['id']);
                $orderItem = [
                    'pid' => $item['id'],
                    'uid' => auth()->id(),
                    'oid' => $order->id,
                    'qt' => $item['qt'],
                    'color' => $item['color'],
                    'status' => $product['available'] ? 1 : 2,
                    'size' => $item['size'],
                    'cost' => ($product->is_sale) ? $product->cost_with_sale : $product['cost'],
                ];

                OrderItem::create($orderItem);
            }

        } else {
            return redirect()->route('user.cart.index')->with('error', 'В корзине нету товаров');
        }
        $request->session()->forget('cart');

        Notification::send(User::find(auth()->id()), new OrderCreated(User::find(auth()->id()), $order));

        //        if ($request->has('id')) {
//            foreach ($pid as $key => $id) {
//                $product = Product::find($id);
//                $orderItem = [
//                    'pid' => $id,
//                    'uid' => auth()->id(),
//                    'oid' => $order->id,
//                    'qt' => isset($qt[$key]) ? $qt[$key] : 1,
//                    'color' => isset($color[$key]) ? $color[$key] : 0,
//                    'status' => $product['available'] ? 1 : 2,
//                    'size' => isset($size[$key]) ? $size[$key] : 0,
//                    'cost' => ($product->is_sale) ? $product->cost_with_sale : $product['cost'],
//                ];
//
//                OrderItem::create($orderItem);
//            }
//        }
        return redirect()->route('user.order.index')->with('success', 'Ваш заказ успешно добавлен');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
