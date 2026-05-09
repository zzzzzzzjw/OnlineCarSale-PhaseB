<?php

require_once '../config/db_connect.php';
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>
            alert('Please login first!');
            window.location.href='login.php';
          </script>";
    exit();
}

$username = $_SESSION['username'];

$id_query = "select seller_id from sellers where username = '$username'";
$id_result = mysqli_query($connection, $id_query);

if ($row = mysqli_fetch_assoc($id_result)) {
    $_SESSION['seller_id'] = $row['seller_id'];
} else {
    die("Error: Seller not found in database.");
}

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $colour = $_POST['colour'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $description = $_POST['description'] ?? "";
    $seller_id = $_SESSION['seller_id'];
    
    if ($image == "") {
        $image = "../images/logo.png";
    }
    if ($description == "") {
        $description = "Newly listed vehicle.";
    }
    
    $errors = "";
    
    if ($model == "") {
        $errors = $errors . "Model is required. ";
    }
    if ($colour == "") {
        $errors = $errors . "Colour is required. ";
    }
    if (strlen($year) != 4) {
        $errors = $errors . "Year must be 4 digits. ";
    }
    if ($location == "") {
        $errors = $errors . "Location is required. ";
    }
    if ($price == "" || $price <= 0) {
        $errors = $errors . "Price must be a positive number. ";
    }
    
    if ($errors == "") {
        $sql = "INSERT INTO cars (seller_id, model, colour, year, location, price, image_url, description) 
                VALUES ('$seller_id', '$model', '$colour', '$year', '$location', '$price', '$image', '$description')";
        
        if (mysqli_query($connection, $sql)) {
            $success = "Car added successfully!";

            echo "<script>
                    alert('$success');
                    window.location.href = 'seller.php'; 
                  </script>";
            exit();

        } else {
            $error = "Database error: " . mysqli_error($connection);
        }
    } else {
        $error = $errors;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Car - AutoMarket</title>
    
    <link rel="stylesheet" href="../css/buyer_style.css"> 
    <link rel="stylesheet" href="../css/seller_style.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/box_style.css">
</head>
<body>

        <div class="navbar">
            <div class="container">
                <div class="logo">
                    <img src="../images/logo.png" alt="AutoMarket Logo">
                </div>
                <ul class="nav-links">
                    <li><a href="../index.php"> Home </a></li>
                    <li><a href="../buyer/search.php"> Search Cars </a></li>
                    <li><a href="../seller/register.php"> Register </a></li>
                    <li><a href="../seller/login.php"> Login </a></li>
                    <li><a href="../seller/add-car.php"> Add Car </a></li>
                </ul>
            </div>
        </div>

<div style="clear: both;"></div>

<div class="full-screen-container">

    <div class="left-gray-box">
        <h2 class="box-main-title">Add a Car</h2>
             <?php if (!empty($error)): ?>
    <p style="color: red; text-align: center;"><?php echo $error; ?></p>
<?php endif; ?>

<?php if (!empty($success)): ?>
    <p style="color: green; text-align: center;"><?php echo $success; ?></p>
<?php endif; ?>
           
        <form id="AddCarForm" method="post" style="margin-top: 20px;">
            
            <div class="input-field-group">
                <label>Colour:</label>
                <input type="text" name="colour" required class="box-input-field">
            </div>

            <div class="input-field-group">
                <label>Model:</label>
                <input type="text" name="model" required class="box-input-field">
            </div>

            <div class="input-field-group">
                <label>Year:</label>
                <input type="text" name="year" required pattern="[0-9]{4}" title="Please enter a valid 4-digit year" class="box-input-field">
            </div>

            <div class="input-field-group">
                <label>Location:</label>
                <input type="text" name="location" required class="box-input-field">
            </div>

            <div class="input-field-group">
                <label>Price:</label>
                <input type="text" name="price" required pattern="[0-9]+" title="Please enter a valid price" class="box-input-field">
            </div>

            <div class="input-field-group">
                <label>Image URL:</label>
                <input type="text" name="image" class="box-input-field" placeholder="../images/car1.jpg">
            </div>

            <input type="submit" value="Add" style="background-color: black; color: white; padding: 15px 50px;">
        </form>
    </div>


    <div class="right-explain-text">
        <h1 style="font-size: 45pt;"> Sell Your Car </h1>
        <p style="font-size: 25pt;"> List your vehicle and reach thousands of potential buyers today. </p >
    </div>
</div>
<script src="../js/search_function.js"></script>
</body>
</html>