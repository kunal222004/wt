<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the JSON data from the request body
    $data = json_decode(file_get_contents("php://input"));

    // Check if the title is provided
    if (isset($data->title)) {
        // PostgreSQL connection parameters
        $host = "localhost";
        $port = "5432";
        $dbname = "your_database";
        $user = "username";
        $password = "password";

        // Connect to PostgreSQL database
        $conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . pg_last_error());
        }

        // Prepare SQL statement to delete data from the database
        $sql = "DELETE FROM courses WHERE title = $1";
        $stmt = pg_prepare($conn, "", $sql);

        // Bind parameters and execute the statement
        $result = pg_execute($conn, "", array($data->title));

        // Close the connection
        pg_close($conn);

        // Send a success response
        echo json_encode(array("message" => "Course removed successfully"));
    } else {
        // Send an error response if title is missing
        http_response_code(400); // Bad Request
        echo json_encode(array("error" => "Title is missing"));
    }
} else {
    // Send an error response if the request method is not POST
    http_response_code(405); // Method Not Allowed
    echo json_encode(array("error" => "Only POST requests are allowed"));
}
?>
