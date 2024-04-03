<?php
$host = "localhost";
$port = "5432";
$dbname = "your_database_name";
$user = "your_username";
$password = "your_password";

// Connect to PostgreSQL database
$conn = pg_connect("host=$localhost port=$5432 dbname=$dbname user=$user password=$password");

// Check connection
if (!$conn) {
  die("Connection failed: " . pg_last_error());
}

// Add Book
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addBook'])) {
  $title = $_POST['title'];
  $url = $_POST['url'];
  $description = $_POST['description'];

  $sql = "INSERT INTO books (title, url, description) VALUES ('$title', '$url', '$description')";

  $result = pg_query($conn, $sql);
  if ($result) {
    echo "New record created successfully";
  } else {
    echo "Error: " . pg_last_error($conn);
  }
}

// Remove Book
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['removeBook'])) {
  $id = $_POST['bookId'];

  $sql = "DELETE FROM books WHERE id=$id";

  $result = pg_query($conn, $sql);
  if ($result) {
    echo "Record deleted successfully";
  } else {
    echo "Error: " . pg_last_error($conn);
  }
}

// Update Book
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateBook'])) {
  $id = $_POST['bookId'];
  $title = $_POST['title'];
  $url = $_POST['url'];
  $description = $_POST['description'];

  $sql = "UPDATE books SET title='$title', url='$url', description='$description' WHERE id=$id";

  $result = pg_query($conn, $sql);
  if ($result) {
    echo "Record updated successfully";
  } else {
    echo "Error: " . pg_last_error($conn);
  }
}

// Close PostgreSQL connection
pg_close($conn);
?>
