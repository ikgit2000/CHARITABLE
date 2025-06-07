


<?php require APPROOT . '/views/inc/header.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/benificiary/settings.css">
<?php require APPROOT . '/views/inc/navbar_ben.php'; ?>
        <!-- ======================= Cards ================== -->




        <!-- ================ Order Details List ================= -->
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
<!--                    <h2>Recent Orders</h2>-->
<!--                    <a href="--><?php //echo URLROOT; ?><!--/request_bens/add" class="btn">Add posts</a>-->
                </div>



<!--                <form class="forms" action="--><?php //echo URLROOT; ?><!--/settingBens/index" method="POST">-->
                    <div class="container">
                        <h1>Update Profile</h1>
                        <hr>
                        <div class="content-sidebar">
                            <div class="content">
                                <div class="des">
                                    <h3> <label for="Name"><b>Name</b></label></h3>
                                </div>
                            </div>
                            <div class="data">
                                <input type="text" name="B_Name" value="<?php echo $data['B_Name']; ?>" disabled></input>
                                <div class=warn> <?php if(isset($data['B_Name_err'])) echo $data['B_Name_err']; ?></div>

                            </div>
                            <div class="content">
                                <label for="address"><h3>Address</h3></label>
                            </div>
                            <div class="data">
                                <input type="text" name="B_Address" placeholder="Address" value="<?php echo $data['B_Address']; ?>" disabled>
                                <div class=warn> <?php if(isset($data['B_Address_err'])) echo $data['B_Address_err']; ?></div>
                            </div>


                        <div class="content">
                            <label for="telephone_number"><h3>Telephone Number</h3></label>
                        </div>
                        <div class="data">
                            <input type="text" name="B_Phone" placeholder="telephone number" value="<?php echo $data['B_Phone']; ?>" disabled>
<!--                            <div class=warn> --><?php //if(isset($data['B_Phone_err'])) echo $data['B_Phone_err']; ?><!--</div>-->
                        </div>


                            <div class="content">
                                <div class="des">
                                    <h3> <label for="Description"><b>Beneficiary Description</b></label></h3>
                                </div>
                            </div>
                            <div class="data">
                                <textarea id="subject" name="B_Description" value="<?php echo $data['B_Description']; ?>" disabled><?php echo $data['B_Description'] ?> </textarea>
                                <div class=warn> <?php if(isset($data['B_Description_err'])) echo $data['B_Description_err']; ?></div>

                            </div>
                    <div class="content">
                        <label for="members"><h3>Members</h3></label>
                    </div>
                    <div class="data">
                        <input type="text" name="B_Members" placeholder="Members" value="<?php echo $data['B_Members']; ?>" disabled>
                        <div class=warn> <?php if(isset($data['B_Members_err'])) echo $data['B_Members_err']; ?></div>
                    </div>


            <div class="content">
                <label for="Registration Letter"><h3>Registration letter</h3></label>
            </div>
            <div class="data">
                <input type="text" name="B_RegistrationLetter" placeholder="Registration Letter" value="<?php echo $data['B_RegistrationLetter']; ?>" disabled>
                <div class=warn> <?php if(isset($data['B_RegistrationLetter_err'])) echo $data['B_RegistrationLetter_err']; ?></div>
            </div>


<!--        <div class="content">-->
<!--            <label for="Donation Quantity"><h3>Donation Quantity</h3></label>-->
<!--        </div>-->
<!--        <div class="data">-->
<!--            <input type="text" name="Donation_Quantity" placeholder="Donation Quantity" value="--><?php //echo $data['Donation_Quantity']; ?><!--">-->
<!--        </div>-->



<!--                            <div class="content">-->
<!--                                <label for="Donation Quantity"><h3>Donation Quantity</h3></label>-->
<!--                            </div>-->
<!--                            <div class="data">-->
<!--                                <input type="text" name="Donation_Quantity" placeholder="Donation Quantity" value="--><?php //echo $data['Donation_Quantity']; ?><!--">-->
<!--                            </div>-->

                        </div>
                    </div>
                        <div class="button-alignment">
                            <a href="<?php echo URLROOT ?>/SettingBens/index "> <input type="submit" class="button button1" value="Edit your profile"></a>
                        </div>
                    </div>
            </div>
            
        </div>
    </div>





    <script src="<?php echo URLROOT; ?>/js/beneficiary/main.js"></script>
    <?php require APPROOT . '/views/inc/footer.php'; ?>
