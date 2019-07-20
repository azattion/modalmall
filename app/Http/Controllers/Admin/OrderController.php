<?php

namespace App\Http\Controllers\Admin;

use App\Notifications\OrderStatusChanged;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('user')->orderBy('id', 'desc');
        if (isset($_GET['q'])) {
            $orders = $orders->where('phone', 'LIKE', '%' . e($_GET['q']) . '%')
                ->orWhere('address', 'LIKE', '%' . e($_GET['q']) . '%')
                ->orWhere('email', 'LIKE', '%' . e($_GET['q']) . '%');
        }
        $orders = $orders->paginate(config('services.pagination'));
        return view('admin.orders.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('admin.orders.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->route('admin.order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.orders.show', ['order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->route('admin.orders.index');
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
        $this->validate($request, [
                'status' => 'required|numeric',
            ]
        );

        $order = Order::findOrFail($id);
        $order->status = $request->get('status');
        $order->save();

        Notification::send(User::find($order->uid), new OrderStatusChanged(User::find($order->uid), $order));

        return redirect()->route('admin.orders.show', $id)->with('success', 'Запись успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Запись удалена');
    }
}
