<body style="background-image: url(Images/Background\ 1.jpg); background-size: cover;">
<?php
require_once("includes/db_connect.php");
include_once("Template/header.php");
include_once("Template/nav.php");

$signup_message = ""; // Initialize message variable

// Function to validate password
function validate_password($password) {
    $pattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/";
    return preg_match($pattern, $password);
}

// Process form submission if method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Set parameters
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $agreed_terms = isset($_POST['terms']) ? 1 : 0; // If checkbox is checked, set to 1; otherwise, set to 0

    // Validate user input (optional, but recommended)
    if (empty($name)) {
        $signup_message = "Please enter your name.";
    } elseif (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $signup_message = "Please enter a valid email address.";
    } elseif (!validate_password($password)) {
        $signup_message = "Password must be at least 8 characters long and include at least one capital letter, one small letter, one number, and one special character.";
    } elseif (empty($password) || $password !== $confirm_password) {
        $signup_message = "Passwords don't match or are empty.";
    } elseif (!isset($_POST['terms'])) {
        $signup_message = "Please agree to the terms and conditions.";
    } else {
        // Check if email already exists in the database
        $sql_check_email = "SELECT * FROM users WHERE email = ?";
        $stmt_check_email = $conn->prepare($sql_check_email);
        $stmt_check_email->bind_param("s", $email);
        $stmt_check_email->execute();
        $result_check_email = $stmt_check_email->get_result();

        if ($result_check_email->num_rows > 0) {
            $signup_message = "Email already exists. Please choose another email.";
        } else {
            // Insert new user into database
            $sql_insert_user = "INSERT INTO users (name, email, password, agreed_terms) VALUES (?, ?, ?, ?)";
            $stmt_insert_user = $conn->prepare($sql_insert_user);
            $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password

            $stmt_insert_user->bind_param("sssi", $name, $email, $hashed_password, $agreed_terms);
            if ($stmt_insert_user->execute()) {
                // Redirect to index page with the name parameter
                header("Location: index.php?welcome_message=" . urlencode("Welcome, $name!"));
                exit();
            } else {
                $signup_message = "ERROR: " . $conn->error;
            }
            // Close statement for insertion
            $stmt_insert_user->close();
        }
        // Close statement for email check
        $stmt_check_email->close();
    }

    // Close connection
    $conn->close();
}
?>

<section id="signup">
    <h2>Sign Up</h2>
    <?php if (!empty($signup_message)) : ?>
        <div class="message"><?php echo $signup_message; ?></div>
    <?php endif; ?>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
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
    <p class="account-info">Already have an account? <a href="SignIn.php">Sign In</a></p>
</section>

<?php include_once("Template/footer.php"); ?>
    </body>
