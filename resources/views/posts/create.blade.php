@extends('layouts.co')

@section('content')
	<div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Posts</div>
                <table class="table">
                <thead>
                	<tr>
                		<th>#</th>
                		<th>Name</th>
                		<th>Body</th>
                		<th>Category_id</th>
                	</tr>
                </thead>
	                <tbody>
		                @foreach ($posts as $post)
		                	<tr>
		                		<th>{{ $post->id }}</th>
		                		<th>{{ $post->title }}</th>
		                		<th>{{ $post->body}}</th>
		                		<th>{{ $post->category_id}}</th>
		                	</tr>
		                @endforeach
	                </tbody>
                </table>
                </div>
            </div>

            <div class="col-md-3">
	            <div class="well">
	            {!! Form::open(['route' => 'posts.store', 'method' => 'POST' ]) !!}
	            	<h2>New Post</h2>

	            	{{ Form::label('title', 'Title:')}}
	            	{{ Form::text('title',  null, ['class' => 'form-control'])}}

	            	{{ Form::label('body', 'Body:')}}
	            	{{ Form::text('body',  null, ['class' => 'form-control'])}}

	            	{{ Form::label('category_id', 'Category:')}}

	            	@foreach ($categories as $category)
	            	<select class="form-control" name="category">
	            		<option value='{{ $category->id }}'> {{ $category->name }}</option>
	            	</select>
	            	@endforeach

	            	{{ Form::submit('Create new post' , ['class' => 'btn btn-primary btn-block'])}}

	            {!! Form::close() !!}
	            </div>
            </div>



        </div>
@endsection