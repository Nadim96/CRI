@extends('layouts.co')

@section('content')
	<div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>BPV-Traject</h1></div>
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
                		<th>BPV-Bedrijf</th>
                		<th>BPV-Docent</th>	
                	</tr>
                </thead>
	                <tbody>      
		                @foreach ($student as $stu)
		                <!-- 26-05-2017 Lars : Vindt de studenten id in via de Student model ie gelijk is aan de studenten	 tabel -->
		                {{ !!! $findstudent = App\Student::find($stu->id) }}
		                <!-- 26-05-2017 Lars : Vindt de bedrijfs_id in via de Bedrijf model die gelijk is aan de bedrijf tabel -->
						{{ !!! $findbedrijf = App\BpvBedrijf::find($stu->bedrijfs_id) }}
						<!-- 26-05-2017 Lars : Vindt de bpvdocent_id in via de BPVDocent model die gelijk is aan de bpvdocent tabel -->
						{{ !!! $finddocent = App\BPVDocent::find($stu->bpvdocent_id) }}
						<!-- 26-05-2017 Lars : Vindt de opleidings_id in via de BPVDocent model die gelijk is aan de opleidings tabel -->
						{{ !!! $findopleiding = App\Opleiding::find($stu->opleiding_id) }}
		                	<tr>
		                		<th>{{ $stu->id }}</th>
		                		<th>{{ $stu->naam }}</th>
		                		<th>{{ $stu->woonplaats}}</th>
		                		<th>{{ $stu->coach}}</th>
		           				<th>{{ $findopleiding->naam}}</th>
		                		<th>{{ $stu->klas}}</th>
		                		<th>{{ $stu->beroepsprofiel}}</th>
		                		<th>{{ $findbedrijf->name}}</th>
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

	            	{{ Form::label('opleiding_id', 'Opleiding:')}}
	            	<select class="form-control" name="opleiding_id">
	            	@foreach ($opleiding as $opleidings)
	            		<option value='{{ $opleidings->id }}'> {{ $opleidings->naam }}</option>
	            	@endforeach
	            	</select>

	            	{{ Form::label('klas', 'Klas:')}}
	            	{{ Form::text('klas',  null, ['class' => 'form-control'])}}

	            	{{ Form::label('beroepsprofiel', 'Beroepsprofiel:')}}
	            	{{ Form::text('beroepsprofiel',  null, ['class' => 'form-control'])}}
	            	

	            	{{ Form::label('bedrijfs_id', 'BPV-Bedrijf:')}}
	            	<select class="form-control" name="bedrijfs_id">
	            	@foreach ($bpvbedrijf as $bpvbedrijfs)
	            		<option value='{{ $bpvbedrijfs->id }}'> {{ $bpvbedrijfs->name }}</option>
	            	@endforeach
	            	</select>


	            	{{ Form::label('bpvdocent_id', 'BPV-bpvdocent_id:')}}
	            	<select class="form-control" name="bpvdocent_id">
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