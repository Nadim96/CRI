@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Praktijkbegeleider toevoegen</div>           
                    <div class="panel-body">
                        <!--11-05-2017 Lars: De formulier word aangemaakt en hiermee kunnen gegevens worden opgeslagen -->  
                        {!! Form::open(array('route'=>'Praktijkbegeleider.store')) !!}
                            <div class="form-group">
                            {!! Form::label('praktijkbegeleidernaam', 'Naam')!!}
                            {!! Form::text('praktijkbegeleidernaam', null, ['class'=>'form-control'])!!}
                            </div>
                            <div class="form-group">
                            {!! Form::label('email', 'E-mail')!!}
                            {!! Form::text('email', null, ['class'=>'form-control'])!!}
                            </div>
                            <div class="form-group">
                            {!! Form::label('telefoonnummer', 'Telefoonnummer')!!}
                            {!! Form::text('telefoonnummer', null, ['class'=>'form-control'])!!}
                            </div>
                            <div class="form-group">
                            {!! Form::button('Maak een praktijkbegeleider aan', ['type'=>'submit', 'class'=>'btn btn-primary'])!!}
                            </div>
                        {!! Form::close()!!}
                    </div><!--11-05-2017 Lars: Einde div van de panel-body class -->
                </div><!--11-05-2017 Lars: Einde van de panel panel-default class -->
            </div>
        </div>
    </div><!--11-05-2017 Lars: Einde van de container class -->
@endsection

