<body style="background-image: url(Images/Background\ 1.jpg); background-size: cover;">
<?php
require_once("includes/db_connect.php");
include_once("Template/header.php");
include_once("Template/nav.php");

$signup_message = ""; // Initialize message variable

// Checks if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to database
    $servername = "localhost";
    $username = "root"; // Replace with your actual credentials
    $password = ""; // Replace with your actual password
    $dbname = "VirtualVoyage"; // Replace with your database name

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " + mysqli_connect_error());
    }

    // Set parameters (**WARNING: Storing passwords in plain text is a SERIOUS security risk!**)
    $name = $_POST['name']; // **UNSAFE** - User input directly inserted into query
    $email = $_POST['email']; // **UNSAFE** - User input directly inserted into query
    $password = $_POST['password']; // **UNSAFE** - Password stored in plain text!
    $confirm_password = $_POST['confirm_password'];
    $agreed_terms = isset($_POST['terms']) ? 1 : 0; // If checkbox is checked, set to 1; otherwise, set to 0

    // Validate user input (optional, but recommended)
    if (empty($name)) {
        $signup_message = "Please enter your name.";
    } elseif (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $signup_message = "Please enter a valid email address.";
    } elseif (empty($password) || $password !== $confirm_password) {
        $signup_message = "Passwords don't match or are empty.";
    } elseif (!isset($_POST['terms'])) {
        $signup_message = "Please agree to the terms and conditions.";
    } else {
        // **WARNING: Storing passwords in plain text is a SERIOUS security risk!**
        $sql = "INSERT INTO users(name, email, password, agreed_terms) VALUES ('$name', '$email', '$password', '$agreed_terms')";

        if (mysqli_query($conn, $sql)) {
            $signup_message = "Thank you for signing up! You can now log in.";
        } else {
            $signup_message = "ERROR: " . mysqli_error($conn);
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>

<section id="signup">
    <h2>Sign Up</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post"> <?php if (!empty($signup_message)) : ?>
            <div class="message"><?php echo $signup_message; ?></div>
        <?php endif; ?>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>

        <label>
            <input type="checkbox" name="terms" required>
            I agree to the <a href="terms.html">Terms and Conditions</a>
        </label>

        <button type="submit" name="send_message">Sign Up</button>
    </form>
    <p class="account-info">Already have an account? <a href="SignIn.html">Sign In</a></p>
</section>

<?php include_once("Template/footer.php"); ?>
