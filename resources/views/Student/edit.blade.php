@extends('layouts.co')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Student Wijzigen</div>           
                    <div class="panel-body">

                        <!--11-05-2017 Lars: De formulier word aangemaakt en hiermee kunnen gegevens worden opgeslagen -->
                        {!! Form::model($studenten, ['route'=>['Student.update',$studenten->id], 'method'=>'PATCH', 'class'=>'form-hotiontal'] )         !!}
                        
                            <div class="form-group">
                            {!! Form::label('naamstudent', 'Student Naam')!!}
                            {!! Form::text('naamstudent', null, ['class'=>'form-control'])!!}
                            </div>
                            <div class="form-group">
                            {!! Form::label('woonplaats', 'Woonplaats')!!}
                            {!! Form::text('woonplaats', null, ['class'=>'form-control'])!!}
                            </div>
                            <div class="form-group">
                            {!! Form::button('Wijzigen', ['type'=>'submit', 'class'=>'btn btn-primary'])!!}
                            </div>
                        {!! Form::close()!!}
                    </div><!--11-05-2017 Lars: Einde div van de panel-body class -->
                </div><!--11-05-2017 Lars: Einde van de panel panel-default class -->
            </div>
        </div>
    </div><!--11-05-2017 Lars: Einde van de container class -->
@endsection


