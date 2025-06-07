<?php
class Admin_dash {
    private $db;
    
    public function __construct(){
        $this->db = new Database;
    }


    public function getBenCount(){
        $this->db->query('SELECT * FROM beneficiary_details');
        $count = $this->db->resultset();
        return $this->db->rowcount();
    }

    public function getDonCount(){
        $results = $this->db->query('SELECT * FROM donor_details');
        $count = $this->db->resultset();
        return $this->db->rowCount();
    } 

    // public function getEhCount(){
    //     $results = $this->db->query('SELECT * FROM event_hoster_details');
    //     $count = $this->db->resultset();
    //     return $this->db->rowCount();
    // }

    public function getPostCount(){
        $results = $this->db->query('SELECT * FROM posts');
        $count = $this->db->resultset();
        return $this->db->rowCount();
    }
}
?>