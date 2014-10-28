@extends('master')

@section('content')

{{ Form::open(array('route' => 'sessions.store')) }}
	<ul>
		<li>
			{{ Form::label('email', 'Email:') }}
			{{ Form::text('email') }}
		</li>
		<li>
			{{ Form::label('password', 'Passwort:') }}
			{{ Form::password('password') }}
		</li>
		<li>
			{{ Form::submit() }}
		</li>

	</ul>
{{ Form::close() }}

@stop