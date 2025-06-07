<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_dons.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donor/dashboard.css">

<div class="details">
    <div class="cardHeader">
    </div>
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Completed Scheduled Donations</h2>
        </div>
        <table>
            <thead>
            <tr>
                <!--                <td>Id</td>
                -->                <td>Beneficiary</td>
                <td>Date</td>
                <td>Food Type</td>
                <td>Quantity</td>
                <td>Time</td>
                <td></td>

            </tr>
            </thead>

            <tbody>

            <tr>

                <?php foreach($data['requestscom'] as $requestscom): ?>
                <!--                <td> <?php /*echo $requestscom->B_Req_ID; */?></td>
-->                <td><?php echo $requestscom->B_Name; ?></td>
                <td><?php echo $requestscom->D_Date; ?></td>
                <td><?php echo $requestscom->Food_Type; ?></td>
                <td><?php echo $requestscom->Donation_Quantity; ?></td>
                <td ><?php echo $requestscom->Time; ?></td>
                <td style="text-align: right"><a href="<?php echo URLROOT; ?>/profilebens/index/<?php echo $requestscom->B_Id; ?>" >View Profile</a></td>
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

