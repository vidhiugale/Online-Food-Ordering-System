<?php
session_start();

// Redirect if user not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Payment Page</title>
    <link rel="stylesheet" href="payment.css"> <!-- Link to your CSS file -->
</head>
<body>

<h2>Choose Your Payment Method</h2>

<form action="process_payment.php" method="post">
    
    <label>
        <input type="radio" name="payment_method" value="upi" required> Pay with UPI
    </label><br>

    <label>
        <input type="radio" name="payment_method" value="cod" required> Cash on Delivery
    </label><br><br>


    <!-- UPI Field -->
    <div>
        <h4>UPI ID (if selected)</h4>
        UPI ID: <input type="text" name="upi_id"><br><br>
    </div>

    <button type="submit" name="pay">Proceed to Pay</button>
</form>

<p><a href="cartt.php">Back to Cart</a></p>

</body>
</html>
