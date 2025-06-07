
<?php
$username = "root";
$password = "";
$database = "charitable";

try{
    $pdo = new PDO("mysql:host=localhost;database=$database", $username, $password);
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
                <h2>Pending Events</h2>
                <!-- <a href="#" class="btn">View All</a> -->
            </div>

            <div class="chartCard">
                <div class="chartBox">
                    <input type="date" onchange="startDateFilter(this)" value="
         2023-01-01" min="2023-01-01" max="2023-12-31">
                    <input type="date" onchange="endDateFilter(this)" value="
         2023-12-31" min="2023-01-01" max="2023-12-31">
                    <canvas id="myChart"></canvas>
                    <button onclick="generatePDF()">Generate PDF</button>
                </div>
            </div>
            <?php 
    
    try{
        
        $sql = "SELECT DATE(Donation_Time) AS donation_date, COUNT(*) AS row_count 
        FROM charitable.donation_table 
        GROUP BY donation_date";
        
        $result = $pdo->query($sql);

        if($result->rowCount() > 0){
            while($row = $result->fetch()){
                $dateArray[] = $row["donation_date"];
                $donationArray[] = $row["row_count"];
            }
            unset($result); 
        }else {
            echo 'No results in DB';
        }
        } catch(PDOException $e){
            die("Error");
        }
        // unset($pdo);
        // // print_r($dateArray);
    ?>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
            <script
                src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js">
            </script>
            <script>
   
            const dateArrayJS = <?php echo json_encode($dateArray); ?>;
            //console.log(dateArrayJS)

            const dateChartJS = dateArrayJS.map((day, index) => {
                let dayjs = new Date(day);
                return dayjs.setHours(0, 0, 0, 0);
            });
            // setup 
            const data = {
                labels: dateChartJS,
                datasets: [{
                    label: 'Weekly Sales',
                    data: <?php echo json_encode($donationArray); ?>,
                    backgroundColor: [
                        'rgba(255, 26, 104, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 26, 104, 1)',
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
                type: 'bar',
                data,
                options: {
                    scales: {
                        x: {
                            min: '2023-01-01',
                            max: '2025-12-31',
                            type: 'time',
                            time: {
                                unit: 'day'
                            }
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                },
                plugins:[bgColor]
            };

            // render init block
            const myChart = new Chart(
                document.getElementById('myChart'),
                config
            );

            function startDateFilter(date) {
                const startDate = new Date(date.value);
                console.log(startDate.setHours(0, 0, 0, 0));
                myChart.config.options.scales.x.min = startDate.setHours(0, 0, 0, 0);
                myChart.update();
            }

            function endDateFilter(date) {
                const endDate = new Date(date.value);
                console.log(endDate.setHours(0, 0, 0, 0));
                myChart.config.options.scales.x.max = endDate.setHours(0, 0, 0, 0);
                myChart.update();
            }
            function generatePDF() {
                const canvas = document.getElementById('myChart')
                const canvasImage = canvas.toDataURL('image/jpeg',1.0)
                let pdf = new jsPDF()
                pdf.setFontSize(20)
                pdf.addImage(canvasImage, 'JPEG', 15, 50, 185, 150)
                pdf.save("myChart.pdf")
            }
            </script>
            
        

            </body>

            </html>

