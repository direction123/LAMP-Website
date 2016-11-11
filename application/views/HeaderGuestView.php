<!DOCTYPE html>
<html>
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php echo asset_url(); ?>/style.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>/mystyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div id="header">
    <div id="headerShipping">
        <span id="headerShippingFont">FREE SHIPPING ON ORDERS $50 OR MORE!</span>
    </div>
    <div id="headerNav">
        <div id="headerNav-1">
            <form name="WelcomeForm" id="WelcomeForm" action="/hw4/index.php/Maincontroller" method="Post"">
                <input type="submit" id="WelcomeFormIn" class="transparentInput" value="Welcome to online footware store!">
            </form>
            <img src="<?php echo asset_url(); ?>/baby_feet.png" id="footLogo" alt="HTML5 Icon">
            <form name="cartForm" id="cartForm" action="/hw4/index.php/Maincontroller/view_cus_cart" method="Post">
                <img src="<?php echo asset_url(); ?>/cart.png" id="cartFormImg" alt="HTML5 Icon">
                <input type="submit" id="cartFormIn" class="transparentInput" value="Shopping Cart">
            </form>
        </div>
        <div id="headerNav-2">
            <form name="searchForm" id="searchForm" action="/hw4/index.php/Maincontroller/view_products_by_search" method="Post">
                <input type="text" name="searchProd" id="searchProd" placeholder="Shoes, Sales" value="">
                <input type="submit" id="searchFromIn" class="transparentInput" value="Search Products">
            </form>
            <div id="ids">
                <form name="loginForm" id="loginForm" action="/hw4/index.php/Maincontroller/user_login_page" method="Post">
                    <input type="submit" id="loginFormIn" class="transparentInput" value="Login"></form>
                <form name="registerForm" id="registerForm" action="/hw4/index.php/Maincontroller/user_register_page" method="Post">
                    <input type="submit" id="registerFormIn" class="transparentInput" value="Register" ></form>
            </div>
        </div>
    </div>
</div>
</body>
</html>