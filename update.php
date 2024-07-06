<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "VirtualVoyage";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $destination = $_POST['destination'];
    $details = isset($_POST['details']) ? implode(", ", $_POST['details']) : '';
    $additional_details = $_POST['additional_details'];
    $date = $_POST['date'];

    $stmt = $conn->prepare("UPDATE Book_Tours SET name=?, email=?, destination=?, details=?, additional_details=?, date=? WHERE id=?");
    $stmt->bind_param("ssssssi", $name, $email, $destination, $details, $additional_details, $date, $id);
    $stmt->execute();

    $stmt->close();

    // Redirect to View_Bookings.php after updating with success message
    header("Location: View_Bookings.php?message=Booking%20updated%20successfully");
    exit();
} else {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM Book_Tours WHERE id=$id");
    $row = $result->fetch_assoc();
?>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>

        <label for="destination">Destination:</label>
        <input type="text" id="destination" name="destination" value="<?php echo $row['destination']; ?>" required>

        <label for="details">Select the package that you would like :</label>
        <?php 
        $details = explode(", ", $row['details']);
        $packages = ["Single Tour", "Explorer Package", "Adventurer Package", "Ultimate Package"];
        foreach ($packages as $package) {
            echo '<label for="details"><input type="checkbox" name="details[]" value="'.$package.'"'.(in_array($package, $details) ? ' checked' : '').'>'.$package.'</label><br>';
        }
        ?>

        <label for="date">Select the date of your tour:</label>
        <input type="date" id="date" name="date" value="<?php echo $row['date']; ?>" required>

        <textarea id="additional_details" name="additional_details" rows="4" placeholder="Additional details"><?php echo $row['additional_details']; ?></textarea>
        
        <button type="submit">Update</button>
    </form>
<?php
}

// Close connection
$conn->close();
?>
