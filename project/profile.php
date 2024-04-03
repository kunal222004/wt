<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['username'])) {
    header('Location: l.php');
    exit;
}

// Database connection parameters
$host = 'your_database_host';
$dbname = 'your_database_name';
$user = 'your_database_user';
$password = 'your_database_password';

// Establish a connection to the PostgreSQL database
$pdo = new PDO("pgsql:host=$host;dbname=$dbname;user=$user;password=$password");

// Fetch user details from the database
$username = $_SESSION['username'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
$stmt->bindParam(':username', $username);
$stmt->execute();
$userDetails = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the user exists
if (!$userDetails) {
    // Handle the case where the user doesn't exist in the database
    header('Location: l.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head section remains unchanged -->
</head>
<body>
    <h1>Welcome, <?php echo $userDetails['name']; ?>!</h1>
    
    <p>Username: <?php echo $username; ?></p>
    <p>Email: <?php echo $userDetails['email']; ?></p>
    
    <a href="lout.php">Logout</a>
</body>
</html>
