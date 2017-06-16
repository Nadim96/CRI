@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Student toevoegen</div>           
                    <div class="panel-body">
                        <!--11-05-2017 Lars: De formulier word aangemaakt en hiermee kunnen gegevens worden opgeslagen -->  
                        {!! Form::open(array('route'=>'Student.store')) !!}
                            <div class="form-group">
                            {!! Form::label('naamstudent', 'Student Naam')!!}
                            {!! Form::text('naamstudent', null, ['class'=>'form-control'])!!}
                            </div>
                        <!--11-05-2017 Lars: Hier komt een input box waarmee je het adres kan invullen-->
                            <div class="form-group">
                            {!! Form::label('woonplaats', 'Woonplaats')!!}
                            {!! Form::text('woonplaats', null, ['class'=>'form-control'])!!}
                            </div>

                            <div class="form-group">
                            {!! Form::button('Maak een Student aan', ['type'=>'submit', 'class'=>'btn btn-primary'])!!}
                            </div>
                        {!! Form::close()!!}
                    </div><!--11-05-2017 Lars: Einde div van de panel-body class -->
                </div><!--11-05-2017 Lars: Einde van de panel panel-default class -->
            </div>
        </div>
    </div><!--11-05-2017 Lars: Einde van de container class -->
@endsection

