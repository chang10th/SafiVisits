@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
    <h1 class="m-0 text-dark">Création d'une nouvelle visite</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{route('visit.storeVisit')}}">
                @csrf
                <input type="hidden" name="employee_id" value="{{\Illuminate\Support\Facades\Auth::user()->getAuthIdentifier()}}"/>
                <input type="hidden" name="visitstate_id" value="1"/>
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Date de la visite</label>
                            <input type="date" class="form-control" name="attendedDate_date">
                        </div>
                        <div class="form-group">
                            <label for="name">Heure de la visite</label>
                            <input type="time" required class="form-control" name="attendedDate_time">
                        </div>
                        <div class="form-group">
                            <label for="name">Choix du praticien : </label>
                            <select name="practitioner_id">
                                @foreach($practitioners as $practitioner)
                                    <option value="{{$practitioner->id}}">{{$practitioner->firstname}} {{$practitioner->lastname}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary float-right">
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

