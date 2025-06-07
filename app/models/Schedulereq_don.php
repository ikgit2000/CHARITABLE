<?php
class Schedulereq_don {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
     public function getRequests(){
    
     $this->db->query('SELECT s.*, d.*, b.B_Name
                  FROM shedule_request_table s
                  INNER JOIN donor_details d ON s.D_Id = d.D_Id AND ' . $_SESSION['user_id'] . ' = d.User_Id
                  INNER JOIN beneficiary_details b ON s.B_Id = b.B_Id
                  WHERE s.accepted = false AND s.completed = false'); 

        $results = $this->db->resultSet();

        return $results;
    }

    public function getRecentScheduleReq(){

        $this->db->query('SELECT s.*, d.*, b.B_Name
                  FROM shedule_request_table s
                  INNER JOIN donor_details d ON s.D_Id = d.D_Id AND ' . $_SESSION['user_id'] . ' = d.User_Id
                  INNER JOIN beneficiary_details b ON s.B_Id = b.B_Id
                  WHERE s.accepted = true AND s.completed = false /*s.D_Date BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 20 DAY)*/ Order by s.D_Date ASC');

        $results = $this->db->resultSet();

        return $results;
    }

    public function getRecentBeneficiaryReq(){

        $this->db->query('SELECT o.*, d.*, b.B_Name
                  FROM donation_table o
                  INNER JOIN donor_details d ON o.D_Id = d.D_Id AND ' . $_SESSION['user_id'] . ' = d.User_Id
                  INNER JOIN beneficiary_details b ON o.B_Id = b.B_Id
                  WHERE o.Accepted = true AND o.Completed = false Order by o.Donation_Priority AND o.Donation_Time ASC');

        $results = $this->db->resultSet();

        return $results;
    }

    public function getCompletedScheduleReq(){

        $this->db->query('SELECT s.*, d.*, b.B_Name
                  FROM shedule_request_table s
                  INNER JOIN donor_details d ON s.D_Id = d.D_Id AND ' . $_SESSION['user_id'] . ' = d.User_Id
                  INNER JOIN beneficiary_details b ON s.B_Id = b.B_Id
                  WHERE s.accepted = true AND s.completed = true');

        $results = $this->db->resultSet();

        return $results;
    }

    public function getCompletedBeneficiaryReq(){

        $this->db->query('SELECT o.*, d.*, b.B_Name
                  FROM donation_table o
                  INNER JOIN donor_details d ON o.D_Id = d.D_Id AND ' . $_SESSION['user_id'] . ' = d.User_Id
                  INNER JOIN beneficiary_details b ON o.B_Id = b.B_Id
                  WHERE o.Accepted = true AND o.Completed = true');

        $results = $this->db->resultSet();

        return $results;
    }

     public function getAllRequests(){
        $this->db->query('SELECT c.* , b.B_Members, b.B_Name FROM comschedule_table c INNER JOIN beneficiary_details b ON c.B_Id = b.B_Id /*WHERE B_Id = :B_Id*/');
        //$this->db->bind(':B_Id', $id);

         $results = $this->db->resultSet();

        return $results;
    }  

    public function getDRequestByID($id)
    {
        $this->db->query('SELECT s.*, b.* FROM shedule_request_table s INNER JOIN beneficiary_details b ON s.B_Id = b.B_Id WHERE B_Req_ID = :B_Req_ID');
        $this->db->bind(':B_Req_ID', $id);
        $row = $this->db->single();
        return $row;
    }

    public function getDonId($id){
        $this->db->query('SELECT * FROM donor_details WHERE User_Id = :User_Id');
        $this->db->bind(':User_Id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function getBMembers($B_Id){
        $this->db->query('SELECT B_Members FROM beneficiary_details WHERE B_Id = :B_Id');
        $this->db->bind(':B_Id', $B_Id);
        $row = $this->db->single();
        return $row;
    }

    public function getTotalQuantity($B_Id, $Time, $D_Date){
        $this->db->query('SELECT Total_Quantity FROM comschedule_table WHERE B_Id = :B_Id AND Time = :Time AND D_Date = :D_Date');
        $this->db->bind(':B_Id', $B_Id);
        $this->db->bind(':Time', $Time);
        $this->db->bind(':D_Date', $D_Date);
        $row = $this->db->single();
        return $row;
    }

    public function addcomschedule($data){

        $this->db->query('INSERT INTO comschedule_table ( D_Date, Time, B_Id, Total_Quantity, Reserved_Quantity) VALUES( :D_Date, :Time, :B_Id, :Donation_Quantity, 0)');
        //Bind values
        $this->db->bind(':D_Date', $data['D_Date']);
        $this->db->bind(':Time', $data['Time']);
        $this->db->bind(':B_Id', $data['B_id']);
        $this->db->bind(':Donation_Quantity', $data['Donation_Quantity']);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function addRequests($data){
        $this->db->query('INSERT INTO shedule_request_table (/*D_Name, D_Tel_No, D_Address, */Food_Type, D_Date, Time, Donation_Quantity, D_Id, B_Id, S_Id) VALUES(/*:D_Name, :D_Tel_No, :D_Address,*/ :Food_Type, :D_Date, :Time, :Donation_Quantity, :D_Id, :B_Id, :S_Id)');
        //Bind values
        /*$this->db->bind(':D_Name', $data['D_Name']);
        $this->db->bind(':D_Tel_No', $data['D_Tel_No']);
        $this->db->bind(':D_Address', $data['D_Address']);*/
        $this->db->bind(':Food_Type', $data['Food_Type']);
        $this->db->bind(':Donation_Quantity', $data['Donation_Quantity']);
        $this->db->bind(':D_Date', $data['D_Date']);
        $this->db->bind(':Time', $data['Time']);
        $this->db->bind(':D_Id', $data['user_id']);
        $this->db->bind(':B_Id', $data['B_id']);
        $this->db->bind(':S_Id', $data['S_Id']);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

        // Check if there is an existing request for the same beneficiary, meal type, and date
    public function checkExRequests($ben_id,$time,$date)
    {

        $this->db->query('SELECT * FROM comschedule_table WHERE B_Id = :B_Id AND Time = :Time AND D_Date = :D_Date');
        $this->db->bind(':B_Id', $ben_id);
        $this->db->bind(':Time', $time);
        $this->db->bind(':D_Date', $date);
        $row = $this->db->single();
        return $row;
    }

    public function updateComSchedule($S_Id, $Donation_Quantity){
        $this->db->query('UPDATE comschedule_table SET Total_Quantity = Total_Quantity + :Donation_Quantity WHERE S_ID = :S_ID');
        $this->db->bind(':S_ID', $S_Id);
        $this->db->bind(':Donation_Quantity', $Donation_Quantity);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function upDelComSchedule($S_Id, $Donation_Quantity){
        $this->db->query('UPDATE comschedule_table SET Total_Quantity = Total_Quantity - :Donation_Quantity WHERE S_ID = :S_ID');
        $this->db->bind(':S_ID', $S_Id);
        $this->db->bind(':Donation_Quantity', $Donation_Quantity);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }
//delete review req

    public function getReqDetails($id){
        $this->db->query('SELECT S_Id, Donation_Quantity FROM shedule_request_table WHERE B_Req_ID = :B_Req_ID');
        $this->db->bind(':B_Req_ID', $id);
        $row = $this->db->single();
        return $row;
    }

    public function getComDetails($S_Id){
        /*if(!$S_Id){
            die('S_ID is not passed to the function.');
        }*/
        $this->db->query('SELECT Total_Quantity FROM comschedule_table WHERE S_ID = :S_ID');
        $this->db->bind(':S_ID', $S_Id);
        $row = $this->db->single();
        return $row;
    }

    public function deleteReqCom($id){
        $this->db->query('DELETE FROM comschedule_table where S_ID = :S_ID');
        // Bind values
        $this->db->bind(':S_ID', $id);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function deleteRequest($id){
        $this->db->query('DELETE FROM shedule_request_table where B_Req_ID = :B_Req_ID');
        // Bind values
        $this->db->bind(':B_Req_ID', $id);
        
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function getNames(){
        $this->db->query('SELECT * FROM beneficiary_details');

        $results = $this->db->resultSet();

        return $results;
    }

        

    ///////////
    public function getBenById($id){
        $this->db->query('SELECT * FROM beneficiary_details WHERE B_Id = :B_Id');
        $this->db->bind(':B_Id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function completedBenReqDon($id){
        $this->db->query('Select *  FROM donation_table WHERE D_Id = :D_Id AND accepted = true AND completed = true');
        $this->db->bind(':D_Id', $id);
        $count=$this->db->resultSet();
        return $this->db->rowCount();

    }

    public function pendingRequestsDon($id){
        $this->db->query('Select * from shedule_request_table Where D_Id = :D_Id AND accepted = false AND completed = false');
        $this->db->bind(':D_Id', $id);
        $count=$this->db->resultset();
        return $this->db->rowCount();
    }
    public function completedRequestsDon($id){
        $this->db->query('Select * from shedule_request_table Where D_Id = :D_Id AND accepted = true AND completed = true');
        $this->db->bind(':D_Id', $id);
        $count=$this->db->resultset();
        return $this->db->rowCount();
    }
    public function acceptedRequestsDon($id){
        $this->db->query('Select * from shedule_request_table Where D_Id = :D_Id AND accepted = true AND completed = false');
        $this->db->bind(':D_Id', $id);
        $count=$this->db->resultset();
        return $this->db->rowCount();
    }

//update review req

    public function updateRequests($data){
        $this->db->query('UPDATE shedule_request_table SET /*D_Name = :D_Name, D_Tel_No = :D_Tel_No, D_Address = :D_Address,*/ Food_Type = :Food_Type, D_Date = :D_Date, Time = :Time, Donation_Quantity = :Donation_Quantity WHERE B_Req_ID = :B_Req_ID');
        //Bind values
        if (isset($data['D_Name'])) {
            /*$this->db->bind(':D_Name', $data['D_Name']);
            $this->db->bind(':D_Tel_No', $data['D_Tel_No']);
            $this->db->bind(':D_Address', $data['D_Address']);*/
            $this->db->bind(':Food_Type', $data['Food_Type']);
            $this->db->bind(':Donation_Quantity', $data['Donation_Quantity']);
            $this->db->bind(':D_Date', $data['D_Date']);
            $this->db->bind(':Time', $data['Time']);
            $this->db->bind(':B_Req_ID', $data['B_Req_ID']);
        }
        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function upDelComSchtable($S_Id, $Donation_Quantity){
        $this->db->query('UPDATE comschedule_table SET Total_Quantity = :Donation_Quantity WHERE S_ID = :S_ID');
        $this->db->bind(':S_ID', $S_Id);
        $this->db->bind(':Donation_Quantity', $Donation_Quantity);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function updateDelComSch($data,$S_Id, $Donation_Quantity){
        $this->db->query('UPDATE comschedule_table SET Total_Quantity = :Donation_Quantity, D_Date = :D_Date, Time = :Time  WHERE S_ID = :S_ID');
        $this->db->bind(':D_Date', $data['D_Date']);
        $this->db->bind(':Time', $data['Time']);
        $this->db->bind(':S_ID', $S_Id);
        $this->db->bind(':Donation_Quantity', $Donation_Quantity);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }
/*$this->db->query('UPDATE comschedule_table SET Total_Quantity = Total_Quantity + :Donation_Quantity WHERE S_ID = :S_ID');
$this->db->bind(':S_ID', $S_Id);
$this->db->bind(':Donation_Quantity', $Donation_Quantity);
if($this->db->execute()){
return true;
}
else{
    return false;
}*/
    public function checkSchReqDandT($ben_id,$time,$date, $id)
    {
        $this->db->query('SELECT * FROM shedule_request_table WHERE B_Id = :B_Id AND Time = :Time AND D_Date = :D_Date AND B_Req_ID = :B_Req_ID');
        $this->db->bind(':B_Id', $ben_id);
        $this->db->bind(':Time', $time);
        $this->db->bind(':D_Date', $date);
        $this->db->bind(':B_Req_ID', $id);

        $row = $this->db->single();
        return $row;
    }


     /* public function get_meals(){
        $this->db->query('SELECT B_Req_ID, Time, D_Date FROM shedule_request_table');
        $results = $this->db->resultSet();

        $count = mysqli_num_rows($results);
        if($count > 0){
            $data_arr = array();
            $i=1;
            while($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC)) { 
                $data_arr[$i]['reqID'] = $data_row['B_Req_ID'];
                $data_arr[$i]['title'] = $data_row['Time'];
                $data_arr[$i]['date'] = date("Y-m-d", strtotime($data_row['D_Date']));
                $i++;
              }
              $data = array(
                          'status' => true,
                          'msg' => 'successfully!',
                          'data' => $data_arr
                      );
            }
            else {
              $data = array(
                          'status' => false,
                          'msg' => 'Error!'       
                      );
            }
            echo json_encode($data);
    }  */


    
 }

    

