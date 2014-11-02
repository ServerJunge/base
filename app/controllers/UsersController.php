<?php

class UsersController extends \BaseController {

	public function index()
	{

	$users = User::all();
	return View::make('users.index', compact('users'));
	}

	public function delete(User $user)
    {
        // Delete user
        $user->delete();
        return Redirect::action('UsersController@index')->with('flash_message', 'Benutzer' . ' ' . $user->username . ' ' . 'wurde gelöscht.');
    }
}