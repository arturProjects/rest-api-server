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


/**
**Basic Routes for a RESTful service:
**Route::get($uri, $callback);
**Route::post($uri, $callback);
**Route::put($uri, $callback);
**Route::delete($uri, $callback); 
**
*/
 
 
Route::get('items', 'ItemController@index');
Route::get('items/{item}', 'ItemController@show'); 
Route::get('items/{column}/{sign}/{value}', 'ItemController@search');
Route::post('items','ItemController@store');
Route::put('items/{item}','ItemController@update');
Route::delete('items/{item}', 'ItemController@destroy');
