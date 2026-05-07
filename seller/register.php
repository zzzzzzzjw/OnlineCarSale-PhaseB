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
                
                <form id="RegistrationForm" style="margin-top: 20px;">
                    
                    <div class="input-field-group">
                        <label> Name: </label>
                        <input type="text" name="name" required pattern="[a-zA-Z\s]+" title="Only alphabetical letters and space allowed" class="box-input-field">
                    </div>

                    <div class="input-field-group">
                        <label> Address: </label>
                        <input type="text" name="address" required pattern="[a-zA-Z0-9\s]+" title="Only alphabetical letters and space allowed" class="box-input-field">
                    </div>

                    <div class="input-field-group">
                        <label> Phone number: </label>
                        <input type="text" name="phone" required pattern="^1[0-9][0-9]{9}$" title="Please enter a valid 11-digit China phone number" class="box-input-field">
                    </div>

                    <div class="input-field-group">
                        <label> Email address: </label>
                        <input type="text" name="email" required pattern="^[a-zA-Z0-9]+@[a-zA-Z]+\.(com|cn)$" title="Must contain exactly one '@' and end with .cn or .com" class="box-input-field">
                    </div>

                    <div class="input-field-group">
                        <label> Username: </label>
                        <input type="text" name="username" required pattern="^[a-zA-Z0-9]{6,}$" title="Must consist of at least 6 alphanumeric characters" class="box-input-field">
                    </div>

                    <div class="input-field-group">
                        <label> Password: </label>
                        <input type="password" name="password" required pattern="^[a-zA-Z0-9]{6,}$" title="Must consist of at least 6 alphanumeric characters" class="box-input-field">
                    </div>

                    <input type="submit" value="Register" style="background-color: black; color: white; padding: 15px 50px;">
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