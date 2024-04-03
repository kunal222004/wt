<?php
// PostgreSQL connection parameters
$host = "localhost";
$port = "5432";
$username = "your_postgresql_username";
$password = "your_postgresql_password";
$database = "your_postgresql_database";

// Attempt to establish a connection to the PostgreSQL database
$conn = pg_connect("host=$host port=$port dbname=$database user=$username password=$password");

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the SQL statement to fetch user details from the database
    $sql = "SELECT * FROM users WHERE username = $1 AND password = $2";
    $stmt = pg_prepare($conn, "", $sql);

    // Execute the prepared statement with parameters
    $result = pg_execute($conn, "", array($username, $password));

    // Check if the query was successful and if a row was returned
    if ($result && pg_num_rows($result) > 0) {
        // Authentication successful, redirect to the home page or perform other actions
        header("Location: home1.html");
        exit();
    } else {
        // Authentication failed, set an error message
        $error_message = "Invalid username or password";
    }
}

// Close the database connection
pg_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        /* Add your custom CSS here */
    </style>
</head>
<body class="bg-gray-200">
    <nav class="bg-gray-800 text-white">
        <div class="container mx-auto py-4">
            <ul class="flex justify-between">
                <li><a href="home1.html" class="hover:text-gray-300">Home</a></li>
                <li><a href="about.php" class="hover:text-gray-300">About</a></li>
                <li><a href="profile.php" class="hover:text-gray-300">Profile</a></li>
                <li><a href="contact.html" class="hover:text-gray-300">Contact</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mx-auto flex justify-center items-center h-screen">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-lg shadow-md p-8">
                <h2 class="text-3xl font-bold mb-6 text-center">Login</h2>
                <form action="" method="post" class="space-y-4">
                    <div>
                        <label for="username" class="block mb-1">Username:</label>
                        <input type="text" id="username" name="username" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label for="password" class="block mb-1">Password:</label>
                        <input type="password" id="password" name="password" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <input type="submit" value="Login" class="w-full bg-gray-800 text-white py-2 rounded cursor-pointer hover:bg-gray-700">
                    </div>
                </form>

                <?php if (isset($error_message)) : ?>
                    <p class="text-red-500 mt-4"><?php echo $error_message; ?></p>
                <?php endif; ?>
                
                <p class="mt-4 text-center">New user? <a href="newuser.html" class="text-blue-500 hover:underline">Register here</a></p>
            </div>
        </div>
    </div>

    <footer class="bg-gray-800 text-white text-center py-4 mt-8">
        &copy; kvn student developed <span> designer </span> | all rights reserved!
    </footer>
</body>
</html>