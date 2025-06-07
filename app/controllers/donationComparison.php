<?php
class DonationComparison extends Controller
{
    public function __construct()
    {
        $this->reportsModel = $this->model('Admin_report');
    }
    
    public function index()
    {
        $this->view('admin/donation_comparison');
    }
    
    public function lineChart(){
        $jan=$this->reportsModel->lineChartData(1);
        $feb=$this->reportsModel->lineChartData(2);
        $mar=$this->reportsModel->lineChartData(3);
        $apr=$this->reportsModel->lineChartData(4);
        $may=$this->reportsModel->lineChartData(5);
        $jun=$this->reportsModel->lineChartData(6);
        $jul=$this->reportsModel->lineChartData(7);
        $aug=$this->reportsModel->lineChartData(8);
        $sep=$this->reportsModel->lineChartData(9);
        $oct=$this->reportsModel->lineChartData(10);
        $nov=$this->reportsModel->lineChartData(11);
        $dec=$this->reportsModel->lineChartData(12);
        $data = [
            'jan' => 'jan',
            'feb' => 'feb',
            'mar' => 'mar',
            'apr' => 'apr',
            'may' => 'may',
            'jun' => 'jun',
            'jul' => 'jul',
            'aug' => 'aug',
            'sep' => 'sep',
            'oct' => 'oct',
            'nov' => 'nov',
            'dec' => 'dec',
            'janCount' => $jan,
            'febCount' => $feb,
            'marCount' => $mar,
            'aprCount' => $apr,
            'mayCount' => $may,
            'junCount' => $jun,
            'julCount' => $jul,
            'augCount' => $aug,
            'sepCount' => $sep,
            'octCount' => $oct,
            'novCount' => $nov,
            'decCount' => $dec,
        ];
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}

?>