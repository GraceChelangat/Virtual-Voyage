<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "VirtualVoyage";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    // If connection fails, output error and terminate script
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'id' parameter is set in GET request
if (isset($_GET['id'])) {
    // Retrieve 'id' value from GET request
    $id = $_GET['id'];

    // Prepare SQL statement to delete booking by 'id'
    $stmt = $conn->prepare("DELETE FROM Book_Tours WHERE id=?");
    $stmt->bind_param("i", $id); // Bind 'id' parameter as integer

    // Execute SQL statement
    if ($stmt->execute()) {
        $stmt->close(); // Close prepared statement
        $conn->close(); // Close database connection

        // Redirect to 'View_Bookings.php' after successful deletion with success message
        header("Location: View_Bookings.php?message=Booking%20deleted%20successfully");
        exit(); // Stop further script execution
    } else {
        // If deletion fails, output error message
        echo "Error deleting booking: " . $conn->error;
    }
} else {
    // If 'id' parameter is not set in GET request, indicate no booking ID specified
    echo "No booking ID specified.";
}

// Close database connection
$conn->close();
?>
