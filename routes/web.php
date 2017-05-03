<?php

use Illuminate\Support\Facades\Input;

Route::get('/', 'AdController@index');
Route::post('/', 'AdController@store');

Auth::routes();

Route::post ('login',function(){

	$userdata = array (
	'name' => Input::get('username'),
	'password' => Input::get('password')
	);
	If (Auth::attempt ($userdata)) {
		// authentication success, enters home page
		return Redirect::to('');
	} else {
		return Redirect::to('');
	}
});