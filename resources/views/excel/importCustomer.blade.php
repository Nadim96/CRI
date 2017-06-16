<!DOCTYPE html>
<html>
<head>
	<title>Import gegevens</title>
</head>
<body>
<!--Importeer pagina- Irsjaad Ketwaru--> 
<form action="postImport" method="post" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<input type="file" name="customer">
	<input type="submit" value="Import"></input>
</form>
</body>
</html>
