<html>
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php echo asset_url(); ?>/style.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>/mystyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="grid">
    <div class="row">
        <div class="col-2">
        </div>

        <div class="col-10">
            <span class="error"><?php if(isset($exist)) echo $exist;?></span><p></p>
            <h2>Shopping Cart</h2>
            <div class="cartProd">Product</div>
            <div class="cartPrice">Price</div>
            <div class="cartQuant">Quantity</div>
            <?php
            if (count($_SESSION["ssCart"])==0) {
                echo '<div class="cartEmpty">Shopping cart is empty</div>';
            }else {
                foreach ($_SESSION["ssCart"] as $each_member) {
                    while (list($key, $value) = each($each_member)) {
                        if ($key == "ssCartProdID") {
                            $guestProdID = $value;
                        }
                        if ($key == "ssCartProdQty") {
                            $guestProdQty = $value;
                        }
                        if ($key == "ssCartProdPrice") {
                            $guestProdPrice = $value;
                        }
                        if ($key == "ssCartProdSalesPrice") {
                            $guestProdSalesPrice = $value;
                        }
                        if ($key == "ssCartProdSalesOrNot") {
                            $guestProdSalesOrNot = $value;
                        }
                    }
                    foreach ($sscustomerCart as $cC) {
                        if($guestProdID==$cC->productID){
                            ?>
                            <form action="/hw4/index.php/Maincontroller/update_cus_cart" method="post">
                                <div class="cartProd">
                                    <input type="image" class="cartImg" src="<?php echo $cC->productImage; ?>" alt="Image">
                                    <input type="hidden" name="ProdID" value="<?php echo $cC->productID; ?>">
                                    <div class="cartProdName"><?php echo $cC->productName; ?></div>
                                </div>
                                <div class="cartPrice">
                                    <?php
                                    if ($guestProdSalesOrNot == "1") {
                                        echo '<span>$' . $guestProdSalesPrice .' '.'</span>';
                                        echo "<strike>$" . $guestProdPrice . "</strike></span>";
                                    } else {
                                        echo '<span>$' . $guestProdPrice . '</span>';
                                    }
                                    ?>
                                </div>
                                <div class="cartQuant">
                                    <input type="number" name="quantity" min="0" value="<?php echo $guestProdQty; ?>">
                                    <input type="submit" name="submit" class="transparentInput" value="Change">
                                    <input type="submit" name="submit" class="transparentInput" value="Delete">
                                </div>
                            </form>
                            <?php
                        }
                    }

                }
                echo '<div class="cartDeleteAll"><form action="/hw4/index.php/Maincontroller/update_cus_cart" method="post">';
                echo '<input type="submit" name="submit" class="borderInput" value="Delete All">';
                echo "</form></div>";
                echo '<div class="cartLogin"><form action="/hw4/index.php/Maincontroller/user_login_page" method="post">';
                echo '<input type="submit" name="submit" class="borderInput" value="Login to checkout">';
                echo "</form></div>";
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>