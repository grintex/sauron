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

Route::get('/', 'App\Http\Controllers\HomeController@index');

Route::get('/pessoa/{key}', 'App\Http\Controllers\PersonController@show');
Route::get('/disciplina/{key}', 'App\Http\Controllers\CourseController@show');

// Embeds
Route::get('/embed/disciplina-historico/{key}', 'App\Http\Controllers\EmbedCourseController@show');
