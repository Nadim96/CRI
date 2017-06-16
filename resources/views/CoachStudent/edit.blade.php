@extends('layouts.co')

@section('content')
	<div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Edit</h1></div>
                <div class="table-responsive">
                <table class="table">
               		<div class="col-md-8">
               	{!! Form::model($stu, ['route' => 'student.update', $stu->id 'method' => 'POST' ]) !!}

               		{{ Form::label('naam', 'Naam:')}}
	            	{{ Form::text('naam',  null, ['class' => 'form-control'])}}

	            	{{ Form::label('woonplaats', 'Woonplaats:')}}
	            	{{ Form::text('woonplaats',  null, ['class' => 'form-control'])}}

	            	{{ Form::label('coach', 'Coach:')}}
	            	{{ Form::text('coach',  null, ['class' => 'form-control'])}}

	            	{{ Form::label('opleiding', 'Opleiding:')}}
	            	{{ Form::text('opleiding',  null, ['class' => 'form-control'])}}

	            	{{ Form::label('klas', 'Klas:')}}
	            	{{ Form::text('klas',  null, ['class' => 'form-control'])}}

	            	{{ Form::label('beroepsprofiel', 'Beroepsprofiel:')}}
	            	{{ Form::text('beroepsprofiel',  null, ['class' => 'form-control'])}}

	            	{{ Form::label('bedrijfs_id', 'BPV-Bedrijf:')}}
	            	{{ Form::select('bedrijfs_id', $bpvbedrijfs , null , ['class' => 'form-control'])}}


	            {!! Form::close() !!}
               		</div>
    			</table>
    		</div>
    	</div>
   	</div>

@endsection