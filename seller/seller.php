<?php
session_start();

// Check if logged in, if not redirect to login page
if (!isset($_SESSION['seller_id'])) {
    header("Location: login.php");
    exit;
}

// Include database connection
require_once '../config/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
    <script src="../js/judge_login.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/seller_style.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

    <!-- Navigation bar -->
    <div class="navbar">
        <div class="container">
            <div class="logo">
                <img src="../images/logo.png" alt="AutoMarket Logo">
            </div>
            <ul class="nav-links">
                <li><a href="../index.php">Home</a></li>
                <li><a href="../buyer/search.php">Search Cars</a></li>
                <li><a href="seller.php">Seller Page</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>

    <!-- Seller welcome banner -->
    <div class="hengxiangzhanshi-section">
        <div class="inner-container">
            <div class="hengxiangzhanshi-text">
                <?php
                // Display logged-in seller username
                echo "<h1 class='hengxiangzhanshi-bigtitle'> Hello, " . htmlspecialchars($_SESSION['username']) . "!</h1>";
                ?>
                <p style="color: white;">Here are your listed vehicles.</p>
            </div>
            <div class="clear-page"></div>
        </div>
    </div>

    <div class="inner-container" style="margin-top: 50px; margin-bottom: 50px; text-align: center;">
        <!-- Add Car button -->
        <div class="action-buttons-area">
            <a href="add-car.php" class="black-action-btn">Add Car</a>
        </div>

        <?php

        // Query cars belonging to this seller
        $seller_id = $_SESSION['seller_id'];
        $sql = "SELECT car_id, brand, model, year, price, colour, image_url, description 
                FROM cars WHERE seller_id = $seller_id 
                ORDER BY created_at DESC";
        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

        if (mysqli_num_rows($result) > 0):
            // Loop through cars
            while ($car = mysqli_fetch_assoc($result)):
        ?>
            <div class="car-box">
                <h3 class="car-box-title">
                    <?php echo htmlspecialchars($car['brand'] . ' ' . $car['model']); ?>
                </h3>
                <p class="car-explaination">
                    <?php echo htmlspecialchars($car['description'] ?? 'No description'); ?>
                </p>

                <div class="car-box-picture">
                    <?php if (!empty($car['image_url'])): ?>
                        <img src="<?php echo htmlspecialchars($car['image_url']); ?>" alt="Car Image" class="car-box-img">
                    <?php else: ?>
                        <img src="../images/car5.jpg" alt="Placeholder" class="car-box-img">
                    <?php endif; ?>
                </div>

                <p style="font-size: 12px; color: gray; margin-bottom: 5px;">Price</p>
                <p class="price">$<?php echo number_format($car['price']); ?></p>
                <p class="outline-btn">Year: <?php echo htmlspecialchars($car['year']); ?> | <?php echo htmlspecialchars($car['colour']); ?></p>
            </div>
        <?php
            endwhile;
        else:
            // Message if no cars listed
        ?>
            <p style="color: gray;">You haven't posted any cars yet. Click "Add Car" to get started.</p>
        <?php endif; ?>
        <div class="clear-page"></div>
    </div>

</body>
</html>
<?php
// Close database connection
mysqli_close($connection);
?>