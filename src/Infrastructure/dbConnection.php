<?php
$databaseHost = 'localhost';
$databaseName = 'library';
$databaseUsername = 'root';
$databasePassword = 'root';

// Open a new connection to the MySQL server
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);