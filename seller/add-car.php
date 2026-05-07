<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Car - AutoMarket</title>
    <script src="../js/judge_login.js">  </script>
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
                    <li><a href="../index.html"> Home </a></li>
                    <li><a href="../buyer/search.html"> Search Cars </a></li>
                    <li><a href="../seller/register.html"> Register </a></li>
                    <li><a href="../seller/login.html"> Login </a></li>
                    <li><a href="../seller/add-car.html"> Add Car </a></li>
                </ul>
            </div>
        </div>

<div style="clear: both;"></div>

<div class="full-screen-container">

    <div class="left-gray-box">
        <h2 class="box-main-title">Add a Car</h2>
        
        <form id="AddCarForm" style="margin-top: 20px;">
            
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
<script src="../js/addcar.js"></script>
</body>
</html>