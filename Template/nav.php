<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Virtual Voyage</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <h1>Virtual Voyage</h1>
    <button id="menu-toggle">Menu</button>
    <nav id="navigation">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="AboutUs.php">About Us</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="destinations.php">Destinations</a></li>
        <li><a href="FAQ.php">FAQ</a></li>
        <li><a href="Pricings and packages.php">Pricings and Packages</a></li>
        <li><a href="Technology.php">Technology</a></li>
        <li><a href="bookTours.php">Book Tour</a></li>
        <li><a href="termsandconditions.php">Terms and Conditions</a></li>
        <li><a href="View_Bookings.php">Bookings</a></li>
        <li class="dropdown" style="float: right;"> 
          <a href="#">My Account</a>
          <ul class="dropdown-content">
            <li><a href="Sign Up.php">Sign Up</a></li>
            <li><a href="SignIn.php">Sign In</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>

  <script>
    const menuToggle = document.getElementById('menu-toggle');
    const navigation = document.getElementById('navigation');

    menuToggle.addEventListener('click', () => {
      navigation.classList.toggle('show'); // Toggle 'show' class for visibility
    });
  </script>
</body>
</html>
