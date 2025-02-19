<?php
session_start();
require 'db.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'login') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the user exists
    $query = "SELECT * FROM users WHERE email = $1";
    $result = pg_query_params($conn, $query, array($email));

    if (pg_num_rows($result) > 0) {
        $row = pg_fetch_assoc($result);

        // Verify the password
        if (password_verify($password, $row['password'])) {
            $_SESSION['email'] = $email;
            header("Location: request_delivery.php");
            exit;
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "User not found";
    }

    pg_free_result($result);
}

pg_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuelivery - Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="content">
        <header>
            <div class="logo-container">
                <img src="logo_final.png" alt="Fuelivery Logo">
            </div>
            <div class="text-container">
                <h1>Fuelivery</h1>
                <p>Fuel, just a tap away.</p>
            </div>
        </header>
        <div class="form-container">
            <form action="login.php" method="POST" autocomplete="off">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" required>

                <label for="password">Password</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" required autocomplete="new-password">
                    <i id="eye" class="fa fa-eye"></i>
                </div>
                
                <button class="submit-btn" type="submit" name="action" value="login">Log In</button>
            </form>
            <p>Don't have an account? <a href="register.php">Register here</a></p>
            <p><a href="forgot_password.php">Forgot your password?</a></p>
        </div>
        <footer>
            <p>&copy; 2025 Fuelivery. All rights reserved.</p>
            <a href="privacy-policy.php">Privacy Policy</a> | <a href="terms-of-service.php">Terms of Service</a>
        </footer>
    </div>
    <script src="script.js"></script>
</body>
</html>
