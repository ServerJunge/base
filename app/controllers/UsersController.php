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

    public function edit(User $user)
    {
        // Show the edit user form.
        return View::make('users.edit', compact('user'));
    }

    public function handleEdit()
    {
        // Handle edit form submission.
        $user = User::findOrFail(Input::get('id'));
        $user->username = Input::get('username');
        $user->email = Input::get('email');
        $user->password = Input::get('password');
        $user->save();

        return Redirect::action('UsersController@index');
    }
}