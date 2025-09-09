<?php
session_start();

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'food_ordering';
$port = 3307;

$conn = new mysqli($host, $username, $password, $database, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Show error if set
if (isset($_SESSION['error'])) {
    echo "<p style='color:red; text-align:center;'>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();

        if (password_verify($pass, $hashed_password)) {
            // Login successful
            $_SESSION['username'] = $user;
            $_SESSION['user_id'] = $user_id;

            // Redirect based on previous intent
            if (isset($_SESSION['redirect_to_payment']) && $_SESSION['redirect_to_payment'] === true) {
                unset($_SESSION['redirect_to_payment']);
                header("Location: payment.php");
            } else {
                header("Location: Menu.php");
            }
            exit();
        } else {
            $_SESSION['error'] = "Invalid password.";
        }
    } else {
        $_SESSION['error'] = "User not found.";
    }

    $stmt->close();
    $conn->close();
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>
    <form action="login.php" method="POST">
        <h2>Login</h2>
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit" name="login">Login</button>
        <p>Don't have an account? <a href="signup.php">Sign Up Here</a></p>
        <p><a href="forgotpass.php">Forgot your password?</a></p>
    </form>
</body>
</html>
