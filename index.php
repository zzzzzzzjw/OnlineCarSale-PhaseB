<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoMarket - Homepage</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

    <!-- Navigation bar -->
    <div class="navbar">
        <div class="container">
            <div class="logo">
                <img src="images/logo.png" alt="AutoMarket Logo">
            </div>
            <ul class="nav-links">
                <!--  All links changed to .php for backend -->
                <li><a href="index.php">Home</a></li>
                <li><a href="buyer/search.php">Search Cars</a></li>

                <?php if (isset($_SESSION['seller_id'])): ?>
                    <!-- If logged in, show Seller page and Logout -->
                    <li><a href="seller/seller.php">Seller Page</a></li>
                    <li><a href="seller/logout.php">Logout</a></li>
                <?php else: ?>
                    <!-- Not logged in, show Register and Login -->
                    <li><a href="seller/register.php">Register</a></li>
                    <li><a href="seller/login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <!--  Hero section -->
    <div class="hero-section">
        <div class="hero-content">
            <h1>Find Your Next<br>Premium Vehicle</h1>
            <p>
                Welcome to AutoMarket. We connect trusted sellers with serious buyers.
                Browse verified listings, compare models, and secure your next car with full transparency.
            </p>
            <div class="button-group">
                <a href="buyer/search.php" class="btn btn-primary">Browse Inventory</a>
                <a href="seller/seller.php" class="btn btn-outline">Become a Seller</a>
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

    <!--  Featured cars (dynamically from database) -->
    <div class="featured-cars">
        <div class="container">
            <h2>Featured Vehicles</h2>
            <div class="car-grid">
                <?php
                // Include database connection file
                require_once 'config/db_connect.php';

                // Select 4 latest cars for featured display
                $sql = "SELECT car_id, brand, model, year, price, image_url FROM cars ORDER BY created_at DESC LIMIT 4";
                $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

                if (mysqli_num_rows($result) > 0):
                    // Loop through each car
                    while ($car = mysqli_fetch_assoc($result)):
                ?>
                    <div class="car-item">
                        <img src="<?php echo !empty($car['image_url']) ? htmlspecialchars($car['image_url']) : 'images/car1.jpg'; ?>" alt="<?php echo htmlspecialchars($car['brand'] . ' ' . $car['model']); ?>">
                        <h3><?php echo htmlspecialchars($car['brand'] . ' ' . $car['model']); ?></h3>
                        <p>From $<?php echo number_format($car['price']); ?></p>
                        <a href="buyer/detail.php?id=<?php echo $car['car_id']; ?>" class="btn btn-sm">Details</a>
                    </div>
                <?php
                    endwhile;
                else:
                    // If no cars in database, show static examples
                ?>
                    <div class="car-item">
                        <img src="images/car1.jpg" alt="Luxury SUV">
                        <h3>Luxury SUV</h3>
                        <p>From $35,000</p>
                    </div>
                    <div class="car-item">
                        <img src="images/car2.jpg" alt="Sports Car">
                        <h3>Sports Car</h3>
                        <p>From $45,000</p>
                    </div>
                    <div class="car-item">
                        <img src="images/car3.jpg" alt="Premium Sedan">
                        <h3>Premium Sedan</h3>
                        <p>From $28,000</p>
                    </div>
                    <div class="car-item">
                        <img src="images/car4.jpg" alt="Electric Car">
                        <h3>Electric Car</h3>
                        <p>From $40,000</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!--  Footer -->
    <div class="footer">
        <div class="container">
            <p>&copy; 2026 AutoMarket. All rights reserved. | Course Design Project</p>
        </div>
    </div>

</body>
</html>
<?php
if (isset($connection)) {
    mysqli_close($connection);
}
?>
