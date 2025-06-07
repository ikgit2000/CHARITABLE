<?php
class BenSearch{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getBen($input){
        $this->db->query('SELECT * FROM beneficiary_details WHERE B_Name LIKE :input OR B_Address LIKE :input' );
        $this->db->bind(':input', '%'.$input.'%');
        $this->db->execute();
        $result = $this->db->resultSet();
        return $result;
    }
    public function getAllBen()
    {
        $this->db->query('SELECT * FROM beneficiary_details');
        $this->db->execute();
        $result = $this->db->resultSet();
        return $result;
    }
}