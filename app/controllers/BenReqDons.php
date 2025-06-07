<?php
use helpers\email;
class BenReqDons extends Controller
{

    public function __construct()
    {
        if(!isLoggedIn()){
            redirect('users/login');
        }

        $this->benreqdonModel = $this->model('BenReqDon');
        $this->userModel = $this->model('User');
        $this->requestModel = $this->model('Request_ben');

    }


    public function index()
    {
        $getRequests = $this->benreqdonModel->getAllRequests();
        $data = [
            'requests' => $getRequests
        ];

        $this->view('benreqdons/index', $data);
    }


    public function acceptRequest($Id,$data)
    {
        $c= $_SESSION['user_id'];
        $d =$this->benreqdonModel-> getDonDetails($c);
        $e = $data;
        $f = $this->benreqdonModel->getRequestDetails($Id);
        If($e < $f->Donation_Quantity){
         $this->benreqdonModel->requestPartial($f->Donation_ID,$d->D_ID,$e);
         $this->benreqdonModel->updateDonation($f->Donation_ID, $e);
            $email = new Email($d->D_Email);
            $email->requestAcceptanceMail();
         $this->view('BenReqDons/show');
        }
        else if($e == $f->Donation_Quantity){
            $this->benreqdonModel->acceptRequest($Id, $d->D_Id);
            $email = new Email($d->D_Email);
            $email-> requestAcceptanceMail();

            $this->view('BenReqDons/show');
        }
       else {
            die('Something went wrong');
            $this->view('BenReqDons/show');
        }
    }
    
    public function show($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $request = $this->requestModel->getRequestById($id);
            $user = $this->userModel->getBenDetailsById($request->B_Id);
            $data = [
                'requests' => $request,
                'user' => $user,
                'Donation_Quantity' => $request->Donation_Quantity,
                'Donation_ID' => $request->Donation_ID,
                'Donation_Description' => $request->Donation_Description,
                'Donation_Type' => $request->Donation_Type,
                'Donation_Priority' => $request->Donation_Priority,
                'Donation_Details' => $request->Donation_Details,
                'Donation_Description_err' => '',
                'Donation_Quantity_err' => '',
                'Donation_Type_err' => '',
                'Donation_Priority_err' => '',
                'Doantion_Quantity_err' => ''
            ];

            if(empty($data['Donation_Quantity'])){
                $data['Donation_Quantity_err'] = 'Please enter valid Quantity';
                $this->view('BenReqDons/show/'.$data['Donation_ID'], $data);
            }
            $this->view('BenReqDons/show', $data);
        } else {
            $request = $this->requestModel->getRequestById($id);
            $user = $this->userModel->getBenDetailsById($request->B_Id);

            $data = [
                'requests' => $request,
                'user' => $user,
                'Quantity' => trim($_POST['Donation_Quantity'])

            ];
            if (empty($data['Quantity'])) {
                $data['Quantity_err'] = 'Please enter valid Quantity';
                $this->view('BenReqDons/show', $data);
            }

            if (empty($data['Quantity_err'])){
                $c= $_SESSION['user_id'];
                $d =$this->benreqdonModel-> getDonDetails($c);
                $e = $data['Quantity'];
                $f = $this->benreqdonModel->getRequestDetails($id);
                if($e == $f->Donation_Quantity){
                    $this->benreqdonModel->acceptRequest($id, $d->D_Id);
                    redirect('BenReqDons/index');

                }
                elseIf($e == $f->Remaining_Quantity){
                    $this->benreqdonModel->requestPartial($f->Donation_ID,$d->D_Id,$e);
                    $this->benreqdonModel->updateDonation($f->Donation_ID, $e);
                    $this->benreqdonModel->requestFullyAccepted($f->Donation_ID);
                    redirect('BenReqDons/index');
                }
                elseIf($e < $f->Remaining_Quantity){
                    $this->benreqdonModel->requestPartial($f->Donation_ID,$d->D_Id,$e);
                    $this->benreqdonModel->updateDonation($f->Donation_ID, $e);
                    redirect('BenReqDons/index');
                }
                else {
                    die('Something went wrong');
                }
            } else {

                $this->view('benreqdons/show', $data);

            }

        }
    }
}



