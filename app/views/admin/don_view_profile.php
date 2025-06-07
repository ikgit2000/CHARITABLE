<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<?php require APPROOT . '/views/inc/topbar.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin/view_profile.css">


<!-- ========================= Main ==================== -->
<div class="main">

    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">
            <h2><?php echo $data['donor']->D_Name; ?></h2>


            <div class="profile-picture">
                <img src="<?php echo URLROOT; ?>/public/img/admin/customer02.jpg" style="hight:150px; width:150px;"
                    alt="Profile Picture">
            </div>
            <hr>

            <div class="details-card">
                <div class="details-head">Donor Email</div>
                <div class="details-input"><?php echo $data['donor']->D_Email; ?></div>
            </div>
            <br />

            <div class="details-card">
                <div class="details-head">Donor Address</div>
                <div class="details-input"><?php echo $data['donor']->D_Address; ?></div>

            </div>
            <br />

            <div class="details-card">

                <div class="details-head">Donor TP</div>
                <div class="details-input"><?php echo $data['donor']->D_Tel_No; ?></div>
            </div>
            <br />
            <div class="details-card">
                <div class="details-head">Donor Address</div>
                <div class="details-input"><?php echo $data['donor']->D_Email; ?></div>
            </div>
            <br />
        </div>

        <div class="recentOrders">
            <h2>More details...</h2>

            <div class="details-card">
                <div class="details-head">Pending Donations</div>
                <div class="details-input"><?php echo $data['pending_donation_count']; ?></div>
            </div>
            <div class="details-card">
                <div class="details-head">Completed Donations</div>
                <div class="details-input"><?php echo $data['completed_donation_count']; ?></div>
            </div>
            <!-- <div class="details-card">
                <div class="details-head">Completed Donations</div>
                <div class="details-input"><?php echo $data['review_count']; ?></div>
            </div> -->
            <div class="chart" style="display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center">
                <div class="chart2" style="width: 100%; display: flex; flex-direction: column">
                <canvas id="pieChart"></canvas>
                </div>

            </div>
            <br />
        </div>


    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('pieChart').getContext('2d');
    const data = {
      labels: [
        'Pending Donations',
        'Completed Donations'
      ],
      datasets: [
        {
          data: [
            <?php echo $data['pending_donation_count']; ?>,
            <?php echo $data['completed_donation_count']; ?>
          ],
          backgroundColor: [
            'rgba(255, 0, 0, 0.2)',
            'rgba(75, 192, 192, 0.2)'
          ],
          borderColor: [
            'rgba(255, 0, 0, 1)',
            'rgba(75, 192, 192, 1)'
          ],
          borderWidth: 1
        }
      ]
    };

    const options = {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    };

    const chart = new Chart(ctx, {
      type: 'pie',
      data: data,
      options: options
    });
  });
</script>


</body>

</html>