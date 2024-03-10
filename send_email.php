<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Email configuration
    $to = "admin@lagosnight.co.uk";  // Replace with your email address
    $headers = "From: $email\r\nReply-To: $email\r\n";
    $messageBody = "Name: $name\nEmail: $email\nSubject: $subject\nMessage:\n$message";

    // Send email
    $mailSuccess = mail($to, $subject, $messageBody, $headers);

    if ($mailSuccess) {
        header("Location: contact.php?status=success&message=Email sent successfully! ");
        exit;
    } else {
        header("Location: contact.php?status=error&message= Please try again later.");
         exit;
    }
} else {
    // If someone tries to access this script directly, redirect them to the form
    header("Location: contact.php");
    exit();
}
?>
