<?php
require_once("../src/Infrastructure/dbConnection.php");
$id = $_GET['id'];
$result = mysqli_query($mysqli, "DELETE FROM books WHERE id = $id");

header("Location:index.php");