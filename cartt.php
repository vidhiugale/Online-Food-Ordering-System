<?php
session_start();

// Check if user is logged in

// Initialize cart
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart</title>
    <link rel="stylesheet" href="cart1.css"> <!-- Optional CSS file -->
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        .cart-container {
            max-width: 800px;
            margin: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }
        .btn {
            padding: 10px 15px;
            margin: 5px;
            text-decoration: none;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .empty {
            text-align: center;
            font-size: 18px;
            margin: 30px 0;
        }
        .user-info {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<h2>🛒 Your Cart</h2>
<div class="cart-container">
    <?php if (empty($cart)) : ?>
        <div class="empty">Your cart is empty!</div>
    <?php else : ?>
        <table>
            <tr>
                <th>Item</th>
                <th>Price (₹)</th>
                <th>Quantity</th>
                <th>Subtotal (₹)</th>
                <th>Action</th>
            </tr>
            <?php foreach ($cart as $index => $item) : 
                $subtotal = $item['price'] * $item['quantity'];
                $total += $subtotal;
            ?>
                <tr>
                    <td><?= htmlspecialchars($item['name']) ?></td>
                    <td><?= number_format($item['price'], 2) ?></td>
                    <td><?= $item['quantity'] ?></td>
                    <td><?= number_format($subtotal, 2) ?></td>
                    <td>
                        <!-- Remove item from cart -->
                        <form action="remove_from_cart.php" method="POST" style="display:inline;">
                            <input type="hidden" name="index" value="<?= $index ?>">
                            <button class="btn btn-danger" type="submit">Remove</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <th colspan="3">Total</th>
                <th colspan="2">₹<?= number_format($total, 2) ?></th>
            </tr>
        </table>

        <!-- User info display if logged in -->
        
        <?php endif; ?>

        <!-- Navigation buttons -->
        <a class="btn" href="Menu.php">⬅️ Back to Menu</a>
        <a class="btn" href="payment.php">✅ Proceed to Pay</a>
        <a class="btn" href="login.php">🔐 Proceed to Login</a>
            
  
</div>

</body>
</html>
