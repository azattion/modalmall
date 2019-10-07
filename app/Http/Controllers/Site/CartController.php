<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = session()->get('cart', []);
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
        return view('site.cart.index', ['cart' => $cart, 'products' => $products]);
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
            'id' => 'required|numeric|min:1',
            'qt' => 'required|numeric|min:1',
            'color' => 'nullable|numeric',
            'size' => 'nullable|numeric',
//            'status' => 'required|numeric'
        ]);

//        $request->session()->forget('cart');
        $qt = $request->get('qt');
        $id = $request->get('id');
        $color = $request->get('color');
        $size = $request->get('size');

        $cart = $request->session()->get('cart', []);
        $isEmpty = false;

        $cart_key = md5("{$id}-{$color}-{$size}");

        if (count($cart)) {
            if (isset($cart[$cart_key])) {
                $cart[$cart_key]['qt'] += $qt;
            } else {
                $cart[$cart_key] = ['id' => $id, 'qt' => $qt, 'size' => $size, 'color' => $color];
            }
            session(['cart' => $cart]);
            $isEmpty = true;
        }

        if (!$isEmpty) {
            $cart = [$cart_key => ['id' => $id, 'qt' => $qt, 'size' => $size, 'color' => $color]];
            session(['cart' => $cart]);
        }
        if ($request->ajax()) {
            return response()->json(['success' => true, 'qt' => count($cart), 'cart' => $cart]);
        } else {
            return redirect()->route('user.cart.index')->with('success', 'Данные успешно обновлены');
        }
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
        $this->validate($request, [
            'qt' => 'required|numeric|min:1',
        ]);

        $cart = $request->session()->get('cart', []);

        $qt = $request->get('qt');

        if (count($cart)) {
            if (isset($cart[$id])) {
                $cart[$id]['qt'] = $qt;
            }
            session(['cart' => $cart]);
        }

        if ($request->ajax()) {
            return response()->json(['success' => true]);
        } else {
            return redirect()->route('user.cart.index')->with('success', 'Данные успешно обновлены');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }
        session(['cart' => $cart]);
        return redirect()->route('user.cart.index')->with('success', 'Товар удален из корзины');

    }
}
