<?php
class Donor {
    private $db;
    
    public function __construct(){
        $this->db = new Database;
    }


    public function getDonorDetails(){
        $this->db->query('SELECT * FROM donor_details');

        $results = $this->db->resultSet();

        return $results;
    }

    public function getDonorById($id){
        $this->db->query('SELECT * FROM Donor_details WHERE D_Id = :D_Id');
        $this->db->bind(':D_Id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function getPendingDonationCount($id){
        $results = $this->db->query('SELECT * FROM donation_table WHERE D_Id = :D_Id AND Accepted = 1 AND Completed = 0 ');
        $this->db->bind(':D_Id', $id);
        $count = $this->db->resultSet();
        return $this->db->rowCount();
    }
    public function getCompletedDonationCount($id){
        $results = $this->db->query('SELECT * FROM donation_table WHERE D_Id = :D_Id AND Accepted = 1 AND Completed = 1 ');
        $this->db->bind(':D_Id', $id);
        $count = $this->db->resultSet();
        return $this->db->rowCount();
    }

    public function getPendingDonationDetails(){
        $this->db->query('SELECT * FROM donation_table INNER JOIN beneficiary_details ON donation_table.B_Id = beneficiary_details.B_Id 
        INNER JOIN donor_details ON donation_table.D_Id = donor_details.D_Id WHERE Accepted = 1 AND completed = 0 AND expiry = 0 ORDER BY Donation_ID DESC');
        $results = $this->db->resultSet();
        return $results;
    }

    // public function getReviewCount($id){
    //     $results = $this->db->query('SELECT * FROM feedback_full INNER JOIN donor_details ON feedback_full.D_Id = donor_details.D_Id WHERE D_Id = :D_Id AND Satisfaction  = "satisfied"' );
    //     $this->db->bind(':D_Id', $id);
    //     $count = $this->db->resultSet();
    //     return $this->db->rowCount();
    // }

}