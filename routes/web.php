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

Route::get('/','HomeController@index');

Auth::routes();
Route::get('/logout','Auth\LogoutController@logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('product/{id}','ProductController@show');
Route::get('/admin','admin\DashboardController@index');
Route::namespace('admin')->prefix('admin')->as('admin.')->group(function (){
    Route::resource('product', 'ProductController', ['only' => ['index','store','create', 'edit', 'update', 'destroy']]);
    Route::resource('category', 'SubCategoryController', ['only' => ['index','store','create', 'edit', 'update', 'destroy']]);
    Route::resource('invoice', 'InvoiceController', ['only' => ['index','store','create', 'edit', 'update', 'destroy','show']]);
});

Route::post('cart','CartController@addProduct');
Route::get('cart','CartController@index');
Route::get('cart/{id}','CartController@removeProduct');
Route::get('cart/{id}/{quantity}','CartController@updateProduct');

Route::get('invoice','InvoiceController@create');
Route::post('invoice','InvoiceController@store');
Route::get('invoice/{id}','InvoiceController@show');