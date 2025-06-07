

<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_ben.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?> /css/benificiary/ben_stat.css">


<div class="tab">
    <button class="nextpage" onclick="window.location.href='<?php echo URLROOT; ?>/stat_bens/monthlyReport/<?php echo date('n');?>'">Get monthly report>></button>
</div>

<div>
<button class="genpdf" onclick="genPDF()">Download</button>
    </div>

        <!-- ================ Order Details List ================= -->
<div class="section" id="section">
                    <div class="details">
                        <div class="chart" >
                            <div class="chart1" >
                                <div class="chartTitle">Total Number of requests</div>
                                <canvas id="myChart"></canvas>
                                <div class="chartTitle">Meals received (Monthly)</div>
                                <canvas id="myLine"></canvas>
                            </div>
                            <div class="chart2" >
                                <div class="chartTitle">Status of requests</div>
                                <canvas id="myPie"></canvas>
                                <div class="chartTitle">Total number of requests(priority)</div>
                                <canvas id="myDon" ></canvas>
                            </div>
                </div>


            </div>
        </div>




<script src="<?php echo URLROOT; ?>/js/genPDF.js"></script>
<script src="<?php echo URLROOT; ?>/js/beneficiary/statben.js"></script>
<script src="<?php echo URLROOT; ?>/js/beneficiary/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>