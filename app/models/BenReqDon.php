<?php 
class BenReqDon{
private $db;
public function __construct(){
$this->db = new Database;


}



public function getAllRequests(){
    $this->db->query('SELECT * FROM `donation_table` AS D INNER JOIN `beneficiary_details` AS B ON D.`B_Id`=B.`B_Id` WHERE D.`Accepted`=false AND D.`Completed`=false ');
    $row = $this->db->resultSet();

    if($this->db->rowCount() > 0){
        return $row;
    }
    else{
        return false;
    }
}
public function getRequestDetails($id){
$this->db->query('select * from donation_table where Donation_ID = :D_Id');
$this->db->bind(':D_Id', $id);
$row = $this->db->single();
return $row;
}


public function acceptRequest($Id, $D_Id){

$this->db->query('UPDATE donation_table SET Accepted = true,Accepted_Time=current_timestamp, D_Id = :D_Id,Remaining_Quantity = :Quantity WHERE Donation_ID = :Id');
$this->db->bind(':Id', $Id);
$this->db->bind(':D_Id', $D_Id);
$this->db->bind(':Quantity', 0);
if($this->db->execute()){
return true;
}
else{
return false;
}
}

public  function requestPartial($Req_Id, $D_Id, $Quantity)
{
    $this->db->query('Insert into partial_donations (Req_Id, Donor_Id, Donation_Quantity,Accepted) values (:Req_Id, :Donor_Id, :Quantity, :Accepted) ');
    $this->db->bind(':Req_Id', $Req_Id);
    $this->db->bind(':Donor_Id', $D_Id);
    $this->db->bind(':Quantity', $Quantity);
    $this->db->bind(':Accepted', true);
    if ($this->db->execute()) {
        return true;
    } else {
        return false;
    }
}
public function requestFullyAccepted($DonationID){
        $this->db->query('UPDATE donation_table SET Accepted=true WHERE Donation_Id= :Donation_Id');
        $this->db->bind(':Donation_Id', $DonationID);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }


    }


public function updateDonation($Donation_Id, $Quantity){
    $this->db->query('UPDATE donation_table SET Remaining_Quantity = Remaining_Quantity - :Quantity WHERE Donation_ID = :Donation_Id');
    $this->db->bind(':Donation_Id', $Donation_Id);
    $this->db->bind(':Quantity', $Quantity);
    if($this->db->execute()){
        return true;
    }
    else{
        return false;
    }
}


public function completeRequest($Id){
$this->db->query('UPDATE donation_table SET completed = true WHERE Donation_ID = :Id');
$this->db->bind(':Id', $Id);
if($this->db->execute()){
return true;
}
else{
return false;
}
}

public function getBenDetails($id)
{
    $this->db->query('SELECT * FROM beneficiary_details WHERE User_Id = :User_Id');
    $this->db->bind(':User_Id', $id);
    $row = $this->db->single();
    return $row;
}
public function getDonDetails($id){
    $this->db->query('SELECT * FROM donor_details WHERE User_Id = :User_Id');
    $this->db->bind(':User_Id', $id);
    $row = $this->db->single();
    return $row;
}


}



