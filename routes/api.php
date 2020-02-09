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
Route::prefix('auth')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::get('refresh', 'AuthController@refresh');
    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('user', 'AuthController@user');
        Route::post('logout', 'AuthController@logout');
    });
});
Route::get('/setLocale/{locale}','LocalizationController@setLocale');

Route::group(['middleware' => 'auth:api'], function(){

    Route::get('categories/{category?}','CategoryController@index');

//    Route::apiResource('posts','PostController');
    Route::get('/posts/{slug?}','PostController@index');
    Route::post('/posts','PostController@store');
    Route::delete('posts/{id}','PostController@destroy');
});
