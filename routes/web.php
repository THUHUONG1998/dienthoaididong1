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
Route::get('home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('welcome');
});
Route::get('shopping-cart', 'ShoppingCartController@index');
Route::get('add-to-cart/{id}', 'ShoppingCartController@addToCart')->name('addcart');
Route::get('info-cart', 'ShoppingCartController@infoCart')->name('infoCart');
Route::post('update-cart', 'ShoppingCartController@updateCart')->name('updateCart');
Route::get('delete-cart/{id}', 'ShoppingCartController@deleteCart')->name('deleteCart');
Route::get('/chi-tiet/{id}', function($id){
    return $id;
});
Route::get('chi-tiet/{id}', 'HomeController@show');

Auth::routes();
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RolesController');
    Route::resource('users','UsersController');
    Route::resource('products','ProductsController');
    Route::resource('type','TypeController');
});
