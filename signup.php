<?php
// Start session to store error messages
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuelivery | Sign Up</title>
    <link rel="stylesheet" href="signup.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="form-container">
        <form action="process_signup.php" method="POST" class="form">
            <h2 class="title">Create an Account</h2>
            
            <!-- Display any error messages -->
            <?php if(isset($_SESSION['error'])): ?>
                <p class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
            <?php endif; ?>

            <label>
                <input type="text" name="fullname" class="input" required>
                <span>Full Name</span>
            </label>

            <label>
                <input type="email" name="email" class="input" required>
                <span>Email Address</span>
            </label>

            <label>
                <input type="password" name="password" class="input" required>
                <span>Password</span>
            </label>

            <label>
                <input type="password" name="confirm_password" class="input" required>
                <span>Confirm Password</span>
            </label>

            <button type="submit" class="submit">Sign Up</button>

            <p class="signin">Already have an account? <a href="login.php">Log in</a></p>
        </form>
    </div>
</body>
</html>
