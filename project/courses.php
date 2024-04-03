<?php


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Database connection parameters
$host = "localhost";
$dbname = "your_database_name";
$username = "your_username";
$password = "your_password";

// Connect to PostgreSQL
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

// Function to fetch all courses from the database
function getCourses($pdo) {
    $stmt = $pdo->query("SELECT * FROM courses");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to add a new course to the database
function addCourse($pdo, $title, $video_url) {
    $stmt = $pdo->prepare("INSERT INTO courses (title, video_url) VALUES (?, ?)");
    $stmt->execute([$title, $video_url]);
}

// Function to update a course in the database
function updateCourse($pdo, $id, $title) {
    $stmt = $pdo->prepare("UPDATE courses SET title = ? WHERE id = ?");
    $stmt->execute([$title, $id]);
}

// Function to remove a course from the database
function removeCourse($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM courses WHERE id = ?");
    $stmt->execute([$id]);
}
?>
