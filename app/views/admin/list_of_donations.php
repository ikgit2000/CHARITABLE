<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin/lists.css">

<!-- ========================= Main ==================== -->
<div class="main">
    <?php require APPROOT . '/views/inc/topbar.php'; ?>

    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>List of Donations</h2>
                <!-- <a href="#" class="btn">View All</a> -->
            </div>

            <table>
                <thead>
                    <tr>
                        <td>Donation ID</td>
                        <td>Donor Name</td>
                        <td>Beneficiary Name</td>
                        <td>Donation Type</td>
                        <td>Donation Date</td>
                        <td>Status</td>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <?php foreach($data['donation_details'] as $donation_details): ?>
                        <td><?php echo $donation_details->Donation_ID; ?></td>
                        <td><?php echo $donation_details->D_Name; ?></td>
                        <td><?php echo $donation_details->B_Name; ?></td>
                        <td><?php echo $donation_details->Donation_Type; ?></td>
                        <td><?php echo $donation_details->Donation_Time; ?></td>
                        <td><?php echo $donation_details->Accepted; ?></td>
                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
            <form method="POST" action="<?php echo URLROOT ?>/pdf" target="_blank">
                <input type="submit" name="pdf_creater" value="PDF">
            </form>
        </div>
    </div>
</div>
</div>

<!-- =========== Scripts =========  -->
<script src="<?php echo URLROOT ?>/public/js/toggle.js"></script>

</body>

</html>