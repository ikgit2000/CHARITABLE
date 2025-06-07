
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_dons.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donor/settings.css" xmlns="http://www.w3.org/1999/html">

    <!-- ================ Order Details List ================= -->
<div class="button-pwd">
    <a href="<?php echo URLROOT ?>/SettingsDons/viewProfile "> <input type="submit" class="button button3" value="Edit profile"></a>
    <a href="<?php echo URLROOT ?>/updatepwds/index "> <input type="submit" class="button button4" value="Change Password"></a>
</div>
<div class="details">
           <div class="recentOrders">

               <div class="cardHeader">
               </div>
           <div class="container-nav">

                    <h1>Update Profile</h1>
                    <hr>
                    <div class="content-sidebar">
                        <div class="content">
<!--                            <div class="des" style="background-color: red">
-->                                <h3> <label for="Name"><b>Name</b></label></h3>
<!--                            </div>
-->                        </div>
                        <div class="data">
                            <input type="text" name="D_Name" value="<?php echo $data['D_Name']; ?>" disabled></input>
                            <div class=warn> <?php if(isset($data['D_Name_err'])) echo $data['D_Name_err']; ?></div>

                        </div>

                        <div class="content">
                            <label for="telephone_number"><h3>Telephone Number</h3></label>
                        </div>
                        <div class="data">
                            <input type="text" name="D_Tel_No" placeholder="telephone number" value="<?php echo $data['D_Tel_No']; ?>" disabled>
                            <div class=warn> <?php if(isset($data['D_Tel_No_err'])) echo $data['D_Tel_No_err']; ?></div>
                        </div>

                        <div class="content">
                            <label for="address"><h3>Address</h3></label>
                        </div>
                        <div class="data">

                            <input type="text" name="D_Address" placeholder="Address" value="<?php echo $data['D_Address']; ?>" disabled>
                            <div class=warn> <?php if(isset($data['D_Address_err'])) echo $data['D_Address_err']; ?></div>

                        </div>

                    </div>
                </div>
                <div class="button-alignment">
                    <a href="<?php echo URLROOT ?>/SettingsDons/index "> <input type="submit" class="button button1" value="Edit your profile"></a>
                </div>
            </div>
        </div>

</div>
</div>


<script src="<?php echo URLROOT; ?>/js/donor/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
