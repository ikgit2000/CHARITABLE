<?php 
    class Admin_dashs extends Controller {
        public function __construct(){

            $this->adminDashModel = $this->model('Admin_dash');
            $this->donationModel = $this->model('Donation');
            $this->eventModel = $this->model('Event');
        }

        public function dash_view(){
    
            $ben_count = $this->adminDashModel->getBenCount();
            $don_count = $this->adminDashModel->getDonCount();
            // $eh_count = $this->adminDashModel->getEhCount();
            // $post_count = $this->adminDashModel->getPostCount();

            $pending_donation_details = $this->donationModel->getPendingDonationDetails();
            // $pending_event_details = $this->eventModel->getPendingEventDetails();

            $data = [
                'ben_count' => $ben_count,
                'don_count' => $don_count,
                // 'eh_count' => $eh_count,
                // 'post_count' => $post_count,

                'pending_donation_details' => $pending_donation_details,
                // 'pending_event_details' => $pending_event_details

            ];
            $this->view('admin/admin_dash',$data);
        }

    }