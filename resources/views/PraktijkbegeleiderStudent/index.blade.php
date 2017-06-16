@extends('layouts.co')

@section('content')

	<div class="col-md-8">
            <div class="panel panel-default">
            @if (Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
                <div class="panel-heading"><h1>Praktijkbegeleider -> Student</h1></div>
                <div class="table-responsive">

                <table class="table">
                <thead>
                	<tr>
                		<th>Student</th>
                		<th>Praktijkbegeleider</th>
                
                	</tr>
                </thead>
	                <tbody>      
	             
						@foreach($praktijkbegeleiderstudent as $praktijkbegeleiderstud)
						{{ !!! $studentid = $praktijkbegeleiderstud->student_id}}
						{{ !!! $findstudent = App\Student::find($studentid) }}

						{{ !!! $praktijkegeleiderid = $praktijkbegeleiderstud->praktijkbegeleider_id}}
						{{ !!! $findpraktijkbegeleider = App\Praktijkbegeleider::find($praktijkegeleiderid) }}

  					<tr>
						
						<th>{{$findstudent->naamstudent}}</th>
						<th>{{$findpraktijkbegeleider->praktijkbegeleidernaam}}</th>
						<th></th>
						@endforeach
					</tr>
                </table>
                </div>
            </div>
         </div>


           


            <div class="col-md-3">
	            <div class="well">
	            {!! Form::open(['route' => 'PraktijkbegeleiderStudent.store', 'method' => 'POST' ]) !!}
	            	<h2>Praktijkbegeleider -> Student Matchen</h2>

	            	{{ Form::label('student_id', 'Student')}}
	            	<select class="form-control" name="student_id">
	            	@foreach ($studenten as $student)
	            		<option value='{{ $student->id }}'> {{ $student->naamstudent }}</option>
	            	@endforeach
	            	</select>


	            	{{ Form::label('praktijkbegeleider_id', 'Praktijkbegeleider:')}}
	            	<select class="form-control" name="praktijkbegeleider_id">
	            	@foreach ($praktijkbegeleiders as $praktijkbegeleider)
	            		<option value='{{ $praktijkbegeleider->id }}'> {{ $praktijkbegeleider->praktijkbegeleidernaam }}</option>
	            	@endforeach
	            	</select>

	            	<br>
	            	<button class="btn btn-primary" style="width:100%;height:35px"> <a href="/{PraktijkbegeleiderStudent}"><b style=""><span class="glyphicon glyphicon-plus" style="color:white;font-size: 20px;"></span></b></a></button>

	            {!! Form::close() !!}


	            </div>
            </div>

        </div>

@endsection