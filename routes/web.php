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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout')->name('logout');

Route::namespace('Site')->group(function () {
    Route::get('/catalog', 'ProductController@index')->name('site.products.list');
    Route::get('/catalog/{id}', 'ProductController@category')->name('site.products.category');
    Route::get('/catalog/product/{id}', 'ProductController@product')->name('site.products.product');

    Route::get('/cart', 'ProductController@cart')->name('site.products.cart');
    Route::post('/cart-add', 'ProductController@cart_add')->name('site.products.cart-add');
    Route::get('/cart-del/{id}', 'ProductController@cart_del')->name('site.products.cart-del');
    Route::get('/favorite', 'ProductController@favorite')->name('site.products.favorite');
    Route::post('/order', 'ProductController@order')->name('site.products.order');
    Route::get('/search', 'ProductController@search')->name('site.products.search');
    Route::post('/review', 'ProductController@review')->name('site.products.review');
    Route::get('/cabinet', 'ProductController@cabinet')->name('site.user.cabinet');
    Route::get('/rss.xml', 'ProductController@rss')->name('site.rss');
    Route::get('/sitemap.xml', 'ProductController@sitemap')->name('site.sitemap');

    Route::get('/post/{id}', 'PostController@item')->name('site.posts.item');
});

Route::namespace('Admin')->group(function () {
    Route::get('/admin', 'AdminController@index')->name('admin.index');
    Route::get('/admin/profile', 'AdminController@profile')->name('admin.profile');
    Route::get('/admin/search', 'AdminController@search')->name('admin.search');

    Route::post('admin/products/import', 'ProductController@import')->name('admin.products.import');
    Route::get('admin/products/multiple', 'ProductController@multiple')->name('admin.products.multiple');
    Route::resource('admin/products', 'ProductController', ['as' => 'admin']);

    Route::resource('admin/posts', 'PostController', ['as' => 'admin']);
    Route::resource('admin/users', 'UserController', ['as' => 'admin']);
    Route::resource('admin/categories', 'CategoryController', ['as' => 'admin']);
    Route::resource('admin/orders', 'OrderController', ['as' => 'admin']);
    Route::resource('admin/reviews', 'ReviewController', ['as' => 'admin']);
});
