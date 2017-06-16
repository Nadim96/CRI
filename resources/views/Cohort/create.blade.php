@extends('layouts.co')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Cohort Toevoegen</div>           
                    <div class="panel-body">
                        <!--11-05-2017 Lars: De formulier word aangemaakt en hiermee kunnen gegevens worden opgeslagen -->
                        {!! Form::open(array('route'=>'Cohort.store')) !!}
                            <div class="form-group">
                            {!! Form::label('jaar', 'Jaar')!!}
                            {!! Form::text('jaar', null, ['class'=>'form-control'])!!}
                            </div>
                        {!! Form::button('Maak een cohort aan', ['type'=>'submit', 'class'=>'btn btn-primary'])!!}
                        {!! Form::close()!!}
                    </div><!--11-05-2017 Lars: Einde div van de panel-body class -->
                </div><!--11-05-2017 Lars: Einde van de panel panel-default class -->
            </div>
        </div>
    </div><!--11-05-2017 Lars: Einde van de container class -->
@endsection

