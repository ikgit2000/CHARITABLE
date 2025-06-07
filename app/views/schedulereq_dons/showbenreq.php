
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_dons.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donor/dashboard.css">

<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h1><?php echo $data['requests']->B_Name; ?></h1>
        </div>
        <div class="content-sidebar">
            <!--<div class="content">
                            <h3>ID</h3>
                        </div>
                        <div class="data">
                        <?php /*echo $data['requests']->B_Req_ID; */?>
                        </div>-->
            <!--<div class="content">
                <h3>Beneficiary</h3>
            </div>
            <div class="data">
                <?php /*echo $data['requests']->B_Name; */?>
            </div>-->
            <div class="content">
                <h3>Discription</h3>
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
                <h3>Donation Quantity</h3>
            </div>
            <div class="data">
                <?php echo $data['requests']->Donation_Quantity; ?>
            </div>
            <div class="content">
                <h3>Donation Priority</h3>
            </div>
            <div class="data">
                <?php echo $data['requests']->Donation_Priority; ?>
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
                <h3>Accepted Date</h3>
            </div>
            <div class="data">
                <?php echo $data['requests']->Accepted_Time; ?>
            </div>
        </div>


        <!--<div class="content-sidebar">
            <div class="content">

                <form action="<?php /*echo URLROOT; */?>/schedulereq_dons/edit/<?php /*echo $data['requests']->B_Req_ID; */?>"
                      method="post">
                    <input type="submit" class="button button1" id="Edit" value="Edit">
                </form>

            </div>
            <div class="data">
                <form
                    action="<?php /*echo URLROOT; */?>/schedulereq_dons/delete/<?php /*echo $data['requests']->B_Req_ID; */?>"
                    method="post">
                    <input type="submit" class="button button2" id="Delete" value="Delete">
                </form>
            </div>
        </div>-->
    </div>
</div>
</div>
</div>


<script src="<?php echo URLROOT; ?>/js/donor/main.js"></script>

<?php require APPROOT . '/views/inc/footer.php'; ?>


