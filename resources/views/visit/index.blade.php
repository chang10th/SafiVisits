@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
    <h1 class="m-0 text-dark">{{__('Dashboard')}}</h1>
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
                            <th>{{__('Ville')}}</th>
                            <th>{{__('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                    @foreach($visits as $visit)
                        <tr>
                            <td>
                                {{$visit->id}}
                            </td>
                            <td>
                                {{date('d-m-Y H:i:s', strtotime($visit->attendedDate))}}
                            </td>
                            <td>
                                {{$visit->practitioner->firstname}} {{$visit->practitioner->lastname}}
                            </td>
                            <td>
                                {{$visit->practitioner->city}}
                            </td>
                            <td>
                                <a class="btn btn-default btn-xs" href="{{route('visit.show',['id'=>$visit->id])}}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-default btn-xs" href="{{route('visit.createVisitreport',['id'=>$visit->id])}}">
                                    <i class="fa fa-pen"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    @parent
    <script>
        $('.datatable').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.1/i18n/fr_fr.json'
            }
        });
    </script>
@endsection
