<?php
class Profilebens extends Controller
{
    public function __construct()
    {

        /*if(!isLoggedIn()){
            redirect('users/login');
        }*/
        $this->userModel = $this->model('User');
        $this->profileModel = $this->model('Profileben');
    }

    public function index($id)
    {
        $requests = $this->profileModel->profile($id);
        $user = $this->userModel->getBenDetailsById($requests->B_Id);
        $donor = $this->profileModel->getDonorDetailsById($_SESSION['user_id']);

        $data = [
            'requests' => $requests,
            'user' => $user,
            'donor' => $donor
        ];

        if ($data['requests'] != null) {
            $this->view('profilebens/index', $data);
        } else {
            redirect('schedulereq_dons/index');
        }
    }
}