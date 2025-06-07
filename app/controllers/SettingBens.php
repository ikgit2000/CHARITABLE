<?php

  class SettingBens extends Controller
  {


      public function __construct()
      {
          $this->settingModel = $this->model('SettingBen');
          $this->userModel = $this->model('User');
          $this->requestModel = $this->model('Request_ben');
      }

      public function index()
      {
          $a = $_SESSION['user_id'];
          $y = $this->requestModel->getBenId($a);
          if ($_SERVER['REQUEST_METHOD'] == 'GET') {
              $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
              $data = [
                  'user_id' => $a,
                  'B_Id' => $y->B_Id,
                  'B_Name' => $y->B_Name,
                  'B_Email' => $y->B_Email,
                  'B_Phone' => $y->B_Tpno,
                  'B_Address' => $y->B_Address,
                  'B_Password' => $y->B_Password,
                  'B_Description' => $y->B_Description,
                  'B_Members' => $y->B_Members,
                  'document' => $y->document,
                  'latitude' => $y->latitude,
                  'longitude' => $y->longitude,
                  'B_Name_err' => '',
                  'B_Email_err' => '',
                  'B_Phone_err' => '',
                  'B_Address_err' => '',
                  'B_Password_err' => '',
                  'B_Description_err' => '',
                  'B_Members_err' => ''

              ];
              $this->view('settingBens/index', $data);
          } else {
//              $user = $this->requestModel->getBenId($_SESSION['user_id']);
              //check user is same
//              if ($user->User_id != $_SESSION['user_id']) {
//                  redirect('users/login');
//              }
              $data = [

                  'user_id' => $a,
                  'B_Id' => $y->B_Id,
                  'B_Name' => trim($_POST['B_Name']),
//                  'B_Email' => trim($_POST['B_Email']),
                  'B_Phone' => trim($_POST['B_Phone']),
                  'B_Address' => trim($_POST['B_Address']),
//                  'B_Password' => trim($_GET['B_Password']),
                  'B_Description' => trim($_POST['B_Description']),
                  'B_Members' => trim($_POST['B_Members']),
                  'document' => trim($_POST['document']),
//                  'latitude' => trim($_POST['latitude']),
//                  'longitude' => trim($_POST['longitude']),
                  'B_Name_err' => '',
                  'B_Email_err' => '',
                  'B_Phone_err' => '',
                  'B_Address_err' => '',
                  'B_Password_err' => '',
                  'B_Description_err' => '',
                  'document_err' => '',
                  'B_Members_err' => ''
              ];
              if (empty($data['B_Name'])) {
                  $data['B_Name_err'] = 'Please enter name';
              }
              if (empty($data['B_Email'])) {
                  $data['B_Email_err'] = 'Please enter email';
              }
              if (empty($data['B_Phone'])) {
                  $data['B_Phone_err'] = 'Please enter phone number';
              }
              if (empty($data['B_Address'])) {
                  $data['B_Address_err'] = 'Please enter address';
              }
//              if (empty($data['B_Password'])) {
//                  $data['B_Password_err'] = 'Please enter password';
//              }
              if (empty($data['B_Description'])) {
                  $data['B_Description_err'] = 'Please enter description';
              }
              if (empty($data['B_Members'])) {
                  $data['B_Members_err'] = 'Please enter members';
              }
              if (empty($data['B_Name_err']) && empty($data['B_Phone_err']) && empty($data['B_Address_err']) && empty($data['B_Description_err']) && empty($data['B_Members_err'])) {
                  if ($this->settingModel->updateProfile($data)) {
                      flash('profile_message', 'Profile Updated');
                      redirect('request_bens');
                  } else {
                      die('Something went wrong');
                  }
              } else {

                  $this->view('settingBens/index', $data);

              }

          }


      }
      public function viewProfile(){
            $a = $_SESSION['user_id'];
            $y = $this->requestModel->getBenId($a);
            $data = [
                'user_id' => $a,
                'B_Id' => $y->B_Id,
                'B_Name' => $y->B_Name,
                'B_Email' => $y->B_Email,
                'B_Phone' => $y->B_Tpno,
                'B_Address' => $y->B_Address,
                'B_Password' => $y->B_Password,
                'B_Description' => $y->B_Description,
                'B_Members' => $y->B_Members,
                'B_RegistrationLetter' => $y->document,
                'latitude' => $y->latitude,
                'longitude' => $y->longitude,
                'B_Name_err' => '',
                'B_Email_err' => '',
                'B_Phone_err' => '',
                'B_Address_err' => '',
                'B_Password_err' => '',
                'B_Description_err' => '',
                'B_Members_err' => ''

            ];
            $this->view('settingBens/view', $data);


      }
  }
