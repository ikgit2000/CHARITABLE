
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php /*require APPROOT . '/views/inc/navbar_dons.php'; */?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/updatepwd/styles.css" xmlns="http://www.w3.org/1999/html">
<body>
<!-- =============== Navigation ================ -->
<div class="container">

<!--<main>
-->    <div class="button-pwd">
        <a href="<?php echo URLROOT ?>/SettingsDons/viewProfile "> <input type="submit" class="button button3" value="Edit profile"></a>
        <a href="<?php echo URLROOT ?>/updatepwds/index "> <input type="submit" class="button button4" value="Change Password"></a>
    </div>
    <div class="details" >
        <div class="recentOrders">
            <div class="container">
                <h1>Change Password</h1>
                <hr>
                <div class="content-sidebar">
                    <div class="content">
                        <div class="des">
                            <h3> <label for="Name"><b>Current Password</b></label></h3>
                        </div>
                    </div>
                    <div class="data">
                        <input type="text" name="password" minlength="4"  class="<?php echo (!empty($data['current_password_err']))
                            ? 'is-invalid' : ''; ?>" placeholder="Current Password" value = "<?php echo $data['current_password']; ?>" autocomplete="off"/>
                        <div class=warn> <?php if(isset($data['current_password_err'])) echo $data['current_password_err']; ?></div>

                    </div>
                    <div class="content">
                        <label for="password"><h3>New Password</h3></label>
                    </div>
                    <div class="data">
                        <input type="text" name="new_password" minlength="4" <?php echo (!empty($data['new_password_err']))
                            ? 'is-invalid' : ''; ?> placeholder="New Password" value = "<?php echo $data['new_password']; ?>" autocomplete="off"/>
                        <!--<div class="warn"><?php echo $data['new_password_err']; ?></div>-->
                    </div>


                    <div class="content">
                        <label for="password"><h3>Confirm Password</h3></label>
                    </div>
                    <div class="data">
                        <input type="password" name="confirm_password" minlength="4" <?php echo
                        (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?> placeholder="Confirm Password" value = "<?php echo $data['confirm_password']; ?>" autocomplete="off"/>
                        <!--<div class="warn"><?php echo $data['confirm_password_err']; ?></div>-->
                    </div>

                </div>
            </div>
            <div class="button-alignment">
                <a href="<?php echo URLROOT ?>/UpdatePwds/index "> <input type="submit" class="button button1" value="Save"></a>
            </div>
        </div>
    </div>
<!--</main>
-->
</div>
<!--</div>-->


<script src="<?php echo URLROOT; ?>/js/donor/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
