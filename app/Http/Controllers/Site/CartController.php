<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
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
        $cart = session()->get('cart', []);
        return view('site.cart.index', ['cart' => $cart]);
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
        return redirect()->route('user.cart.index')->with('success', 'Данные успешно обновлены');

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
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }
        session(['cart' => $cart]);
        return redirect()->route('site.products.cart')->with('success', 'Данные успешно обновлены');

    }
}
