<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
            <h2>Order Details</h2>
            <div class="cartProd">Product</div>
            <div class="cartPrice">Price</div>
            <div class="cartQuant">Quantity</div>
            <?php
            echo '<form method="post">';
            foreach ($customerOrderDetails as $cOD) {
                echo '<div class="cartProd">';
                    echo '<input type="image" class="cartImg" src="' . $cOD->productImage . '" alt="Image">';
                    echo '<div class="cartProdName">' . $cOD->productName. '</div>';
                    echo '<input type="hidden" name="ProdID[]" value="' .$cOD->productID. '">';
                    echo '<input type="hidden" name="ProdPrice[]" value="' . $cOD->productPrice. '">';
                    echo '<input type="hidden" name="ProdSalesPrice[]" value="' . $cOD->productSalesPrice. '">';
                    echo '<input type="hidden" name="ProdSalesOrNot[]" value="' . $cOD->productSalesOrNot. '">';
                echo '</div>';
                echo '<div class="cartPrice">';
                if($cOD->productSalesOrNot=="1")
                {
                    echo '<span>$' . $cOD->productSalesPrice.'</span>';
                    echo "<strike>$" . $cOD->productPrice."</strike></span>";
                }else {
                    echo '<span>$' . $cOD->productPrice. '</span>';
                }
                echo '</div>';
                echo '<div class="cartQuant">';
                    echo $cOD->quantity;
                echo '</div>';
                echo '<div class="orderINFO">';
                    echo 'Order Date: '. $cOD->orderDate. '<p></p>';
                    echo 'First Name: '. $cOD->customerFirstname. '<p></p>';
                    echo 'Last Name: '. $cOD->customerLastname. '<p></p>';
                    echo 'Shipping Address: '. $cOD->customerAddress. '<p></p>';
                    echo 'Credit Card Number: '. $cOD->customerCreditcard. '<p></p>';
                    echo 'Security Code: '. $cOD->customerSecuritycode. '<p></p>';
                    echo 'Expiration Date: '. $cOD->customerexpirationDate. '<p></p>';
                    echo 'Billing Address: '. $cOD->customerBillingAddress. '<p></p>';
                echo '</div>';
            }
            echo "</form>";
            ?>
        </div>
    </div>
</div>
</body>
</html>