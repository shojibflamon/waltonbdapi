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
Route::middleware(['auth'])->group(function () {
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('suggest-my-pc', 'SuggestMyDeviceController@create')->name('suggest-my-pc');
    Route::post('suggest-my-pc', 'SuggestMyDeviceController@suggestedMyPc')->name('suggest-my-pc-result');


    Route::get('config-products', 'SuggestMyDeviceController@configProducts')->name('config-products');
    Route::get('config-product/{id}', 'SuggestMyDeviceController@configProductShow')->name('config-product-show');
    Route::post('config-product/{id}', 'SuggestMyDeviceController@configProductUpdate')->name('config-product-update');
});
