<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/catalog', function () {
    return ('catalog');
});

Route::get('/catalog/{cat}', function ($cat) {
    return view('category', ['cat' => $cat]);
});

Route::get('/catalog/{cat}/item/{id}', function ($cat, $id) {
    return view("item", ['cat' => $cat, 'id' => $id]);
});

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index');
    Route::resource('order', 'OrderController');
    Route::resource('products', 'ProductController');
});


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
