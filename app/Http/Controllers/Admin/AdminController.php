<?php

namespace App\Http\Controllers\Admin;

use App\Mail\OrderShipped;
use App\Order;
use App\Post;
use App\Review;
use App\Product;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;


class AdminController extends Controller
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
        $data = [
            'orders' => Order::count(),
            'products' => Product::count(),
            'users' => User::count(),
            'reviews' => Review::count(),
        ];
        return view('admin.dashboard', ['data' => $data]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('admin.profile');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search()
    {

        $products = Product::orderBy('id', 'desc');
        $posts = Post::orderBy('id', 'desc');
        $users = User::orderBy('id', 'desc');
        $reviews = Review::orderBy('id', 'desc');

        if (isset($_GET['q'])) {

            $products = $products->where('name', 'LIKE', '%' . e($_GET['q']) . '%')
                ->orWhere('desc', 'LIKE', '%' . e($_GET['q']) . '%');

            $posts = $posts->where('title', 'LIKE', '%' . e($_GET['q']) . '%')
                ->orWhere('desc', 'LIKE', '%' . e($_GET['q']) . '%')
                ->orWhere('text', 'LIKE', '%' . e($_GET['q']) . '%');

            $users = $users->where('name', 'LIKE', '%' . e($_GET['q']) . '%')
                ->orWhere('email', 'LIKE', '%' . e($_GET['q']) . '%');

            $reviews = $reviews->where('text', 'LIKE', '%' . e($_GET['q']) . '%');
        }

        $products = $products->paginate(config('services.pagination'));
        $posts = $posts->paginate(config('service.pagination'));
        $users = $users->paginate(config('service.pagination'));
        $reviews = $reviews->paginate(config('service.pagination'));

        return view('admin.search', ['products' => $products, 'posts' => $posts, 'users' => $users, 'reviews' => $reviews]);
    }


}