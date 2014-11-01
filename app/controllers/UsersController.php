<?php

class UsersController extends \BaseController {

	public function index()
	{

	$users = User::all();
	return View::make('index', compact('users'));
	}

	public function delete(User $user)
    {
        // Show delete confirmation page.
        $user->delete();
        return Redirect::action('UsersController@index')->with('flash_message', 'Benutzer' . ' ' . $user->username . ' ' . 'wurde gelöscht.');
    }

    public function handleDelete()
    {
        // Handle the delete confirmation.
        $id = Input::get('user');
        $user = User::findOrFail($id);
        $user->delete();

        return Redirect::action('UsersController@index');
    }
}