<body style="background-image: url(Images/Background\ 1.jpg); background-size: cover;">
<?php
    require_once("includes/db_connect.php");
    include_once("Template/header.php");
    include_once("Template/nav.php");

    ?>
<section id="bookings">
<div class="header">
    <h1>Bookings</h1>
</div>
        
<div class="row">
    <div class="content">

    <h1>Messages</h1>
    <p>Lorem ipsum dolor sit amet, laborum</p>
    <table>
        <thead>
            <tr>
                <th colspan="2">Full Name</th>
                <th>Email</th>
                <th>Destination</th>
                <th>Package</th>
                <th>Additional Details</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>

        </section>
<?php
$signup_message = ""; // Initialize message variable

// Checks if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to database
    $servername = "localhost";
    $username = "root"; // Replace with your actual credentials
    $password = ""; // Replace with your actual password
    $dbname = "VirtualVoyage"; // Replace with your database name

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " + mysqli_connect_error());
    }
}

$select_msg = "SELECT * FROM `book_tours` ORDER BY id DESC";
$sel_msg_res = $conn->query($select_msg);
$cm=0;
if ($sel_msg_res->num_rows > 0) {
  // output data of each row
  while($sel_msg_row = $sel_msg_res->fetch_assoc()) {
    $cm++;
?>
        <tr>
            <td><?php print $cm; ?>.</td>
            <td><?php print $sel_msg_row["name"]; ?></td>
            <td><?php print $sel_msg_row["email"]; ?></td>
            <td><?php print $sel_msg_row["destination"]; ?></td>
            <td><?php print $sel_msg_row["details"]; ?></td>
            <td><?php print $sel_msg_row["additional_details"]; ?></td>
        </tr>
<?php
  }
} else {
  echo "0 results";
}
?>     
<?php include_once("Template/footer.php");?>