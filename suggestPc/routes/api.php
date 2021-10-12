<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'ApiUserController@login');
Route::get('apitest', 'ApiUserController@details')->middleware('auth:api');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'ApiUserController@details');
    Route::post('suggest-my-pc', 'ApiUserController@suggestedMyPc')->name('suggest-my-pc-result');
});

Route::post('register', 'ApiUserController@register');
