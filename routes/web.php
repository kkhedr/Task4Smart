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
Route::get('/','ProductviewController@index');

Route::get('/details/{id}','ProductviewController@show');

Route::post('/cart/{id}','CartController@add_Item');
Route::get('/cart', 'CartController@index');

Route::get('/cart/remove/{id}', 'CartController@Remove');
Route::put('/cart/update/{id}', 'CartController@Update');

Route::resource('/product', 'ProductController');
