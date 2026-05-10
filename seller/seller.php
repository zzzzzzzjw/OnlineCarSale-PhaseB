<?php
session_start();
require_once '../config/db_connect.php';

if (!isset($_SESSION['username'])) {
    echo "<script>
            alert('Please login first!'); window.location.href='login.php';
          </script>";
    exit();
}

$username = $_SESSION['username'];

$sql = "SELECT cars.* FROM cars 
        JOIN sellers ON cars.seller_id = sellers.seller_id
        WHERE sellers.username = '$username'
        ORDER BY cars.created_at DESC";

$result = mysqli_query($connection, $sql);

if (!$result) {
    die("Error !" . mysqli_error($connection));
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Seller Page </title>
        <link rel="stylesheet" type="text/css" href="../css/seller_style.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
    <body>

        <div class="navbar">
            <div class="container">
                <div class="logo">
                    <img src="../images/logo.png" alt="AutoMarket Logo">
                </div>

                <ul class="nav-links">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../buyer/search.php">Search Cars</a></li>

                    <?php if (isset($_SESSION['seller_id'])): ?>
                        <li><a href="seller.php">Seller Page</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="register.php">Register</a></li>
                        <li><a href="login.php">Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <div class="hengxiangzhanshi-section">
            <div class="inner-container">

                <div class="hengxiangzhanshi-text">
                    <h1 class="hengxiangzhanshi-bigtitle"> Hello <?php echo $_SESSION['username']; ?>! </h1>
                    <p style="color: white;"> Here is your personalized car-room. </p>
                </div>

                <div class="clear-page"> </div>
            </div>
        </div>
        
        <div class="inner-container" style="margin-top: 50px; margin-bottom: 50px; text-align: center;">

            <div class="action-buttons-area">
                <a href="add-car.php" class="black-action-btn"> Add Car </a>
            </div>

            
            <?php 
            if (mysqli_num_rows($result) > 0) {
                
                while ($car = mysqli_fetch_assoc($result)) {
                    $car_id = $car['car_id'];
                    $car_url = "../buyer/detail.php?id=" . $car_id;
            ?>
                    <a href="<?php echo $car_url; ?>" class="car-box" style="text-decoration: none; color: inherit;">
                        
                    <h3 class="car-box-title"> 
                        <?php 
                        echo $car['model']; 
                        ?> 
                    </h3> 

                    <p class="car-explaination"> 
                        <?php 
                        echo $car['year']; 
                        ?> 
                    </p>

                    <div class="car-box-picture">
                        
                        <?php if (!empty($car['image_url'])) { 
                        ?>
                                <img src="<?php echo htmlspecialchars($car['image_url']); ?>" alt="Car Image" class="car-box-img">
                        <?php 
                              } 
                              else { 
                        ?>
                                <p> Sorry there is no Image ! </p>
                        <?php 
                              } 
                        ?>

                    </div>

                    <p style="font-size: 12px; color: gray; margin-bottom: 5px;"> The Price </p>
                    <p class="price"> $<?php echo number_format($car['price'], 2); ?> </p>
                    <p class="outline-btn"> On Sale </p>

                    </a>
            <?php 
                } 
            } 
            else { 
            ?>

                <div class="empty-car-room">
                    <h2 class="empty-title"> Your car-room is currently empty. </h2>
                    <p class="empty-text"> You haven't listed any cars yet. Click the "Add Car" button above to start your business! </p>
                </div>

            <?php 
            } 
            ?>

            <div class="clear-page"> </div>
        </div>
        
    </body>
</html>