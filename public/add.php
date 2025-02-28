<?php
if(isset($_POST["submit"])){
	require_once("../src/Application/library.php");
	addbook($_POST);
}else{
?>
<html>
<head>
	<title>Crear nuevo libro</title>
</head>

<body>
	<h2>Crear nuevo libro</h2>
	<p>
		<a href="index.php">Inicio</a>
	</p>

	<form method="post" name="add">
		<table width="25%" border="0">
			<tr> 
				<td>Título</td>
				<td><input type="text" name="title"></td>
			</tr>
			<tr> 
				<td>Autor</td>
				<td><input type="text" name="author"></td>
			</tr>
			<tr> 
				<td>ISBN</td>
				<td><input type="text" name="isbn"></td>
			</tr>
            <tr> 
				<td>Año Publicación</td>
				<td><input type="text" name="year"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="submit" value="Crear nuevo libro"></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php
}
?>