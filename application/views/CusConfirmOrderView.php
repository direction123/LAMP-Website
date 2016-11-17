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
            <h2>Order Summary</h2>
            <div class="cartProd">Product</div>
            <div class="cartPrice">Price</div>
            <div class="cartQuant">Quantity</div>
            <?php
            $totalPrice=0;
            $count=0;
            echo '<form action="/index.php/Maincontroller/cus_place_order" method="post">';
            foreach ($cusConfirmOrder as $cCO){
                echo '<div class="cartProd">';
                    echo '<input type="image" class="cartImg" src="' . $cCO->productImage . '" alt="Image">';
                    echo '<div class="cartProdName">' . $cCO->productName. '</div>';
                    echo '<input type="hidden" name="ProdID[]" value="' .$cCO->productID. '">';
                    echo '<input type="hidden" name="ProdPrice[]" value="' . $cCO->productPrice. '">';
                    echo '<input type="hidden" name="ProdSalesPrice[]" value="' . $cCO->productSalesPrice. '">';
                    echo '<input type="hidden" name="ProdSalesOrNot[]" value="' . $cCO->productSalesOrNot. '">';
                echo '</div>';
                echo '<div class="cartPrice">';
                    if($cCO->productSalesOrNot=="1")
                    {
                        echo '<span>$' . $cCO->productSalesPrice.'</span>';
                        echo "<strike>$" . $cCO->productPrice."</strike></span>";
                        $totalPrice += $cCO->productSalesPrice * $cCO->quantity;
                    }else {
                        echo '<span>$' . $cCO->productPrice. '</span>';
                        $totalPrice += $cCO->productPrice * $cCO->quantity;
                    }
                echo '</div>';
                echo '<div class="cartQuant">';
                    echo $cCO->quantity;
                echo '</div>';
                $count++;
                if($count==count($cusConfirmOrder)){
                    echo '<div class="cartTotalPrice">Total price:  $'.$totalPrice.'</div>';
                    echo '<div class="orderINFO">';
                        echo 'First Name: '. $cCO->customerFirstname. '<p></p>';
                        echo 'Last Name: '. $cCO->customerLastname. '<p></p>';
                        echo 'Shipping Address: '. $cCO->customerAddress. '<p></p>';
                        echo 'Credit Card Number: '. $cCO->customerCreditcard. '<p></p>';
                        echo 'Security Code: '. $cCO->customerSecuritycode. '<p></p>';
                        echo 'Expiration Date: '. $cCO->customerexpirationDate. '<p></p>';
                        echo 'Billing Address: '. $cCO->customerBillingAddress. '<p></p>';
                    echo '</div>';
                    echo '<input type="submit" name="submit" class="borderInput" value="Place Order">';

                }
            }
            echo "</form>";
            ?>
        </div>
    </div>
</div>
</body>
</html>