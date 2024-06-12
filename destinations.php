<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="icon" type="image/x-icon" href="Images/Background 1.jpg">
    <title>Destinations</title>
</head>
<body style="background-image: url(Images/Background\ 1.jpg); background-size: cover;">
    <header>
        <h1>Virtual Voyage</h1>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="AboutUs.html">About Us</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="destinations.html">Destinations</a></li>
                <li><a href="FAQ.html">FAQ</a></li>
                <li><a href="Pricings and packages.html">Pricing and Packages</a></li>
                <li><a href="Technology.html">Technology</a></li>
                <li><a href="OrderDetails.html">Order Details</a></li>
                <div class="topnav-right">
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropbtn">My Account</a>
                        <div class="dropdown-content">
                            <a href="Sign Up.html">Sign Up</a>
                            <a href="SignIn.html">Sign In</a>
                        </div>
                    </li>
                    </div>
            </ul>
        </nav>
    </header>

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
    <footer>
        <p>&copy; 2024 Virtual Voyage. All rights reserved.</p>
        <p>Email us at virtualvoyage@gmail.com</p>
    </footer>
</body>
</html>