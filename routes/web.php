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
    Route::get('/category', 'ProductController@index')->name('site.products.list');
    Route::get('/category/{id}', 'ProductController@category')->name('site.products.category');
    Route::get('/category/{id}/product/{prod}', 'ProductController@item')->name('site.products.item');
    Route::get('/cart', 'ProductController@cart')->name('site.products.cart');
    Route::get('/favorite', 'ProductController@favorite')->name('site.products.favorite');
    Route::post('/review', 'ProductController@review')->name('site.products.review');
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
