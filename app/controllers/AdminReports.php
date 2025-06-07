<?php 
    class AdminReports extends Controller {
        public function __construct(){

            $this->reportModel = $this->model('report');

        }

        public function index(){
        
            $this->view('admin/admin_reports');
        }


        public function pendingDonations(){
            $this->view('admin/pending_donations');
        }
        public function completedDonations(){
            $this->view('admin/completed_donations');
        }
        
        public function pendingEvents(){
            $this->view('admin/pending_events');
        }
        public function completedEvents(){
            $this->view('admin/completed_events');
        }



        public function donationsComparison(){
            $this->view('admin/donations_comparison');
        }

        public function eventsComparison(){
            $this->view('admin/events_comparison');
        }
        

        


    }