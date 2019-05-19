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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/catalog', function () {
    return ('catalog');
});

Route::get('/catalog/{cat}', function ($cat) {
    return view('category', ['cat' => $cat]);
});

Route::get('/catalog/{cat}/item/{id}', function ($cat, $id) {
    return view("item", ['cat' => $cat, 'id' => $id]);
});

Route::namespace('Admin')->group(function () {
    Route::get('/admin', 'AdminController@index')->name('admin.index');
    Route::get('/admin/profile', 'AdminController@profile')->name('admin.profile');

    Route::post('admin/products/import', 'ProductController@import')->name('admin.products.import');
    Route::get('admin/products/multiple', 'ProductController@multiple')->name('admin.products.multiple');
    Route::resource('admin/products', 'ProductController', ['as' => 'admin']);

    Route::resource('admin/posts', 'PostController', ['as' => 'admin']);
    Route::resource('admin/users', 'UserController', ['as' => 'admin']);
    Route::resource('admin/categories', 'CategoryController', ['as' => 'admin']);
    Route::resource('admin/orders', 'OrderController', ['as' => 'admin']);
});
