@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Visite n°{{$currentVisit->id}}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-9">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                </div>
            </div>
        </div>
    </div>
@stop

