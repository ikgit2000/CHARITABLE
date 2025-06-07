<?php

class BenSearchs extends Controller
{

    public function __construct()
    {
        $this->requestModel = $this->model('Request_ben');
        $this->userModel = $this->model('User');
        $this->benModel = $this->model('BenSearch');
    }

    public function index()
    {
        if (isset($_POST['input'])) {
            $search=$this->benModel->getBen($_POST['input']);
            $data = [
                'search' => $search
            ];

            $this->view('benSearch/index', $data);
        } else {
            $search = $this->benModel->getAllBen();

            $data = [
                'search' => $search
            ];


            $this->view('benSearch/index', $data);
        }

    }
    public function searchBen()
    {

        if(isset($_POST['input'])){
            $search = $_POST['input'];
            $search_res = $this->benModel->getBen($search);
        }
        else{
            $search_res = $this->benModel->getAllBen();
        }

        if ($search_res) {
            $output = '<table class="tableBen" id="tableBen">
                <thead>
                <tr>
              
                    <th>Name</th>
                    <th>Address</th>
                    <th>Telephone Number</th>
                    
                </tr>
                </thead>
                <tbody>';

            foreach ($search_res as $res) {

                $output .= '<tr>
                    
                        <td data-label="Name">' . $res->B_Name . '</td>
                        <td data-label="Address">' . $res->B_Address . '</td>
                        <td data-label="">' . $res->B_Tpno . '</td>
                       
                        
                    </tr>';
            };
            $output .= '</tbody>';
        } else {
            $output = '<h3>No Beneficiary  Found</h3>';
        }
        echo $output;

    }
    public function fetch(){
        $data=$this->benModel->getBen($_POST['input']);
        $this->view('benSearch/index', $data);

    }
}