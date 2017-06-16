@extends('layouts.co')

@section('content')

	<div class="col-md-8">
            <div class="panel panel-default">
            @if (Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
                <div class="panel-heading"><h1>BPV-Docent -> Student</h1></div>
                <div class="table-responsive">

                <table class="table">
                <thead>
                	<tr>
                		<th>BPV-Docent</th>
                		<th>Student</th>
                		<th>Cohort</th>
                
                	</tr>
                </thead>
	                <tbody>      
	             
						@foreach($bpvdocentstudent as $bpvdocentstu)

						{{ !!! $bpvdocent = $bpvdocentstu->bpvdocent_id}}
						{{ !!! $findbpvdocent = App\BPVDocent::find($bpvdocent) }}

						{{ !!! $studentid = $bpvdocentstu->student_id}}
						{{ !!! $findstudent = App\Student::find($studentid) }}


						{{ !!! $cohort_id = $bpvdocentstu->cohort_id}}
						{{ !!! $findcohorts = App\Cohort::find($cohort_id) }}
  					<tr>
						
						<td>{{ $findbpvdocent->name }}</td>
						<td>{{ $findstudent->naamstudent }}</td>
						<td>{{ $findcohorts->jaar }}</td>
						<td>
                                <!-- 11-05-2017 Lars: Als er op de knop gedrukt hebt wordt je naar de edit pagina gestuurd waar je een nieuwe BPV-Bedrijf kan toevoegen-->
                                <a href="{{ route('BpvDocentStudent.edit', $bpvdocentstu->id)}}" class="btn btn-warning">Wijzigen</a>
                            </td>
						@endforeach
					</tr>
                </table>
                </div>
            </div>
         </div>


            <div class="col-md-3">
	            <div class="well">
	            {!! Form::open(['route' => 'BpvDocentStudent.store', 'method' => 'POST' ]) !!}
	            	<h2>BPV-Docent -> Student Matchen</h2>


	            	{{ Form::label('bpvdocent_id', 'BPV-Docent')}}
	            	<select class="form-control" name="bpvdocent_id">
	            	@foreach ($bpvdocenten as $bpvdocent)
	            		<option value='{{ $bpvdocent->id }}'> {{ $bpvdocent->name }}</option>
	            	@endforeach
	            	</select>
	            	
	            	{{ Form::label('student_id', 'Student')}}
	            	<select class="form-control" name="student_id">
	            	@foreach ($studenten as $student)
	            		<option value='{{ $student->id }}'> {{ $student->naamstudent }}</option>
	            	@endforeach
	            	</select>



	            	{{ Form::label('cohort_id', 'Cohort')}}
	            	<select class="form-control" name="cohort_id">
	            	@foreach ($cohorts as $cohort)
	            		<option value='{{ $cohort->id }}'> {{ $cohort->jaar }}</option>
	            	@endforeach
	            	</select>

	            	<br>
	            	<button class="btn btn-primary" style="width:100%;height:35px"> <a href="/BpvDocentStudent"><b style=""><span class="glyphicon glyphicon-plus" style="color:white;font-size: 20px;"></span></b></a></button>

	            {!! Form::close() !!}


	            </div>
            </div>

        </div>

@endsection