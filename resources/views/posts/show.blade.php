@extends('layouts.co')

@section('content')
	<div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Show posts</div>
               
               	{{$posts->categories->name}}
              
        </div>
@endsection