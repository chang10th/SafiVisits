@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
    <h1 class="m-0 text-dark">Planifier des visites</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3>Liste des visites effectuées aujourd'hui </h3>
                    <br/>
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
                    @foreach($visits->visitsTodayDone as $visitTodayDone)
                        <tr>
                            <td>
                                {{$visitTodayDone->id}}
                            </td>
                            <td>
                                {{date('d-m-Y H:i:s', strtotime($visitTodayDone->attendedDate))}}
                            </td>
                            <td>
                                {{$visitTodayDone->practitioner->firstname}} {{$visitTodayDone->practitioner->lastname}}
                            </td>
                            <td>
                                {{$visitTodayDone->practitioner->city}}
                            </td>
                            <td>
                                <a class="btn btn-default btn-xs" href="{{route('visit.show',['id'=>$visitTodayDone->id])}}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-default btn-xs" href="{{route('visit.createVisitreport',['id'=>$visitTodayDone->id])}}">
                                    <i class="fa fa-pen"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3>
                        Liste des visites pour demain
                        <a class="btn btn-default btn-xs" href="{{route('visit.createVisit')}}">
                            <i class="fa fa-plus"></i>
                        </a>
                    </h3>
                    <br/>
                    <table class="table table-bordered table-striped datatable">
                        <thead>
                        <tr>
                            <th>{{'#'}}</th>
                            <th>{{__('Date')}}</th>
                            <th>{{__('Praticien')}}</th>
                            <th>{{__('Ville')}}</th>
                            <th>{{__('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($visits->visitsTomorrow as $visitTomorrow)
                            <tr>
                                <td>
                                    {{$visitTomorrow->id}}
                                </td>
                                <td>
                                    {{date('d-m-Y H:i:s', strtotime($visitTomorrow->attendedDate))}}
                                </td>
                                <td>
                                    {{$visitTomorrow->practitioner->firstname}} {{$visitTomorrow->practitioner->lastname}}
                                </td>
                                <td>
                                    {{$visitTomorrow->practitioner->city}}
                                </td>
                                <td>
                                    <a class="btn btn-default btn-xs" href="{{route('visit.show',['id'=>$visitTomorrow->id])}}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-default btn-xs" href="{{route('visit.edit',['id'=>$visitTomorrow->id])}}">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    <a class="btn btn-default btn-xs" href="{{route('visit.deleteForm',['id'=>$visitTomorrow->id])}}">
                                        <i class="fa fa-ban"></i>
                                    </a>
                                </td>
                            </tr>
                    @endforeach
                        </tbody>
                    </table>
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
