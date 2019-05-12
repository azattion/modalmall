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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
