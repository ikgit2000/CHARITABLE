<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<?php require APPROOT . '/views/inc/topbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin/lists.css">

<!-- ========================= Main ==================== -->
<div class="main">
    <!-- ======================= Buttons ================== -->
    <div class="btnBox">

        <a href="<?php echo URLROOT; ?>/beneficiaries/registration_requests"><button class="btn active">Registration
                Requests</button></a>
        <a href="<?php echo URLROOT; ?>/beneficiaries/list_of_beneficiaries"><button class="btn">Beneficiaries'
                List</button></a>
    </div>

    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Beneficiary - Registration Requests</h2>
            </div>
            <form id="filter-form" method="get"
                action="<?php echo URLROOT; ?>/beneficiaries/registration_requests_filter_by_type">
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
            </form>
            <table>
                <thead>
                    <tr>
                        <td>Beneficiary ID</td>
                        <td>Profile Picture</td>
                        <td>Beneficiary Name</td>
                        <td>Beneficiary Type</td>
                        <td>Action</td>
                    </tr>
                <tbody>
                    <tr>
                        <?php foreach($data['reg_bens'] as $reg_bens): ?>
                        <td><?php echo $reg_bens->B_Id; ?></td>
                        <td><img src="<?php echo URLROOT; ?>/img/admin/<?php echo $reg_bens->profile_image; ?>"
                                style="hight:50px; width:50px; border-radius:50%;" alt="Profile Picture"></td>
                        <td><?php echo $reg_bens->B_Name; ?></td>
                        <td><?php echo $reg_bens->B_Type; ?></td>
                        <td><a href="<?php echo URLROOT; ?>/beneficiaries/view_request/<?php echo $reg_bens->B_Id; ?>"><button
                                    class="btn_1">View Request</button></td>
                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- =========== Scripts =========  -->
<script src="<?php echo URLROOT ?>/public/js/toggle.js"></script>

<script>
document.getElementById('b_type').addEventListener('change', function() {
    document.getElementById('filter-form').submit();
});
</script>
</body>

</html>