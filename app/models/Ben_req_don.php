<?php 
class Ben_req_don{
private $db;
public function __construct(){
$this->db = new Database;



}

public function getAllRequest(){
$this->db->query('select * from donation_table where Accepted = false and completed = false');

$row = $this->db->resultSet();
//check row
if($this->db->rowCount() > 0){
return $row;
}
else{ 
return false;
}
}

public function acceptRequest($Id){
$this->db->query('UPDATE donation_table SET Accepted = true WHERE D_Id = :Id');
$this->db->bind(':Id', $Id);
if($this->db->execute()){
return true;
}
else{
return false;
}
}
public function completeRequest($Id){
$this->db->query('UPDATE donation_table SET completed = true WHERE D_Id = :Id');
$this->db->bind(':Id', $Id);
if($this->db->execute()){
return true;
}
else{
return false;
}
}


public function getBenDetails($id) {
$this->db->query('SELECT * FROM beneficiary_details WHERE B_Id = :B_Id');
$this->db->bind(':B_Id', $id);
$row = $this->db->single();
return $row;
}






}

