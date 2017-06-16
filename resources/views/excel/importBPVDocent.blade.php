<!DOCTYPE html>
<html>
<head>
	<title>Import BPV-Docenten</title>
</head>
<body>
<!--Importeer pagina- Irsjaad Ketwaru--> 
<form action="postImportBPVDocent" method="post" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<input type="file" name="BPV-Docent">
	<input type="submit" value="Import"></input>
</form>
</body>
</html>
