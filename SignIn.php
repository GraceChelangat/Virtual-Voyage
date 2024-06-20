<?php include_once("Template/header.php");?>
<body style="background-image: url(Images/Background\ 1.jpg); background-size: cover;">
<?php include_once("Template/nav.php");?>


<?php
//Initialize variables and error message
$email = "";
$password = "";
$login_error = "";

// Process form submission if method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
// Connect to database
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "virtualvoyage"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

// Prepare SQL query to select user based on email
$sql = "SELECT * FROM users WHERE email = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email); 
$stmt->execute();
$result = $stmt->get_result();
// Check if user exists in the database
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    // Verify password using password_verify()
    if (password_verify($password, $user["password"])) {
      // Successful login - redirect to index page 
      header("Location: index.php");
      exit();
    } else {
      $login_error = "Invalid email or password.";
    }
  } else {
    $login_error = "Invalid email or password.";
  }
  }

  ?>
    <section id="signin">
        <h2>Sign In</h2>
        <form action="index.php" method="post">
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
            

