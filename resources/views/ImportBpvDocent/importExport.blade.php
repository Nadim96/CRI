@extends('layouts.co')

@section('content')
<html lang="en">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
</head>
<body>
	<div class="container">
		
		<form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importExcelBpvDocent') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="file" name="import_file" /><br>
			<button class="btn btn-primary">Importeer BPV-Docenten</button>
		</form>
	</div>
</body>
@endsection