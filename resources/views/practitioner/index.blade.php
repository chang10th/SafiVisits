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
                    <h3>Portefeuille de praticiens </h3>
                    <br/>
                    <table class="table table-bordered table-striped datatable">
                        <thead>
                        <tr>
                            <th>{{__('Nom')}}</th>
                            <th>{{__('Prénom')}}</th>
                            <th>{{__('Profession médicale')}}</th>
                            <th>{{__('Adresse')}}</th>
                            <th>{{__('Email')}}</th>
                            <th>{{__('Inscrit à des applications de prise de RDV en ligne')}}</th>
                            <th>{{__('N° Telephone')}}</th>
                            <th>{{__('Statut')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                    @foreach($practitioners as $practitioner)
                        <tr>
                            <td>
                                {{$practitioner->lastname}}
                            </td>
                            <td>
                                {{$practitioner->firstname}}
                            </td>
                            <td>
                                {{$practitioner->complementarySpeciality}}
                            </td>
                            <td>
                                {{$practitioner->address}}
                            </td>
                            <td>
                                {{$practitioner->email}}
                            </td>
                            <td>
                                @if($practitioner->registeredAppliMeetingOnline == 1)
                                Inscrit
                                @else
                                Non inscrit
                                @endif
                            </td>
                            <td>
                                {{$practitioner->tel}}
                            </td>
                            <td>
                                @switch($practitioner->practitionerstate->name)
                                    @case('deceased')
                                    Décédé(e)
                                    @break
                                    @case('removed')
                                    Ratié(e)
                                    @break
                                    @case('incumbent')
                                    En exercice
                                    @break
                                    @case('retired')
                                    Retraité(e)
                                    @break
                                @endswitch
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
