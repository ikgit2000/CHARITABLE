<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_dons.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?> /css/donor/dashboard.css">

<body>


<!-- ======================= Cards ================== -->
<div class="cardBox">

    <div class="card">
        <div>
            <a style="text-decoration: none;" href="<?php echo URLROOT; ?>/schedulereq_dons/ongoingschreq">
            <div class="numbers"><?php echo $data['accept'] ?></div>
            <div class="cardName">Ongoing Donations</div>
        </div>

        <div class="iconBx">
            <ion-icon name="eye-outline"></ion-icon>
        </div>
        </a>
    </div>

    <div class="card">
        <div>
            <a style="text-decoration: none;" href="<?php echo URLROOT; ?>/schedulereq_dons/reviewreq">

            <div class="numbers"><?php echo $data['pending'] ?></div>
            <div class="cardName">Donations Under Review</div>
        </div>

        <div class="iconBx">
            <ion-icon name="cart-outline"></ion-icon>
        </div>
        </a>
    </div>

    <div class="card">
        <div>
            <a style="text-decoration: none;" href="<?php echo URLROOT; ?>/schedulereq_dons/comschreq">
            <div class="numbers"><?php echo $data['complete'] ?></div>
            <div class="cardName">Completed Scheduled Donations</div>
        </div>

        <div class="iconBx">
            <ion-icon name="chatbubbles-outline"></ion-icon>
        </div>
        </a>
    </div>

    <div class="card">
        <div>
            <a style="text-decoration: none;" href="<?php echo URLROOT; ?>/schedulereq_dons/combenreq">
            <div class="numbers"><?php echo $data['count'] ?></div>
            <div class="cardName">Completed Beneficiary Donations</div>
        </div>

        <div class="iconBx">
            <ion-icon name="eye-outline"></ion-icon>
        </div>
    </a>
    </div>

            
            <!--<div class="all-req">
            <h2>Recent Requests</h2> 
            </div>

            <div class="new-select">
-->
    <!-- ================ Order Details List ================= -->
    
</div>

<div class="details" >
    <div class="recentOrders" >
        <div class="cardHeader">
            <h2>Recent Donations</h2>
        </div>

        <div class="recentOrders-new">
        <div class="cardHeader">
            <h2>Scheduled Donations</h2>
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
        <div class="recentOrders-new">
        <div class="cardHeader">
            <h2>Beneficiary Donations</h2>
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
                <td><a href="<?php echo URLROOT; ?>/schedulereq_dons/showbenreq/<?php echo $requests->B_Id; ?>"?>view more</a></td>
            </tr>
            <?php endforeach; ?>


            </tbody>
        </table>

    </div>
</div>


</div>
</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
