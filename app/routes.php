<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'ShorturlsController@index');

Route::resource('shorturls', 'ShorturlsController');

// jump to long url
Route::get('{shortcode}', array('uses' =>'ShorturlsController@showLongUrl'))
	->where('shortcode', '[0-9a-zA-Z]+');