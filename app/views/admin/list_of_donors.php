<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<?php require APPROOT . '/views/inc/topbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin/lists.css">


<!-- ========================= Main ==================== -->
<div class="main">
    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Donors' List</h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <td>Donor ID</td>
                        <td>Profile Picture</td>
                        <td>Donor Name</td>
                        <td>Donor TP</td>
                        <td>Action</td>
                    </tr>
                </thead>


                <tbody>
                    <tr>
                        <?php foreach($data['donor_details'] as $donor_details): ?>

                        <td><?php echo $donor_details->D_Id; ?></td>
                        <td><img src="<?php echo URLROOT; ?>/public/img/admin/customer01.jpg"
                                style="hight:50px; width:50px; border-radius:50%;" alt="Profile Picture">
                        </td>
                        <td><?php echo $donor_details->D_Name; ?></td>
                        <td><?php echo $donor_details->D_Tel_No; ?></td>
                        <td><a href="<?php echo URLROOT; ?>/donors/view_profile/<?php echo $donor_details->D_Id; ?>"><button
                                    class="btn_1">View Profile</button></td></a></td>

                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>

</html>