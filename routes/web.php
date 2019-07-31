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

Auth::routes(['verify' => true]);

Route::group(['namespace' => 'Site', 'middleware' => ['dev']], function () {
    Route::get('/', 'HomeController@index')->name('home');
//    Route::get('/catalog', 'ProductController@index')->name('products.list');
    Route::get('/catalog/search', 'ProductController@search')->name('products.search');
    Route::get('/catalog/new', 'ProductController@novelty')->name('products.novelty');
    Route::get('/brands', 'ProductController@brands')->name('brands');
    Route::get('/catalog/{id}', 'ProductController@category')->name('products.category');
    Route::get('/catalog/product/{id}', 'ProductController@show')->name('products.show');

    Route::resource('order', 'OrderController', ['as' => 'user']);
    Route::post('/order/create', 'OrderController@create')->name('user.order.create');
    Route::resource('cart', 'CartController', ['as' => 'user']);
    Route::get('cart/delete/{id}', 'CartController@destroy')->name('user.cart.delete')->middleware(['auth', 'verified']);
    Route::resource('cabinet/review', 'ReviewController', ['as' => 'user']);
    Route::resource('cabinet/favorite', 'FavoriteController', ['as' => 'user']);
    Route::get('/cabinet', 'HomeController@cabinet')->name('user.cabinet')->middleware(['auth', 'verified']);
    Route::any('/cabinet/settings', 'HomeController@settings')->name('user.settings')->middleware(['auth', 'verified']);
    Route::any('/cabinet/settings/password', 'HomeController@password')->name('user.settings.password')->middleware(['auth', 'verified']);

    Route::get('/rss.xml', 'HomeController@rss')->name('rss');
    Route::get('/sitemap.xml', 'HomeController@sitemap')->name('sitemap');

    Route::get('/post/{id}', 'PostController@show')
        ->name('posts.show')
        ->where('id', '[0-9]+');

    Route::get('/post/category/{id}', 'PostController@category')
        ->name('posts.category')
        ->where('id', '[0-9]+');

    Route::get('/page/{slug}', 'PostController@page_show')
        ->name('posts.page-show')
        ->where('name', '[A-Za-z0-9]+');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['dev', 'admin']], function () {
    Route::get('/', 'AdminController@index')->name('index');
    Route::get('/profile', 'AdminController@profile')->name('profile');
    Route::get('/search', 'AdminController@search')->name('search');

    Route::post('products/import', 'ProductController@import')->name('products.import');
    Route::get('products/multiple', 'ProductController@multiple')->name('products.multiple');

    Route::resource('products', 'ProductController');
    Route::resource('menu', 'MenuController');
    Route::resource('brands', 'BrandController');
    Route::resource('posts', 'PostController');
    Route::resource('users', 'UserController');
    Route::resource('categories', 'CategoryController');
    Route::resource('orders', 'OrderController');
    Route::resource('reviews', 'ReviewController');
});
