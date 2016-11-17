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
            <form name="CatForm" id="CatForm"  action="/index.php/Maincontroller/view_products_by_category" method="Post">
                <?php
                foreach($ProductCategoryDetails as $PC)
                    echo '<input type="submit" name="prodCatNm" value="'.$PC->productCategoryName.'"style="background: transparent;border:none;"><br>';
                ?>
            </form>
        </div>
        <div class="col-10">
            <div id="sales">
                <h2>Search Results</h2>
                <?php
                foreach($SalesProductSearch as $SPS){
                    $saleProdID[]=$SPS->productID;
                }
                foreach($ProductSearch as $PS){
                    ?>
                    <form class="prodForm" action="/index.php/Maincontroller/view_single_product" method="Post">
                        <input type="hidden" name="prodID" value="<?php
                        echo $PS->productID; ?>">
                        <div class="buttonHolder">
                            <input type="image" class="prodImg" src="<?php
                            echo $PS->productImage; ?>" alt="Image"><br>
                            <input type="submit" class="prodNm transparentInput" value="<?php
                            echo $PS->productName; ?>"><br>
                            <?php
                            if(in_array($PS->productID ,$saleProdID)){
                                ?>
                            <div class="prodPrice">
                                <?php echo  $SPS->salesPrice; ?>
                                <strike><?php
                                    echo  $PS->productPrice; ?> </strike>
                            </div>
                            <?php
                            } else{
                            ?>
                            <div class="prodPrice">
                                <?php echo  $PS->productPrice; ?>
                            </div>
                            <?php
                            }
                            ?>
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