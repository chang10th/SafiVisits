@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
    <h1 class="m-0 text-dark">Modification de la visite n°{{$visit->id}}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{route('visit.update',['id'=>$visit->id])}}">
                @method('PUT')
                @csrf
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Adresse :</label>
                            <input type="text" value="{{$visit->practitioner->city}}" disabled/>
                        </div>
                        <div class="form-group">
                            <label for="name">Date</label>
                            <input type="date" required class="form-control" name="attendedDate_date">
                        </div>
                        <div class="form-group">
                            <label for="name">Heure</label>
                            <input type="time" required class="form-control" name="attendedDate_time">
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary float-right">
                    </div>
                </div>
            </form>
        </div>
        @if($error)
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Erreur de date</h3>
                </div>
                <div class="card-body">
                    Veuillez saisir une date strictement supérieur à celle d'aujourd'hui
                </div>
            </div>
        @endif
    </div>
@stop

