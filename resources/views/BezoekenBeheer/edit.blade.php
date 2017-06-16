@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Bezoek Wijzigen</div>           
                    <div class="panel-body">

                    {!! Form::model($bezoeken, ['route'=>['bezoekenbeheer.update',$bezoeken->id], 'method'=>'PATCH', 'class'=>'form-hotiontal'] )         !!}

                        {!! Form::label('bezoek1', 'Bezoek 1')!!}
                        {!! Form::Date('bezoek1', null,['class'=>'form-control', 'placeholder' => '2017-01-01', 'style'=>'text-align:left;'])!!}

                        {!! Form::label('bezoek2', 'Bezoek 2')!!}
                        {!! Form::Date('bezoek2', null, ['class'=>'form-control', 'placeholder' => '2017-01-01'])!!}

                        {!! Form::label('bezoek3', 'Bezoek 3')!!}
                        {!! Form::Date('bezoek3', null, ['class'=>'form-control', 'placeholder' => '2017-01-01'])!!}

                        {!! Form::label('bezoek4', 'Bezoek 4')!!}
                        {!! Form::Date('bezoek4', null, ['class'=>'form-control', 'placeholder' => '2017-01-01'])!!}

                        {!! Form::label('bezoek5', 'Bezoek 5')!!}
                        {!! Form::Date('bezoek5', null, ['class'=>'form-control', 'placeholder' => '2017-01-01'])!!}

                        {!! Form::label('bezoek6', 'Bezoek 6')!!}
                        {!! Form::Date('bezoek6', null, ['class'=>'form-control', 'placeholder' => '2017-01-01'])!!}

                        {!! Form::label('bezoek7', 'Bezoek 7')!!}
                        {!! Form::Date('bezoek7', null, ['class'=>'form-control', 'placeholder' => '2017-01-01'])!!}

                        {!! Form::label('bezoek8', 'Bezoek 8')!!}
                        {!! Form::Date('bezoek8', null, ['class'=>'form-control', 'placeholder' => '2017-01-01'])!!}

                        <br>
                        <div class="form-group">
                            {!! Form::button('Wijzigen', ['type'=>'submit', 'class'=>'btn btn-primary'])!!}
                       <button type="button" class="btn btn-primary" name="test" onclick="window.location='{{ route("/bezoekenbeheer")}}'">Annuleer</button>
                        </div>
                        {!! Form::close()!!}

                        {!! Form::close()!!}


{{--
                        <!--11-05-2017 Lars: De formulier word aangemaakt en hiermee kunnen gegevens worden opgeslagen -->
                        {!! Form::model($coaches, ['route'=>['Coach.update',$coaches->id], 'method'=>'PATCH', 'class'=>'form-hotiontal'] )         !!}
                            <div class="form-group">
                            {!! Form::label('coachnaam', 'Coachnaam')!!}
                            {!! Form::text('coachnaam', null, ['class'=>'form-control'])!!}
                            </div>
                            
                            <div class="form-group">
                            {!! Form::button('Wijzigen', ['type'=>'submit', 'class'=>'btn btn-primary'])!!}
                            </div>
                        {!! Form::close()!!}


                        --}}
                    </div><!--11-05-2017 Lars: Einde div van de panel-body class -->
                </div><!--11-05-2017 Lars: Einde van de panel panel-default class -->
            </div>
        </div>
    </div><!--11-05-2017 Lars: Einde van de container class -->


<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>    
@endsection


