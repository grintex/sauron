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

Route::get('/dados', 'App\Http\Controllers\DataController@index')->name('api.index');
Route::match(array('GET','POST'), '/pesquisa', 'App\Http\Controllers\DataController@search')->name('api.search');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
