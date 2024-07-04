<?php
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

?>