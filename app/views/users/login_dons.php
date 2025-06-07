<?php require APPROOT . '/views/inc/header.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?> /css/donor/style.css">

<body>
<div class="container">
<div class="img-container">
  <div class="logo">
    <img src="../public/img/img_dons/logo.svg" alt="logo">
  </div>
  <div class="img">
<img src="../public/img/img_dons/login.svg">
</div>
</div>
<div class="form-container">
<form action="<?php echo URLROOT; ?>/users/login_dons" autocomplete="off" method="POST">
<?php flash('register_success'); ?>
<div class="heading">
<h1>Welcome Back!</h1>
</div>

<div class="form">
<div class="input">
<input type="text" name="email" minlength="4"  class="input-field" value = "<?php echo $data['email']; ?>" autocomplete="off">
<label>Email</label>
<div class="warn"><?php echo $data['email_err']; ?></div>
</div>

<div class="input">
<input type="password" name="password" minlength="4" class="input-field" value = "<?php echo $data['password']; ?>" autocomplete="off">
<label>Password</label>
<div class="warn"><?php echo $data['password_err']; ?></div>
</div>

<p class="text">
<a href="#">Forgot Password?</a></p></br></br>
<input type="submit" value="Login" class="btn">
<p class="text">Don't have an account?
<a href="<?php echo URLROOT; ?>/users/signup_dons">Create</a>
</p>
</div>

</form>

</div>
</div>

<script src="<?php echo URLROOT; ?>/js/donor/main.js"></script>

<?php require APPROOT . '/views/inc/footer.php'; ?>