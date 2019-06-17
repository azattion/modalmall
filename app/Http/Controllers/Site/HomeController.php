<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::with('images')->orderBy('id')->where('status', 1)->where('pid', 0)->get();
        $products = Product::with('images')->orderBy('name')->get();
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
