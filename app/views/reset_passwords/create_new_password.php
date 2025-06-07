<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
<body>

<div class="logo">
        <img src="<?php echo URLROOT; ?>/img/logo_black.png" alt="logo">
        </div>
       
     <img class="wave" src="<?php echo URLROOT; ?>/img/waves2.svg">  
    <div class="container">
        <div class="img">
            <img src="<?php echo URLROOT; ?>/img/ben_login.svg">
        </div>
        <div class="login-container">
            <form action="<?php echo URLROOT; ?>/reset_passwords/create_new_password"  method="POST">
                <img class="avatar" src="<?php echo URLROOT; ?>/img/profile_pic.svg">
                <?php flash('register_success'); ?>
                <h2>Welcome</h2>
               <input type="hidden" name="selector" value="<?php echo $selector; ?>">
               <input type="hidden" name="validator" value="<?php echo $validator; ?>">
                
               <input type="password" name="pwd" placeholder="Enter a new password...">
               <input type="password" name="pwd-repeat" placeholder="Repeat new password...">
               
                <button type="submit" name="reset_password_submit" class="btn" value="Login">Reset Password</button>
            </form>
            
        </div>
        

    </div>
    <script src="<?php echo URLROOT; ?>/js/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
