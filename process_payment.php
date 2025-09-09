<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pay'])) {
    $method = $_POST['payment_method'];
    $upi_id = $_POST['upi_id'] ?? '';

    // Example: Just basic validation
    if ($method == 'upi' && empty($upi_id)) {
        $_SESSION['error'] = "Please enter your UPI ID.";
        header("Location: payment.php");
        exit();
    }

    // Save payment info (if needed) or flag as success
    $_SESSION['payment_success'] = true;
    $_SESSION['payment_method'] = $method;
    $_SESSION['upi_id'] = $upi_id;

    // Redirect to checkout/success page
    header("Location: checkout.php");
    exit();
} else {
    header("Location: payment.php");
    exit();
}
