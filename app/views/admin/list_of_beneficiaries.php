<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<?php require APPROOT . '/views/inc/topbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin/lists.css">
<!-- ========================= Main ==================== -->
<div class="main">
    <!-- ======================= Buttons ================== -->
    <div class="btnBox">

        <a href="<?php echo URLROOT; ?>/beneficiaries/registration_requests"><button
                class="btn">Registration_Requests</button></a>
        <a href="<?php echo URLROOT; ?>/beneficiaries/list_of_beneficiaries"><button class="btn active">Beneficiaries'
                List</button></a>
    </div>

    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Beneficiaries' List</h2>
            </div>

            <form id="filter-form" method="get" action="<?php echo URLROOT; ?>/beneficiaries/filter_by_type">
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
            <input type="text" id="search-input" placeholder="Search by name...">
            <table>
                <thead>
                    <tr>
                        <td>Beneficiary ID</td>
                        <td>Profile Picture</td>
                        <td>Beneficiary Name</td>
                        <td>Beneficiary Type</td>
                        <td>Action</td>
                    </tr>
                </thead>


                <tbody>
                    <tr class="employee-row">
                        <?php foreach($data['beneficiary_details'] as $beneficiary_details): ?>
                        <td class="emp-id"><?php echo $beneficiary_details->B_Id; ?></td>
                        <td><img src="<?php echo URLROOT; ?>/public/img/admin/customer02.jpg"
                                style="hight:50px; width:50px; border-radius:50%;" alt="Profile Picture"></td>
                        <td class=".emp-name"><?php echo $beneficiary_details->B_Name; ?></td>
                        <td><?php echo $beneficiary_details->B_Type; ?></td>
                        <td><a
                                href="<?php echo URLROOT; ?>/beneficiaries/view_profile/<?php echo $beneficiary_details->B_Id; ?>"><button
                                    class="btn_1">View Profile</button></td></a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- =========== Scripts =========  -->

    <script>
    document.getElementById('b_type').addEventListener('change', function() {
        document.getElementById('filter-form').submit();
    });

    function filterBeneficiaries() {
        const input = document.getElementById('search-input');
        const filter = input.value.toUpperCase();
        const table = document.querySelector('table');
        const rows = table.getElementsByTagName('tr');

        for (let i = 0; i < rows.length; i++) {
            const nameCell = rows[i].getElementsByClassName('.emp-name')[0];
            if (nameCell) {
                const name = nameCell.textContent || nameCell.innerText;
                if (name.toUpperCase().indexOf(filter) > -1) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }
    }

    document.getElementById('search-input').addEventListener('keyup', filterBeneficiaries);
    </script>

</div>

</body>

</html>