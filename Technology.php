<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technology</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="icon" type="image/x-icon" href="Images/Background 1.jpg">
</head>
<body style="background-image: url(Images/Background\ 1.jpg); background-size: cover;">
<?php include_once("Template/nav.php");?>

    <section id="technology">
        <h2>Unveiling the Magic: How We Create Virtual Voyages</h2>
        <p>We use high-resolution 360° cameras and 3D scanning techniques to create seamless navigation, realistic soundscapes, and interactive elements.</p>
        
        <div class="tech-video-container">
            <div class="tech-video">
                <video width="320" height="240" controls>
                    <source src="Images/World travel.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Our high-resolution 360° cameras capture every detail of breathtaking destinations, providing an immersive experience.</p>
            </div>
            <div class="tech-video">
                <video width="320" height="240" controls>
                    <source src="Images/index 1.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Using advanced 3D scanning techniques, we ensure accurate representations of historical landmarks and natural wonders.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include_once("Template/footer.php")?>
</body>
</html>
