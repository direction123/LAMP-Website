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
            <form name="WelcomeForm" id="WelcomeForm" action="/hw4/index.php/Maincontroller/index_login" method="Post">
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
                <span id="helloID">  Hello!  <?php echo $customerUsername; ?></span>
                <form name="myOrderForm" id="myOrderForm" action="/hw4/index.php/Maincontroller/view_cus_order" method="Post">
                    <input type="submit" name="myOrderFormIn" class="transparentInput" value="My Order">
                </form>
                <form name="myAccountForm" id="myAccountForm" action="/hw4/index.php/Maincontroller/view_cus_account" method="Post">
                    <input type="submit" name="myAccountFormIn" class="transparentInput" value="My Account">
                </form>
                <form name="logoutForm" id="logoutForm" action="/hw4/index.php/Maincontroller/user_logout_process" method="Post">
                    <input type="submit" id="logoutFormIn" class="transparentInput" value="Logout">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>