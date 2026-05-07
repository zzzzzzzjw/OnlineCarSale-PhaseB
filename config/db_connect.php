<?php
// Step 1: Create connection
$connection = mysqli_connect("localhost", "root", "", "online_car_sale");
// Step 2: Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
// Step 3: Set character set to UTF-8
mysqli_set_charset($connection, "utf8mb4");
?>