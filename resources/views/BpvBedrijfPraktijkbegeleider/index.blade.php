@extends('layouts.co')

@section('content')

	<div class="col-md-8">
            <div class="panel panel-default">
            @if (Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
                <div class="panel-heading"><h1>BPV-Bedrijf -> Praktijkbegeleider</h1></div>
                <div class="table-responsive">

                <table class="table">
                <thead>
                	<tr>
                		<th>BPV-Bedrijf</th>
                		<th>Praktijkbegeleider</th>
                
                	</tr>
                </thead>
	                <tbody>      
	             
						@foreach($bpvbedrijfpraktijkbegeleider as $bpvbedrijfpraktijkbegeleid)
						{{ !!! $bpvbedrijfid = $bpvbedrijfpraktijkbegeleid->bpvbedrijf_id}}
						{{ !!! $findbpvbedrijf = App\BPVBedrijf::find($bpvbedrijfid) }}

						{{ !!! $praktijkegeleiderid = $bpvbedrijfpraktijkbegeleid->praktijkbegeleider_id}}
						{{ !!! $findpraktijkbegeleider = App\Praktijkbegeleider::find($praktijkegeleiderid) }}

  					<tr>
						
						<td>{{$findbpvbedrijf->name}}</td>
						<td>{{$findpraktijkbegeleider->praktijkbegeleidernaam}}</th>
						<th></th>
						@endforeach
					</tr>
                </table>
                </div>
            </div>
         </div>


           


            <div class="col-md-3">
	            <div class="well">
	            {!! Form::open(['route' => 'BpvBedrijfPraktijkbegeleider.store', 'method' => 'POST' ]) !!}
	            	<h2>BPV-Bedrijf -> Praktijkbegeleider</h2>

	            	{{ Form::label('bpvbedrijf_id', 'BPV-Bedrijf:')}}
	            	<select class="form-control" name="bpvbedrijf_id">
	            	@foreach ($bpvbedrijven as $bpvbedrijf)
	            		<option value='{{ $bpvbedrijf->id }}'> {{ $bpvbedrijf->name }}</option>
	            	@endforeach
	            	</select>


	            	{{ Form::label('praktijkbegeleider_id', 'Praktijkbegeleider:')}}
	            	<select class="form-control" name="praktijkbegeleider_id">
	            	@foreach ($praktijkbegeleiders as $praktijkbegeleider)
	            		<option value='{{ $praktijkbegeleider->id }}'> {{ $praktijkbegeleider->praktijkbegeleidernaam }}</option>
	            	@endforeach
	            	</select>

	            	<br>
	            	<button class="btn btn-primary" style="width:100%;height:35px"> <a href="/BpvBedrijfPraktijkbegeleider"><b style=""><span class="glyphicon glyphicon-plus" style="color:white;font-size: 20px;"></span></b></a></button>

	            {!! Form::close() !!}


	            </div>
            </div>

        </div>

@endsection