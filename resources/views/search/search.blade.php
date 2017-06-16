<!DOCTYPE html>
<html>
<head>
	<title>Live Search</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>
<body>

<!--Menu- Irsjaad Ketwaru--> 
	
	

	<div class="container">
	<div class="row">
		<div class="panel panel-default">
		<div class="panel-heading">
			<h3>BPV Bezoeken inzien</h3>
			
				
		</div>
		<div class="panel-body">
		<div class="form-group">
		<input type="text" class="form-control" id="search" name="search"></input>
		</div>

		<!--Tabel kolommen- Irsjaad Ketwaru--> 
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					
					<th>Studentcode</th>
					<th>BPVDocentcode</th>
					<th>Bezoek 1</th>
					<th>Bezoek 2</th>
					<th>Bezoek 3</th>
					<th>Bezoek 4</th>
					<th>Bezoek 5</th>
					<th>Bezoek 6</th>
					<th>Bezoek 7</th>
					<th>Bezoek 8</th>		
				</tr>
			</thead>




<!--Knop exporteer alle gegevens-->


			<tbody>
<!--Ingevulde tabel- Irsjaad Ketwaru--> 
				@if(isset($fulltable))
				<br><br><div  id="fulltable">
					@foreach($fulltable as $table)
						<tr>
				
                <td>{{$table->studentcode}}</td>
                <td>{{$table->bpvdocentcode}}</td>
                <td>{{$table->bezoek1}}</td>
                <td>{{$table->bezoek2}}</td>
                <td>{{$table->bezoek3}}</td>
                <td>{{$table->bezoek4}}</td>
                <td>{{$table->bezoek5}}</td>
                <td>{{$table->bezoek6}}</td>
                <td>{{$table->bezoek7}}</td>
                <td>{{$table->bezoek8}}</td>
                            	

                </tr>
					@endforeach
				@endif
				
				</div>
			</tbody>
		</table>
		</div>
		</div>
	</div>
	</div>
	<!--Live search- Irsjaad Ketwaru--> 
	<script type="text/javascript">
		$('#search').on('keyup',function(){
			$value=$(this).val();
			$.ajax({
				type	: 	'get',
				url		:   '{{URL::to('search')}}',	
				data	: 	{'search':$value},
				success:function(data){
					$('#test').hide();
					$('tbody').html(data);
					
				}
			});
		})	
	</script>

</body>
</html>