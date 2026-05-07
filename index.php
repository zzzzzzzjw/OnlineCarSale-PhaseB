<!DOCTYPE html> <!-- HTML5 document type -->
<html lang="en"> <!-- Page language is English -->

<head>
    <meta charset="UTF-8"> <!-- Set character encoding -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Make page responsive -->
    <title>AutoMarket - Homepage</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"> <!-- Link to external CSS -->
</head>

<body>

    <!-- Navigation bar -->
    <div class="navbar">
        <div class="container">
            <div class="logo">
                <img src="../images/logo.png" alt="AutoMarket Logo">
            </div>

            <!-- Navigation links -->
            <ul class="nav-links">
                <li><a href="index.html">Home</a></li>
                <li><a href="buyer/search.html">Search Cars</a></li>
                <li><a href="seller/register.html">Register</a></li>
                <li><a href="seller/login.html">Login</a></li>
                <li><a href="seller/add-car.html">Add Car</a></li>
            </ul>
        </div>
    </div>

    <!-- Hero section (main banner with background image) -->
    <div class="hero-section">
        <div class="hero-content">
            <!-- Main heading -->
            <h1>Find Your Next<br>Premium Vehicle</h1>

            <!-- Description text -->
            <p>
                Welcome to AutoMarket. We connect trusted sellers with serious buyers.
                Browse verified listings, compare models, and secure your next car with full transparency.
            </p>

            <!-- Call-to-action buttons -->
            <div class="button-group">
                <a href="buyer/search.html" class="btn btn-primary">Browse Inventory</a>
                <a href="seller/seller.html" class="btn btn-outline">Become a Seller</a>
            </div>
        </div>
    </div>

    <!-- About section -->
    <div class="about-section">
        <div class="container">
            <h2>About Us</h2>
            <p>
                AutoMarket is a platform for trusted car sales.
                We verify sellers to ensure secure transactions for all buyers.
            </p>
        </div>
    </div>

    <!-- Featured cars section -->
    <div class="featured-cars">
        <div class="container">
            <h2>Featured Vehicles</h2>

            <!-- Car grid layout -->
            <div class="car-grid">

                <!-- Car item 1 -->
                <div class="car-item">
                    <img src="../images/car1.jpg" alt="Luxury SUV">
                    <h3>Luxury SUV</h3>
                    <p>From $35,000</p>
                </div>

                <!-- Car item 2 -->
                <div class="car-item">
                    <img src="../images/car2.jpg" alt="Sports Car">
                    <h3>Sports Car</h3>
                    <p>From $45,000</p>
                </div>

                <!-- Car item 3 -->
                <div class="car-item">
                    <img src="../images/car3.jpg" alt="Premium Sedan">
                    <h3>Premium Sedan</h3>
                    <p>From $28,000</p>
                </div>

                <!-- Car item 4 -->
                <div class="car-item">
                    <img src="../images/car4.jpg" alt="Electric Car">
                    <h3>Electric Car</h3>
                    <p>From $40,000</p>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer section (currently empty, can add links later) -->
    <div class="footer">
        <div class="container">
        </div>
    </div>

</body>
</html>
