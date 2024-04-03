<?php

$host = "localhost";
$port = "5432";
$username = "root";
$password = "root";
$database = "";

// Connect to PostgreSQL database
$conn = pg_connect("host=$host port=$port dbname=$database user=$username password=$password");

// Check connection
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

?>
