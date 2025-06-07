<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_ben.php'; ?>




    <link rel="stylesheet" href="<?php echo URLROOT?>/css/benificiary/report.css">
<script>
    function redirectToMonthlyReport() {
        var month = document.getElementById("monthDropdown").value;
        var redirectURL = "<?php echo URLROOT; ?>/stat_bens/monthlyReport/" + month;
        window.location.href = redirectURL;
    }
</script>



<div>
    <ul>
    <button class="genpdf" id="download" onclick="genPDF()">Download</button>

    <label for="monthDropdown"></label>

    <select id="monthDropdown" onchange="redirectToMonthlyReport()">

        <option value="" disabled selected>Select a month>></option>
        <option value="1">January</option>
        <option value="2">February</option>
        <option value="3">March</option>
        <option value="4">April</option>
        <option value="5">May</option>
        <option value="6">June</option>
        <option value="7" >July</option>
        <option value="8">August</option>
        <option value="9">September</option>
        <option value="10">Octomber</option>
        <option value="11">November</option>
        <option value="12">December</option>

        <!-- Add more options for the other months -->
    </select>
    </ul>
</div>

<!-- ================ Order Details List ================= -->
<div class="section" id="section">
<div class="report">

    <div class="header">
        <img src="<?php echo URLROOT ?>/img/logo_white.png" alt="Logo" class="logo">
        <h1 class="Title">Report for Month <?php $monthNumber=$data['month']; // Numeric representation of the month (e.g., 1 for January, 2 for February)
            $monthName = date("F", strtotime("2000-$monthNumber-01"));
            echo $monthName;?> </h1>
        <br>
        <br>
        <h1 class="organization-name"><?php echo $data['user']->B_Name ?> </h1>
    </div>


    <div class="details">
        <!-- Add organization details here -->
        <!-- For example: -->
        <p>Address:<?php echo $data['user']->B_Address?></p>
        <p>Contact: <?php echo $data['user']->B_Tpno ?></p>
        <p>Date issued: <?php echo date("l jS \of F Y  ")?>
        <p> Details for month : <?php $monthNumber=$data['month']; // Numeric representation of the month (e.g., 1 for January, 2 for February)
            $monthName = date("F", strtotime("2000-$monthNumber-01"));
            echo $monthName;?></p>

    </div>

    <h2>Monthly Summary</h2>
    <table>
        <tr>
            <th>Donation Requested</th>
            <th>Donation Received</th>
        </tr>
        <tr>
<!--            <td>--><?php //echo $data['donationsMonth'] ?><!--</td>-->
            <td><?php echo $data['donationsMonth']->num_rows; ?></td>
            <td><?php echo $data['completedDonationsMonth']->num_rows;?></td>

        </tr>
    </table>

    <h2>Meals Summary</h2>
    <table>
        <tr>
            <th>Meal Type</th>
            <th>Quantity</th>
        </tr>
        <tr>
            <td>Breakfast</td>
            <td><?php echo $data['breakfast']->Total_Donation_Quantity?></td>
        </tr>
        <tr>
            <td>Lunch</td>
        <td><?php echo $data['lunch']->Total_Donation_Quantity?></td>
        </tr>
        <tr>
            <td>Dinner</td>
           <td><?php echo $data['dinner']->Total_Donation_Quantity?></td>
        </tr>
    </table>

    <h2>List of Donations</h2>
    <table>
<?php if ($data['donations']!=  null) { ?>
        <?php foreach ($data['donations'] as $donation) : ?>
            <tr>
                <td><?php echo $donation->Donation_Description; ?></td>
                <td><?php echo $donation->Donation_Quantity; ?></td>
        <?php endforeach; ?>
        <!-- Add more donation rows as needed -->
<?php } else { ?>
    <div>   <h2 style="text-align: center">No Requests </h2></div>
<?php } ?>
    </table>


    <div class="signature">
        <div class="party">
            <p>Signature: ________________________</p>

            <p>Date: _____________________________</p>
        </div>
        <div class="party1">
            <p>Signature: ________________________</p>

            <p>Date: _____________________________</p>
        </div>
    </div>
    </div>

</div>
<script src="<?php echo URLROOT; ?>/js/genPDF.js"></script>
<script src="<?php echo URLROOT; ?>/js/beneficiary/statben.js"></script>
<script src="<?php echo URLROOT; ?>/js/beneficiary/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>

