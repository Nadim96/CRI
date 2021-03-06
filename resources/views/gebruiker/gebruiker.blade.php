<!DOCTYPE html>
<html>
<head>
	<title>Gebruiker</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>
<body>

<!--Menu- Irsjaad Ketwaru--> 
	<div id="Maindiv">
		<div>
			<div id="logo"><H1>BPV-CO</h1></div>
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">Contact</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">Service</a></li>
			</ul>	
		</div>
	</div>

	

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
					
					<th>Naam</th>
					<th>Woonplaats</th>
					
					<!--<th>bezoek5</th>
					<th>bezoek6</th>
					<th>bezoek7</th>
					<th>first_name</th>
					<th>last_name</th>
					<th>email</th>-->


				</tr>
			</thead>




<!--Knop exporteer alle gegevens-->
<form method="get" action="/exportGebruiker">
    <button type="submit" class="btn btn-success">Exporteer alle gegevens naar CSV</button>
</form>
<!--Knop Bekijk alle gegevens-->
<form method="get" action="/getPDF">
    &nbsp;&nbsp;&nbsp;&nbsp;.<button type="submit" class="btn btn-danger">Bekijk alle gegevens in PDF</button>
</form>
<!--Knop download PDF-->
<form method="get" action="/getPDFdownload">
    &nbsp;&nbsp;&nbsp;&nbsp;.<button type="submit" class="btn btn-primary">Exporteer alle gegevens naar PDF</button>
</form>

<!--test Knop delete alle gegevens
&nbsp;&nbsp;&nbsp;&nbsp;.
<button class="btn btn-danger btn-sm btn-del" value="" id="view">
                		<i class="glyphicon glyphicon-trash"></i> Verwijder</button>-->

<!-- Knop import alle gegevens-->
<form method="get" action="/importGebruiker">
    &nbsp;&nbsp;&nbsp;&nbsp;.<button type="submit" class="btn btn-success">Importeer alle gegevens naar CSV</button>
</form>


			<tbody>
<!--Ingevulde tabel- Irsjaad Ketwaru--> 
				@if(isset($fulltable2))
				<br><br><div  id="fulltable2">
					@foreach($fulltable2 as $table)
						<tr>
				
                <td>{{$table->naam}}</td>
                <td>{{$table->woonplaats}}</td>
                
                            	

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
				url		:   '{{URL::to('gebruikersearch')}}',	
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