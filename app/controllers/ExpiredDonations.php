<?php
class ExpiredDonations extends Controller
{
    public function __construct()
    {
        // if(!isLoggedIn()){
        //     redirect('users/login');
        // }
        $this->reportsModel = $this->model('Admin_report');
    }
    
    public function index()
    {
        $this->view('admin/expired_donations');
    }
    
    public function expiredDonationCounts(){
        $jan=$this->reportsModel->expiredDonationCount(1);
        $feb=$this->reportsModel->expiredDonationCount(2);
        $mar=$this->reportsModel->expiredDonationCount(3);
        $apr=$this->reportsModel->expiredDonationCount(4);
        $may=$this->reportsModel->expiredDonationCount(5);
        $jun=$this->reportsModel->expiredDonationCount(6);
        $jul=$this->reportsModel->expiredDonationCount(7);
        $aug=$this->reportsModel->expiredDonationCount(8);
        $sep=$this->reportsModel->expiredDonationCount(9);
        $oct=$this->reportsModel->expiredDonationCount(10);
        $nov=$this->reportsModel->expiredDonationCount(11);
        $dec=$this->reportsModel->expiredDonationCount(12);
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