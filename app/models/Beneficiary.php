<?php
class Beneficiary {
    private $db;
    
    public function __construct(){
        $this->db = new Database;
    }

    public function getBeneficiaryDetails(){
        $this->db->query('SELECT * FROM beneficiary_details WHERE status_2 = "approved" ORDER BY B_Id DESC');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getBeneficiaryDetailsByType($b_type) {
        $this->db->query('SELECT * FROM beneficiary_details WHERE status_2 = "approved" AND B_Type = :b_type ORDER BY B_Id DESC');
        $this->db->bind(':b_type', $b_type);
        $results = $this->db->resultSet();
        return $results;
    }
    // public function getBeneficiaryDetailsByName($search_name) {
    //     $this->db->query('SELECT * FROM beneficiary_details WHERE status_2 = "approved" AND B_Name LIKE :search_name ORDER BY B_Id DESC');
    //     $this->db->bind(':search_name', '%' . $search_name . '%');
    //     $results = $this->db->resultSet();
    //     return $results;
    // }
    
    public function getRegBenDetailsByType($b_type) {
        $this->db->query('SELECT * FROM beneficiary_details WHERE status_2 = "pending" AND B_Type = :b_type ORDER BY B_Id DESC');
        $this->db->bind(':b_type', $b_type);
        $results = $this->db->resultSet();
        return $results;
    }
    
    
    public function getRegBenDetails(){
        $this->db->query('SELECT * FROM beneficiary_details WHERE status_2 = "pending" ORDER BY B_Id DESC');
        $results = $this->db->resultSet();
        return $results;
    }

    public function approveRequest($id) {
        $this->db->query('UPDATE beneficiary_details SET status_2 = "approved" WHERE B_id = :B_id');
        $this->db->bind(':B_id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function denyRequest($id) {
        $this->db->query('DELETE FROM beneficiary_details WHERE B_id = :B_id');
        $this->db->bind(':B_id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getBeneficiaryById($id){
        $this->db->query('SELECT * FROM beneficiary_details WHERE B_Id = :B_Id');
        $this->db->bind(':B_Id', $id);
        $row = $this->db->single();
        return $row;
    }
    public function getReceivedDonationCount($id){
        $results = $this->db->query('SELECT * FROM donation_table WHERE B_Id = :B_Id AND Accepted = 1 AND Completed = 1');
        $this->db->bind(':B_Id', $id);
        $count = $this->db->resultSet();
        return $this->db->rowCount();
    }
    public function getOrganizedEventCount($id){
        $results = $this->db->query('SELECT * FROM event_request_table WHERE B_Id = :B_Id AND Accepted = 1 AND Completed = 1 ');
        $this->db->bind(':B_Id', $id);
        $count = $this->db->resultSet();
        return $this->db->rowCount();
    }
}