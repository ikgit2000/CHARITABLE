<?php

class Profileben
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function profile($id)
    {
        $this->db->query('SELECT * FROM beneficiary_details WHERE B_Id = :B_Id');
        $this->db->bind(':B_Id', $id);
        $row = $this->db->single();
        return $row;
    }
    public function getDonorDetailsById($id)
    {
        $this->db->query('SELECT * FROM donor_details WHERE User_Id = :User_Id');
        $this->db->bind(':User_Id', $id);
        $row = $this->db->single();
        return $row;
    }

}