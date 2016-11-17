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
            <h2>Shop by Departments</h2>
            <form name="CatForm" id="CatForm"  action="/index.php/maincontroller/view_products_by_category" method="Post">
                <?php
                foreach($ProductCategoryDetails as $PC)
                    echo '<input type="submit" name="prodCatNm" class="transparentInput" value="'.$PC->productCategoryName.'"><br>';
                ?>
            </form>
        </div>
        <div class="col-10">
            <div id="sales">
                <h2>Special Sales</span></h2>
                <?php
                foreach($SpecialSalesProd as $SS){
                    ?>
                    <form class="prodForm" action="/index.php/maincontroller/view_single_product" method="Post">
                        <input type="hidden" name="prodID" value="<?php
                        echo $SS->productID; ?>">
                        <div class="buttonHolder">
                            <input type="image" class="prodImg" src="<?php
                            echo $SS->productImage; ?>" alt="Image"><br>
                            <input type="submit" class="prodNm transparentInput" value="<?php
                            echo $SS->productName; ?>"><br>
                            <div class="prodPrice">
                                <?php echo  "$".$SS->salesPrice; ?>
                                <strike><?php
                                    echo  "$".$SS->productPrice; ?> </strike>
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