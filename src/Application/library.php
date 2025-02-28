<?php	
    
function addbook($book){
    require_once("../src/Infrastructure/dbConnection.php");
	require_once("../vendor/autoload.php");
	$title = $book["title"];
	$author = $book["author"];
	$isbn = $book["isbn"];
	$year = $book["year"];
	$description = "";
	$client = new \GuzzleHttp\Client();
	$response = $client->request('GET', 'https://openlibrary.org/api/books', [
		'query' => [
			'bibkeys' => 'ISBN:'.$isbn,
			'format' => 'json',
			'jscmd' => 'details'
		]
	]);
	$bookData = json_decode($response->getBody(), true);
	if(isset($bookData["ISBN:$isbn"]["details"]["description"]["value"])){
		$description = $bookData["ISBN:$isbn"]["details"]["description"]["value"];
	}

	$result = mysqli_query($mysqli, "INSERT INTO books (`title`, `author`, `isbn`, `year`, `description`) VALUES ('$title', '$author', '$isbn', '$year', '$description')");
		
	echo "<p><font color='green'>Libro creado correctamente!</p>";
	echo "<a href='index.php'>Volver</a>";
}

function editbook($book){
    require_once("../src/Infrastructure/dbConnection.php");
	require_once("../vendor/autoload.php");
	$id = $book["id"];
	$title = $book["title"];
	$author = $book["author"];
	$isbn = $book["isbn"];
	$year = $book["year"];
	$description = "";
	$client = new \GuzzleHttp\Client();
	$response = $client->request('GET', 'https://openlibrary.org/api/books', [
		'query' => [
			'bibkeys' => 'ISBN:'.$isbn,
			'format' => 'json',
			'jscmd' => 'details'
		]
	]);
	$bookData = json_decode($response->getBody(), true);
	if(isset($bookData["ISBN:$isbn"]["details"]["description"]["value"])){
		$description = $bookData["ISBN:$isbn"]["details"]["description"]["value"];
	}
	$result = mysqli_query($mysqli, "UPDATE books SET `title` = '$title', `author` = '$author', `isbn` = '$isbn',  `year` = '$year', `description` = '$description' WHERE id=$id");	
	echo "<p><font color='green'>Libro editado correctamente!</p>";
	echo "<a href='index.php'>Volver</a>";
}

function searchbook($parameters){
    require_once("../src/Infrastructure/dbConnection.php");

	$title = $parameters["title"];
	$author = $parameters["author"];
	$where = "";
	if(!empty($title) && !empty($author)){
		$where = "WHERE `title` = '$title' AND `author` = '$author'";
	}
	if(!empty($title) && empty($author)){
		$where = "WHERE `title` = '$title'";
	}
	if(empty($title) && !empty($author)){
		$where = "WHERE `author` = '$author'";
	}
	$result = mysqli_query($mysqli, "SELECT * FROM books ".$where." ORDER BY id DESC");

	return $result;
}