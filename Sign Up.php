<?php include_once("Template/header.php");?>
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

    <?php include_once("Template/footer.php")?>

