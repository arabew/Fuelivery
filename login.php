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
