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
            <form action="<?php echo URLROOT; ?>/users/login_ben"  method="POST">
                <img class="avatar" src="<?php echo URLROOT; ?>/img/profile_pic.svg">
                <?php flash('register_success'); ?>
                <h2>Welcome</h2>
               
                
                <div class="input-div one ">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Email</h5>
                        <input name="email" type="text" class="input" value="<?php echo $data['email']; ?>" >
                        <div class=warn><?php echo $data['email_err']; ?></div>
                    </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input name="password" type="password" class="input"  value="<?php echo $data['password']; ?>">
                        <div class=warn><?php echo $data['password_err']; ?></div>
                    </div>
                </div>
                <a href="#">Forgot Password?</a>
               
                <input type="submit" class="btn" value="Login">
                <a href="<?php echo URLROOT; ?>/users/signup_ben"> click here if U don't have an account</a>
                <a href="<?php echo URLROOT; ?>/reset_passwords/reset_password"> click here if U forget ur password</a>
            </form>
            
        </div>
        

    </div>
    <script src="<?php echo URLROOT; ?>/js/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
