<?php include_once("Template/header.php");?>
<body style="background-image: url(Images/Background\ 1.jpg); background-size: cover;">
<?php include_once("Template/nav.php");?>

<?php
    require_once("includes/db_connect.php");
    include_once("Template/header.php");
    include_once("Template/nav.php");

    if(isset($_POST["send_message"])){
        $name = mysqli_real_escape_string($conn, addslashes($_POST["name"]));
        $email = mysqli_real_escape_string($conn, addslashes($_POST["email"]));
        $details = mysqli_real_escape_string($conn, addslashes($_POST["details"]));

        $insert_details = "INSERT INTO book_tours (name, email, password) VALUES ('$name', '$email', '$details')";

        if ($conn->query($insert_details) === TRUE) {
            header("Location: bookTours.php");
            exit();
        } else {
            echo "Error: " . $insert_details . "<br>" . $conn->error;
        }
    }
?>

    <section id="capture-details">
        <h2>Book your Virtual Tour today</h2>
        <form action="submit.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="destination">Destination:</label>
            <input type="destination" id="destination" name="destination" required>

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
            <textarea id="additional-details" name="additional_details" rows="4" placeholder="Additional details"></textarea>
            <br>

            <button type="submit">Submit</button>
        </form>
    </section>

    <?php include_once("Template/footer.php")?>

