<?php
session_start();


if (!isset($_SESSION['payment_success']) || $_SESSION['payment_success'] !== true) {
    header("Location: payment.php");
    exit();
}

$method = $_SESSION['payment_method'];
$upi = $_SESSION['upi_id'] ?? '';

unset($_SESSION['cart']);
unset($_SESSION['payment_success']);
unset($_SESSION['payment_method']);
unset($_SESSION['upi_id']);
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="checkout.css">
<body>
    <div class="container">
        <h2>✅ Payment Successful!</h2>
        <p>Thank you for your order.</p>
        <p>Payment Method: <strong><?= htmlspecialchars($method) ?></strong></p>
        <?php if ($method == 'upi'): ?>
            <p>UPI ID used: <strong><?= htmlspecialchars($upi) ?></strong></p>
        <?php endif; ?>
        <a class="btn" href="Menu.php">⬅️ Back to Menu</a>
        <a class="btn" href="Feedback.php">✅ Provide Feedback Form</a>
    </div>
</body>


</body>
</html>
