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

Route::get('/', [
	'as' => 'home',
	'uses' => 'AgenciesController@index'
]);

Route::resource('agencies', 'AgenciesController');

Route::get('createOwner/{agencyId}', [
	'as' => 'createOwner',
	'uses' => 'OwnersController@create'
]);

Route::resource('owners', 'OwnersController');

Route::get('createStaff/{agencyId}', [
	'as' => 'createStaff',
	'uses' => 'StaffsController@create'	
]);

Route::resource('staffs', 'StaffsController');

Route::get('agenciesByCity', [
	'as' => 'agenciesByCity',
	'uses' => 'AgenciesController@agenciesByCity'
]);

Route::get('schedulesByDate', [
	'as' => 'schedulesByDate',
	'uses' => 'SchedulesController@schedulesByDate'	
]);

Route::resource('schedules', 'SchedulesController');

Route::get('tests', function()
{
	/*$path = storage_path('logs/');
	if (file_exists($path.'laravel-2014-09-26.log'))
	{
		dd('exists');
	} else {
		dd('not exist');
	}*/
});
