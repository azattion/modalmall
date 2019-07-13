<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Post;
use App\Product;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

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
        $products = Product::with('images')->with('reviews')->orderBy('id', 'desc')->get();
        $posts = Post::with('images')->where('status', 1)->where('type', 2)->orderBy('date', 'desc')->take(5)->get();

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

    public function exchange(Request $request)
    {
        $cookieName = config('session.cookie');
        $cookieID = Session::getId();
        $csrf = csrf_token();
        $date = date('Y-m-d H:m:s');

        Log::info('Log message', array('context' => $request->all()));

//        if ($request->get('type') == 'catalog') {
            switch ($request->mode) {
                case 'checkauth':
                    $user = $_SERVER['PHP_AUTH_USER'];
                    $pass = $_SERVER['PHP_AUTH_PW'];
                    if ($user == 'emaleigh' && '7US7x8CJCU{C6>W' == $pass) {
                        return response("success\n$cookieName\n$cookieID\n$csrf\n$date")
                            ->header("Content-Type", "text/plane; charset=UTF-8");
                    };
                    break;
                case 'init':

                    return response("no\nfile_limit=100000000000\nsessid=$cookieID\nversion=3.1")
                        ->header("Content-Type", "text/plane; charset=UTF-8");

                case 'file':
                    file_get_contents('php://input');
                    $filename = $request->get('filename');
                    $file_content = file_get_contents($filename);
                    dump($file_content);
            }
//        }
    }
}
