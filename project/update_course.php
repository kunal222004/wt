<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the JSON data from the request body
    $data = json_decode(file_get_contents("php://input"));

    // Check if both title and new_title are provided
    if (isset($data->title) && isset($data->new_title)) {
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

        // Prepare SQL statement to update data in the database
        $sql = "UPDATE courses SET title = $1 WHERE title = $2";
        $stmt = pg_prepare($conn, "", $sql);

        // Bind parameters and execute the statement
        $result = pg_execute($conn, "", array($data->new_title, $data->title));

        // Close the connection
        pg_close($conn);

        // Send a success response
        echo json_encode(array("message" => "Course updated successfully"));
    } else {
        // Send an error response if title or new_title is missing
        http_response_code(400); // Bad Request
        echo json_encode(array("error" => "Title or new title is missing"));
    }
} else {
    // Send an error response if the request method is not POST
    http_response_code(405); // Method Not Allowed
    echo json_encode(array("error" => "Only POST requests are allowed"));
}
?>
