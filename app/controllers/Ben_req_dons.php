<?php 
class Ben_req_dons extends Controller{

public function __construct(){
$this->ben_req_donModel = $this->model('Ben_req_don');
$this->userModel = $this->model('User');
}


public function index(){
    $this->view('ben_req_dons/index');
}

public function getRequest(){
    $getRequest=$this->ben_req_donModel->getRequest(10);
    $data= [
        'title'=>'getRequest',
        'donation_quantity' => $getRequest,
        'donation_type' => $getRequest->donation_type,
        'donation_priority' => $getRequest->donation_priority,
    ];
}
}