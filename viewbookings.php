<body style="background-image: url('Images/Background 1.jpg'); background-size: cover;">
                <?php
                    include_once("Template/header.php");
                    include_once("Template/nav.php");
                ?>
                
                <section id="bookings">
                    <div class="header">
                        <h1>Bookings</h1>
                    </div>
                        
                    <div class="Booking-table">
                        <p>View your bookings below ensure your dates don't collide!! Happy touring! </p>
                        <table class="Booking-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Destination</th>
                                    <th>Package</th>
                                    <th>Additional Details</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

        

            <?php
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
                if(isset($_GET["DelId"])){
                    $DelId = mysqli_real_escape_string($conn, $_GET["DelId"]);
                    
                    // sql to delete a record
                    $del_msg = "DELETE FROM `book_tours` WHERE id='$DelId' LIMIT 1";
                    
                    if ($conn->query($del_msg) === TRUE) {
                        header("Location: viewbookings.php");
                        exit();
                    } else {
                    echo "Error deleting record: " . $conn->error;
                    }
                }

              
                
                ?>
                <?php
                                $select_msg = "SELECT * FROM `book_tours` ORDER BY id DESC";
                                $sel_msg_res = $conn->query($select_msg);
                                $cm = 0;
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
                                            <td><?php print $sel_msg_row["date"]; ?></td>
                                            <td>[ <a href="edit_booking.php?EditId=<?php print $sel_msg_row["id"]; ?>">Edit</a> ] [ <a href="?DelId=<?php print $sel_msg_row["id"]; ?>">Del</a> ]</td>
                                        </tr>
                            <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='7'>0 results</td></tr>";
                                }
                                $conn->close();
                            ?>
                            </tbody>
                        </table>
                    </div>
                </section>

                <?php
                include_once("Template/footer.php");
                ?>
            </body>
                