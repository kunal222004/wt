<?php
// Sample dynamic data
$teamMembers = [
    ['name' => 'Tejas thakare', 'role' => 'Front end'],
    ['name' => 'Niraj joshi', 'role' => 'Back end'],
    ['name' => 'Smitesh wagh', 'role' => 'Database'],
    // Add more team members as needed
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <style>
    /* Your existing CSS styles here */
    /* navigation bar */
    header {
        background-color: grey;
        color: #fff;
        text-align: center;
        padding: 1em;
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: rgb(89, 86, 86);
    }

    li {
        float: left;
    }

    li a {
        display: block;
        color: black;
        font-size: 20px;
        padding: 10px 20px;
        text-decoration: none;
    }

    li a:hover {
        background-color: white;
        color: black;
    }

    .active {
        background-color: orange;
        color: black;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    main {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 3px;
    }

    h1,
    h2 {
        color: #333;
    }

    p {
        line-height: 1.6;
        color: #555;
    }

    footer {
        text-align: center;
        padding: 10px;
        background-color: #333;
        color: #fff;
        position: fixed;
        bottom: 0;
        width: 100%;
    }
  </style>
</head>
<body>
  <header>
    <h1>About Us</h1>
    <ul>
        <li><a class="active" href="home1.html">Home</a></li>
        <li><a href="l.php">Login</a></li>
        <li><a href="newuser.html">New Registration</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="lout.php">Logout</a></li>
    </ul>
  </header>
  <br><br>
  <main>
    <h2>e-learning website</h2>
    <p>eLearning speeds up the process for learners who go at a quicker pace, saving time and resources for the ultimate in efficiency. eLearning can also allow learners to test out of material they've already learned, also saving time.</p>

    <h2>Created by college students</h2>
    <?php
    foreach ($teamMembers as $member) {
        echo "<p>{$member['name']} - {$member['role']}</p>";
    }
    ?>

    <h2>Contact Us</h2>
    <p>Email: tthakare67@gmail.com<br>Phone: (123) 456-7890</p>
  </main>

  <footer>
    &copy; kvn student developed <span>designer</span> | all rights reserved!
  </footer>
</body>
</html>

