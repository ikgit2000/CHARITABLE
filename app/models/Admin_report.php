<?php
 class Admin_report {
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    

public function completedDonationCount(){

    // $this->db->query('SELECT COUNT(*) AS num_rows FROM donation_table WHERE MONTH(Donation_Time)=:month AND accepted = 1 AND completed = 1 AND expiry = 0');
    // $this->db->bind(':month', $month);
    // $row = $this->db->single();
    // //check row
    // if ($this->db->rowCount() > 0) {
    //     return $row;
    // }
    // else return false;
    $this->db->query('SELECT DATE(Donation_Time) AS donation_date, COUNT(*) AS row_count FROM charitable.donation_table GROUP BY donation_date');
    $row = $this->db->single();
    if($this->db->rowCount() > 0){
        return $row;
    }
    else return false;
    }

public function expiredDonationCount($month){

    $this->db->query('SELECT COUNT(*) AS num_rows FROM donation_table WHERE MONTH(Donation_Time)=:month AND accepted = 1 AND completed = 0 AND expiry = 1');
    $this->db->bind(':month', $month);
    $row = $this->db->single();
            //check row
    if ($this->db->rowCount() > 0) {
        return $row;
        }
    else return false;
        
    }

    public function lineChartData($month){

        $this->db->query('SELECT COUNT(*) AS num_rows FROM donation_table WHERE MONTH(Donation_Time)=:month');
        $this->db->bind(':month', $month);
        $row = $this->db->single();
                //check row
        if ($this->db->rowCount() > 0) {
            return $row;
            }
        else return false;
            
        }
}