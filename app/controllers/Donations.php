<?php 
    class Donations extends Controller {
        public function __construct(){
                $this->donationModel = $this->model('Donation');
        }


        // Pending Donations
        public function list_of_pending_donations(){
            $donation_details = $this->donationModel->getPendingDonationDetails();
        $data = [
             'donation_details' => $donation_details
        ];
        $this->view('admin/list_of_pending_donations',$data);
        }

        public function pending_donations_filter_by_Btype() {
            $b_type = $_GET['b_type'];
            if (empty($b_type)) {
                $filtered_donations = $this->donationModel->getPendingdonationDetails();
            } else {
                $filtered_donations = $this->donationModel->getPendingdonationDetailsByBType($b_type);
            }
            $data = [
                'donation_details' => $filtered_donations
            ];
            $this->view('admin/list_of_pending_donations', $data);
        }

        public function pending_donations_filter_by_Dtype() {
            $d_type = $_GET['d_type'];
            if (empty($d_type)) {
                $filtered_donations = $this->donationModel->getPendingdonationDetails();
            } else {
                $filtered_donations = $this->donationModel->getPendingdonationDetailsByDType($d_type);
            }
            $data = [
                'donation_details' => $filtered_donations
            ];
            $this->view('admin/list_of_pending_donations', $data);
        }

        // Accepted donations

        public function list_of_accepted_donations(){
            $donation_details = $this->donationModel->getAcceptedDonationDetails();
        $data = [
             'donation_details' => $donation_details
        ];
        $this->view('admin/list_of_accepted_donations',$data);
        }

        public function accepted_donations_filter_by_Btype() {
            $b_type = $_GET['b_type'];
            if (empty($b_type)) {
                $filtered_donations = $this->donationModel->getAccepteddonationDetails();
            } else {
                $filtered_donations = $this->donationModel->getAccepteddonationDetailsByBType($b_type);
            }
            $data = [
                'donation_details' => $filtered_donations
            ];
            $this->view('admin/list_of_accepted_donations', $data);
        }

        public function accepted_donations_filter_by_Dtype() {
            $d_type = $_GET['d_type'];
            if (empty($d_type)) {
                $filtered_donations = $this->donationModel->getAcceptedDonationDetails();
            } else {
                $filtered_donations = $this->donationModel->getAcceptedDonationDetailsByDType($d_type);
            }
            $data = [
                'donation_details' => $filtered_donations
            ];
            $this->view('admin/list_of_accepted_donations', $data);
        }

        // Completed Donations
        public function list_of_completed_donations(){
            $donation_details = $this->donationModel->getCompletedDonationDetails();
        $data = [
             'donation_details' => $donation_details
        ];
            $donation_details = $this->donationModel->getCompletedDonationDetails();
            $this->view('admin/list_of_completed_donations',$data);
        }

        public function completed_donations_filter_by_Btype() {
            $b_type = $_GET['b_type'];
            if (empty($b_type)) {
                $filtered_donations = $this->donationModel->getCompletedDonationDetails();
            } else {
                $filtered_donations = $this->donationModel->getCompletedDonationDetailsByBType($b_type);
            }
            $data = [
                'donation_details' => $filtered_donations
            ];
            $this->view('admin/list_of_completed_donations', $data);
        }

        public function completed_donations_filter_by_Dtype() {
            $d_type = $_GET['d_type'];
            if (empty($d_type)) {
                $filtered_donations = $this->donationModel->getCompletedDonationDetails();
            } else {
                $filtered_donations = $this->donationModel->getCompletedDonationDetailsByDType($d_type);
            }
            $data = [
                'donation_details' => $filtered_donations
            ];
            $this->view('admin/list_of_completed_donations', $data);
        }


    }