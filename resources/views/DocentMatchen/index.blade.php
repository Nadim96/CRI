@extends('layouts.co')

@section('content')
	<div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Student matchen met BPV-Bedrijf</h1></div>
                <div class="table-responsive">
                <table class="table">
                <thead>
                	<tr>
                		<th>#</th>
                		<th>Naam</th>
                		<th>Woonplaats</th>
                		<th>Coach</th>
                		<th>Opleiding</th>
                		<th>Klas</th>
                		<th>Beroepsprofiel</th>
                		<th>BPV-Docent</th>
                		
                	</tr>
                </thead>
	                <tbody>      
		                @foreach ($student as $stu)
		                {{ $findstudent = App\Student::find($stu->id) }}
						{{ $finddocent = App\BPVDocent::find($stu->bpvdocent_id) }}
						
		                	<tr>
		                		<th>{{ $stu->id }}</th>
		                		<th>{{ $stu->naam }}</th>
		                		<th>{{ $stu->woonplaats}}</th>
		                		<th>{{ $stu->coach}}</th>
		                		<th>{{ $stu->opleiding}}</th>
		                		<th>{{ $stu->klas}}</th>
		                		<th>{{ $stu->beroepsprofiel}}</th>
		                		<th>{{ $finddocent->naam}}</th>
		                	</tr>
		                @endforeach
	                </tbody>
                </table>
                </div>
            </div>
         </div>


           


            <div class="col-md-3">
	            <div class="well">
	            {!! Form::open(['route' => 'student.store', 'method' => 'POST' ]) !!}
	            	<h2>Student toevoegen</h2>

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
	            	
	            	{{ Form::label('bedrijfs_id', 'bedrijfs_id:')}}
	            	{{ Form::text('bedrijfs_id',  null, ['class' => 'form-control'])}}

	            	{{ Form::label('bpvdocent_id', 'BPV-bpvdocent_id:')}}
	         
	            	<select class="form-control" name="bedrijfs_id">
	            	@foreach ($bpvdocent as $bpvbed)
	            		<option value='{{ $bpvbed->id }}'> {{ $bpvbed->naam }}</option>
	            	@endforeach
	            	</select>

	            	{{ Form::submit('Maak een nieuwe leerling aan' , ['class' => 'btn btn-primary btn-block'])}}

	            {!! Form::close() !!}


	            </div>
            </div>

        </div>
@endsection