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

use Doctrine\DBAL\Schema\Index;



Route::get('/', 'ItemsController@index')->name('home');

Route::resource('items', 'ItemsController');

Route::get('/cart', 'CartsController@index')->name('cart');
Route::get('/cart/{cart}', 'CartsController@finish')->name('carts.finish');
Route::post('/', 'CartsController@store')->name('carts.store');
Route::delete('/cart/{cart}', 'CartsController@destroy')->name('carts.destroy');
Route::patch('/cart/{cart}', 'CartsController@update')->name('carts.update');
Route::post('/cart', 'CartsController@settle')->name('carts.settle');

Route::get('/purchase', 'PurchasesController@index')->name('purchase');
Route::post('/purchase/{detail}', 'PurchasesController@show')->name('purchases.show');

Route::group(['middleware' => ['administrator']], function() {
Route::resource('admin', 'AdminController');
});

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
//認証用routes
Auth::routes();
