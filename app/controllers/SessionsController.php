<?php

class SessionsController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 * GET /sessions/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /sessions
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$attempt = Auth::attempt([
			'email' => $input['email'],
			'password' => $input['password']
		]);

		if ($attempt) return Redirect::intended('/')->with('flash_message', 'Du hast dich erfolgreich angemeldet!');

		return Redirect::back()->with('flash_message', 'Zugangsdaten fehlerhaft.')->withInput();
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /sessions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();

		return Redirect::home()->with('flash_message', 'Du wurdest abgemeldet.');
	}

}