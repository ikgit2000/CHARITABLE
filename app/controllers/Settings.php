<?php 
    class Settings extends Controller {
        public function __construct(){
            // if(!isLoggedIn()){
            //     redirect('users/login');
            // }
            
        $this->settingModel = $this->model('Setting');
        $this->userModel = $this->model('User');
        }


        public function change_password(){
            $this->view('settings/change_password');
        }
        
        
        public function add_new_admin(){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $role = 4;

                $data = [
                    'admin_name' => trim($_POST['admin_name']),
                    'admin_email' => trim($_POST['admin_email']),
                    'admin_phone' => trim($_POST['admin_phone']),
                    'admin_password' => trim($_POST['admin_password']),
                    // 'admin_nic' => trim($_POST['admin_nic']),
                    'admin_date_assigned' => trim($_POST['admin_date_assigned']),
                    'user_role' => $role,
                    'admin_name_err' => '',
                    'admin_email_err' => '',
                    'admin_phone_err' => '',
                    'admin_password_err' => '',
                    // 'admin_nic_err' => '',
                    'admin_date_assigned_err' => ''
                ];
                 

                // Validate data
                if(empty($data['admin_name'])){
                    $data['admin_name_err'] = 'Please enter name';
                } 

                if(empty($data['admin_username'])){
                    $data['admin_username_err'] = 'Please enter username';
                } 


                if(empty($data['admin_email'])){
                    $data['admin_email_err'] = 'Please enter email';
                } 


                if(empty($data['admin_phone'])){
                    $data['admin_phone_err'] = 'Please enter phone number';
                } else if (strlen($data['admin_phone']) != 10){
                    $data['admin_phone_err'] = 'Insert valid phone number';
                }

                if(empty($data['admin_password'])){
                    $data['admin_password_err'] = 'Please enter password';
                }  else if(strlen($data['admin_password']) < 6){
                    $data['admin_password_err'] = 'Password must be at least 6 characters';

                }


                if(empty($data['admin_nic'])){
                    $data['admin_nic_err'] = 'Please enter NIC';
                 } else if ((strlen($data['admin_nic'])!=10) || (strlen($data['admin_nic'])!=12)){
                    $data['admin_nic_err'] = 'Please enter valid NIC number';
                } else {
                    $data['admin_nic_err'] = 'Please enter valid NIC number';
                }


                if(empty($data['admin_date_assigned'])){
                    $data['admin_date_assigned_err'] = 'Please enter date assigned';
                }
                

                // make sure no errors
                if(empty($data['admin_name_err']) && empty($data['admin_password_err']) &&
                empty($data['admin_email_err']) && empty($data['admin_phone_err']) 
                 && empty($data['admin_date_assigned_err'])){
                    // Validated

                    // Hash Password
                    $data['admin_password'] = password_hash($data['admin_password'], PASSWORD_DEFAULT);

                    if($this->userModel->addAdmin($data)){
                        flash('register_success', 'You are registered and can log in');
                        $x=$this->userModel->getAdminUserId($data['admin_email']);
                        $this->settingModel->addAdminDetails($data,$x);

                        redirect('admin/list_of_admins');

                    } else {
                        die('Something went wrong');
                    }

                } else {
                    // Load view with errors

                    $this->view('admin/add_new_admin', $data);

                }

            } else {
                // Init data
                $data = [
                'admin_name' => '',
                'admin_usrname' => '',
                'admin_email' => '',
                'admin_phone' => '',
                'admin_password' => '',
                'admin_confirm_password' => '',
                // 'admin_nic' => '',
                'admin_date_assigned' => '',
                'admin_name_err' => '',
                'admin_username_err' => '',
                'admin_email_err' => '',
                'admin_phone_err' => '',
                'admin_password_err' => '',
                'admin_confirm_password_err' => '',
                // 'admin_nic_err' => '',
                'admin_date_assigned_err' => ''
            ];


            $this->view('admin/add_new_admin', $data);

       }
    }

    public function update_profile(){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            // Sanitize POST array
            $_GET = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [


 
                'admin_email' => trim($_SESSION['user_email']),
                //'admin_phone' => trim($_SESSION['user_Phone']),
                //'admin_password' => trim($_SESSION['user_Password']),


                // 'admin_nic' => trim($_SESSION['admin_nic']),
                //'admin_date_assigned' => trim($_SESSION['A_DateAssigned']),
                'admin_name_err' => '',
                'admin_email_err' => '',
                'admin_phone_err' => '',
                'admin_password_err' => '',
                'admin_nic_err' => '',
                'admin_date_assigned_err' => ''
            ];
            
            $this->view('admin/update_profile', $data);

            
       } else {
                
                // POST method
                $data = [
                    'admin_name' => trim($_POST['admin_name']),
                    'admin_email' => trim($_POST['admin_email']),
                    'admin_phone' => trim($_POST['admin_phone']),
                    'admin_password' => trim($_POST['admin_password']),
                    // 'admin_nic' => trim($_POST['admin_nic']),
                    'admin_date_assigned' => trim($_POST['admin_date_assigned']),
                    'admin_name_err' => '',
                    'admin_email_err' => '',
                    'admin_phone_err' => '',
                    'admin_password_err' => '',
                    // 'admin_nic_err' => '',
                    'admin_date_assigned_err' => ''
                ];


        if(empty($data['admin_name'])){
            $data['admin_name_err'] = 'Please enter name';
        } 

        if(empty($data['admin_username'])){
            $data['admin_username_err'] = 'Please enter username';
        } 


        if(empty($data['admin_email'])){
            $data['admin_email_err'] = 'Please enter email';
        } 


        if(empty($data['admin_phone'])){
            $data['admin_phone_err'] = 'Please enter phone number';
        }else if (strlen($data['admin_phone']) != 10){
            $data['admin_phone_err'] = 'Please enter valid phone number';
        }

        if(empty($data['admin_password'])){
            $data['admin_password_err'] = 'Please enter password';
        }  else if(strlen($data['admin_password']) < 6){
            $data['admin_password_err'] = 'Password must be at least 6 characters';

        }

        // if(empty($data['admin_nic'])){
        //     $data['admin_nic_err'] = 'Please enter NIC';
        // } //else if ((strlen($data['admin_nic'])!=10) || (strlen($data['admin_nic'])!=12)){
        // //     $data['admin_nic_err'] = 'Please enter valid NIC number';
        // // }

        if(empty($data['admin_date_assigned'])){
            $data['admin_date_assigned_err'] = 'Please enter date assigned';
        }
        
        $data['admin_id'] = $_SESSION['admin_id'];
        // make sure no errors
        if(empty($data['admin_name_err']) && empty($data['admin_email_err']) && empty($data['admin_phone_err']) && empty($data['admin_nic_err'])){
            // Validated
            if($this->settingModel->updateAdminDetails($data)){

                $_SESSION['admin_name'] = $data['admin_name'];
                $_SESSION['admin_email'] = $data['admin_email'];
                $_SESSION['admin_phone'] = $data['admin_phone'];
                $_SESSION['admin_nic'] = $data['admin_nic'];
                redirect('settings/list_of_admins');
            } else {
                die('Something went wrong');
            }

        } else {
            // Load view with errors

            $this->view('admin/update_profile', $data);

        }

   }
}

    public function list_of_admins(){

        // Get admin details
        $admin_details = $this->settingModel->getAdminDetails();

        $data = [
             'admin_details' => $admin_details
        ];


        $this->view('admin/list_of_admins',$data);


    }
}
