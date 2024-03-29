<?php

namespace App\Http\Controllers\Admin;

use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
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
        $reviews = Review::orderBy('id', 'desc')->publish();
        if (isset($_GET['q'])) {
            $reviews = $reviews->where('text', 'LIKE', '%' . e($_GET['q']) . '%');
        }
        $reviews = $reviews->paginate(config('services.pagination'));
        return view('admin.reviews.index', ['reviews' => $reviews]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Review::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.reviews.index')->with('success', 'Запись удалена');

    }
}
