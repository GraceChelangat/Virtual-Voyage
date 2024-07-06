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

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM Book_Tours WHERE id=?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        // Redirect to View_Bookings.php after deletion with success message
        header("Location: View_Bookings.php?message=Booking%20deleted%20successfully");
        exit();
    } else {
        echo "Error deleting booking: " . $conn->error;
    }
} else {
    echo "No booking ID specified.";
}

$conn->close();
?>
