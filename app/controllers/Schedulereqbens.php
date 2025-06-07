<?php
class Schedulereqbens extends Controller
{

    public function __construct()
    {
        $this->schedulereqbenModel = $this->model('Schedulereqben');
        $this->userModel = $this->model('User');
        $this->requestModel = $this->model('Schedulereq_don');

    }


    public function index()
    {
        $requests = $this->schedulereqbenModel->getAllRequests();
        $accreq = $this-> schedulereqbenModel-> getAccRequests();
        $data = [
            'requests' => $requests,
            'accreq' => $accreq
        ];

        $this->view('schedulereqbens/index', $data);
    }


    public function acceptRequest($Id)
    {
        /*$c= $_SESSION['user_id'];
        $d =$this->schedulereqbenModel-> getDonId($c);*/
/*        $this->schedulereqbenModel->getRequestDetails($Id);*/

        $reqDetails = $this->schedulereqbenModel->getReqDetails($Id);
        $S_Id = $reqDetails->S_Id;
        $Donation_Quantity = $reqDetails->Donation_Quantity;
        if ($this->schedulereqbenModel->acceptRequest($Id)) {
            if ($this->schedulereqbenModel->updateComSchedule($S_Id, $Donation_Quantity)) {
                flash('request_message', 'Request Accepted');
                redirect('schedulereqbens/index');
            } else {
                die('Something went wrong');
            }
        } else {
            die('Something went wrong');
        }
    }

    public function comRequest($Id)
    {
        /*$c= $_SESSION['user_id'];
        $d =$this->schedulereqbenModel-> getDonId($c);*/
        /*        $this->schedulereqbenModel->getRequestDetails($Id);*/

        if ($this->schedulereqbenModel->completeRequest($Id)) {
            flash('request_message', 'Request Accepted');
            redirect('schedulereqbens/index');
        } else {
            die('Something went wrong');
        }
    }

    public function show($id){
        $requests = $this->requestModel->getDRequestById($id);
        $user = $this->userModel->getUserById($requests->B_Id);

        $data = [
            'requests' => $requests,
            'user' => $user
        ];

        if($data['requests']!=null){
            $this->view('schedulereqbens/show', $data);
        } else {
            redirect('schedulereqbens/index');
        }
    }

    public function showacc($id){
        $requests = $this->requestModel->getDRequestById($id);
        $user = $this->userModel->getUserById($requests->B_Id);

        $data = [
            'requests' => $requests,
            'user' => $user
        ];

        if($data['requests']!=null){
            $this->view('schedulereqbens/showacc', $data);
        } else {
            redirect('schedulereqbens/index');
        }
    }

    public function delete($Id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Get existing post from model
            $request = $this->schedulereqbenModel->getAllRequests();


            $reqDetails = $this->schedulereqbenModel->getReqDetails($Id);
            $S_Id = $reqDetails->S_Id;
            $Donation_Quantity = $reqDetails->Donation_Quantity;

            $comDetails = $this->schedulereqbenModel->getComDetails($S_Id);
            $total_quantity = $comDetails -> Total_Quantity;

            // Check for owner
            if($request->B_Id != $_SESSION['user_id']){
                redirect('schedulereqbens/index');
            }

            if($this->schedulereqbenModel->deleteRequest($Id)) {
                if ($total_quantity > $Donation_Quantity) {

                    if ($this->schedulereqbenModel->upDelComSchedule($S_Id, $Donation_Quantity)) {
                        flash('request_message', 'Request Accepted');
                        redirect('schedulereqbens/index');
                    }
                } else {
                    if ($this->schedulereqbenModel->deleteReqCom($S_Id)) {
                        flash('request_message', 'Request Accepted');
                        redirect('schedulereqbens/index');
                }
            }
                flash('request_message', 'Request Removed');
                redirect('schedulereqbens/index');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('schedulereqbens/index');
        }
    }
}
