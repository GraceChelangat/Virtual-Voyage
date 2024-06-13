<?php include_once("Template/nav.php");?>
<body style="background-image: url(Images/Background\ 1.jpg); background-size: cover;">
    <?php include_once("Template/nav.php");?>

    <!-- Destinations Section -->
    <section id="destinations">
        <h2>Destinations</h2>
        <div class="destination-category">
            <h3>Europe</h3>
            <div class="destination-item">
                <img src="Images/Great barrier reef.jpg" alt="Great Barrier Reef">
                <div class="destination-content">
                    <h4>Soar through the majesty of the Great Barrier Reef</h4>
                    <p>Experience underwater exploration, historical insights, and cultural interactions.</p>
                    <button onclick="location.href='#booking'">Book Your Virtual Tour</button>
                </div>
            </div>
            <div class="destination-item">
                <img src="Images/Eifel tower.jpg" alt="Eifel Tower">
                <div class="destination-content">
                    <h4>Experience the grandeur of the Eiffel Tower</h4>
                    <p>Explore the historical significance and architectural beauty of this iconic landmark.</p>
                    <button onclick="location.href='#booking'">Book Your Virtual Tour</button>
                </div>
            </div>
            <h3>Africa</h3>
            <div class="destination-item">
                <img src="Images/Maasai mara.jpg" alt="Maasai Mara, Kenya">
                <div class="destination-content">
                    <h4>Explore the Beauty of Maasai Mara, Kenya</h4>
                    <p>Embark on a virtual journey through the vast savannas and witness the incredible wildlife of Maasai Mara.</p>
                    <button onclick="location.href='#booking'">Book Your Virtual Tour</button>
                </div>
            </div>
            <div class="destination-item">
                <img src="Images/pyramids.jpg" alt="The Pyramids of Giza, Egypt">
                <div class="destination-content">
                    <h4>Discover the Mysteries of the Pyramids of Giza, Egypt</h4>
                    <p>Unravel the secrets of one of the Seven Wonders of the Ancient World and delve into Egypt's rich history.</p>
                    <button onclick="location.href='#booking'">Book Your Virtual Tour</button>
                </div>
            </div>
            
        </div>
        <!-- Repeat destination-category div for more categories -->
    </section>

    <!-- Footer -->
    <<?php include_once("Template/footer.php")?>

