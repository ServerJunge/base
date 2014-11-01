@extends('master')

@section ('title')
    Dashboard
@stop

@section ('description')

@stop

@section('content')

<div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        {{ $numberCostumers }}
                                    </h3>
                                    <p>
                                        Kundenanzahl
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion-person-stalker"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    Mehr Informationen <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                       {{ $numberOfUsers }}
                                    </h3>
                                    <p>
                                        Benutzeranzahl
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        {{ $numberOfMessages }}
                                    </h3>
                                    <p>
                                        Archivierte Emails
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-email"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        {{ $totalSizeMB }}<sup style="font-size: 20px">MB</sup>
                                    </h3>
                                    <p>
                                        Belegter Speicherplatz
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-android-storage"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div>

<div class="box box-primary">
    <div class="box-header">
        <div class="pull-right box-tools">
            <a href="#" class="btn btn-primary btn-sm iframe">
                <span class="fa fa-refresh"></span> Aktualisieren
            </a>
        </div>
        <i class="fa fa-archive"></i>
        <h3 class="box-title">Archive</h3>
    </div>

    <div class="box-body">
        <table id="users" class="table table-hover table-bordered">
            <thead>
                <tr>
<th class="col-md-2">Instanzname</th>
<th class="col-md-2">Status</th>
<th class="col-md-2">Aktionen</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $result)

                @if ($result->status == 'stopped') 

                <div class="alert alert-danger alert-block">
                            <i class="fa fa-ban"></i>
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                	   ACHTUNG: Die Instanz {{ $result->instanceID }} wurde gestoppt!
                        </div>
                	
                <tr class="danger">
                    <td>{{ $result->instanceID }}</td>
                    <td>{{ $result->status }}</td>
                    <td>
                        <a href="#" class="btn btn-default btn-sm">Bearbeiten</a>
                        <a href="#" class="btn btn-danger btn-sm">Löschen</a>
                    </td>
                </tr>

                @else
                <tr>
                    <td>{{ $result->instanceID }}</td>
                    <td>{{ $result->status }}</td>
                    <td>
                        <a href="#" class="btn btn-default btn-sm">Bearbeiten</a>
                        <a href="#" class="btn btn-danger btn-sm">Löschen</a>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>

@stop