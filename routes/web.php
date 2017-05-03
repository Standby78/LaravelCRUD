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

Route::get('/', 'AdController@index');
Route::post('/', 'AdController@store');
Route::get('logout','AdController@logout');
Route::get('/edit', 'AdController@edit');
Route::get('/delete/{id}', ['uses' =>'AdController@delete']);
Route::post('update', 'AdController@update');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');