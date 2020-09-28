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
Route::group(['middleware' => 'language'], function() {
    Route::get('language/{language}', 'LangController@changeLanguage')->name('changelanguage');

    Route::get('/', 'UserController@index');

    Route::resource('users', 'UserController');

    Route::resource('orders', 'OrderController');

    Route::get('orders_user/{id}', 'OrderController@getOrdersById')->name('ordersById');
});
