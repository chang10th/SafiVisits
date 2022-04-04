@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
    <h1 class="m-0 text-dark">Création du compte-rendu pour la visite n°{{$visit->id}}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{route('visit.storeVisitreport',['id'=>$visit->id])}}">
                @csrf
                <input type="hidden" name="visit_id" value="{{$visit->id}}"/>
                <input type="hidden" name="creationDate" value="{{\Illuminate\Support\Carbon::now()}}"/>
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Commentaire</label>
                            <input type="text" class="form-control" name="comment">
                        </div>
                        <div class="form-group">
                            <label for="name">Note de la visite : </label>
                            <select name="starScore">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <label> / 5</label>
                        </div>
                        <div class="form-group">
                            <label for="name">Statut du compte-rendu : </label>
                            <select name="visitreportstate_id">
                                <option value="1">En attente</option>
                                <option value="2">Réalisé</option>
                                <option value="3">Ajusté</option>
                            </select>
                        </div>
{{--                        <div id="medecines_fields" class="form-group">--}}
{{--                            <input type="button" value="Ajouter un médicament" onClick="addField();">--}}
{{--                        </div>--}}
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary float-right">
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')
{{--    <script>--}}
{{--        var myOptions = '@foreach($medecines as $medecine) <option style="width:1px" value={{$medecine->id}}>{{$medecine->commercialName}}</option> @endforeach';--}}
{{--        function addField(){--}}
{{--            var field = "<br/><select name='medecine'><br/>" + myOptions + "<br/></select><br/>";--}}
{{--            document.getElementById('medecines_fields').innerHTML += field;--}}
{{--        }--}}
{{--    </script>--}}
@endsection

