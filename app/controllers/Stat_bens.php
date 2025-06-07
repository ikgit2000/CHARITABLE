<?php 
class Stat_bens extends Controller
{
    public function __construct()
    {
        // if(!isLoggedIn()){
        //     redirect('users/login_ben');
        // }
        $this->requestModel = $this->model('Request_ben');
        $this->userModel = $this->model('User');
        $this->statModel = $this->model('Stat_ben');
    }

    public function index()
    {
        $userId = $_SESSION['user_id'];
        $id = $this->requestModel->getBenId($userId)->B_Id;
        $No_of_requests = $this->statModel->No_of_requests($id);
//        $data = [
//            'title' => 'No_of_requests',
//            'donation_quantity' => $No_of_requests,
//
//        ];
//     echo json_encode($data);
        $this->view('stat_bens/index');

    }

    public function monthlyReport($month)
    {
        $userId = $_SESSION['user_id'];
        $user = $this->requestModel->getBenId($userId);
        $id = $user->B_Id;

        $this->statModel->donationViaMonths($month, $id);
        $this->statModel->scheduledDonationsViaMonths($month, $id);
       $donationsMonth= $this->statModel->TotalDonationMonth($month, $id);
       $completedDonationsMonth=$this->statModel->TotalCompletedDonationMonth($month, $id);
       $breakfast=$this->statModel->breakfastQuantityMonth($month, $id);
       $lunch=$this->statModel->lunchQuantityMonth($month, $id);
       $dinner=$this->statModel->dinnerQuantityMonth($month, $id);
       $donations=$this->statModel->completedDonationViaMonths($month, $id);

        //$monthlyReport = $this->statModel->monthlyReport($id);
        $data = [
            'title' => 'monthlyReport',
            'user' => $user,
            'donationsMonth'=>$donationsMonth,
            'completedDonationsMonth'=>$completedDonationsMonth,
            'breakfast'=>$breakfast,
            'lunch'=>$lunch,
            'dinner'=>$dinner,
            'donations'=>$donations,
            'month'=>$month
            //'monthlyReport' => $monthlyReport,

        ];
        $this->view('stat_bens/monthlyReport', $data);
    }

    public function No_of_requests()
    {
        $userId = $_SESSION['user_id'];
        $id = $this->requestModel->getBenId($userId)->B_Id;
        $No_of_requests = $this->statModel->No_of_requests($id);
        $data = [
            'title' => 'No_of_requests',
            'donation_quantity' => $No_of_requests,
//            'donation_type' => $No_of_requests->donation_type,
//            'donation_priority' => $No_of_requests->donation_priority,
        ];
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function requestStatus()
    {
        $id = $this->requestModel->getBenId($_SESSION['user_id'])->B_Id;
        $pending = $this->requestModel->pendingRequestsBen($id);
        $accepted = $this->requestModel->acceptedRequestsBen($id);
        $completed = $this->requestModel->completedRequestsBen($id);
        $data = [
            'pending' => 'pending Requests',
            'accepted' => 'accepted Requests',
            'completed' => 'completed Requests',
            'pendingCount' => $pending,
            'acceptedCount' => $accepted,
            'completedCount' => $completed,
        ];
        header('Content-Type: application/json');
        echo json_encode($data);


    }

    public function donationViaMonths()
    {
        $id = $this->requestModel->getBenId($_SESSION['user_id'])->B_Id;
        $jan = $this->statModel->donationViaMonths($id, 1);
        $feb = $this->statModel->donationViaMonths($id, 2);
        $mar = $this->statModel->donationViaMonths($id, 3);
        $apr = $this->statModel->donationViaMonths($id, 4);
        $may = $this->statModel->donationViaMonths($id, 5);
        $jun = $this->statModel->donationViaMonths($id, 6);
        $jul = $this->statModel->donationViaMonths($id, 7);
        $aug = $this->statModel->donationViaMonths($id, 8);
        $sep = $this->statModel->donationViaMonths($id, 9);
        $oct = $this->statModel->donationViaMonths($id, 10);
        $nov = $this->statModel->donationViaMonths($id, 11);
        $dec = $this->statModel->donationViaMonths($id, 12);
        $data = [
            'jan' => 'jan',
            'feb' => 'feb',
            'mar' => 'mar',
            'apr' => 'apr',
            'may' => 'may',
            'jun' => 'jun',
            'jul' => 'jul',
            'aug' => 'aug',
            'sep' => 'sep',
            'oct' => 'oct',
            'nov' => 'nov',
            'dec' => 'dec',
            'janCount' => $jan,
            'febCount' => $feb,
            'marCount' => $mar,
            'aprCount' => $apr,
            'mayCount' => $may,
            'junCount' => $jun,
            'julCount' => $jul,
            'augCount' => $aug,
            'sepCount' => $sep,
            'octCount' => $oct,
            'novCount' => $nov,
            'decCount' => $dec,
        ];
        header('Content-Type: application/json');
        echo json_encode($data);

    }

    public function scheduledDonationsViaMonthsValue()
    {
        $id = $this->requestModel->getBenId($_SESSION['user_id'])->B_Id;
        $monthCounts = $this->statModel->scheduledDonationsViaMonths($id);
        $maxMembers= $this->requestModel->getBenId($_SESSION['user_id'])->B_Members;
        $maxQuantity=$maxMembers*3*30;

        $counts = [
            '1' => 0,
            '2' => 0,
            '3' => 0,
            '4' => 0,
            '5' => 0,
            '6' => 0,
            '7' => 0,
            '8' => 0,
            '9' => 0,
            '10' => 0,
            '11' => 0,
            '12' => 0,
        ];

        foreach ($monthCounts as $month) {
            $counts[$month->Month] = $month->Total_Donation_Quantity;
        }

        $data = [
            'jan' => 'jan',
            'feb' => 'feb',
            'mar' => 'mar',
            'apr' => 'apr',
            'may' => 'may',
            'jun' => 'jun',
            'jul' => 'jul',
            'aug' => 'aug',
            'sep' => 'sep',
            'oct' => 'oct',
            'nov' => 'nov',
            'dec' => 'dec',
            'janCount' => $counts[1],
            'febCount' => $counts[2],
            'marCount' => $counts[3],
            'aprCount' => $counts[4],
            'mayCount' => $counts[5],
            'junCount' => $counts[6],
            'julCount' => $counts[7],
            'augCount' => $counts[8],
            'sepCount' => $counts[9],
            'octCount' => $counts[10],
            'novCount' => $counts[11],
            'decCount' => $counts[12],
            'maxQuantity'=>$maxQuantity,

//
//
        ];
        header('Content-Type: application/json');
        echo json_encode($data);

    }

    public function priorityCount()
    {
        $id = $this->requestModel->getBenId($_SESSION['user_id'])->B_Id;
        $high = $this->statModel->highPriorityCount($id);
        $normal = $this->statModel->normalPriorityCount($id);

        $data = [
            'high' => 'high',
            'normal' => 'normal',
            'low' => 'low',
            'highCount' => $high,
            'normalCount' => $normal,

        ];
        header('Content-Type: application/json');
        echo json_encode($data);

    }


    public function donationQuantity()
    {
        $donationQuantity = $this->statModel->donationQuantity(12);
        $quantity[] = array();

        $data = [
            'title' => 'donationQuantity',
            'donation_quantity' => $donationQuantity,

        ];
        while ($data['donation_quantity'] > 0) {
            $data['donation_quantity'] = $quantity["donation_quantity"];
        }

        $this->view('stat_bens/index', $quantity);

    }

}