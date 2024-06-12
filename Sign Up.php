<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="icon" type="image/x-icon" href="Images/Background 1.jpg">
</head>
<body style="background-image: url(Images/Background\ 1.jpg); background-size: cover;">
<?php include_once("Template/nav.php");?>
    <section id="signup">
        <h2>Sign Up</h2>
        <form action="/submit_signup" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm-password">Confirm Password:</label>
            <input type="password" id="confirm-password" name="confirm-password" required>

            <label>
                <input type="checkbox" name="terms" required>
                I agree to the <a href="terms.html">Terms and Conditions</a>
            </label>

            <button type="submit">Sign Up</button>
        </form>
        <p class="account-info">Already have an account? <a href="SignIn.html">Sign In</a></p>
    </section>

    <footer>
        <p>&copy; 2024 Virtual Voyage. All rights reserved.</p>
        <p>Email us at virtualvoyage@gmail.com</p>
    </footer>
</body>
</html>