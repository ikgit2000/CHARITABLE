<?php

class UpdatePwds extends Controller
{
    public function __construct()
    {
        $this->updatepwdModel = $this->model('UpdatePwd');
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        // Check if request method is POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize input
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $user_id = $_SESSION['user_id'];
           // $c = $_SESSION['user_id'];
            //$d = $this->requestModel->getId($c);

            // Initialize variables
            $data = [
                'current_password' => trim($_POST['current_password']),
                'new_password' => trim($_POST['new_password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'current_password_err' => '',
                'new_password_err' => '',
                'confirm_password_err' => ''
            ];

            // Validate current password
            if (empty($data['current_password'])) {
                $data['current_password_err'] = 'Please enter your current password';
            } else {
                $user = $this->userModel->getUserById($user_id);
                //if (!password_verify($data['current_password'], $user->password))
                if (!$this->updatepwdModel->checkPassword($user->User_Id, $data['current_password'])) {
                    $data['current_password_err'] = 'Current password is incorrect';
                }
            }

            // Validate new password
            if (empty($data['new_password'])) {
                $data['new_password_err'] = 'Please enter a new password';
            } elseif (strlen($data['new_password']) < 6) {
                $data['new_password_err'] = 'Password must be at least 6 characters long';
            }

            // Validate confirm password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm your new password';
            } elseif ($data['new_password'] != $data['confirm_password']) {
                $data['confirm_password_err'] = 'Passwords do not match';
            }

            // Check if there are any errors
            if (empty($data['current_password_err']) && empty($data['new_password_err']) && empty($data['confirm_password_err'])) {
                //$hashed_password = password_hash($data['new_password'], PASSWORD_DEFAULT);
                $this->updatepwdModel->updatePassword($user_id, $data['new_password']);
                // Redirect user to dashboard
                flash('password_change_success', 'Your password has been changed successfully');
                redirect('dashboard');
            } else {
                // Display errors
                $this->view('updatepwds/index', $data);
            }
        } else {
            // Display password change form
            $data = [
                'current_password' => '',
                'new_password' => '',
                'confirm_password' => '',
                'current_password_err' => '',
                'new_password_err' => '',
                'confirm_password_err' => ''
            ];
            $this->view('updatepwds/index', $data);
        }

    }

}
