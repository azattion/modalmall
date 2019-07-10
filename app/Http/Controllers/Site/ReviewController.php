<?php

namespace App\Http\Controllers\Site;

use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
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
        $reviews = Review::with('product')->orderBy('id', 'desc')->where('uid', auth()->id())->paginate();
        return view('site.reviews.index', ['reviews' => $reviews]);
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
            'star' => 'required|numeric|min:1|max:5',
            'text' => 'required|string|min:1|max:255',
            'pid' => 'required|numeric|min:1'
        ]);

        $userReview = Review::where('pid', $request->get('pid'))->where('uid', auth()->id())->get();

        $message = 'Упс! Ваш отзыв уже был добавлен';
        $status = 'error';

        if (count($userReview) == 0) {
            $review = new Review();
            $review->text = $request->get('text');
            $review->uid = auth()->id();
            $review->pid = $request->get('pid');
            $review->star = $request->get('star');
            $review->save();
            $message = 'Ваш отзыв успешно добавлен';
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
        $review = Review::findOrFail($id);
        if ($review['uid'] == auth()->id()) {
            $review->delete();
            return redirect()->back()->with('success', 'Ваш отзыв успешно удален');
        }
        return redirect()->back();
    }
}
