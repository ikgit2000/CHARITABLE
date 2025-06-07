<?php 
    class Beneficiaries extends Controller {
        public function __construct(){
            $this->beneficiaryModel = $this->model('Beneficiary');
        }

        public function view_request($id){
            // Get profile details
            $beneficiary = $this->beneficiaryModel->getBeneficiaryById($id);
            $data = [
                'beneficiary' => $beneficiary,
            ];
            $this->view('admin/ben_view_request',$data);
            }

        public function approve_request($id){
            $this->beneficiaryModel->approveRequest($id);
            $beneficiary_details = $this->beneficiaryModel->getBeneficiaryDetails();
            $data = [
                'beneficiary_details' => $beneficiary_details
            ];
            $this->view('admin/list_of_beneficiaries',$data);
        }

        public function deny_request($id){
            $this->beneficiaryModel->denyRequest($id);
            $reg_bens = $this->beneficiaryModel->getRegBenDetails();
            $data = [
                'reg_bens' => $reg_bens
            ];
            $this->view('admin/ben_registration_requests',$data);
        }

        
        public function registration_requests(){
            $reg_bens = $this->beneficiaryModel->getRegBenDetails();
            $data = [
                'reg_bens' => $reg_bens
            ];
            $this->view('admin/ben_registration_requests',$data);
        }
        public function registration_requests_filter_by_type() {
            $b_type = $_GET['b_type'];
            if (empty($b_type)) {
                $filtered_beneficiaries = $this->beneficiaryModel->getRegBenDetails();
            } else {
                $filtered_beneficiaries = $this->beneficiaryModel->getRegBenDetailsByType($b_type);
            }
            $data = [
                'reg_bens' => $filtered_beneficiaries
            ];
            $this->view('admin/ben_registration_requests', $data);
        }

        public function list_of_beneficiaries(){
            // Get admin details
        $beneficiary_details = $this->beneficiaryModel->getBeneficiaryDetails();
        $data = [
             'beneficiary_details' => $beneficiary_details
        ];
        $this->view('admin/list_of_beneficiaries',$data);
        }
        public function filter_by_type() {
            $b_type = $_GET['b_type'];
            if (empty($b_type)) {
                $filtered_beneficiaries = $this->beneficiaryModel->getBeneficiaryDetails();
            } else {
                $filtered_beneficiaries = $this->beneficiaryModel->getBeneficiaryDetailsByType($b_type);
            }
            $data = [
                'beneficiary_details' => $filtered_beneficiaries
            ];
            $this->view('admin/list_of_beneficiaries', $data);
        }

        public function view_profile($id){
                // Get profile details
            $beneficiary = $this->beneficiaryModel->getBeneficiaryById($id);
            $received_donations = $this->beneficiaryModel->getReceivedDonationCount($id);
            $organized_events = $this->beneficiaryModel->getOrganizedEventCount($id);
            $data = [
                'beneficiary' => $beneficiary,
                'received_donations' => $received_donations,
                'organized_events' => $organized_events,
                'donations' => 'Received Donations',
                'events' => 'Organized Events'
           ];
            $this->view('admin/ben_view_profile',$data);
        }
    }