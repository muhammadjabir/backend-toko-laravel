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

Route::prefix('v1')->group(function(){
	Route::post('login','AuthController@login');
	Route::post('register','AuthController@register');
	Route::middleware('auth:api')->group(function () {
	    Route::post('logout','AuthController@logout');
	    Route::post('shipping','ShopController@shipping');
	    Route::post('services', 'ShopController@services'); // <= ini
	    Route::post('payment', 'ShopController@payment'); // <= ini
	});
	Route::get('categories/random/{count}','CategoryControler@random');
	Route::get('categories','CategoryControler@index');
	Route::get('books/top/{count}','BookController@top');
	Route::get('books','BookController@index');
	Route::get('categories/slug/{slug}','CategoryControler@slug');
	Route::get('books/slug/{slug}','BookController@slug');
	Route::get('books/search/{keyword}','BookController@search');
	Route::get('provinces','ShopController@provinces');
	Route::get('cities','ShopController@cities');
	Route::get('couriers','ShopController@couriers');
});
