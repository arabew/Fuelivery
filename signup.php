<?php
require 'db.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password for security

    // Insert user into the database
    $query = "INSERT INTO users (email, password) VALUES ($1, $2)";
    $result = pg_query_params($conn, $query, array($email, $password));

    if ($result) {
        echo "Registration successful! <a href='login.php'>Log in here</a>";
    } else {
        echo "Error: " . pg_last_error($conn);
    }

    pg_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Fuelivery</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Register</h2>
    <form action="register.php" method="POST">
        <label>Email:</label>
        <input type="email" name="email" required>
        
        <label>Password:</label>
        <input type="password" name="password" required>
        
        <button type="submit">Register</button>
    </form>
</body>
</html>
