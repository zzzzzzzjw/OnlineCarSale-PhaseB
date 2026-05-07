<?php
session_start();
require_once '../config/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password_hash = $_POST["password_hash"];
    $full_name = $_POST["full_name"];
    $address = $_POST["address"];

    $password_hashed = password_hash($password_hash, PASSWORD_DEFAULT);   //To protect the user's privacy

    $insert = "INSERT INTO seller (username, password_hash, full_name, email, address, phone ) 
            VALUES ('$username', '$password_hashed', '$full_name', '$email', '$address', '$phone' )";

    $result = mysqli_query($connection, $insert);

    if ($result) {
        echo "<script>
                alert('Registration successful! Please log in with your new account.');
                window.location.href = 'login.php';
              </script>";
        exit();
    } 
    else {
        $error_explain = mysqli_error($connection);
        echo "<script>
                alert('Database Error: " . $error_explain . "');
              </script>";
    }

}
?>



<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Seller Registration </title>
        <link rel="stylesheet" type="text/css" href="../../css/style.css" />
        <link rel="stylesheet" type="text/css" href="../../css/box_style.css" />
    </head>
    <body>

        <div class="navbar">
            <div class="container">
                <div class="logo">
                    <img src="../images/logo.png" alt="AutoMarket Logo">
                </div>
                <ul class="nav-links">
                    <li><a href="../index.html"> Home </a></li>
                    <li><a href="../buyer/search.html"> Search Cars </a></li>
                    <li><a href="../seller/register.html"> Register </a></li>
                    <li><a href="../seller/login.html"> Login </a></li>
                    <li><a href="../seller/add-car.html"> Add Car </a></li>
                </ul>
            </div>
        </div>
        
        <div class="full-screen-container">
            
            <div class="left-gray-box">
                <h2 class="box-main-title"> Seller Registration </h2>
                <form id="RegistrationForm" action="register.php" method="POST" onSubmit="return checkForm();" style="margin-top: 20px;">
                    
                    <div class="input-field-group">
                        <label> Name: </label>
                        <input type="text" name="full_name" id="full_name" class="box-input-field">
                    </div>

                    <div class="input-field-group">
                        <label> Address: </label>
                        <input type="text" name="address" id="address" class="box-input-field">
                    </div>

                    <div class="input-field-group">
                        <label> Phone number: </label>
                        <input type="text" name="phone" id="phone" class="box-input-field">
                    </div>

                    <div class="input-field-group">
                        <label> Email address: </label>
                        <input type="text" name="email" id="email" class="box-input-field">
                    </div>

                    <div class="input-field-group">
                        <label> Username: </label>
                        <input type="text" name="username" id="username" class="box-input-field">
                    </div>

                    <div class="input-field-group">
                        <label> Password: </label>
                        <input type="password" name="password_hash" id="password_hash" class="box-input-field">
                    </div>

                    <input type="submit" value="Register Now !" style="background-color: black; color: white; padding: 15px 50px;">
                </form>
            </div>




            <div class="right-explain-text">
                <h1 style="font-size: 45pt;"> Join Us </h1>
                <p style="font-size: 25pt;"> Become a seller on AutoVerve today and connect with millions of buyers nationwide. </p>
            </div>



        </div>

        <script src="../js/register_login.js">  </script>

    </body>
</html>