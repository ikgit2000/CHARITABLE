<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_dons.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donor/dashboard.css">

<div class="details">
    <div class="cardHeader">
    </div>
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Completed Donations Requested by Beneficiaries</h2>
        </div>
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

                <?php foreach($data['requestscomben'] as $requestscomben): ?>
                <!--                <td> <?php /*echo $requestscomben->Donation_ID; */?></td>
-->                <td><?php echo $requestscomben->B_Name; ?></td>
                <td><?php echo $requestscomben->Donation_Type; ?></td>
                <td><?php echo $requestscomben->Donation_Description; ?></td>
                <td><?php echo $requestscomben->Donation_Quantity; ?></td>
                <td style="text-align: right"><a href="<?php echo URLROOT; ?>/profilebens/index/<?php echo $requestscomben->B_Id; ?>" >View Profile</a></td>
                <td style="text-align: right"><a href="<?php echo URLROOT; ?>/schedulereq_dons/showbenreq/<?php echo $requestscomben->B_Id; ?>" >View More</a></td>

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

