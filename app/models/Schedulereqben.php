<?php
class Schedulereqben{
    private $db;
    public function __construct(){
        $this->db = new Database;


    }

    public function getAllRequests(){

        $this->db->query('SELECT s.* , b.* , d.* 
                  FROM shedule_request_table s INNER JOIN beneficiary_details b
                  ON s.`B_Id` = b.`B_Id` AND ' . $_SESSION['user_id'] . ' = b.`User_Id`
                  INNER JOIN donor_details d
                  ON s.`D_Id` = d.`D_Id`WHERE accepted = false AND completed = false Order by s.D_Date ASC');
        $results = $this->db->resultSet();

        return $results;
    }

    public function getAccRequests(){

        $this->db->query('SELECT s.* , b.* , d.* 
                  FROM shedule_request_table s INNER JOIN beneficiary_details b
                  ON s.`B_Id` = b.`B_Id` AND ' . $_SESSION['user_id'] . ' = b.`User_Id`
                  INNER JOIN donor_details d
                  ON s.`D_Id` = d.`D_Id`WHERE accepted = true AND completed = false Order by s.D_Date ASC');
        $results = $this->db->resultSet();

        return $results;
    }

    public function getRequestDetails($id){
        $this->db->query('select * from shedule_request_table where B_Req_ID = :B_Req_ID');
        $this->db->bind(':B_Req_ID', $id);
        $row = $this->db->single();
        return $row;
    }

    public function acceptRequest($Id){

        $this->db->query('UPDATE shedule_request_table SET Accepted = true WHERE B_Req_ID = :B_Req_ID');
        $this->db->bind(':B_Req_ID', $Id);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function getReqDetails($id){
        $this->db->query('SELECT S_Id, Donation_Quantity FROM shedule_request_table WHERE B_Req_ID = :B_Req_ID');
        $this->db->bind(':B_Req_ID', $id);
        $row = $this->db->single();
        return $row;
    }

    public function updateComSchedule($S_Id, $Donation_Quantity){
        $this->db->query('UPDATE comschedule_table SET Reserved_Quantity = Reserved_Quantity + :Donation_Quantity WHERE S_ID = :S_ID');
        $this->db->bind(':S_ID', $S_Id);
        $this->db->bind(':Donation_Quantity', $Donation_Quantity);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function completeRequest($Id){
        $this->db->query('UPDATE shedule_request_table SET completed = true WHERE B_Req_ID = :Id');
        $this->db->bind(':Id', $Id);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
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

}



