<?php
// feedback.php

// Initialize variables
$success_message = '';
$error_message = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $rating = filter_var(trim($_POST['rating']), FILTER_SANITIZE_NUMBER_INT);
    $comments = filter_var(trim($_POST['comments']), FILTER_SANITIZE_STRING);

    // Validate input
    if (empty($rating)) {
        $error_message = 'Please provide a rating.';
    } else {
        // Here you would typically save the feedback to a database
        // For demonstration, we'll just simulate success
        $success_message = "Thank you for your feedback! Your rating of $rating has been recorded.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Feedback.css"> <!-- External CSS file -->
    <title>Feedback Form</title>
</head>
<body>
    <h1>Feedback Form</h1>

    <?php if ($error_message): ?>
        <div class="message"><?php echo $error_message; ?></div>
    <?php endif; ?>

    <?php if ($success_message): ?>
        <div class="message success"><?php echo $success_message; ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <select name="rating" required>
            <option value="">Rate Your Experience</option>
            <option value="1">1 - Very Poor</option>
            <option value="2">2 - Poor</option>
            <option value="3">3 - Average</option>
            <option value="4">4 - Good</option>
            <option value="5">5 - Excellent</option>
        </select>
        <textarea name="comments" placeholder="Additional Comments (optional)"></textarea>
        <button type="submit">Submit Feedback</button>
        <a class="btn" href="indexx.html">Back to Home</a>
    </form>
</body>
</html>
