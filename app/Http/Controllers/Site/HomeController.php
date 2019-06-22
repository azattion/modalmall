<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $categories = Category::with('images')->orderBy('id')->where('inc_menu', 1)->where('status', 1)->where('pid', 0)->get();
        $products = Product::with('images')->orderBy('name')->get();
        return view('home', ['categories' => $categories, 'products' => $products]);
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
//                'email' => 'required|email',
                'password' => 'required|string|min:8',
                'address' => 'nullable|string',
                'phone' => 'nullable|string',
            ]);

            $password = $request->input('password');

            $user = User::where('id', Auth::id())->where('password', Hash::make($password))->get();
            $message_type = 'success';
            $message = 'Данные успешно сохранены';
            if ($user) {
                $user = User::findOrFail(Auth::id());
//                $user->password = $password;
//                $user->email = $request->input('email');
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

            $user = User::where('id', Auth::id())->where('password', bcrypt($password))->get();
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


//    public function logout()
//    {
//        Auth::logout();
//        return redirect()->route('home');
//    }
}
