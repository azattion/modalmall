<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{

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
        $orders = Order::orderBy('id', 'desc')->where('uid', auth()->id())->paginate(config('services.pagination'));
        return view('site.orders.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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


        return redirect()->route('user.cabinet')->with('success', 'Ваш заказ успешно отправлен');

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
