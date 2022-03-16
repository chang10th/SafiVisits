@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped datatable">
                        <thead>
                        <tr>
                            <th>{{'#'}}</th>
                            <th>{{__('Date')}}</th>
                            <th>{{__('Practitioner')}}</th>
                            <th>{{__('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                    @foreach($currentVisits as $currentVisit)
                        <tr>
                            <td>
                                {{$currentVisit->id}}
                            </td>
                            <td>
                                {{$currentVisit->attendedDate}}
                            </td>
                            <td>
                                {{$currentVisit->practitioner->firstname}} {{$currentVisit->practitioner->lastname}}
                            </td>
                            <td>
                                <a class="btn btn-default btn-xs"
                                   href="{{route('dashboard.show',['currentVisit'=>$currentVisit])}}">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop

