<?php
// Database connection parameters
$host = 'your_database_host';
$dbname = 'your_database_name';
$user = 'your_database_user';
$password = 'your_database_password';

// Establish a connection to the PostgreSQL database
$pdo = new PDO("pgsql:host=$host;dbname=$dbname;user=$user;password=$password");

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password for security

    // Prepare and execute the SQL query to insert data into the users table
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    // Execute the query
    if ($stmt->execute()) {
        echo "User registration successful!";
    } else {
        echo "Error during registration.";
    }
}
?>
