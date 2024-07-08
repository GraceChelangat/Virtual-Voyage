<body style="background-image: url(Images/Background\ 1.jpg); background-size: cover;">
<?php
require_once("includes/db_connect.php");
include_once("Template/header.php");
include_once("Template/nav.php");

$login_error = ""; // Initialize login error message

// Process form submission if method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password_input = $_POST["password"];


    // Prepare SQL query to select user based on email
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if user exists in the database
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Verify password using password_verify()
            if (password_verify($password_input, $user["password"])) {
                // Successful login - redirect to index page
                header("Location: index.php");
                exit();
            } else {
                $login_error = "Invalid email or password.";
            }
        } else {
            $login_error = "You don't have an account. Please <a href='SignUp.php'>Sign Up</a>.";
        }

        // Close the statement
        $stmt->close();
    } else {
        $login_error = "Database error: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>

<section id="signin">
    <h2>Sign In</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <?php if (!empty($login_error)) : ?>
            <div class="message"><?php echo $login_error; ?></div>
        <?php endif; ?>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Sign In</button>
    </form>
    <p class="account-info">Don't have an account? <a href="SignUp.php">Sign Up</a></p>
</section>

<?php include_once("Template/footer.php"); ?>
        </body>