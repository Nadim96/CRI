@extends('layouts.co')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">BPV-Bedrijf Toevoegen</div>           
                    <div class="panel-body">
                        <!--11-05-2017 Lars: De formulier word aangemaakt en hiermee kunnen gegevens worden opgeslagen -->
                        {!! Form::open(array('route'=>'BPV-Bedrijf.store')) !!}
                            <div class="form-group">
                            {!! Form::label('name', 'Naam')!!}
                            {!! Form::text('name', null, ['class'=>'form-control'])!!}
                            </div>
                        <!--11-05-2017 Lars: Hier komt een input box waarmee je het adres kan invullen-->
                            <div class="form-group">
                            {!! Form::label('adres', 'Adres')!!}
                            {!! Form::text('adres', null, ['class'=>'form-control'])!!}
                            </div>
                        <!--11-05-2017 Lars: Hier komt een input box waarmee je de plaats kan invullen-->
                            <div class="form-group">
                            {!! Form::label('plaats', 'Plaats')!!}
                            {!! Form::text('plaats', null, ['class'=>'form-control'])!!}
                            </div>
                        <!--11-05-2017 Lars: Hier komt een input box waarmee je het telefoonnummer kan invullen-->
                          
                            <div class="form-group">
                            {!! Form::button('Maak BPV-Bedrijf aan', ['type'=>'submit', 'class'=>'btn btn-primary'])!!}
                            </div>
                        {!! Form::close()!!}
                    </div><!--11-05-2017 Lars: Einde div van de panel-body class -->
                </div><!--11-05-2017 Lars: Einde van de panel panel-default class -->
            </div>
        </div>
    </div><!--11-05-2017 Lars: Einde van de container class -->
@endsection

