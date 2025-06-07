<?php
class Event {
    private $db;
    
    public function __construct(){
        $this->db = new Database;
    }
    // Pending events
    public function getPendingEventDetails(){
        $this->db->query('SELECT * FROM event_request_table INNER JOIN beneficiary_details ON event_request_table.B_Id = beneficiary_details.B_Id 
        INNER JOIN event_hoster_details ON event_request_table.E_ID = event_hoster_details.E_ID WHERE accepted = 0 AND completed = 0 ORDER BY Event_ID DESC');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getPendingEventDetailsBtype($b_type){
        $this->db->query('SELECT * FROM event_request_table INNER JOIN beneficiary_details ON event_request_table.B_Id = beneficiary_details.B_Id 
        INNER JOIN event_hoster_details ON event_request_table.E_ID = event_hoster_details.E_ID WHERE B_Type = :b_type AND accepted = 0 AND completed = 0 ORDER BY Event_ID DESC');
        $this->db->bind('b_type',$b_type);
        $results = $this->db->resultSet();
        return $results;
    }

    // Accepted events
    public function getAcceptedEventDetails(){
        $this->db->query('SELECT * FROM event_request_table INNER JOIN beneficiary_details ON event_request_table.B_Id = beneficiary_details.B_Id 
        INNER JOIN event_hoster_details ON event_request_table.E_ID = event_hoster_details.E_ID WHERE accepted = 1 AND completed = 0 ORDER BY Event_ID DESC');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getAcceptedEventDetailsBtype($b_type){
        $this->db->query('SELECT * FROM event_request_table INNER JOIN beneficiary_details ON event_request_table.B_Id = beneficiary_details.B_Id 
        INNER JOIN event_hoster_details ON event_request_table.E_ID = event_hoster_details.E_ID WHERE B_Type = :b_type AND accepted = 1 AND completed = 0 ORDER BY Event_ID DESC');
        $this->db->bind('b_type',$b_type);
        $results = $this->db->resultSet();
        return $results;
    }

    // Completed events
    public function getCompletedEventDetails(){
        $this->db->query('SELECT * FROM event_request_table INNER JOIN beneficiary_details ON event_request_table.B_Id = beneficiary_details.B_Id 
        INNER JOIN event_hoster_details ON event_request_table.E_ID = event_hoster_details.E_ID WHERE accepted = 1 AND completed = 1 ORDER BY Event_ID DESC');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getCompletedEventDetailsBtype($b_type){
        $this->db->query('SELECT * FROM event_request_table INNER JOIN beneficiary_details ON event_request_table.B_Id = beneficiary_details.B_Id 
        INNER JOIN event_hoster_details ON event_request_table.E_ID = event_hoster_details.E_ID WHERE B_Type = :b_type AND accepted = 1 AND completed = 1 ORDER BY Event_ID DESC');
        $this->db->bind('b_type',$b_type);
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
}