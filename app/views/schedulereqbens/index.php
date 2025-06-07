

<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_ben.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/benificiary/ben_accept.css">


        <!-- ================ Order Details List ================= -->
        <div class="calender-container">
            <div class="calendar">
                <div id="calendar"></div>
                <div id="event-details" class="popup"></div>

                <br>
                <h4><span class="blue-box"></span>   Fully or partialy requested but Not Accepted yet.</h4>
                <h4><span class="green-box"></span>   Fully or partialy requested and Fully or Partialy Accepted.</h4>
                <h4><span class="red-box"></span>   Fully or partialy requested and Fully Accepted.</h4>

            </div>
        </div>
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Requests for Meal Donations</h2>
                </div>

                <table>
                    <thead>
                    <tr>
                        <td>Donor Name</td>
                        <td>Date</td>
                        <td>Time</td>
                        <td>Quantity</td>
                        <td></td>

                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <?php foreach($data['requests'] as $requests): ?>
                        <td><?php echo $requests->D_Name; ?></td>
                        <td><?php echo $requests->D_Date; ?></td>
                        <td><?php echo $requests->Time; ?></td>
                        <td><?php echo $requests->Donation_Quantity; ?></td>
                        <td ><a href="<?php echo URLROOT; ?>/schedulereqbens/show/<?php echo $requests->B_Req_ID;?>">View More</a></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Requests for Meal Donations</h2>
                </div>

                <table>
                    <thead>
                    <tr>
                        <td>Donor Name</td>
                        <td>Date</td>
                        <td>Time</td>
                        <td>Quantity</td>
                        <td></td>

                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <?php foreach($data['accreq'] as $accreq): ?>
                        <td><?php echo $accreq->D_Name; ?></td>
                        <td><?php echo $accreq->D_Date; ?></td>
                        <td><?php echo $accreq->Time; ?></td>
                        <td><?php echo $accreq->Donation_Quantity; ?></td>
                        <td ><a href="<?php echo URLROOT; ?>/schedulereqbens/showacc/<?php echo $accreq->B_Req_ID;?>">View More</a></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>



    </div>
</div>
</div>



<script src="<?php echo URLROOT; ?>/js/donor/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>