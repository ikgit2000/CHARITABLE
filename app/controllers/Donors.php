<?php 
    class Donors extends Controller {
        public function __construct(){
            $this->donorModel = $this->model('Donor');
            $this->userModel = $this->model('User');
        }

        public function list_of_donors(){
            // Get admin details
        $donor_details = $this->donorModel->getDonorDetails();

        $data = [
             'donor_details' => $donor_details
        ];

        $this->view('admin/list_of_donors',$data);
        }

        
        public function view_profile($id){
            // Get profile details
        $donor = $this->donorModel->getDonorById($id);
        $pending_donation_count = $this->donorModel->getPendingDonationCount($id);
        $completed_donation_count = $this->donorModel->getCompletedDonationCount($id);
        //$reviewCount = $this->donorModel->getReviewCount($id);
        $data = [
            'donor' => $donor,
            'pending_donation_count' => $pending_donation_count,
            'completed_donation_count' => $completed_donation_count,
            // 'review_count' => $reviewCount,
            'pending' => 'Pending Donations',
            'completed' => 'Completed Donations'
       ];
        $this->view('admin/don_view_profile',$data);
    }
    }