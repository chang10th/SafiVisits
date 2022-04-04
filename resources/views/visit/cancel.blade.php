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
                <input type="hidden" name="visitstate_id" value="4"/>

                // Ajouter deux boutons 'annuler' ou 'confirmer' .

            </form>
        </div>
    </div>
@stop

