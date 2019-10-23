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

Route::namespace('Api')->group(function () {
    // Route::get('/users', 'UsersController@index');
    // Route::get('/users/{user}', 'UsersController@show');
    // Route::put('/users/{user}', 'UsersController@update');
    //模具产品
    Route::get('/product', 'ProductController@index');
    Route::get('/syproduct', 'ProductController@syindex');
    Route::get('/product/{id}', 'ProductController@show');
    //新闻
    Route::get('/new', 'NewController@newindex');
    Route::get('/synew', 'NewController@synewindex');
    Route::get('/new/{id}', 'NewController@newshow');
    //轮播图
    Route::get('/sybanner', 'HomebannerController@index');
});
