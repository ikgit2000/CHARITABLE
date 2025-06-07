

<?php require APPROOT . '/views/inc/header.php'; ?>


<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/benificiary/settings.css">
<body>
<!-- =============== Navigation ================ -->
<div class="container">
    <div class="navigation">
        <ul>
            <li>
                <a href="#">
                        <span class="icon">
                            <img src="<?php echo URLROOT; ?>/img/logo_white.png">
                        </span>
                    <span class="title"></span>
                </a>
            </li>

            <li id="#" >
                <a href="#">
                        <span class="icon">
                            <i class="fas fa-home"></i>
                        </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="#">
                        <span class="icon">
                            <i class="fas fa-user"></i>
                        </span>
                    <span class="title">Requests</span>
                </a>
            </li>

            <li>
                <a href="#">
                        <span class="icon">
                            <i class="fas fa-comment"></i>
                        </span>
                    <span class="title">Stats</span>
                </a>
            </li>

            <li>
                <a href="#">
                        <span class="icon">
                            <i class="fas fa-calendar"></i>
                        </span>
                    <span class="title">Calender</span>
                </a>
            </li>

            <li>
                <a href="#">
                        <span class="icon">
                            <i class="fas fa-cog"></i>
                        </span>
                    <span class="title">Settings</span>
                </a>
            </li>
            <?php if(isset($_SESSION['user_id'])) : ?>

                <li>
                    <a href="<?php echo URLROOT;?>/users/logout">
                        <span class="icon">
                            <i class="fas fa-sign-out-alt"></i>
                        </span>
                        <span class="title">Logout</span>
                    </a>
                </li>
            <?php endif; ?>

        </ul>
    </div>

    <!-- ========================= Main ==================== -->
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <i class="fas fa-bars"></i>
            </div>


            <div class="user">
                <i class="fas fa-user"></i>
            </div>
        </div>

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
                            <input type="text" name="B_RegistrationLetter" placeholder="Document" value="<?php echo $data['document']; ?>" disabled>
                            <div class=warn> <?php if(isset($data['document_err'])) echo $data['document_err']; ?></div>
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