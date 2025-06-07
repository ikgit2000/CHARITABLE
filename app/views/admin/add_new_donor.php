<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<?php require APPROOT . '/views/inc/topbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin/add_new_admin.css">
        <!-- ========================= Main ==================== -->
        <div class="main">
            


            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="admin_details">
                    <div class="title">Admin Details</div>
                    <form action="<?php echo URLROOT; ?>/donors/addNewDonor" method="POST" autocomplete="off">
                        <div class="user_details">
                            <div class="input_box">
                                <span class="details">Full Name</span>
                                <input type="text" 
                                        name="D_Name" 
                                        placeholder="Enter name"
                                        value="<?php echo $data['D_Name'] ?>" 
                                        class="<?php echo (!empty($data['D_Name_err'])) ? "invalid" : '' ; ?>" />
                                        <span class="invalid-feedback"><?php echo $data['D_Name_err']; ?></span> 
                            </div>
                            <div class="input_box">
                                <span class="details">Email</span>
                                <input type="email"
                                        name="D_Email" 
                                        placeholder="Enter email"
                                        value="<?php echo $data['D_Email'] ?>"
                                        class="<?php echo (!empty($data['D_Email_err'])) ? "invalid" : '' ; ?>" />
                                        <span class="invalid-feedback"><?php echo $data['D_Email_err']; ?></span>
                            </div>
                            <div class="input_box">
                                <span class="details">Phone Number</span>
                                <input type="text" 
                                        name="D_Tel_No" 
                                        placeholder="Enter phone number (eg :- 0XXXXXXXXX)"
                                        value="<?php echo $data['D_Tel_No'] ?>"
                                        class="<?php echo (!empty($data['D_Tel_No_err'])) ? "invalid" : '' ; ?>" />
                                        <span class="invalid-feedback"><?php echo $data['D_Tel_No_err']; ?></span>
                            </div>
                            <div class="input_box">
                                <span class="details">Address</span>
                                <input type="text" 
                                        name="address" 
                                        placeholder="Enter Address"
                                        value="<?php echo $data['D_Address'] ?>"
                                        class="<?php echo (!empty($data['D_Address_err'])) ? "invalid" : '' ; ?>" />
                                        <span class="invalid-feedback"><?php echo $data['D_Address_err']; ?></span>
                            </div>
                            <div class="input_box">
                                <span class="details">Password</span>
                                <input type="password" 
                                        name="D_Password" 
                                        placeholder="Enter password"
                                        value="<?php echo $data['D_Password'] ?>"
                                        class="<?php echo (!empty($data['D_Password_err'])) ? "invalid" : '' ; ?>" />
                                        <span class="invalid-feedback"><?php echo $data['D_Password_err']; ?></span>
                            </div>
                        
                            <div class="input_box">
                                <span class="details">Confirm Password</span>
                                <input type="password" 
                                        name="D_Confirm_Password" 
                                        placeholder="Enter confirm password"
                                        value="<?php echo $data['D_Confirm_Password'] ?>"
                                        class="<?php echo (!empty($data['D_Confirm_Password_err'])) ? "invalid" : '' ; ?>" />
                                        <span class="invalid-feedback"><?php echo $data['D_Confirm_Password_err']; ?></span>
                            </div>
                        </div>
                         
                        <div class="button">
                            <input type="submit" value="ADD">
                        </div>
                    </form>
                </div>

               
            </div>
        </div>
    </div>

     <!-- =========== Scripts =========  -->
     <script src="<?php echo URLROOT ?>/public/js/toggle.js"></script>
     <script src="<?php echo URLROOT ?>/public/js/add_new_admin.js"></script>
    
</body>

</html>