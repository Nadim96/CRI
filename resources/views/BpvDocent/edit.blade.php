@extends('layouts.co')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">BPV-Docent</div>           
                    <div class="panel-body">

                        <!--11-05-2017 Lars: De formulier word aangemaakt en hiermee kunnen gegevens worden opgeslagen -->
                        {!! Form::model($bpv_docenten, ['route'=>['BPV-Docent.update',$bpv_docenten->id], 'method'=>'PATCH', 'class'=>'form-hotiontal'] )         !!}
                    
                            <div class="form-group">
                            {!! Form::label('naam', 'Naam')!!}
                            {!! Form::text('naam', null, ['class'=>'form-control'])!!}
                            </div>
                            <div class="form-group">
                            {!! Form::label('woonplaats', 'Woonplaats')!!}
                            {!! Form::text('woonplaats', null, ['class'=>'form-control'])!!}
                            </div>
                            <div class="form-group">
                            {!! Form::button('Wijzigen', ['type'=>'submit', 'class'=>'btn btn-primary'])!!}
                            <button type="button" class="btn btn-primary" name="test" onclick="window.location='{{ route("/BPV-Docent")}}'">Annuleer</button>
                            </div>
                        {!! Form::close()!!}
                    </div><!--11-05-2017 Lars: Einde div van de panel-body class -->
                </div><!--11-05-2017 Lars: Einde van de panel panel-default class -->
            </div>
        </div>
    </div><!--11-05-2017 Lars: Einde van de container class -->
@endsection


