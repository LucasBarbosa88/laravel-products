<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


Route::group(['middleware' => ['auth', 'needsRole:admin'], 'prefix' => 'admin'], function () {
    Route::get('/', 'Admin\AdminController@index');
    Route::get('products', 'Admin\ProductController@index')->name('products');
	Route::post('product/create', 'Admin\ProductController@store');
	Route::put('product/edit/{ID}', 'Admin\ProductController@edit');
	Route::post('product/update', 'Admin\ProductController@update');
	Route::get('product/delete/{ID}', 'Admin\ProductController@delete');

	Route::get('tags', 'Admin\TagController@index')->name('tags');
	Route::post('tag/create', 'Admin\TagController@store');
	Route::put('tag/edit/{ID}', 'Admin\TagController@edit');
	Route::post('tag/update', 'Admin\TagController@update');
	Route::get('tag/delete/{ID}', 'Admin\TagController@destroy');
});