<body style="background-image: url(Images/Background\ 1.jpg); background-size: cover;">
<?php
require_once("includes/db_connect.php");
include_once("Template/header.php");
include_once("Template/nav.php");

// Initialize message variable
$signup_message = "";

// Connect to database
$servername = "localhost";
$username = "root"; // Replace with your actual credentials
$password = ""; // Replace with your actual password
$dbname = "VirtualVoyage"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Your form handling code here
    // Prepare to fetch user info and insert into database
    $stmt = $conn->prepare("INSERT INTO Book_Tours (name, email, destination, details, additional_details, date) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $email, $destination, $details, $additional_details, $date);
    
    // Set parameters and execute
    $name = $_POST['name'];
    $email = $_POST['email'];
    $destination = $_POST['destination'];
    $details = isset($_POST['details']) ? implode(", ", $_POST['details']) : '';
    $additional_details = $_POST['additional_details'];
    $date = $_POST['date'];
    
    $stmt->execute();

    // Close statement and connection
    $stmt->close();
    $conn->close();

    // Provide feedback to the user
    echo "<p>Thank you! Your booking has been submitted successfully!</p>";
}

    $EditId = mysqli_real_escape_string($conn, $_GET["EditId"]);

    $spot_edit = "SELECT * FROM `book_tours` WHERE id = '$EditId' LIMIT 1";
    $spot_edit_result = $conn->query($spot_edit);
    $spot_edit_row = $spot_edit_result->fetch_assoc();


if (isset($_POST["update_booking"])) {
    $name = mysqli_real_escape_string($conn,addslashes ($_POST["name"]));
    $email = mysqli_real_escape_string($conn,addslashes ( $_POST["email"]));
    $destination = mysqli_real_escape_string($conn,addslashes ( $_POST["destination"]));
    $details = mysqli_real_escape_string($conn,addslashes ( $_POST["details"]));
    $additional_details = mysqli_real_escape_string($conn,addslashes ( $_POST["additional_details"]));
    $date = mysqli_real_escape_string($conn,addslashes ( $_POST["date"]));

    $update_booking = "UPDATE book_tours SET sender_name = '$name', sender_email = '$email', destination = '$destination', details = '$details', additional_details = '$additional_details' WHERE id='$EditId' LIMIT 1";
  
    if ($conn->query($update_booking) === TRUE) {
        header("Location: viewbookings.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } 
}
$conn->close();
?>

<section id="capture-details">
    <h2>Book your Virtual Tour today<br> Edit your tour!</h2>
    <form action="edit_booking.php?id=<?php echo $EditId; ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $spot_msg_row['name']; ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $spot_msg_row['email']; ?>" required>

        <label for="destination">Destination:</label>
        <input type="text" id="destination" name="destination" value="<?php echo $spot_msg_row['destination']; ?>" required>

        <label for="details">Select the package that you would like:</label>
        <label for="details1">
            <input type="checkbox" id="details1" name="details[]" value="Single Tour" <?php echo (strpos($spot_msg_row['details'], 'Single Tour') !== false) ? 'checked' : ''; ?>>
            Single Tour - $10
        </label>
        <br>
        <label for="details2">
            <input type="checkbox" id="details2" name="details[]" value="Explorer Package" <?php echo (strpos($spot_msg_row['details'], 'Explorer Package') !== false) ? 'checked' : ''; ?>>
            Explorer Package - $45
        </label>
        <br>
        <label for="details3">
            <input type="checkbox" id="details3" name="details[]" value="Adventurer Package" <?php echo (strpos($spot_msg_row['details'], 'Adventurer Package') !== false) ? 'checked' : ''; ?>>
            Adventurer Package - $80
        </label>
        <br>
        <label for="details4">
            <input type="checkbox" id="details4" name="details[]" value="Ultimate Package" <?php echo (strpos($spot_msg_row['details'], 'Ultimate Package') !== false) ? 'checked' : ''; ?>>
            Ultimate Package - $150
        </label>

        <br>
        <label for="date">Select the date of your tour:</label>
        <input type="date" id="date" name="date" value="<?php echo $spot_msg_row['date']; ?>" required>

        <br>
        <textarea id="additional_details" name="additional_details" rows="4" placeholder="Additional details"><?php echo $spot_msg_row['additional_details']; ?></textarea>
        <br>

        <button type="submit" name="update_booking">Update Booking</button>
    </form>
</section>

<?php include_once("Template/footer.php"); ?>
