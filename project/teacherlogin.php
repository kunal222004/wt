<?php
// Start session
session_start();

// Connect to PostgreSQL database
$dbconn = pg_connect("host=localhost dbname=your_database user=your_username password=your_password");

if (!$dbconn) {
    die("Error connecting to PostgreSQL database.");
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if both username and password are provided
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Retrieve username and password from the form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Query the database for the username
        $query = "SELECT username, password_hash FROM teachers WHERE username = $1";
        $result = pg_query_params($dbconn, $query, array($username));

        if ($result) {
            $row = pg_fetch_assoc($result);
            if ($row) {
                // Verify password
                if (password_verify($password, $row['password_hash'])) {
                    // Authentication successful
                    $_SESSION['username'] = $username;
                    header("Location: dashboard.php"); // Redirect to the teacher's dashboard
                    exit();
                } else {
                    // Authentication failed
                    $error = "Invalid username or password";
                }
            } else {
                // Username not found
                $error = "Invalid username or password";
            }
        } else {
            // Query execution failed
            $error = "An error occurred. Please try again later.";
        }
    } else {
        // If username or password is not provided
        $error = "Please provide both username and password";
    }
}

// Close database connection
pg_close($dbconn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Teacher Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
            <?php if(isset($error)) { ?>
                <div class="error"><?php echo $error; ?></div>
            <?php } ?>
        </form>
    </div>
</body>
</html>
