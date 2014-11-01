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

// MailStore Routes
Route::get('/mailstore/setuserpassword', 'MailstoreController@setuserpassword');
Route::get('/mailstore/getinstances', 'MailstoreController@getinstances');
Route::get('/mailstore/getinstancestatistics', 'MailstoreController@getinstancestatistics');
Route::get('/mailstore/getservicestatus', 'MailstoreController@getservicestatus');
Route::get('/mailstore/getuserinfo', 'MailstoreController@getuserinfo');
Route::get('/mailstore/getenvironmentinfo', 'MailstoreController@getenvironmentinfo');
Route::get('/mailstore/getstores', 'MailstoreController@getstores');
Route::get('/mailstore/getworkerresults', 'MailstoreController@getworkerresults');
Route::get('/mailstore/getinstanceprocesslivestatistics', 'MailstoreController@getinstanceprocesslivestatistics');
Route::get('/mailstore/getusers', 'MailstoreController@getusers');



// Bind route parameters for User.
Route::model('user', 'User');
Route::get('/users/delete/{user}', 'UsersController@delete');

Route::get('/', ['as' => 'home', function()
{
	return View::make('dashboard');
}])->before('auth');

Route::get('users', 'UsersController@index');
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);
