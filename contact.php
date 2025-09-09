<?php
session_start();

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Here you can add code to send the email or save the message to a database
    // For demonstration, we'll just display a success message
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Normally, you would send an email here
        echo "<script>alert('Thank you for your message, $name! We will get back to you soon.');</script>";
    } else {
        echo "<script>alert('Please fill in all fields.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="aboutContact.css"> <!-- Link to your CSS file -->
</head>
<body>

<div class="container">
    <h2>Contact Us</h2>
    <p>Have a question, suggestion, or just want to say hi? We'd love to hear from you!</p>

    <form action="contact.php" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email Address:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="message">Your Message:</label><br>
        <textarea id="message" name="message" rows="5" required></textarea><br><br>

        <button type="submit">Send Message</button>
    </form>

    <p>You can also reach us directly at: <strong>support@DeliciousEats.com</strong> or call us at <strong>+91 98765 43210</strong></p>

    <!-- Link back to the home page -->
    <p><a href="indexx.html">Back to Home</a></p>
</div>

</body>
</html>