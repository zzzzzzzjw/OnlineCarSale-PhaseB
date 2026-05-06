<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Seller Login </title>
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
            
            <div class="right-explain-text">
                <h1 style="font-size: 45pt;"> Welcome to AutoVerve! </h1>
                <p style="font-size: 25pt;"> We will provide you with the highest quality car-selling service. </p>
            </div>

            <div class="left-gray-box">
                <h2 class="box-main-title"> Seller Login </h2>
                
                <form id="LoginForm" style="margin-top: 20px;">

                    <div class="input-field-group">
                        <label> Username: </label>
                        <input type="text" name="username" required pattern="^[a-zA-Z0-9]{6,}$" title="Must consist of at least 6 alphanumeric characters" class="box-input-field">
                    </div>

                    <div class="input-field-group">
                        <label> Password: </label>
                        <input type="password" name="password" required pattern="^[a-zA-Z0-9]{6,}$" title="Must consist of at least 6 alphanumeric characters" class="box-input-field">
                    </div>

                    <div class="input-field-group">
                        <li><a href="../seller/register.html"> Don't have an account yet? </a></li>
                    </div>

                    <input type="submit" value="Login" style="background-color: black; color: white; padding: 15px 50px;">
                </form>

            </div>

        </div>

        <script src="../js/register_login.js">  </script>
        
    </body>
</html>