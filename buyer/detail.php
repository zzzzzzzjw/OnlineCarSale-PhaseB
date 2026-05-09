<?php
require_once '../config/db_connect.php';

$car_id = $_GET['id'] ?? 0;

$sql = "SELECT * FROM cars WHERE car_id = $car_id";
$result = mysqli_query($connection, $sql);
$car = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Car Details - AutoMarket</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/buyer_style.css">
</head>
<body class="buyer-page">

<div class="navbar">
    <div class="container clearfix">
        <div class="logo">
            <a href="../index.php">
                <img src="../images/logo.png" alt="AutoMarket Logo">
            </a>
        </div>
        <ul class="nav-links">
            <li><a href="../index.php">Home</a></li>
            <li><a href="search.php">Search Cars</a></li>
            <li><a href="../seller/register.php">Register</a></li>
            <li><a href="../seller/login.php">Login</a></li>
            <li><a href="../seller/add-car.php">Add Car</a></li>
        </ul>
    </div>
</div>

<div style="clear: both;"></div>

<div class="detail-container">
    <h1 style="text-align: center;">Car Details</h1>
    
    <div style="text-align: center;">
        <img src="<?php echo $car['image_url']; ?>" alt="Car Image" class="detail-image">
    </div>
    
    <div class="detail-info">
        <p><strong>Model:</strong> <span><?php echo $car['model']; ?></span></p>
        <p><strong>Colour:</strong> <span><?php echo $car['colour']; ?></span></p>
        <p><strong>Year:</strong> <span><?php echo $car['year']; ?></span></p>
        <p><strong>Location:</strong> <span><?php echo $car['location']; ?></span></p>
        <p><strong>Price:</strong> <span><?php echo $car['price']; ?></span></p>
        <p><strong>Description:</strong> <span><?php echo $car['description']; ?></span></p>
    
    <div style="text-align: center;">
        <a href="search.php" class="back-link">← Back to Search</a>
    </div>
</div>



</body>
</html>