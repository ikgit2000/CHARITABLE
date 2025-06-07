<?php
class Request_dons extends Controller{
    public function __construct(){
         /*if(!isLoggedIn()){
            redirect('users/login_dons');
        }
        $this->view('dashboard_dons/index', $data);*/

    }

    public function index(){



       $this->view('requests_dons/index');
    }

}