<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
<body>

<div class="logo">
        <img src="<?php echo URLROOT; ?>/img/logo_black.png" alt="logo">
        </div>
       
     <img class="wave" src="<?php echo URLROOT; ?>/img/waves2.svg">  
    <div class="container">
        
        <div class="img">
            <img src="<?php echo URLROOT; ?>/img/secure_login.svg">
        </div>
        <div class="login-container">
            <form action="<?php echo URLROOT; ?>/users/verify"  method="POST" onsubmit="return validateForm()">
                <img class="avatar" src="<?php echo URLROOT; ?>/img/mailsent.svg">
                <div class="text">
                <h3>OTP code has been sent to the email you've provided.<br><br> </h3>
                <p class="err" id="otp-err"></p>
               
                    <div class="div">
                        <h3><label for="otp">Enter OTP here</label></h3>
                        <input type="text" name="otp" id="otp-input" class="otp" required>
                    </div>
                    <button class="btn" onclick="myFunction()" id="otp-btn" >Verify</button>
                </form> 
            </div>

                <!-- <?php flash('register_success'); ?>
                <h2>Please enter otp</h2>
               
                
                <div class="input-div one ">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Otp</h5>
                        <input name="otp" type="text" class="input" value="<?php echo $data['otp']; ?>" >
                        <div class=warn><?php echo $data['email_err']; ?></div>
                    </div>
                </div> -->
                <!-- <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input name="password" type="password" class="input"  value="<?php echo $data['password']; ?>">
                        <div class=warn><?php echo $data['password_err']; ?></div>
                    </div>
                </div> -->
                <!-- <a href="#">Forgot Password?</a> -->
               
             
               
            <!-- </form> -->
            
        </div>
        

    </div>
    <script>
        function myFunction() {
  // Get the value of the input field with id="numb"
  let x = document.getElementById("otp-input").value;
  // If x is Not a Number or less than one or greater than 10
  let text;
  if (isNaN(x) || x < 1 || x > 10) {
    text = "otp valid";
  } else {
    text = "Input OK";
  }
  document.getElementById("otp-err").innerHTML = text;
}
    const otpField = document.getElementById('otp-input');
    const verifyBtn = document.getElementById('otp-btn');
    const otpErr = document.getElementById('otp-err');
    const otpForm = document.getElementById('otp-form');

    function isRequired(inputField){
        return inputField.value.trim() === '';
    }

    function isOTPValid(inputField, messageEl){
        if(this.isRequired(inputField)){
            this.error(inputField, messageEl, "*OTP is required");
            return false;
        }
        else{
            this.success(inputField, messageEl);
            return true;
        }
    }

    function isOTPFormValid(){
        return isOTPValid(otpField, otpErr);
    }

    verifyBtn.addEventListener('click', function(){
        if(isOTPFormValid()){
            otpForm.submit();
        }
    });
</script>
    <!-- <script src="<?php echo URLROOT; ?>/js/main.js"></script> -->
<?php require APPROOT . '/views/inc/footer.php'; ?>
