<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin/add_new_admin.css">

        <!-- ========================= Main ==================== -->
        <div class="main">
            <?php require APPROOT . '/views/inc/topbar.php'; ?>
            
            <!-- ======================= Buttons ================== -->
            <div class="btnBox">
                <a href="<?php echo URLROOT; ?>/settings/add_new_admin"><button class="btn active" >Add new admin</button></a>
                <a href="<?php echo URLROOT; ?>/settings/update_profile"><button class="btn" >Update Profile</button></a>
                <a href="<?php echo URLROOT; ?>/settings/list_of_admins"><button class="btn" >List of admins</button></a>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="admin_details">
                    <div class="title">Admin Details</div>
                    <form action="<?php echo URLROOT; ?>/settings/add_new_admin" method="POST" autocomplete="off">
                        <div class="user_details">
                            <div class="input_box">
                                <span class="details">Full Name</span>
                                <input type="text" 
                                        name="admin_name" 
                                        placeholder="Enter name"
                                        value="<?php echo $data['admin_name'] ?>" 
                                        class="<?php echo (!empty($data['admin_name_err'])) ? "invalid" : '' ; ?>" />
                                        <span class="invalid-feedback"><?php echo $data['admin_name_err']; ?></span> 
                            </div>
                            <div class="input_box">
                                <span class="details">Email</span>
                                <input type="email"
                                        name="admin_email" 
                                        placeholder="Enter email"
                                        value="<?php echo $data['admin_email'] ?>"
                                        class="<?php echo (!empty($data['admin_email_err'])) ? "invalid" : '' ; ?>" />
                                        <span class="invalid-feedback"><?php echo $data['admin_email_err']; ?></span>
                            </div>
                            <div class="input_box">
                                <span class="details">Phone Number</span>
                                <input type="text" 
                                        name="admin_phone" 
                                        placeholder="Enter phone number (eg :- 0XXXXXXXXX)"
                                        value="<?php echo $data['admin_phone'] ?>"
                                        class="<?php echo (!empty($data['admin_phone_err'])) ? "invalid" : '' ; ?>" />
                                        <span class="invalid-feedback"><?php echo $data['admin_phone_err']; ?></span>
                            </div>
                            <div class="input_box">
                                <span class="details">Password</span>
                                <input type="password" 
                                        name="admin_password" 
                                        placeholder="Enter password"
                                        value="<?php echo $data['admin_password'] ?>"
                                        class="<?php echo (!empty($data['admin_password_err'])) ? "invalid" : '' ; ?>" />
                                        <span class="invalid-feedback"><?php echo $data['admin_password_err']; ?></span>
                            </div>
                            <!-- <div class="input_box">
                                <span class="details">NIC</span>
                                <input type="text" 
                                        name="admin_nic" 
                                        placeholder="Enter NIC"
                                        value="<?php echo $data['admin_nic'] ?>"
                                        class="<?php echo (!empty($data['admin_nic_err'])) ? "invalid" : '' ; ?>" />
                                        <span class="invalid-feedback"><?php echo $data['admin_nic_err']; ?></span>
                            </div> -->
                            <div class="input_box">
                                <span class="details">Date Assigned</span>
                                <input type="date" 
                                        name="admin_date_assigned" 
                                        placeholder="Enter date assigned"
                                        value="<?php echo $data['admin_date_assigned'] ?>"
                                        class="<?php echo (!empty($data['admin_date_assigned_err'])) ? "invalid" : '' ; ?>" />
                                        <span class="invalid-feedback"><?php echo $data['admin_date_assigned_err']; ?></span>
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