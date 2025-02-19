<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Generate a reset token
    $token = bin2hex(random_bytes(50));

    // Store the token in the database (Create a 'password_resets' table)
    $query = "INSERT INTO password_resets (email, token) VALUES ($1, $2)";
    $result = pg_query_params($conn, $query, array($email, $token));

    if ($result) {
        $resetLink = "http://yourwebsite.com/reset_password.php?token=$token";

        // Send reset email (Requires mail server setup)
        mail($email, "Password Reset", "Click here to reset your password: $resetLink");

        echo "A password reset link has been sent to your email.";
    } else {
        echo "Error: " . pg_last_error($conn);
    }

    pg_close($conn);
}
?>

<form action="forgot_password.php" method="POST">
    <label>Enter your email:</label>
    <input type="email" name="email" required>
    <button type="submit">Send Reset Link</button>
</form>
