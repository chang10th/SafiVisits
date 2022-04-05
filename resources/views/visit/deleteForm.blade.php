@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
    <h1 class="m-0 text-dark">Êtes-vous sur de vouloir supprimer la visite n°{{$visit->id}} ? </h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{route('visit.delete',['id'=>$visit->id])}}">
                @method('DELETE')
                @csrf
                <input type="hidden" name="_method" value="DELETE"/>
                <button type="submit" class="btn btn-danger">
                    Supprimer
                </button>
            </form>
        </div>
    </div>
@stop

