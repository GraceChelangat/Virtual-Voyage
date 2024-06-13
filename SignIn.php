<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="icon" type="image/x-icon" href="Images/Background 1.jpg">
</head>
<body style="background-image: url(Images/Background\ 1.jpg); background-size: cover;">
<?php include_once("Template/nav.php");?>

    <section id="signin">
        <h2>Sign In</h2>
        <form action="/submit_signin" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label>
                <input type="checkbox" name="terms" required>
                I agree to the <a href="terms.html">Terms and Conditions</a>
            </label>

            <button type="submit">Sign In</button>
        </form>
        <p class="account-info">Don't have an account? <a href="SignUp.html">Sign Up</a></p>
    </section>

    <?php include_once("Template/footer.php")?>

    <script>
        document.getElementById('signin-form').addEventListener('submit', function(event) {
            // Get form inputs
            var emailInput = document.getElementById('email');
            var passwordInput = document.getElementById('password');
            var termsCheckbox = document.querySelector('input[name="terms"]');

            // Validate email address structure
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(emailInput.value)) {
                alert('Please enter a valid email address.');
                event.preventDefault();
                return;
            }

            // Validate password length
            if (passwordInput.value.length < 8) {
                alert('Password must be at least 8 characters long.');
                event.preventDefault();
                return;
            }

            // Validate terms checkbox
            if (!termsCheckbox.checked) {
                alert('Please agree to the Terms and Conditions.');
                event.preventDefault();
                return;
            }
        });
    </script>
            

