<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Post;
use App\Product;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::with('images')->orderBy('id')->where('inc_menu', 1)->where('status', 1)->where('pid', 0)->take(5)->get();
        $products = Product::with('images')->with('reviews')->where('status', 1)->orderBy('id', 'desc')->take(12)->get();
        $posts = Post::with('images')->where('status', 1)->where('type', 2)->orderBy('date', 'desc')->take(5)->get();

        $products1 = Product::with('images')->with('reviews')
            ->join('order_items', 'order_items.pid', '=', 'products.id', 'right')
            ->select('products.*', DB::raw("count(order_items.id) as count"))
//            ->where('status', 1)
            ->groupBy('products.id')
            ->orderBy('count', 'DESC')
            ->take(10)
            ->get();
//        dd($merged);

        return view('home', ['categories' => $categories, 'products' => $products, 'posts' => $posts]);
    }

    public function cabinet()
    {
        return view('site.user.cabinet');
    }

    public function settings(Request $request)
    {
        if ($request->isMethod('post')) {

            $this->validate($request, [
                'name' => 'required|string|max:255',
                'surname' => 'nullable|string|max:255',
//                'email' => 'required|email',
                'password' => 'required|string|min:8',
                'address' => 'nullable|string',
                'phone' => 'nullable|string',
            ]);

            $password = $request->input('password');

            $user = User::where('status', 1)->where('id', Auth::id())->where('password', Hash::make($password))->get();
            $message_type = 'success';
            $message = 'Данные успешно сохранены';
            if ($user) {
                $user = User::findOrFail(Auth::id());
//                $user->password = $password;
                $user->name = $request->input('name');
                $user->surname = $request->input('surname');
                $user->phone = $request->input('phone');
                $user->address = $request->input('address');
                $user->save();
            } else {
                $message_type = 'error';
                $message = 'Ошибка! Пароль неверный';
            }
            return redirect()->route('user.settings')->with($message_type, $message);
        } else {
            return view('site.user.settings');
        }
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function password(Request $request)
    {
        if ($request->isMethod('post')) {

            $this->validate($request, [
                'password' => 'required|string|min:8',
                'new-password' => 'required|string|min:8|confirmed'
            ]);

            $password = $request->input('password');

            $user = User::where('status', 1)->where('id', Auth::id())->where('password', bcrypt($password))->get();
            $message_type = 'success';
            $message = 'Данные успешно сохранены';
            if ($user) {
                $user = User::findOrFail(Auth::id());
                $user->password = Hash::make($request->get('new-password'));
                $user->save();
                Auth::attempt(['email' => $user->email, 'password' => $user->password]);
            } else {
                $message_type = 'error';
                $message = 'Ошибка! Пароль неверный';
            }
            return redirect()->route('user.settings.password')->with($message_type, $message);
        } else {
            return view('site.user.password');
        }
    }

    public function rss()
    {
        return view('site.user.cabinet');
    }

    public function sitemap()
    {
        return view('site.user.cabinet');
    }

}
