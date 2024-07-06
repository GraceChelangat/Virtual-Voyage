<style>
table {
            width: 100%;
            border-collapse: collapse;
            margin: 50px 0;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        a {
            color: #333;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
    <body style="background-image: url(Images/Background\ 1.jpg); background-size: cover;">
<?php

 include_once("Template/header.php");
 include_once("Template/nav.php");

 // Check for success message
 if (isset($_GET['message'])) {
     echo '<p>' . htmlspecialchars($_GET['message']) . '</p>';
 }
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

// Fetch all bookings
$sql = "SELECT id, name, email, destination, details, additional_details, date FROM Book_Tours";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Destination</th>
                <th>Details</th>
                <th>Additional Details</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>";
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['destination']}</td>
                <td>{$row['details']}</td>
                <td>{$row['additional_details']}</td>
                <td>{$row['date']}</td>
                <td>
                    <a href='update.php?id={$row['id']}'>Update</a> |
                    <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this booking?\")'>Delete</a>
                </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
