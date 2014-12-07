@extends('layouts.master')

@section('content')

<div class="box box-primary">
    <div class="box-header">
<br>
    </div>



{{ Form::open(array('action' => array('UsersController@handleEdit', 'class' => 'form-horizontal', $user->id))) }}
{{ Form::open(array('route' => 'sessions.store', 'class' => 'form-horizontal')) }}
    
    <div class="form-group">
            {{ Form::label('username', 'Benutzername:', ['class' => 'col-sm-1 control-label']) }}
            <div class="col-sm-6">
            {{ Form::text('username', null, ['class' => 'form-control']) }}
            </div>
    </div>
    <div class="form-group">
            {{ Form::label('email', 'Email:', ['class' => 'col-sm-1 control-label']) }}
            <div class="col-sm-6">
            {{ Form::text('email', null, ['class' => 'form-control']) }}
            </div>
    </div>
    <div class="form-group">
            {{ Form::label('password', 'Passwort:', ['class' => 'col-sm-1 control-label']) }}
            <div class="col-sm-6">
            {{ Form::password('password', ['class' => 'form-control']) }}
            </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-1 col-sm-6">
            {{ Form::submit('Anmelden', ['class' => 'btn btn-default']) }}
        </div>
    </div>

{{ Form::close() }}
<br>

@stop