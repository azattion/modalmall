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

Auth::routes();


Route::namespace('Site')->group(function () {

    Route::get('/', 'HomeController@index')->name('home');
//    Route::get('/logout', 'HomeController@logout')->name('logout');

//    Route::get('/catalog', 'ProductController@index')->name('products.list');
    Route::get('/catalog/search', 'ProductController@search')->name('products.search');
    Route::get('/catalog/new', 'ProductController@novelty')->name('products.novelty');
    Route::get('/brands', 'ProductController@brands')->name('brands');
    Route::get('/catalog/{id}', 'ProductController@category')->name('products.category');
    Route::get('/catalog/product/{id}', 'ProductController@show')->name('products.show');

//    Route::get('/cart', 'ProductController@cart')->name('site.products.cart');
//    Route::post('/cart-add', 'ProductController@cart_add')->name('site.products.cart-add');
//    Route::get('/cart-del/{id}', 'ProductController@cart_del')->name('site.products.cart-del');
//    Route::get('/cabinet/order', 'ProductController@orders')->name('user.orders');

    Route::resource('cabinet/order', 'OrderController', ['as' => 'user']);
    Route::resource('cart', 'CartController', ['as' => 'user']);
    Route::get('cart/delete/{id}', 'CartController@destroy')->name('user.cart.delete')->middleware('auth');
    Route::resource('cabinet/review', 'ReviewController', ['as' => 'user']);
    Route::resource('cabinet/favorite', 'FavoriteController', ['as' => 'user']);
    Route::get('/cabinet', 'HomeController@cabinet')->name('user.cabinet')->middleware('auth');
    Route::any('/cabinet/settings', 'HomeController@settings')->name('user.settings')->middleware('auth');
    Route::any('/cabinet/settings/password', 'HomeController@password')->name('user.settings.password')->middleware('auth');

    Route::get('/rss.xml', 'HomeController@rss')->name('rss');
    Route::get('/sitemap.xml', 'HomeController@sitemap')->name('sitemap');

    Route::get('/post/{id}', 'PostController@show')
        ->name('posts.show')
        ->where('id', '[0-9]+');

    Route::get('/page/{slug}', 'PostController@page_show')
        ->name('posts.page-show')
        ->where('name', '[A-Za-z0-9]+');
});

Route::namespace('Admin')->group(function () {
    Route::get('/admin', 'AdminController@index')->name('admin.index');
    Route::get('/admin/profile', 'AdminController@profile')->name('admin.profile');
    Route::get('/admin/search', 'AdminController@search')->name('admin.search');

    Route::post('admin/products/import', 'ProductController@import')->name('admin.products.import');
    Route::get('admin/products/multiple', 'ProductController@multiple')->name('admin.products.multiple');
    Route::resource('admin/products', 'ProductController', ['as' => 'admin']);

    Route::resource('admin/menu', 'MenuController', ['as' => 'admin']);
    Route::resource('admin/brands', 'BrandController', ['as' => 'admin']);
    Route::resource('admin/posts', 'PostController', ['as' => 'admin']);
    Route::resource('admin/users', 'UserController', ['as' => 'admin']);
    Route::resource('admin/categories', 'CategoryController', ['as' => 'admin']);
    Route::resource('admin/orders', 'OrderController', ['as' => 'admin']);
    Route::resource('admin/reviews', 'ReviewController', ['as' => 'admin']);
});
