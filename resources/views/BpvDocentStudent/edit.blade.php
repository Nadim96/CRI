@extends('layouts.co')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>BEdit</h1></div>           
                    <div class="panel-body">


                        {!! Form::model($bpvdocentstudent, ['route'=>['BpvDocentStudent.update',$bpvdocentstudent->id], 'method'=>'PATCH', 'class'=>'form-hotiontal'] )         !!}

                          <div class="form-group">
                            {!! Form::label('id ', 'ID')!!}
                            {!! Form::text('id', null, ['class'=>'form-control'])!!}
                            </div>
                     

                            
                            <div class="form-group">
                            {!! Form::label('bezoek_id ', 'Bezoek ID')!!}
                            {!! Form::text('bezoek_id', null, ['class'=>'form-control'])!!}
                           
                            </div>

                            {{ Form::label('student_id', 'Student')}}
                            <select class="form-control" name="student_id">
                            @foreach ($studenten as $student)
                              @foreach($studentid as $stuid)
                              <option value='{{ $student->id }}'> {{ $student->naamstudent }}</option>
                              @endforeach
                            @endforeach
                            </select>
                      
                            {{ Form::label('bpvdocent_id', 'BPV-Docent')}}
                            <select class="form-control" name="bpvdocent_id">
                            @foreach ($bpvdocenten as $bpvdocent)
                              <option value='{{ $bpvdocent->id }}'> {{ $bpvdocent->name }}</option>
                            @endforeach
                            </select>

                            <div class="form-group">
                            {!! Form::label('bpvdocent_id', 'Plaats')!!}
                            {!! Form::text('bpvdocent_id', null, ['class'=>'form-control'])!!}
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

