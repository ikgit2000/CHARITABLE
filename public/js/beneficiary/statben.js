var count;
var req;




const ctx = document.getElementById('myChart');
const ctp = document.getElementById('myPie');
const ctr = document.getElementById('myLine');
const ctd = document.getElementById('myDon');









// new Chart(ctr, {
//     type: 'line',
//     data: {
//         labels: [count, 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
//         datasets: [{
//             label: 'No. of Donations',
//             data: [req, 19, 3, 5, 2, 3, 5, 8, 10, 13, 2, 6],
//             borderWidth: 1
//         }]
//     },
//
//     options: {
//         scales: {
//             y: {
//                 beginAtZero: true
//             }
//         }
//     }
// });
function No_of_requests() {

    $.ajax({
        url: "http://localhost/charitAble/Stat_bens/donationViaMonths",
        method: 'GET',
        dataType: 'JSON',
        success: function (response) {

            console.log(response);

            // setup block
            const data={

                labels: [response.jan,response.feb,response.mar,response.apr,response.may,response.jun,response.jul,response.aug,response.sep,response.oct,response.nov,response.dec],
                datasets: [{
                    label: 'No of Donations',
                    data: [response.janCount.num_rows,response.febCount.num_rows,response.marCount.num_rows,response.aprCount.num_rows,response.mayCount.num_rows,response.junCount.num_rows,response.julCount.num_rows,response.augCount.num_rows,response.sepCount.num_rows,response.octCount.num_rows,response.novCount.num_rows,response.decCount.num_rows],
                    borderWidth: 2
                }]
            };
            //config block
            const config = {
                type: 'bar',
                data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };
            //Render block
            const myChart = new Chart(
                document.getElementById('myChart'),
                config

            );


        }
    })
}
No_of_requests();

function pieChart(){
    $.ajax({
        url: "http://localhost/charitAble/Stat_bens/requestStatus",

        method: 'GET',
        dataType: 'JSON',
        success: function (response1) {
            count = response1.pending;
            req = response1.pendingCount;
            console.log(response1);
            //setup pie chart
            const data = {
                labels: [response1.pending, response1.accepted, response1.completed],
                datasets: [{
                    label: 'No. of Donations',
                    data: [response1.pendingCount, response1.acceptedCount, response1.completedCount],
                    borderWidth: 1
                }]
            };
            //config pie chart
            const configPie = {
                type: 'pie',
                data: data,

                options: {
                    scales: {
                        // y: {
                        //     beginAtZero: true
                        // }
                    }
                }
            };
            //render pie chart
            const myPie = new Chart(
                document.getElementById('myPie'),
                configPie
            );
        }
    })

}
pieChart();

function donutChart(){
    $.ajax({
        url: "http://localhost/charitAble/Stat_bens/priorityCount",


        method: 'GET',
        dataType: 'JSON',
        success: function (response2) {
            // count = response2.high;
            // req = response2.highCount;
            console.log(response2);
            //setup pie chart
            const data = {
                labels: [response2.high, response2.normal],
                datasets: [{
                    label: 'Donation Priority',
                    data: [response2.highCount.num_rows, response2.normalCount.num_rows],
                    borderWidth: 1
                }]
            };

            //config pie chart
            const configDonut = {
                type: 'doughnut',
                data: data,

                options: {
                    scales: {
                        // y: {
                        //     beginAtZero: true
                        // }
                    }
                }
            };
            //render pie chart
            const myPie = new Chart(
                document.getElementById('myDon'),
                configDonut
            );
            console.log(response2);
        }
    })

}
donutChart();

function lineChart() {

    $.ajax({
        url: "http://localhost/charitAble/Stat_bens/scheduledDonationsViaMonthsValue",
        method: 'GET',
        dataType: 'JSON',
        success: function (response3) {

            console.log(response3);



            const data = {
                labels: [response3.jan, response3.feb, response3.mar, response3.apr, response3.may, response3.jun, response3.jul, response3.aug, response3.sep, response3.oct, response3.nov, response3.dec],
                datasets: [
                    {
                        label: 'No of Donations',
                        data: [response3.janCount, response3.febCount, response3.marCount, response3.aprCount, response3.mayCount, response3.junCount, response3.julCount, response3.augCount, response3.sepCount, response3.octCount, response3.novCount, response3.decCount],
                        borderWidth: 2,
                        borderColor: 'rgb(54, 162, 235)'
                    },
                    {
                        type: 'line',
                        label: 'Maximum Quantity',
                        data: [response3.maxQuantity, response3.maxQuantity,response3.maxQuantity,response3.maxQuantity,response3.maxQuantity,response3.maxQuantity,response3.maxQuantity,response3.maxQuantity,response3.maxQuantity,response3.maxQuantity,response3.maxQuantity,response3.maxQuantity],
                        borderColor: 'rgb(255, 0, 0)',
                        borderWidth: 0.5,


                        fill: false
                    }
                ]
            };

            //config block
            const config = {
                type: 'line',
                data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };
            //Render block
            const myChart = new Chart(
                document.getElementById('myLine'),
                config
            );


        }
    })


}
lineChart();



