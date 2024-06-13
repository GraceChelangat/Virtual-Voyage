<?php include_once("Template/header.php");?>
<body style="background-image: url(Images/Background\ 1.jpg); background-size: cover;">
<?php include_once("Template/nav.php");?>
    <section id="capture-details">
        <h2>Book your Virtual Tour today</h2>
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

    <?php include_once("Template/footer.php")?>

