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
            <h2>Shop by Departments</h2>
            <form name="CatForm" id="CatForm"  action="/hw4/index.php/Maincontroller/view_products_by_category" method="Post">
                <?php
                foreach($ProductCategoryDetails as $PC)
                    echo '<input type="submit" name="prodCatNm" class="transparentInput" value="'.$PC->productCategoryName.'"><br>';
                ?>
            </form>
        </div>
        <div class="col-10">
            <div id="sales">
                <h2>Special Sales</h2>
                <?php
                if (empty($SalesProductsbyCategory)) {
                    echo "Coming Soon";
                } else {
                    foreach($SalesProductsbyCategory as $SPC){
                        ?>
                        <form class="prodForm" action="/hw4/index.php/Maincontroller/view_single_product" method="Post">
                            <input type="hidden" name="prodID" value="<?php
                            echo $SPC->productID; ?>">
                            <div class="buttonHolder">
                                <input type="image" class="prodImg" src="<?php
                                echo $SPC->productImage; ?>" alt="Image"><br>
                                <input type="submit" class="prodNm transparentInput" value="<?php
                                echo $SPC->productName; ?>"><br>
                                <div class="prodPrice">
                                    <?php echo  "$".$SPC->salesPrice; ?>
                                    <strike><?php
                                        echo  "$".$SPC->productPrice; ?> </strike>
                                </div>
                            </div>
                        </form>
                        <?php
                    }
                }

                ?>
            </div>
            <div id="others">
                <h2>More Items to Consider</h2>
                <?php
                foreach($OtherProductsbyCategory as $OPC){
                    ?>
                    <form class="prodForm" action="/hw4/index.php/Maincontroller/view_single_product" method="Post">
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