@extends('layouts.co')

@section('content')
	<div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Studie</h1></div>
                <div class="table-responsive">
                <table class="table">
                <thead>
                	<tr>
                		<th>Student</th>
                		<th>Opleiding</th>
                		<th>Klas</th>
                		<th>Beroepsprofiel</th>
                		<th>Cohort</th>
            
                	</tr>
                </thead>
	                <tbody>      
		                @foreach ($studies as $studie)
		                {{ !!! $findstudent = App\Student::find($studie->student_id) }}
						{{ !!! $findcohort = App\Cohort::find($studie->cohort_id) }}
						{{ !!! $findklas = App\Klas::find($studie->klas_id) }}
						{{ !!! $findopleiding = App\Opleiding::find($studie->opleiding_id) }}
						{{ !!! $findberoepsprofiel = App\Beroepsprofiel::find($studie->beroepsprofiel_id) }}
		  
		                	<tr>
		                		<th>{{ $findstudent->naamstudent }}</th>	
		                		<th>{{ $findopleiding->opleidingnaam }}</th>
		                		<th>{{ $findklas->klasnaam }}</th>
		                		<th>{{ $findberoepsprofiel->beroepsprofielnaam }}</th>
		                		<th>{{ $findcohort->jaar }}</th>
		                	</tr>
		                @endforeach
	                </tbody>
                </table>
                </div>
            </div>
         </div>

            <div class="col-md-3">
	            <div class="well">
	            {!! Form::open(['route' => 'Studie.store', 'method' => 'POST' ]) !!}
	            	<h2>Studie toevoegen</h2>

	            	{{ Form::label('student_id', 'Student:')}}
	            	<select class="form-control" name="student_id">
	            	@foreach ($studenten as $student)
	            		<option value='{{ $student->id }}'> {{ $student->naamstudent }}</option>
	            	@endforeach
	            	</select>

	            	
	            	{{ Form::label('opleiding_id', 'Opleiding:')}}
	            	<select class="form-control" name="opleiding_id">
	            	@foreach ($opleidingen as $opleiding)
	            		<option value='{{ $opleiding->id }}'> {{ $opleiding->opleidingnaam }}</option>
	            	@endforeach
	            	</select>

	            	{{ Form::label('klas_id', 'Klas:')}}
	            	<select class="form-control" name="klas_id">
	            	@foreach ($klassen as $klas)
	            		<option value='{{ $klas->id }}'> {{ $klas->klasnaam }}</option>
	            	@endforeach
	            	</select>

	            	{{ Form::label('beroepsprofiel_id', 'Beroepsprofiel:')}}
	            	<select class="form-control" name="beroepsprofiel_id">
	            	@foreach ($beroepsprofielen as $beroepsprofiel)
	            		<option value='{{ $beroepsprofiel->id }}'> {{ $beroepsprofiel->beroepsprofielnaam }}</option>
	            	@endforeach
	            	</select>
	          
	            	{{ Form::label('cohort_id', 'Cohort:')}}
	            	<select class="form-control" name="cohort_id">
	            	@foreach ($cohorts as $cohort)
	            		<option value='{{ $cohort->id }}'> {{ $cohort->jaar }}</option>
	            	@endforeach
	            	</select>

	            


	            	<br><button class="btn btn-primary" style="width:100%;height:35px"> <a href="/Coach/create"><b style=""><span class="glyphicon glyphicon-plus" style="color:white;font-size: 20px;"></span></b></a></button>

	            {!! Form::close() !!}


	            </div>
            </div>

        </div>
@endsection