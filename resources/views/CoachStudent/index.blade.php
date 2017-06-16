	@extends('layouts.co')

@section('content')

	<div class="col-md-8">
            <div class="panel panel-default">
            @if (Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
                <div class="panel-heading"><h1>Coach -> Student</h1></div>
                <div class="table-responsive">

                <table class="table">
                <thead>
                	<tr>
                		<th>Coach</th>
                		<th>Student</th>
                		<th>Cohort</th>
                
                	</tr>
                </thead>
	                <tbody>      
	             
						@foreach($coachstudent as $coachstu)
						{{ !!! $studentid = $coachstu->student_id}}
						{{ !!! $findstudent = App\Student::find($studentid) }}

						{{ !!! $coachid = $coachstu->coach_id}}
						{{ !!! $findcoach = App\Coach::find($coachid) }}

						{{ !!! $cohort_id = $coachstu->jaar}}
						{{ !!! $findcohorts = App\Cohort::find($cohort_id) }}
  					<tr>
						
						<td>{{$findcoach->coachnaam}}</td>
						<td>{{$findstudent->naamstudent}}</td>
						<td>{{$findcohorts->jaar}}</td>
						<th></th>
						@endforeach
					</tr>
                </table>

               

              
                </div>
            </div>
         </div>


           


            <div class="col-md-3">
	            <div class="well">
	            {!! Form::open(['route' => 'CoachStudent.store', 'method' => 'POST' ]) !!}
	            	<h2>Coach -> Student Matchen</h2>

	            	{{ Form::label('coach_id', 'Coach')}}
	            	<select class="form-control" name="coach_id">
	            	@foreach ($coaches as $coach)
	            		<option value='{{ $coach->id }}'> {{ $coach->coachnaam }}</option>
	            	@endforeach
	            	</select>

	            	{{ Form::label('student_id', 'Student')}}
	            	<select class="form-control" name="student_id">
	            	@foreach ($studenten as $student)
	            		<option value='{{ $student->id }}'> {{ $student->naamstudent }}</option>
	            	@endforeach
	            	</select>

	            	{{ Form::label('jaar', 'Cohort')}}
	            	<select class="form-control" name="jaar">
	            	@foreach ($cohorts as $cohort)
	            		<option value='{{ $cohort->id }}'> {{ $cohort->jaar }}</option>
	            	@endforeach
	            	</select>

	            	<br>
	            	<button class="btn btn-primary" style="width:100%;height:35px"> <a href="/CoachStudent"><b style=""><span class="glyphicon glyphicon-plus" style="color:white;font-size: 20px;"></span></b></a></button>

	            {!! Form::close() !!}


	            </div>
            </div>

        </div>

@endsection