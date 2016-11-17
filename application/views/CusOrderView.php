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
            <?php
            echo '<h2>Order List</h2>';
            foreach ($customerOrder as $cO) {
                echo '<form action="/index.php/Maincontroller/view_cus_order_details" method="post">';
                echo '<div class="orderList">';
                    echo '<div class="orderListDate">';
                        echo '<span>'.$cO->orderDate.'</span>';
                        echo '<input type="hidden" name="orderID" value="' . $cO->orderID. '">';
                    echo '</div>';
                    echo '<div class="orderListBT">';
                        echo '<input type="submit" name="submit" class="borderInput" value="Details">';
                    echo '</div>';
                echo '</div>';
                echo "</form>";
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>