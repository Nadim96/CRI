@extends('layouts.co')




@section('content')
	<div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Categories</div>
                <table class="table">
                <thead>
                	<tr>
                		<th>#</th>
                		<th>Name</th>
                	</tr>
                </thead>
	                <tbody>
		                @foreach ($categories as $category)
		                	<tr>
		                		<th>{{ $category->id }}</th>
		                		<th>{{ $category->name }}</th>
		                	</tr>
		                @endforeach
	                </tbody>
                </table>
                </div>
            </div>

            <div class="col-md-3">
	            <div class="well">
	            {!! Form::open(['route' => 'categories.store', 'method' => 'POST' ]) !!}
	            	<h2>New Category</h2>

	            	{{ Form::label('name', 'Name:')}}
	            	{{ Form::text('name',  null, ['class' => 'form-control'])}}
	            	{{ Form::submit('Create new Category' , ['class' => 'btn btn-primary btn-block'])}}

	            {!! Form::close() !!}
	            </div>
            </div>



        </div>
@endsection