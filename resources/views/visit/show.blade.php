@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
    <h1 class="m-0 text-dark">Visite n°{{$visit->visitDetails->id}}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <h3 class="m-3 text-dark">Détails de la visite</h3>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Adresse</b>
                            <span class="float-right">{{$visit->visitDetails->practitioner->city}}, {{$visit->visitDetails->practitioner->address}}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Date</b>
                            <span class="float-right">{{str_replace(['T','Z'],' ',$visit->visitDetails->attendedDate)}}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @if(!is_null($visit->report))
        <div class="col-md-4">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <h3 class="m-3 text-dark">Dernier compte-rendu de la visite</h3>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Date de création</b>
                            <span class="float-right">{{$visit->report->creationDate}}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Commentaire du visiteur</b>
                            <span class="float-right">{{$visit->report->comment}}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Évaluation</b>
                            <span class="float-right">{{$visit->report->starScore}} / 5</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @endif()
    </div>
@stop

