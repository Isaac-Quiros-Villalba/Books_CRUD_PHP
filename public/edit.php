<?php
if(isset($_POST["submit"])){
	require_once("../src/Application/library.php");
	editbook($_POST);
}else{
    if(isset($_GET["id"])){
        require_once("../src/Infrastructure/dbConnection.php");
        $result = mysqli_query($mysqli, "SELECT * FROM books WHERE id=".$_GET['id']."");
        $res = mysqli_fetch_assoc($result);
        $title = $res["title"];
        $author = $res["author"];
        $isbn = $res["isbn"];
        $year = $res["year"];
?>
<html>
<head>
	<title>Editar libro</title>
</head>

<body>
	<h2>Editar libro</h2>
	<p>
		<a href="index.php">Inicio</a>
	</p>

	<form method="post" name="add">
        <input type="hidden" name="id" value=<?php echo$_GET['id']; ?>>
		<table width="25%" border="0">
			<tr> 
				<td>Título</td>
				<td><input type="text" name="title" value=<?php echo $title; ?>></td>
			</tr>
			<tr> 
				<td>Autor</td>
				<td><input type="text" name="author" value=<?php echo $author; ?>></td>
			</tr>
			<tr> 
				<td>ISBN</td>
				<td><input type="text" name="isbn" value=<?php echo $isbn; ?>></td>
			</tr>
            <tr> 
				<td>Año Publicación</td>
				<td><input type="text" name="year" value=<?php echo $year; ?>></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="submit" value="Editar libro"></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php
    }else{
        header("Location:index.php");
    }
}
?>