<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="icon" type="image/x-icon" href="Images/Background 1.jpg">
</head>
<body style="background-image: url(Images/Background\ 1.jpg); background-size: cover;">
<?php include_once("Template/nav.php");?>
    <section id="capture-details">
        <h2>Capture Goods or Service Details</h2>
        <form action="submit.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

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

    <footer>
        <p>&copy; 2024 Virtual Voyage. All rights reserved.</p>
        <p>Email us at virtualvoyage@gmail.com</p>
    </footer>
</body>
</html>