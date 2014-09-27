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


Route::resource('agencies', 'AgenciesController');

Route::get('tests', function()
{
	$path = storage_path('logs/');
	if (file_exists($path.'laravel-2014-09-26.log'))
	{
		dd('exists');
	} else {
		dd('not exist');
	}
});
