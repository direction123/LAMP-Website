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
            <span class="error"><?php if(isset($loginErr)) echo $loginErr;?></span>
            <br/><br/>
            <h2>Login Form</h2>
            <?php echo form_open('Maincontroller/user_login_process'); ?>
            <label>Username:</label>
            <input type="text" name="username" id="name" placeholder="username"/>
            <span class="error">* <?php if(isset($nameErr)) echo $nameErr;?></span>
            <br/><br/>
            <label>Password :</label>
            <input type="password" name="password" id="password" placeholder="********"/>
            <span class="error">* <?php if(isset($pwdErr)) echo $pwdErr;?></span>
            <br/><br/>
            <input type="submit" value=" Login " class="borderInput" name="submit"/><br/>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
</body>
</html>