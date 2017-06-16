@extends('layouts.co')

@section('content')

	<div class="col-md-8">
            <div class="panel panel-default">
            @if (Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
                <div class="panel-heading"><h1>Opleiding -> Klas</h1></div>
                <div class="table-responsive">

                <table class="table">
                <thead>
                	<tr>
                		<th>Opleiding</th>
                		<th>Klas</th>          
                	</tr>
                </thead>
	                <tbody>      
	             	
						@foreach($opleidingklas as $opleiding)
						{{ !!! $opleidingid = $opleiding->opleiding_id}}
						{{ !!! $findopleiding = App\Opleiding::find($opleidingid) }}

						{{ !!! $klasid = $opleiding->klas_id}}
						{{ !!! $findklas = App\Klas::find($klasid) }}

  					<tr>
						
						<th>{{$findopleiding->opleidingnaam}}</th>
						<th>{{$findklas->klasnaam}}</th>

						<th></th>
						@endforeach
					</tr>
                </table>

               

              
                </div>
            </div>
         </div>


           


            <div class="col-md-3">
	            <div class="well">
	            {!! Form::open(['route' => 'OpleidingKlas.store', 'method' => 'POST' ]) !!}
	            	<h2>Opleiding -> Klas</h2>

	            	{{ Form::label('opleiding_id', 'Opleiding')}}
	            	<select class="form-control" name="opleiding_id">
	            	@foreach ($opleidingen as $opleiding)
	            		<option value='{{ $opleiding->id }}'> {{ $opleiding->opleidingnaam }}</option>
	            	@endforeach
	            	</select>


	            	{{ Form::label('klas_id', 'Klas')}}
	            	<select class="form-control" name="klas_id">
	            	@foreach ($klassen as $klas)
	            		<option value='{{ $klas->id }}'> {{ $klas->klasnaam }}</option>
	            	@endforeach
	            	</select>

	            	<br>
	            	{{ Form::submit('+' , ['class' => 'btn btn-primary btn-block'])}}

	            {!! Form::close() !!}


	            </div>
            </div>

        </div>

@endsection