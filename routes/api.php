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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::post('register', 'Api\RegisterController@register');
Route::post('login', 'Api\RegisterController@login');

Route::get('test', "Api\RegisterController@test");

/*
Route::middleware('auth:api')->group( function () {
    Route::resource('products', 'Api\ProductController');
});*/
