<?php
class SettingBen{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function updateProfile($data){
        $id= $_SESSION['user_id'];

        $this->db->query('Update Beneficiary_Details SET B_Name = :name, B_Address = :address, B_Members = :members,B_Description = :description, B_Tpno = :telephone_number, B_Address = :address WHERE User_Id = :id');

        //bind values
        $this->db->bind(':name', $data['B_Name']);
        $this->db->bind(':address', $data['B_Address']);
        $this->db->bind(':members', $data['B_Members']);
        $this->db->bind(':description', $data['B_Description']);
        $this->db->bind(':telephone_number', $data['B_Phone']);
        $this->db->bind(':address', $data['B_Address']);
        $this->db->bind(':id', $id);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }


    }




}