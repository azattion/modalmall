<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
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
        $favorites = Favorite::orderBy('id', 'desc')->where('uid', auth()->id())->paginate();
        return view('site.favorites.index', ['favorites' => $favorites]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return view('site.products.favorite');
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
            'pid' => 'required|numeric|min:1'
        ]);

        $hasProduct = Favorite::where('uid', auth()->id())
            ->where('pid', $request->get('pid'))->get();
        $message = 'Товар уже добавлено в избранное';
        $status = 'error';

        if (count($hasProduct) == 0) {
            $favorite = new Favorite();
            $favorite->uid = auth()->id();
            $favorite->pid = $request->get('pid');
            $favorite->save();
            $message = 'Товар успешно добавлен в избранное';
            $status = 'success';
        }
        return redirect()->back()->with($status, $message);
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
        $favorite = Favorite::findOrFail($id);
        if ($favorite['uid'] == auth()->id()) {
            $favorite->delete();
            return redirect()->back()->with('success', 'Товар успешно удален из избранных');
        }
        return redirect()->back();
    }
}
