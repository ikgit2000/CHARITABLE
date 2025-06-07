<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<?php require APPROOT . '/views/inc/topbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin/view_request.css">

<!-- ========================= Main ==================== -->
<div class="main">
    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">
            <h2><?php echo $data['beneficiary']->B_Name; ?></h2>

            <div class="details-card">
                <div class="details-head">Beneficiary ID</div>
                <div class="details-input"><?php echo $data['beneficiary']->B_Id; ?></div>
            </div>
            <br />

            <div class="details-card">
                <div class="details-head">Beneficiary Name</div>
                <div class="details-input"><?php echo $data['beneficiary']->B_Name; ?></div>
            </div>
            <br />

            <div class="details-card">
                <div class="details-head">Beneficiary Email</div>
                <div class="details-input"><?php echo $data['beneficiary']->B_Email; ?></div>
            </div>
            <br />
          
            <div class="details-card">
                <div class="details-head">Beneficiary TP</div>
                <div class="details-input"><?php echo $data['beneficiary']->B_Tpno; ?></div>
            </div>
            <br />
            <div class="details-card">
                <div class="details-head">Beneficiary Type</div>
                <div class="details-input"><?php echo $data['beneficiary']->B_Tpno; ?></div>
            </div>
            <br />

            <div class="details-card">
                <div class="details-head">Beneficiary Member Count</div>
                <div class="details-input"><?php echo $data['beneficiary']->B_Tpno; ?></div>
            </div>
            <br />
            <div class="details-card-dif">
                <div class="details-head">Beneficiary Address</div>  
            </div>
            <div class="details-input-dif"><?php echo $data['beneficiary']->B_Address; ?></div>
            <br />

            <div class="details-card-dif">
                <div class="details-head">Beneficiary Description</div>
            </div>
            <div class="details-input-dif"><?php echo $data['beneficiary']->B_Description; ?></div>
            <br />

            <div class="button">
            <button id="btnApprove" class="btn_1">Approve</button>
            <button id="btnDeny" class="btn_1">Deny</button>
            </div>
        </div>

        <div class="recentOrders">
            <h2>Registration Letter</h2>
            <!-- pdf should show here -->
            <div class="pdf-container">
                <iframe src="<?php echo URLROOT; ?>/public/pdf/registration Letter 1.pdf"
                    style="height:575px;width:400px;border:5px solid black;"></iframe>
            </div>

        </div>
    </div>
</div>

<script>
    document.getElementById('btnApprove').addEventListener('click', function () {
    const url = '<?php echo URLROOT; ?>/beneficiaries/approve_request/<?php echo $data["beneficiary"]->B_Id; ?>';
  
    Swal.fire({
      title: 'Are you sure?',
      text: 'You are about to approve the request.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: 'green',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, approve it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = url;
        Swal.fire(
          'Approved!',
          'The request has been approved.',
          'success'
        );
      }
    });
  });
  
  document.getElementById('btnDeny').addEventListener('click', function () {
    const url = '<?php echo URLROOT; ?>/beneficiaries/deny_request/<?php echo $data["beneficiary"]->B_Id; ?>';
  
    Swal.fire({
      title: 'Are you sure?',
      text: 'You are about to deny the request.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, deny it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = url;
        Swal.fire(
          'Denied!',
          'The request has been denied.',
          'success'
        );
      }
    });
  });
    </script>
<!-- =========== Scripts =========  -->
<script src="<?php echo URLROOT ?>/public/js/toggle.js"></script>


</body>

</html>