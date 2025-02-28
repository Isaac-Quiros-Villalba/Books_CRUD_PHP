<html>
<head>
	<title>Buscar libro</title>
</head>

<body>
	<h2>Buscar libro</h2>
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
				<td></td>
				<td><input type="submit" name="submit" value="Buscar libro"></td>
			</tr>
		</table>
	</form>
    <?php
if(isset($_POST["submit"])){
	require_once("../src/Application/library.php");
	$result = searchbook($_POST);
    ?>
    <table width='80%' border=0>
	    <tr bgcolor='#DDDDDD'>
		<td><strong>Título</strong></td>
		<td><strong>Autor</strong></td>
		<td><strong>ISBN</strong></td>
		<td><strong>Año publicación</strong></td>
        <td><strong>Descripción</strong></td>
		</tr>
    <?php
    foreach ($result as $res){
            echo "<tr>";
			echo "<td>".$res['title']."</td>";
			echo "<td>".$res['author']."</td>";
			echo "<td>".$res['isbn']."</td>";
            echo "<td>".$res['year']."</td>";
            echo "<td>".$res['description']."</td>";
			echo "<td><a href=\"edit.php?id=$res[id]\">Editar</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('¿Estas seguro de querer eliminarlo?')\">Eliminar</a></td>";         
    }
    ?>
    </table>
<?php 
}
?>
</body>
</html>