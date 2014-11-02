<?php

// Bind route parameters for User.
Route::model('user', 'User');

// Route to delete a User
Route::get('/users/delete/{user}', 'UsersController@delete');

// Dashboard route with auth check
Route::get('/', array('as' => 'home', 'uses' => 'MailstoreController@dashboard'))->before('auth');

// Routes for User index
Route::get('users', 'UsersController@index');

// Routes for Session login, logout and the resource
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);
