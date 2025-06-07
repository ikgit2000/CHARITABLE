<?php
class SettingsDon{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function updateProfile($data){
        $id= $_SESSION['user_id'];

        $this->db->query('Update donor_details SET D_Name = :D_Name, D_Address = :D_Address, D_Tel_No = :D_Tel_No, latitude = :latitude, longitude = :longitude WHERE User_Id = :id');

        //bind values
        $this->db->bind(':D_Name', $data['D_Name']);
        $this->db->bind(':D_Address', $data['D_Address']);
        $this->db->bind(':D_Tel_No', $data['D_Tel_No']);
        $this->db->bind(':D_Address', $data['D_Address']);
        $this->db->bind(':latitude', $data['latitude']);
        $this->db->bind(':longitude', $data['longitude']);
        $this->db->bind(':id', $id);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }


    }

}