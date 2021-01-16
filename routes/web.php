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

Route::post('/post-register', 'Auth\RegisterController@postRegister')->name('post-register');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/top_up', 'HomeController@top_up')->name('top_up');
Route::get('/product', 'HomeController@product')->name('product');
Route::get('/order_history', 'HomeController@order_history')->name('order_history');
Route::get('/transaction/{order_no}', 'HomeController@transaction')->name('transaction');
// Route::get('/pay_order', 'HomeController@pay_order')->name('pay_order');
Route::get('/pay_order/{order_no}', 'HomeController@pay_order')->name('pay_order');

Route::post('/post-product', 'ProductController@create')->name('post-product');
Route::post('/post-topup', 'TopupController@create')->name('post-topup');
Route::post('/topup-transaction', 'TransactionController@topup_transaction')->name('topup-transaction');
Route::post('/product-transaction', 'TransactionController@product_transaction')->name('product-transaction');

