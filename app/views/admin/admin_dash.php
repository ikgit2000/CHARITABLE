<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<?php require APPROOT . '/views/inc/topbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin/dashboard.css">

<!-- ========================= Main ==================== -->
<div class="main">


    <!-- ======================= Cards ================== -->
    <div class="cardBox">
        <a href="<?php echo URLROOT; ?>/donors/list_of_donors">
            <div class="card">
                <div>

                    <div class="numbers"><?php echo $data['don_count']; ?></div>

                    <div class="cardName">Donors</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="eye-outline"></ion-icon>
                </div>
            </div>
        </a>

        <a href="<?php echo URLROOT; ?>/beneficiaries/list_of_beneficiaries">
            <div class="card">
                <div>

                    <div class="numbers"><?php echo $data['ben_count']; ?></div>

                    <div class="cardName">Beneficiaries</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="cart-outline"></ion-icon>
                </div>
            </div>
        </a>

        <!-- <a href="<?php echo URLROOT; ?>/eventHosters/list_of_eventHosters">
            <div class="card">
                <div>
                    <div class="numbers"><?php echo $data['eh_count']; ?></div>
                    <div class="cardName">Event Hosters</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="chatbubbles-outline"></ion-icon>
                </div>
            </div>
        </a> -->

        <!-- <a href="<?php echo URLROOT; ?>/posts">
            <div class="card">
                <div>
                    <div class="numbers"><?php echo $data['post_count']; ?></div>
                    <div class="cardName">Posts</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="cash-outline"></ion-icon>
                </div>
            </div>
        </a> -->
    </div>

    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">

                <h2>Recent Pending Donations</h2>
                <a href="<?php echo URLROOT; ?>/donations/list_of_pending_donations" class="btn">View All</a>

            </div>

            <table>
                <thead>
                    <tr>
                        <td>Donation ID</td>
                        <td>Donor Name</td>
                        <td>Beneficiary Name</td>
                        <td>Donation Type</td>
                        <td>Donation Date</td>

                    </tr>
                </thead>

                <tbody>
                    <tr>

                        <?php foreach($data['pending_donation_details'] as $donation_details): ?>

                        <td><?php echo $donation_details->Donation_ID; ?></td>
                        <td><?php echo $donation_details->D_Name; ?></td>
                        <td><?php echo $donation_details->B_Name; ?></td>
                        <td><?php echo $donation_details->Donation_Type; ?></td>
                        <td><?php echo $donation_details->Donation_Time; ?></td>

                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>

        <!-- ================= New Customers ================ -->
        <!-- <div class="recentOrders">
            <div class="cardHeader">

                <h2>Recent Pending Events</h2>
                <a href="<?php echo URLROOT; ?>/events/list_of_pending_events" class="btn">View All</a>

            </div>

            <table>
                <thead>
                    <tr>
                        <td>Event ID</td>
                        <td>Event Name</td>
                        <td>Organization Name</td>
                        <td>Beneficiary Name</td>
                        <td>Date</td>
                        <td>Time</td>
                    </tr>
                </thead>

                <tbody>
                    <tr>

                        <?php foreach($data['pending_event_details'] as $event_details): ?>
                        <td><?php echo $event_details->Event_ID; ?></td>
                        <td><?php echo $event_details->E_Name; ?></td>

                        <td><?php echo $event_details->E_Name; ?></td>
                        <td><?php echo $event_details->B_Name; ?></td>
                        <td><?php echo $event_details->Event_Date; ?></td>
                        <td><?php echo $event_details->Event_Time; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div> -->

    </div>
</div>
</div>

<!-- =========== Scripts =========  -->
<script src="<?php echo URLROOT ?>/public/js/toggle.js"></script>

</body>

</html>