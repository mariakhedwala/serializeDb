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
})->name('home');

Route::get('/users', 'DbSerializeController@index');
Route::get('/feed', 'DbSerializeController@create');
Route::post('/feed', 'DbSerializeController@store');
Route::get('/users/{user}', 'DbSerializeController@show');
Route::get('/users/{user}/edit', 'DbSerializeController@edit'); //edit
Route::patch('/users/{user}', 'DbSerializeController@update');
Route::delete('/users/{user}', 'DbSerializeController@destroy');