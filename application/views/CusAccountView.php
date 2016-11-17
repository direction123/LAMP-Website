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
            <h2>Edit Account</h2>
            <?php
            foreach ($customerAccount as $cA) {
                ?>
                <form name="register" id="register" action="/index.php/maincontroller/change_cus_account" method="Post">
                    <span class="accountForm">First Name:</span><input type="text" name="fname" id="fname" value="<?php echo $cA->customerFirstname ?>">
                    <span class="error">* <?php if(isset($fnErr)) echo $fnErr;?></span><p></p>
                    <span class="accountForm">Last Name:</span><input type="text" name="lname" id="lname" value="<?php echo $cA->customerLastname ?>">
                    <span class="error">* <?php if(isset($lnErr)) echo $lnErr;?></span><p></p>
                    <span class="accountForm">Shipping Address:</span><input type="text" name="address" id="address" value="<?php echo $cA->customerAddress ?>">
                    <span class="error">* <?php if(isset($adErr)) echo $adErr;?></span><p></p>
                    <span class="accountForm">Credit Card Number:</span><input type="text" name="creditCard" id="creditCard" value="<?php echo $cA->customerCreditcard ?>">
                    <span class="error">* <?php if(isset($ccErr)) echo $ccErr;?></span><p></p>
                    <span class="accountForm">Security Code:</span><input type="text" name="securityCode" id="securityCode" value="<?php echo $cA->customerSecuritycode ?>">
                    <span class="error">* <?php if(isset($scErr)) echo $scErr;?></span><p></p>
                    <span class="accountForm">Expiration Date:</span><input type="date" name="expirDate" id="expirDate" value="<?php echo $cA->customerexpirationDate ?>">
                    <span class="error">* <?php if(isset($edErr)) echo $edErr;?></span><p></p>
                    <span class="accountForm">Billing Address:</span><input type="text" name="billAddress" id="billAddress" value="<?php echo $cA->customerBillingAddress ?>">
                    <span class="error">* <?php if(isset($badErr)) echo $badErr;?></span><p></p>
                    <span class="accountForm">User Name:</span><input type="text" name="userName" id="userName" value="<?php echo $cA->customerUsername ?>">
                    <span class="error">* <?php if(isset($unErr)) echo $unErr;?></span><p></p>
                    <span class="accountForm">Password:</span><input type="password" name="passWord" id="passWord" value="">
                    <span class="error">* <?php if(isset($pdErr)) echo $pdErr;?></span><p></p>
                    <span class="accountForm">Confirm Password:</span><input type="password" name="confirm_password" id="confirm_password" value="">
                    <span class="error">* <?php if(isset($pd2Err)) echo $pd2Err;?></span><p></p>
                    <span id='message'></span><p></p>
                    <input type="submit" name="submit" id="submit" class="borderInput" value="Change">
                    <span><?php if(isset($suc)) echo $suc;?></span><p></p>
                </form>
            <?php
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>