<?php
$username = "root";
$password = "";
$database = "charitable";

try{
    $pdo = new PDO("mysql:host=localhost;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOExeception $e){
    die("ERROR: could not connect. ". $e->getMessage());
}
?>
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<?php require APPROOT . '/views/inc/topbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin/lists.css">

<!-- ========================= Main ==================== -->
<div class="main">
    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Donations Comparison</h2>
            </div>
            <div class="chartCard">
                <div class="chartBox">
                    <canvas id="myChart" style="height: 500px;"></canvas>
                    <button onclick="generatePDF()">Generate PDF</button>
                </div>
            </div>
            <?php 
    
    try{
        
        $sql = "SELECT B_Type, COUNT(*) AS donation_count 
        FROM  donation_table 
        INNER JOIN beneficiary_details ON donation_table.B_Id = beneficiary_details.B_Id 
        WHERE accepted = 1 AND completed = 1
        GROUP BY B_Type";
     
        $result = $pdo->query($sql);

        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $categories[] = $row["B_Type"];
                $donationCounts[] = $row["donation_count"];
            }
            unset($result);
        } else {
            echo 'No results in DB';
        }

        } catch(PDOException $e){
            die("Error". $e->getMessage());
        }
        unset($pdo);
        // print_r($categories);
        // print_r($donationCounts);
    ?>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
            <script
                src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js">
            </script>
            <script>
            // setup 
           const data = {
    labels: <?php echo json_encode($categories); ?>,
    datasets: [{
        data: <?php echo json_encode($donationCounts); ?>,
        backgroundColor: [
            'rgba(255, 26, 104, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)'
        ],
        borderColor: [
            'rgba(255, 26, 104, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)'
        ],
        borderWidth: 1
    }]
};

            const bgColor = {
                id: 'bgColor',
                beforeDraw: (chart, options) => {
                    const {
                        ctx,
                        width,
                        height
                    } = chart;
                    ctx.fillStyle = 'white'
                    ctx.fillRect(0, 0, width, height)
                    ctx.restore()
                }
            };

            // config 
            const config = {
    type: 'pie',
    data: data,
    options: {
        responsive: false,
        maintainAspectRatio: false,
        // scales: {
        //         y: {
        //             beginAtZero: true,
        //                 ticks: {
        //                     stepSize : 1
        //                 }
        //             }
        //         }
    },
    plugins:[bgColor]
};

            // render init block
            const myChart = new Chart(
    document.getElementById('myChart'),
    config
);


            function generatePDF() {
                const canvas = document.getElementById('myChart')
                const canvasImage = canvas.toDataURL('image/jpeg', 1.0)
                let pdf = new jsPDF()
                pdf.setFontSize(20)
                pdf.addImage(canvasImage, 'JPEG', 15, 50, 185, 150)
                pdf.save("myChart.pdf")
            }
            </script>
            </body>

            </html>