@extends('master')

@section ('title')
    Benutzer
@stop

@section ('description')

@stop

@section('content')
<div class="box box-primary">
    <div class="box-header">
        <div class="pull-right box-tools">
            <a href="#" class="btn btn-primary btn-sm iframe">
                <span class="fa fa-plus-circle"></span> Anlegen
            </a>
        </div>
        <i class="fa fa-user"></i>
        <h3 class="box-title">Benutzerverwaltung</h3>
    </div>

    @if ($users->isEmpty())
        <p>There are no users! :(</p>
    @else
    <div class="box-body">
        <table id="users" class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
<th class="col-md-2">Benutzername</th>
<th class="col-md-2">Email</th>
<th class="col-md-2">Erstellt am</th>
<th class="col-md-2">Aktionen</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                    <td>
                        <a href="#" class="btn btn-default btn-sm">Bearbeiten</a>
                        <a href="{{ action('UsersController@delete', $user->id) }}" class="btn btn-danger btn-sm">Löschen</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@stop

@stop