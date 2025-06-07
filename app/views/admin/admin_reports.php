<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<?php require APPROOT . '/views/inc/topbar.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin/reports.css">

<!-- ========================= Main ==================== -->
<div class="main">

    <div class="details">
        <div class="container">
            <div class="recentOrders">
                <div class="report-title">Reports<br></div>
                <hr>
                <br />
                <div class="title-set">
                    <div class="t1"><a href="<?php echo URLROOT; ?>/adminReports/pendingDonations">
                            <p>Pending<br> Donations</p>
                        </a>
                    </div>
                    <div class="t2"><a href="<?php echo URLROOT; ?>/adminReports/completedDonations">
                            <p>Completed<br> Donations</p>
                        </a>
                    </div>
                    <div class="t3"><a href="<?php echo URLROOT; ?>/adminReports/donationsComparison">
                            <p>Donations<br> Comparison
                        </a></p>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- =========== Scripts =========  -->
    <script src="<?php echo URLROOT ?>/public/js/admin/reports.js"></script>

    </body>

    </html>

