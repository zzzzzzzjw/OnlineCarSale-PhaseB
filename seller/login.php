<?php
session_start();
require_once '../config/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password_hash = $_POST["password_hash"];

    $sql = "select * from sellers where username ='$username'";
    if (mysqli_query($connection, $sql)) {
        $result = mysqli_query($connection, $sql);
    }
    else {
        die("Error! " . mysqli_error($connection));
    }



    if ($row = mysqli_fetch_array($result)) {
         if (password_verify($password_hash, $row['password_hash'])) {
            $_SESSION['username'] = $username;

            echo "<script>
                    alert('Login successful! Welcome, " . $username . "');
                    window.location.href = '../index.html'; 
                  </script>";
            exit();
        } 
        else {
            echo "<script>
                    alert('Incorrect password. Please try again.');
                  </script>";
        }
    }
    else {
        echo "<script>
                alert('Sorry, account not found. Please register first.');
              </script>";
    }



}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Seller Login </title>
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
        <link rel="stylesheet" type="text/css" href="../css/box_style.css" />
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
                    <li><a href="register.html"> Register </a></li>
                    <li><a href="login.html"> Login </a></li>
                    <li><a href="add-car.html"> Add Car </a></li>
                </ul>
            </div>
        </div>
        
        <div class="full-screen-container">
            
        
            <div class="right-explain-text">
                <h1 style="font-size: 45pt;"> Welcome to AutoVerve! </h1>
                <p style="font-size: 25pt;"> We will provide you with the highest quality car-selling service. </p>
            </div>

            <div class="left-gray-box">
                <h2 class="box-main-title"> Seller Login </h2>
                
                <form id="LoginForm" action="login.php" method="POST" onsubmit="return checkLogin();" style="margin-top: 20px;">

                    <div class="input-field-group">
                        <label> Username: </label>
                        <input type="text" name="username" id="username" class="box-input-field">
                    </div>

                    <div class="input-field-group">
                        <label> Password: </label>
                        <input type="password" name="password_hash" id="password_hash" class="box-input-field">
                    </div>

                    <div class="input-field-group">
                        <li><a href="../seller/register.html"> Don't have an account yet? </a></li>
                    </div>

                    <input type="submit" value="Login Now !" style="background-color: black; color: white; padding: 15px 50px;">
                </form>
            </div>


        </div>

        <script src="../js/register_login.js">  </script>
        
    </body>
</html>