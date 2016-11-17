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
            <h2>Shop by Department</h2>
            <form name="CatForm" id="CatForm"  action="/index.php/maincontroller/view_products_by_category" method="Post">
                <?php
                foreach($ProductCategoryDetails as $PC)
                    echo '<input type="submit" name="prodCatNm" class="transparentInput" value="'.$PC->productCategoryName.'"><br>';
                ?>
            </form>
        </div>
        <div class="col-10">
            <div class="prodView-1">
                <?php
                foreach($Product as $P) {
                    echo "<h2>".$P->productCategoryName."</h2>";
                    echo '<img src="' . $P->productImage . '" alt="Image">';
                }
                ?>
            </div>
            <div class="prodView-2">
                <form action="/index.php/maincontroller/add_to_cart" method="Post">
                    <?php
                    if($ProductIsSale==true){
                        foreach($SalesProduct as $SP){
                            echo '<div class="prodPrice">';
                            echo  "$".$SP->salesPrice;
                            echo " <strike>$" . $SP->productPrice. "</strike><br>";
                            echo '</div>';
                            //echo "Sales Date: '".$SP->startDate."' - '".$SP->endDate."'<p></p>";
                            echo '<input type="hidden" name="AddCartProdSalesPrice" value="' . $SP->salesPrice. '">';
                            echo '<input type="hidden" name="AddCartProdSalesOrNot" value="1">';
                            echo '<input type="hidden" name="AddCartProdPrice" value="' . $SP->productPrice. '">';
                            echo '<input type="hidden" name="AddCartProdID" value="' . $SP->productID. '">';
                            echo 'Qty:<input type="number" name="AddCartProdQty" id="AddCartProdQty" min="1" value=""><br>';
                            echo '<input type="submit" name="submit" class="transparentInput" value="Add to Cart">';
                        }
                    }
                    else{
                        foreach($Product as $P){
                            echo '<div class="prodPrice">';
                            echo "$" . $P->productPrice. "<p></p>";
                            echo '</div>';
                            echo '<input type="hidden" name="AddCartProdSalesOrNot" value="0">';
                            echo '<input type="hidden" name="AddCartProdPrice" value="' . $P->productPrice. '">';
                            echo '<input type="hidden" name="AddCartProdID" value="' . $P->productID. '">';
                            echo 'Qty:<input type="number" name="AddCartProdQty" id="AddCartProdQty" min="1" value=""><br>';
                            echo '<input type="submit" name="submit" class="transparentInput" value="Add to Cart">';
                        }
                    }
                    ?>
                </form>
            </div>
            <div id="othersInterested">
                <h2>You may also be interested in</h2>
                <?php
                foreach($OtherInterestedProductsbyCategory as $OPC){
                    ?>
                    <form class="prodForm" action="/index.php/maincontroller/view_single_product" method="Post">
                        <input type="hidden" name="prodID" value="<?php
                        echo $OPC->productID; ?>">
                        <div class="buttonHolder">
                            <input type="image" class="prodImg" src="<?php
                            echo $OPC->productImage; ?>" alt="Image"><br>
                            <input type="submit" class="prodNm transparentInput" value="<?php
                            echo $OPC->productName; ?>"><br>
                            <div class="prodPrice">
                                <?php echo  "$".$OPC->productPrice; ?>
                            </div>
                        </div>
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>