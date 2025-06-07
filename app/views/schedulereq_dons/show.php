
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_dons.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donor/dashboard.css">

<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">

            <h2>Recently Requested Donation</h2>

        </div>
                    <div class="content-sidebar">
                        <!--<div class="content">
                            <h3>ID</h3>
                        </div>
                        <div class="data">
                        <?php /*echo $data['requests']->B_Req_ID; */?>
                        </div>-->
                        <div class="content">
                            <h3>D_Date</h3>
                        </div>
                        <div class="data">
                        <?php echo $data['requests']->D_Date; ?>
                        </div>
                        <div class="content">
                            <h3>Time</h3>
                        </div>
                        <div class="data">
                        <?php echo $data['requests']->Time; ?>
                        </div>
                        <div class="content">
                            <h3>Food Type</h3>
                        </div>
                        <div class="data">
                        <?php echo $data['requests']->Food_Type; ?>
                        </div>
                        <div class="content">
                            <h3>Donation Quantity</h3>
                        </div>
                        <div class="data">
                        <?php echo $data['requests']->Donation_Quantity; ?>
                        </div>
                    </div>


                    <div class="content-sidebar">
                        <div class="content">

                            <form action="<?php echo URLROOT; ?>/schedulereq_dons/edit/<?php echo $data['requests']->B_Req_ID; ?>"
                                method="post">
                                <input type="submit" class="button button1" id="Edit" value="Edit">
                            </form>
                           
                        </div>
                        <div class="data">
                            <form
                                action="<?php echo URLROOT; ?>/schedulereq_dons/delete/<?php echo $data['requests']->B_Req_ID; ?>"
                                method="post">
                                <input type="submit" class="button button2" id="Delete" value="Delete">
                            </form>
                        </div>
                    </div>
    </div>
</div>
</div>
</div>


<script src="<?php echo URLROOT; ?>/js/donor/main.js"></script>

                <?php require APPROOT . '/views/inc/footer.php'; ?>


