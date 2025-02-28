<?php
require_once("../src/Infrastructure/dbConnection.php");
$result = mysqli_query($mysqli, "SELECT * FROM books ORDER BY id DESC");
?>

<!DOCTYPE html>
<head>
    <title>Inicio CRUD Libros</title>
</head>
<body>
    <h2>Inicio CRUD Libros</h2>
	<p>
		<a href="add.php">Crear nuevo libro</a>
	</p>
    <p>
		<a href="search.php">Buscar libro</a>
	</p>
	<table width='80%' border=0>
		<tr bgcolor='#DDDDDD'>
			<td><strong>Título</strong></td>
			<td><strong>Autor</strong></td>
			<td><strong>ISBN</strong></td>
			<td><strong>Año publicación</strong></td>
            <td><strong>Descripción</strong></td>
		</tr>
		<?php
		// Fetch the next row of a result set as an associative array
		while ($res = mysqli_fetch_assoc($result)) {
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
</body>
<html>