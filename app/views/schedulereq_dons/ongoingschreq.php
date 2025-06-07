<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_dons.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donor/dashboard.css">

<div class="details">
    <div class="cardHeader">
    </div>
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Ongoing Scheduled Donations</h2>
        </div>

        <table>
            <thead>
            <tr>
                <!--                <td>Id</td>
                --><td>Beneficiary</td>
                <td>Date</td>
                <td>Food Type</td>
                <td>Quantity</td>
                <td>Time</td>
                <td></td>


            </tr>
            </thead>

            <tbody>

            <tr>

                <?php foreach($data['requests'] as $requests): ?>
                <!--                <td> <?php /*echo $requests->B_Req_ID; */?></td>
-->                <td><?php echo $requests->B_Name; ?></td>
                <td><?php echo $requests->D_Date; ?></td>
                <td><?php echo $requests->Food_Type; ?></td>
                <td><?php echo $requests->Donation_Quantity; ?></td>
                <td ><?php echo $requests->Time; ?></td>
                <td style="text-align: right"><a href="<?php echo URLROOT; ?>/profilebens/index/<?php echo $requests->B_Id; ?>" >View Profile</a></td>
            </tr>
            <?php endforeach; ?>


            </tbody>
        </table>
    </div>
</div>
<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Ongoing Beneficiary Donations</h2>
            <!--                <a href="<?php /*echo URLROOT; */?>/request_bens/add" class="btn">Add requests</a>
-->            </div>
        <table>
            <thead>
            <tr>
                <!--                <td>Id</td>
                -->                <td>Beneficiary</td>
                <td>Donation Type</td>
                <td>Donation Discription</td>
                <td>Quantity</td>
                <td></td>
                <td></td>

            </tr>
            </thead>

            <tbody>

            <tr>

                <?php foreach($data['requestsben'] as $requestsben): ?>
                <!--                <td> <?php /*echo $requestsben->Donation_ID; */?></td>
-->                <td><?php echo $requestsben->B_Name; ?></td>
                <td><?php echo $requestsben->Donation_Type; ?></td>
                <td><?php echo $requestsben->Donation_Description; ?></td>
                <td><?php echo $requestsben->Donation_Quantity; ?></td>
                <td style="text-align: right"><a href="<?php echo URLROOT; ?>/profilebens/index/<?php echo $requests->B_Id; ?>" >View Profile</a></td>
                <td style="text-align: right"><a href="<?php echo URLROOT; ?>/schedulereq_dons/showbenreq/<?php echo $requests->B_Id; ?>" >View More</a></td>

            </tr>
            <?php endforeach; ?>


            </tbody>
        </table>

    </div>
</div>
</div>
</div>
</div>
</main>

<script src="<?php echo URLROOT; ?>/js/donor/main.js"></script>

<?php require APPROOT . '/views/inc/footer.php'; ?>

