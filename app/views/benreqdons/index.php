

<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_dons.php'; ?>


<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donor/donor_accept.css">

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Beneficiary Requests for Donations</h2>

                    </div>
                    <?php if ($data['requests']!=0){ ?>
                    <table>
                        <thead>
                            <tr>
                                <td>Organization name</td>
                                <td>Address</td>
                                <td>Description</td>
                                <td>Priority</td>
                                <td>Quantity</td>
                                <td></td>
                                <td></td>


                            </tr>
                        </thead>

                        <tbody>
                            <!-- <form action="<?php echo URLROOT; ?>/ben_req_dons/getAllRequests" method="post"> -->
                            <tr>


                             <?php foreach($data['requests'] as $request): ?>
                                <td><?php echo $request->B_Name; ?></td>

                                <td><?php echo $request->B_Address; ?></td>
                                <td> <?php echo $request->Donation_Description; ?></td>
                                <td><?php echo $request->Donation_Priority; ?></td>

                                <td><?php echo $request->Remaining_Quantity; ?></td>

                                <td style="text-align: right"><a href="<?php echo URLROOT; ?>/profilebens/index/<?php echo $request->B_Id; ?>" >View Profile</a></td>
                                <td><a href="<?php echo URLROOT;?>/BenReqDons/show/<?= $request->Donation_ID; ?>">View More</a></td>



                            </tr>
                            <?php endforeach; ?> 


                            
                          
                        </tbody>
                    </table>
                    <?php }else { echo '<div class="warn">No requests at the moment</div>';} ?>
                </div>

                <!-- ================= New Customers ================ -->
                <!-- <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Customers</h2>
                    </div>

                    <table>
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>
                    </table> -->
                </div>
            </div>
        </div>
    </div>

    

 <script src="<?php echo URLROOT; ?>/js/beneficiary/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>