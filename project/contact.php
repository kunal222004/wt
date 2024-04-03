<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // For demonstration purposes, we'll just print the data. In a real application, you would send an email and store the data in a database.
    echo "Message received!<br>";
    echo "Name: $name<br>";
    echo "Email: $email<br>";
    echo "Message: $message<br>";

    // Send an email using Gmail SMTP server
    $to = 'user@gmail.com';
    $subject = 'New Contact Form Submission';
    $body = "Name: $name\nEmail: $email\nMessage: $message";

    // Gmail SMTP server configuration
    $smtpHost = 'smtp.gmail.com';   
    $smtpPort = 587;
    $smtpUsername = 'your@gmail.com';
    $smtpPassword = 'your_password';

    // PHPMailer library for sending emails via SMTP
    require 'PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;

    // Enable SMTP debugging
    // $mail->SMTPDebug = 3;

    // Set up SMTP
    $mail->isSMTP();
    $mail->Host = $smtpHost;
    $mail->Port = $smtpPort;
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUsername;
    $mail->Password = $smtpPassword;

    // Set email headers
    $mail->setFrom($email, $name);
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->Body = $body;

    // Send email
    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}
?>
