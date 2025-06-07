


<?php require APPROOT . '/views/inc/header.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/profile/profileben.css">
<body >

        <!-- ================ Order Details List ================= -->
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                </div>

                <div class="container">

                    <h1 ><?php echo $data['requests']->B_Name; ?></h1>
                    <hr>
                    <h2 > <div class="data">
                            <?php echo $data['requests']->B_Description; ?>
                        </div>
                    </h2>
                    <div class="content-sidebar">

                        <div class="content">
                            <div class="des">
                            </div>
                        </div>
                        <div class="data">
                        </div>

                        <div class="content">
                            <div class="des">
                            </div>
                        </div>
                        <div class="data">
                        </div>

                        <div class="content">
                            <div class="des">
                            </div>
                        </div>
                        <div class="data">
                        </div>

                        <div class="content">
                            <div class="des">
                                <h3> <label for="Email"><b>E-Mail</b></label></h3>
                            </div>
                        </div>
                        <div class="data">
                            <?php echo $data['requests']->B_Email; ?>
                        </div>


                        <div class="content">
                            <label for="address"><h3>Address</h3></label>
                        </div>
                        <div class="data">
                            <?php echo $data['requests']->B_Address; ?>
                        </div>


                        <div class="content">
                            <label for="telephone_number"><h3>Telephone Number</h3></label>
                        </div>
                        <div class="data">
                            <?php echo $data['requests']->B_Tpno; ?>
                        </div>


                        <div class="content">
                            <label for="members"><h3>Members</h3></label>
                        </div>
                        <div class="data">
                            <?php echo $data['requests']->B_Members; ?>
                        </div>



                        <div class="content">
                            <label for="Registration Letter"><h3>Registration letter</h3></label>
                        </div>
                        <div class="data" >
                            <?php echo $data['requests']->document; ?>
                        </div>


            
                         </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>





<script src="<?php echo URLROOT; ?>/js/beneficiary/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
