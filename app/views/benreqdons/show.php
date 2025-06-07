

<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_dons.php'; ?>


<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donor/dashboard.css">

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h1><?php echo $data['user']->B_Name; ?></h1>
<!--                         <a href="<?php echo URLROOT; ?>/request_bens/add" class="btn">Add posts</a>
 -->                    </div>

                    <!-- <table>
                        <thead>
                            <tr>
                                <td>Request_Id</td>
                                <td>Description</td>
                                <td>Type</td>
                                <td>Quantity</td>
                                <td>Priority</td>
                                
                            </tr>
                        </thead>

                        <tbody>
                            
                            <tr>
                               
                           
                            </tr>
                            <tr>
                                <?php if($data['request']->B_Id == $_SESSION['user_id']) : ?>
                           
                            <h1><?php echo $data['request']->Donation_ID; ?></h1>
                               <td> <h1><?php echo $data['request']->Donation_Description; ?></h1></td></td>
                               <h3> <?php echo $data['request']->Donation_Quantity; ?></h3>
                                   <?php echo $data['user']->B_Name?>   
                             <?php endif; ?>
                            </tr>
                
                            <tr>
                        
                            </tr>
                            <div>
                                <form action="<?php echo URLROOT; ?>/request_bens/edit/<?php echo $data['request']->Donation_ID ?>" method="post">
                                <input type="submit" value="Edit" >
                                </form>
                                <form action="<?php echo URLROOT; ?>/request_bens/delete/<?php echo $data['request']->Donation_ID; ?>" method="post">
                                <input type="submit" value="Delete" >
                                </form>
                           </div>
                        </tbody>
                    </table>
                </div> -->
                    <form
                        action="<?php echo URLROOT; ?>/BenReqDons/show/<?php echo $data['requests']->Donation_ID?>"
                        method="post">
                <div class="content-sidebar">
                        <div class="content">
                            <h3>Donation ID</h3>
                        </div>
                        <div class="data">
                        <?php echo $data['requests']->Donation_ID; ?>
                        </div>
                        <div class="content">
                            <h3>Donation Description</h3>
                        </div>
                        <div class="data">
                        <?php echo $data['requests']->Donation_Description; ?>
                        </div>
                        <div class="content">
                            <h3>Donation Type</h3>
                        </div>
                        <div class="data">
                        <?php echo $data['requests']->Donation_Type; ?>
                        </div>
                    <div class="content">
                        <h3>Donation Details</h3>
                    </div>
                    <div class="data">
                        <?php echo $data['requests']->Donation_Details; ?>
                    </div>
                    <div class="content">
                        <h3>Requested Date</h3>
                    </div>
                    <div class="data">
                        <?php echo $data['requests']->Donation_Time; ?>
                    </div>
                        <div class="content">
                            <h3>Donation Quantity</h3>
                        </div>
                        <div class="data">
                            <input type="text" name="Donation_Quantity" placeholder="quantity" value="<?php echo $data['requests']->Remaining_Quantity; ?>">
                            <div class="warn"> <?php if(isset($data['Quantity_err'])) echo $data['Quantity_err']; ?></div>
                        </div>

                    </div>


                    <div class="content-sidebar">
                        <div class="content">

                                <input type="submit" class="button button1" id="Edit" value="Accept">
                            </form>
                           
                        </div>
                       
                    </div>
                    </tbody>
                    </table>
                </div>

                
            </div>
        </div>
    </div>


                <!-- ================= New Customers ================ -->
               
            </div>
        </div>
    </div>

    

 <script src="<?php echo URLROOT; ?>/js/beneficiary/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>