<?php

namespace App\Http\Controllers;

use App\Admin\Image;
use App\Admin\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::orderBy('name')->where('pid', 0)->get();
//        $images = Image::orderBy('name')->where('type', 3)->get();
//        $images_key = [];
//        foreach($images as $image){
//            $images_key[$image['pid']] = $image;
//        }
        $products = Product::orderBy('name')->get();
        return view('home', ['categories' => $categories, 'products' => $products]);
    }

    public function cabinet()
    {
        return view('site.user.cabinet');
    }

    public function rss()
    {
        return view('site.user.cabinet');
    }

    public function sitemap()
    {
        return view('site.user.cabinet');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
