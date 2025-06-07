<?php

class SettingsDons extends Controller
{
    public function __construct()
    {
        $this->settingsModel = $this->model('SettingsDon');
        $this->userModel = $this->model('User');
        $this->requestModel = $this->model('Schedulereq_don');
    }

    public function index()
    {
        $c = $_SESSION['user_id'];
        $d = $this->requestModel->getDonId($c);
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'user_id' => $c,
                'D_Id' => $d->D_Id,
                'D_Name' => $d->D_Name,
                //'D_Email' => $d->D_Email,
                'D_Tel_No' => $d->D_Tel_No,
                'D_Address' => $d->D_Address,
                //'D_Password' => $d->D_Password,
                'latitude' => $d->latitude,
                'longitude' => $d->longitude,
                'D_Name_err' => '',
                //'D_Email_err' => '',
                'D_Tel_No_err' => '',
                'D_Address_err' => '',
                //'D_Password_err' => '',

            ];
            $this->view('settingsdons/index', $data);
        } else {
//              $user = $this->requestModel->getBenId($_SESSION['user_id']);
            //check user is same
//              if ($user->User_id != $_SESSION['user_id']) {
//                  redirect('users/login');
//              }
            $data = [

                'user_id' => $c,
                'D_Id' => $d->D_Id,
                'D_Name' => trim($_POST['D_Name']),
//                  'B_Email' => trim($_POST['B_Email']),
                'D_Tel_No' => trim($_POST['D_Tel_No']),
                'D_Address' => trim($_POST['D_Address']),
//                  'B_Password' => trim($_GET['B_Password']),
                'latitude' => trim($_POST['latitude']),
                'longitude' => trim($_POST['longitude']),
                'D_Name_err' => '',
                //'D_Email_err' => '',
                'D_Tel_No_err' => '',
                'D_Address_err' => '',
                //'D_Password_err' => '',
            ];
            if (empty($data['D_Name'])) {
                $data['D_Name_err'] = 'Please enter name';
            }
            /*if (empty($data['D_Email'])) {
                $data['D_Email_err'] = 'Please enter email';
            }*/
            if (empty($data['D_Tel_No'])) {
                $data['D_Tel_No_err'] = 'Please enter phone number';
            }
            if (empty($data['D_Address'])) {
                $data['D_Address_err'] = 'Please enter address';
            }
//              if (empty($data['B_Password'])) {
//                  $data['B_Password_err'] = 'Please enter password';
//              }

            if (empty($data['D_Name_err']) && empty($data['D_Tel_No_err']) && empty($data['D_Address_err'])) {
                if ($this->settingsModel->updateProfile($data)) {
                    flash('profile_message', 'Profile Updated');
                    redirect('settingsdons/viewProfile');
                } else {
                    die('Something went wrong');
                }
            } else {

                $this->view('settingsdons/index', $data);

            }

        }


    }
    public function viewProfile(){
        $c = $_SESSION['user_id'];
        $d = $this->requestModel->getDonId($c);
        $data = [
            'user_id' => $c,
            'D_Id' => $d->D_Id,
            'D_Name' => $d->D_Name,
            //'D_Email' => $d->D_Email,
            'D_Tel_No' => $d->D_Tel_No,
            'D_Address' => $d->D_Address,
            //'D_Password' => $d->D_Password,
            //'latitude' => $d->latitude,
            //'longitude' => $d->longitude,
            'D_Name_err' => '',
            //'D_Email_err' => '',
            'D_Tel_No_err' => '',
            'D_Address_err' => '',
            //'D_Password_err' => '',

        ];
        $this->view('settingsdons/view', $data);


    }
}
