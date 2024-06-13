<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="icon" type="image/x-icon" href="Images/Background 1.jpg">
    <title>Packages and Pricing</title>
</head>
<body style="background-image: url(Images/Background\ 1.jpg); background-size: cover;">
<?php include_once("Template/nav.php");?>

    <!-- Pricing & Packages Section -->
    <section id="pricing">
        <h2>Pricing & Packages</h2>
        <div class="pricing-structure">
            <p>Individual tour prices and tiered package options are available. Each package includes a set number of tours and bonus features.</p>
            <p>We offer educational discounts for schools and students and corporate customization options.</p>
            <table class="pricing-table">
                <thead>
                    <tr>
                        <th>Package</th>
                        <th>Price</th>
                        <th>Included Tours</th>
                        <th>Bonus Features</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Single Tour</td>
                        <td>$10</td>
                        <td>1</td>
                        <td>None</td>
                    </tr>
                    <tr>
                        <td>Explorer Package</td>
                        <td>$45</td>
                        <td>5</td>
                        <td>Exclusive Content</td>
                    </tr>
                    <tr>
                        <td>Adventurer Package</td>
                        <td>$80</td>
                        <td>10</td>
                        <td>Exclusive Content, VR Support</td>
                    </tr>
                    <tr>
                        <td>Ultimate Package</td>
                        <td>$150</td>
                        <td>Unlimited</td>
                        <td>All Features</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

            <!-- Footer -->
            <?php include_once("Template/footer.php")?>
