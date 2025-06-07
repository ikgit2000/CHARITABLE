<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<?php require APPROOT . '/views/inc/topbar.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin/lists.css">

<!-- ========================= Main ==================== -->
<div class="main">

    <!-- ======================= Buttons ================== -->
    <div class="btnBox">
        <a href="<?php echo URLROOT; ?>/donations/list_of_pending_donations"><button class="btn active">Pending
                Donation Requests</button></a>
        <a href="<?php echo URLROOT; ?>/donations/list_of_accepted_donations"><button class="btn">Accepted
                Donations</button></a>
        <a href="<?php echo URLROOT; ?>/donations/list_of_completed_donations"><button class="btn">Completed
                Donations</button></a>
    </div>


    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">

                <h2>Pending Donation Requests</h2>
            </div>
            <form id="filter-form-1" method="get"
                action="<?php echo URLROOT; ?>/donations/pending_donations_filter_by_btype">
                <label for="b_type">Filter by beneficiary type:</label>
                <select name="b_type" id="b_type">
                    <option value="" <?php echo empty($_GET['b_type']) ? 'selected' : ''; ?>>All</option>
                    <option value="Children Home"
                        <?php echo isset($_GET['b_type']) && $_GET['b_type'] == 'Children Home' ? 'selected' : ''; ?>>
                        Chidren Home</option>
                    <option value="Elder Home"
                        <?php echo isset($_GET['b_type']) && $_GET['b_type'] == 'Elder Home' ? 'selected' : ''; ?>>Elder
                        Home</option>
                    <option value="Disabled Institutes"
                        <?php echo isset($_GET['b_type']) && $_GET['b_type'] == 'Disabled Institutes' ? 'selected' : ''; ?>>
                        Disabled Institutes</option>
                    <option value="Other"
                        <?php echo isset($_GET['b_type']) && $_GET['b_type'] == 'Other' ? 'selected' : ''; ?>>Other
                    </option>
                </select>
                <input type="hidden" name="d_type" id="hidden-d-type"
                    value="<?php echo isset($_GET['d_type']) ? $_GET['d_type'] : ''; ?>">
            </form>

            <form id="filter-form-2" method="get"
                action="<?php echo URLROOT; ?>/donations/pending_donations_filter_by_dtype">
                <label for="b_type">Filter by donation type:</label>
                <select name="d_type" id="d_type">
                    <option value="" <?php echo empty($_GET['d_type']) ? 'selected' : ''; ?>>All</option>
                    <option value="Dry Rations"
                        <?php echo isset($_GET['d_type']) && $_GET['d_type'] == 'Dry Rations' ? 'selected' : ''; ?>>
                        Dry Rations</option>
                    <option value="Education" tions
                        <?php echo isset($_GET['d_type']) && $_GET['d_type'] == 'Education' ? 'selected' : ''; ?>>
                        Education
                    </option>
                    <option value="Clothes"
                        <?php echo isset($_GET['d_type']) && $_GET['d_type'] == 'Clothes' ? 'selected' : ''; ?>>
                        Clothes</option>
                    <option value="Medicine"
                        <?php echo isset($_GET['d_type']) && $_GET['d_type'] == 'Medicine' ? 'selected' : ''; ?>>
                        Medicine
                    </option>
                    <option value="Sanitary items"
                        <?php echo isset($_GET['d_type']) && $_GET['d_type'] == 'Sanitary items' ? 'selected' : ''; ?>>
                        Sanitary items
                    </option>
                    <option value="Others"
                        <?php echo isset($_GET['d_type']) && $_GET['d_type'] == 'Others' ? 'selected' : ''; ?>>Others
                    </option>
                </select>
                <input type="hidden" name="b_type" id="hidden-b-type"
                    value="<?php echo isset($_GET['b_type']) ? $_GET['b_type'] : ''; ?>">
            </form>



            <table>
                <thead>
                    <tr>
                        <td>Donation ID</td>
                        <td>Donor Name</td>
                        <td>Beneficiary Name</td>

                        <td>Beneficiary Type</td>
                        <td>Donation Type</td>
                        <td>Donation Priority</td>
                        <td>Donation Details</td>
                        <td>Donation Date & Time</td>

                        <!-- <td>Status</td> -->
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <?php foreach($data['donation_details'] as $donation_details): ?>
                        <td><?php echo $donation_details->Donation_ID; ?></td>
                        <td><?php echo $donation_details->D_Name; ?></td>
                        <td><?php echo $donation_details->B_Name; ?></td>

                        <td><?php echo $donation_details->B_Type; ?></td>
                        <td><?php echo $donation_details->Donation_Type; ?></td>
                        <td><?php echo $donation_details->Donation_Priority; ?></td>
                        <td><?php echo $donation_details->Donation_Details; ?></td>

                        <td><?php echo $donation_details->Donation_Time; ?></td>
                        <!-- <td><?php echo $donation_details->Accepted; ?></td> -->
                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>

            <!-- <form method="POST" action="<?php echo URLROOT ?>/pdf" target="_blank">
                <input type="submit" name="pdf_creater" value="PDF">
            </form> -->

        </div>
    </div>
</div>
</div>

<!-- =========== Scripts =========  -->

<script>
document.getElementById('b_type').addEventListener('change', function() {
    document.getElementById('hidden-d-type').value = document.getElementById('d_type').value;
    document.getElementById('filter-form-1').submit();
});

document.getElementById('d_type').addEventListener('change', function() {
    document.getElementById('hidden-b-type').value = document.getElementById('b_type').value;
    document.getElementById('filter-form-2').submit();
});
</script>

</body>

</html>