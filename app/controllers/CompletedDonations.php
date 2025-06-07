<?php
class CompletedDonations extends Controller
{
    public function __construct()
    {
        $this->reportsModel = $this->model('Admin_report');
    }
    
    
    public function index(){
        $results = $this->reportsModel->completedDonationCount();
        $data = [
            'dateArray' =>$results
        ];
        $this->view('admin/completed_donations',$data);
    }
}

?>