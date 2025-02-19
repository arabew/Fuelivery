<?php
// Start the session
session_start();

// Supabase connection details
$host = "db.bshabouwkhvwxbqnsdwk.supabase.co";
$dbname = "postgres";
$user = "postgres";
$password = "[YOUR-PASSWORD]";
$port = "5432";

// Connect to Supabase (PostgreSQL)
$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password port=$port");

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

// Handle login request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'login') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Retrieve the user record using prepared statements
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
    <title>Fuelivery | Log In</title>
   <link rel="stylesheet" href="login.css"> <!-- Link your CSS file -->
</head>
<body>
    <div class="login-container">
        <h2>Login to Fuelivery</h2>
        <form action="login.php" method="POST">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Log In</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        <p><a href="forgot_password.php">Forgot Password?</a></p>
    </div>
</body>
</html>
