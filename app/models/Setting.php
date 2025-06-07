<?php
class Setting {
    private $db;
    
    public function __construct(){
        $this->db = new Database;
    }

    
    public function addAdminDetails($data,$x){
        $this->db->query('INSERT INTO admin_details 
        (A_name, A_Email, A_Phone, A_Password, A_DateAssigned, User_Id) 
        VALUES(:admin_name, :admin_email, :admin_phone, :admin_password, :admin_date_assigned, :User_Id)');

        // bind values
        $this->db->bind(':admin_name', $data['admin_name']);
        $this->db->bind(':admin_email', $data['admin_email']);
        $this->db->bind(':admin_phone', $data['admin_phone']);
        $this->db->bind(':admin_password', $data['admin_password']);
        // $this->db->bind(':admin_nic', $data['admin_nic']);
        $this->db->bind(':admin_date_assigned', $data['admin_date_assigned']);
        $this->db->bind(':User_Id', $x);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function getAdminDetails(){
        $this->db->query('SELECT * FROM admin_details');

        $results = $this->db->resultSet();

        return $results;
    }

    public function updateAdminDetails($data){
        $admin_id = $_SESSION['admin_id'];
        $this->db->query('UPDATE admin_details SET admin_name = :admin_name, admin_email = :admin_email,
        admin_phone = :admin_phone, admin_nic = :admin_nic WHERE admin_id = :admin_id');
        

        // bind values
        $this->db->bind(':admin_id', $admin_id);
        $this->db->bind(':admin_name', $data['admin_name']);
        $this->db->bind(':admin_email', $data['admin_email']);
        $this->db->bind(':admin_phone', $data['admin_phone']);
        //$this->db->bind(':admin_password', $data['admin_password']);
        $this->db->bind(':admin_nic', $data['admin_nic']);
       // $this->db->bind(':admin_date_assigned', $data['admin_date_assigned']);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function getAdminById($admin_id){
        $this->db->query('SELECT * FROM admin_details WHERE admin_id = :admin_id');
        $this->db->bind(':admin_id', $admin_id);

        $row = $this->db->single();

        return $row;
    }

}