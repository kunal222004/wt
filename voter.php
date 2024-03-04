<?php
// Check if the request is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize input data
    $name = strtoupper($_POST["name"]);
    $age = $_POST["age"];
    $nationality = strtoupper($_POST["nationality"]);

    // Perform additional server-side validation
    if ($name === "" || $age === "" || $nationality === "") {
        echo "All fields are required";
        exit();
    }
    if (!ctype_alpha($name)) {
        echo "Name should be in uppercase letters only";
        exit();
    }
    if (!is_numeric($age) || $age < 18) {
        echo "Age should be a number and at least 18";
        exit();
    }
    if ($nationality !== "INDIAN") {
        echo "Nationality should be Indian";
        exit();
    }
    else{
        echo "you can vote";
        exit();
    }
    // If all validations pass, perform database

}