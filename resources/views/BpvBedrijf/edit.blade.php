@extends('layouts.co')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>BPV-Bedrijf Wijzigen</h1></div>           
                    <div class="panel-body">

                        <!--11-05-2017 Lars: De formulier word aangemaakt en hiermee kunnen gegevens worden opgeslagen -->
                        {!! Form::model($bpv_bedrijven, ['route'=>['BPV-Bedrijf.update',$bpv_bedrijven->id], 'method'=>'PATCH', 'class'=>'form-hotiontal'] )         !!}
                            
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
                       
                        <!--11-05-2017 Lars: Hier komt een input box waarmee je de beroepsprofiel kan invullen-->
                           
                            
                        <!--11-05-2017 Lars: Hier komt een submit button waarmee je de ingevulde gegevens kan versturen -->
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

