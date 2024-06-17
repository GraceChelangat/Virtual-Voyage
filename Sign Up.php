<?php require_once("includes/db_connect.php");?>
<?php include_once("Template/header.php");?>
<body style="background-image: url(Images/Background\ 1.jpg); background-size: cover;">
<?php include_once("Template/nav.php");?>

<?php
    require_once("includes/db_connect.php");
    include_once("Template/header.php");
    include_once("Template/nav.php");

    if(isset($_POST["send_message"])){
        $name = mysqli_real_escape_string($conn, addslashes($_POST["name"]));
        $email = mysqli_real_escape_string($conn, addslashes($_POST["email"]));
        $password = mysqli_real_escape_string($conn, addslashes($_POST["password"]));
        $confirm_password = mysqli_real_escape_string($conn, addslashes($_POST["confirm_password"]));

        $insert_details = "INSERT INTO users (name, email, password, confirm_password) VALUES ('$name', '$email', '$password', '$confirm_password')";

        if ($conn->query($insert_details) === TRUE) {
            header("Location: Sign Up.php");
            exit();
        } else {
            echo "Error: " . $insert_details . "<br>" . $conn->error;
        }
    }
?>




    <section id="signup">
        <h2>Sign Up</h2>
        <form action="/submit_signup" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm-password" required>

            <label>
                <input type="checkbox" name="terms" required>
                I agree to the <a href="terms.html">Terms and Conditions</a>
            </label>

            <button type="submit">Sign Up</button>
        </form>
        <p class="account-info">Already have an account? <a href="SignIn.html">Sign In</a></p>
    </section>

    <?php include_once("Template/footer.php")?>

