<?php
class Donation {
    private $db;
    
    public function __construct(){
        $this->db = new Database;
    }
    // Pending donations
    public function getPendingDonationDetails(){
        $this->db->query('SELECT * FROM donation_table INNER JOIN beneficiary_details ON donation_table.B_Id = beneficiary_details.B_Id 
        INNER JOIN donor_details ON donation_table.D_Id = donor_details.D_Id WHERE Accepted = 0 AND completed = 0 AND expiry = 0 ORDER BY Donation_ID DESC');
        $results = $this->db->resultSet();
        return $results;
    }
    public function getPendingDonationDetailsByBType($b_type){
        $this->db->query('SELECT * FROM donation_table INNER JOIN beneficiary_details ON donation_table.B_Id = beneficiary_details.B_Id 
        INNER JOIN donor_details ON donation_table.D_Id = donor_details.D_Id WHERE B_Type = :b_type AND Accepted = 0 AND completed = 0 AND expiry = 0 ORDER BY Donation_ID DESC');
        $this->db->bind('b_type',$b_type);
        $results = $this->db->resultSet();
        return $results;
    }
    public function getPendingDonationDetailsByDType($d_type){
        $this->db->query('SELECT * FROM donation_table INNER JOIN beneficiary_details ON donation_table.B_Id = beneficiary_details.B_Id 
        INNER JOIN donor_details ON donation_table.D_Id = donor_details.D_Id WHERE Donation_Type = :d_type AND Accepted = 0 AND completed = 0 AND expiry = 0 ORDER BY Donation_ID DESC');
        $this->db->bind('d_type',$d_type);
        $results = $this->db->resultSet();
        return $results;
    }

    // Accepted donations
    public function getAcceptedDonationDetails(){
        $this->db->query('SELECT * FROM donation_table INNER JOIN beneficiary_details ON donation_table.B_Id = beneficiary_details.B_Id 
        INNER JOIN donor_details ON donation_table.D_Id = donor_details.D_Id WHERE Accepted = 1 AND completed = 0 AND expiry = 0 ORDER BY Donation_ID DESC');
        $results = $this->db->resultSet();
        return $results;
    }
    public function getAcceptedDonationDetailsByBType($b_type){
        $this->db->query('SELECT * FROM donation_table INNER JOIN beneficiary_details ON donation_table.B_Id = beneficiary_details.B_Id 
        INNER JOIN donor_details ON donation_table.D_Id = donor_details.D_Id WHERE B_Type = :b_type AND Accepted = 1 AND completed = 0 AND expiry = 0 ORDER BY Donation_ID DESC');
        $this->db->bind('b_type',$b_type);
        $results = $this->db->resultSet();
        return $results;
    }
    public function getAcceptedDonationDetailsByDType($d_type){
        $this->db->query('SELECT * FROM donation_table INNER JOIN beneficiary_details ON donation_table.B_Id = beneficiary_details.B_Id 
        INNER JOIN donor_details ON donation_table.D_Id = donor_details.D_Id WHERE Donation_Type = :d_type AND Accepted = 1 AND completed = 0 AND expiry = 0 ORDER BY Donation_ID DESC');
        $this->db->bind('d_type',$d_type);
        $results = $this->db->resultSet();
        return $results;
    }
    
    // Completed donations
    public function getCompletedDonationDetails(){
        $this->db->query('SELECT * FROM donation_table INNER JOIN beneficiary_details ON donation_table.B_Id = beneficiary_details.B_Id 
        INNER JOIN donor_details ON donation_table.D_Id = donor_details.D_Id WHERE Accepted = 1 AND completed = 1 AND expiry = 0 ORDER BY Donation_ID DESC');
        $results = $this->db->resultSet();
        return $results;
    }
    public function getCompletedDonationDetailsByBType($b_type){
        $this->db->query('SELECT * FROM donation_table INNER JOIN beneficiary_details ON donation_table.B_Id = beneficiary_details.B_Id 
        INNER JOIN donor_details ON donation_table.D_Id = donor_details.D_Id WHERE B_Type = :b_type AND Accepted = 1 AND completed = 1 AND expiry = 0 ORDER BY Donation_ID DESC');
        $this->db->bind('b_type',$b_type);
        $results = $this->db->resultSet();
        return $results;
    }
    public function getCompletedDonationDetailsByDType($d_type){
        $this->db->query('SELECT * FROM donation_table INNER JOIN beneficiary_details ON donation_table.B_Id = beneficiary_details.B_Id 
        INNER JOIN donor_details ON donation_table.D_Id = donor_details.D_Id WHERE Donation_Type = :d_type AND Accepted = 1 AND completed = 1 AND expiry = 0 ORDER BY Donation_ID DESC');
        $this->db->bind('d_type',$d_type);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getRegBenDetails(){
        $this->db->query('SELECT * FROM beneficiary_details WHERE status_2 = "pending" ORDER BY B_Id ASC');
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

    // Load table data from file
    public function LoadData() {
        $this->db->query('SELECT * FROM donation_table INNER JOIN beneficiary_details ON donation_table.B_Id = beneficiary_details.B_Id 
        INNER JOIN donor_details ON donation_table.D_Id = donor_details.D_Id');
        $results = $this->db->resultSet();
        return $results; 
    }
}