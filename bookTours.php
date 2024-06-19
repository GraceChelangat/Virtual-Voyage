<?php
require_once("includes/db_connect.php");
include_once("Template/header.php");
include_once("Template/nav.php");

// Checks if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Prepare to fetch user info and insert into database
    $stmt = $conn->prepare("INSERT INTO Book_Tours (name, email, destination, details, additional_details) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $destination, $details, $additional_details);

    // Set parameters and execute
    $name = $_POST['name'];
    $email = $_POST['email'];
    $destination = $_POST['destination'];
    $details = isset($_POST['details']) ? implode(", ", $_POST['details']) : '';
    $additional_details = $_POST['additional_details'];
    
    $stmt->execute();

    // Close statement and connection
    $stmt->close();
    $conn->close();

    // Provide feedback to the user
    echo "<p>Thank you! Your message has been sent successfully!</p>";
}
?>

<section id="capture-details">
    <h2>Book your Virtual Tour today</h2>
    <form action="bookTours.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="destination">Destination:</label>
        <input type="text" id="destination" name="destination" required>

        <label for="details">Select the package that you would like :</label>
        <label for="details1">
            <input type="checkbox" id="details1" name="details[]" value="Single Tour">
            Single Tour - $10
        </label>
        <br>
        <label for="details2">
            <input type="checkbox" id="details2" name="details[]" value="Explorer Package">
            Explorer Package - $45
        </label>
        <br>
        <label for="details3">
            <input type="checkbox" id="details3" name="details[]" value="Adventurer Package">
            Adventurer Package - $80
        </label>
        <br>
        <label for="details4">
            <input type="checkbox" id="details4" name="details[]" value="Ultimate Package">
            Ultimate Package - $150
        </label>
        <br>
        <textarea id="additional_details" name="additional_details" rows="4" placeholder="Additional details"></textarea>
        <br>

        <button type="submit" name="send_message">Submit</button>
    </form>
</section>

<?php include_once("Template/footer.php"); ?>
