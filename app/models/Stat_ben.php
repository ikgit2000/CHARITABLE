<?php
 class Stat_ben
 {
     private $db;

     public function __construct()
     {
         $this->db = new Database;
     }

     public function No_of_requests($Id)
     {

         $this->db->query('select * from donation_table where B_Id = :Id');
         $this->db->bind(':Id', $Id);
         $row = $this->db->resultSet();
         //check row
         if ($this->db->rowCount() > 0) {
             return $this->db->rowCount();
         } else return false;
     }

     public function donationQuantity($Id)
     {
         $this->db->query('select donation_quantity from donation_table where B_Id = :Id');
         $this->db->bind(':Id', $Id);
         $row = $this->db->single();
         //check row
         if ($this->db->rowCount() > 0) {
             return $row;
         } else return false;
     }

     public function donationViaMonths($Id, $month)
     {

         $this->db->query('SELECT COUNT(*) AS num_rows FROM donation_table WHERE MONTH(Donation_Time)=:month AND B_Id = :Id');
         $this->db->bind(':Id', $Id);
         $this->db->bind(':month', $month);
         $row = $this->db->single();
         //check row
         if ($this->db->rowCount() > 0) {
             return $row;
         } else return false;


     }

     public function scheduledDonationsViaMonths($id)
     {
         $this->db->query("SELECT 
                MONTH(D_Date) AS Month,
                SUM(Donation_Quantity) AS Total_Donation_Quantity
            FROM 
                shedule_request_table
            WHERE
                B_Id = :Id
            GROUP BY 
                MONTH(D_Date)");
         $this->db->bind(':Id', $id);
         $row = $this->db->resultSet();
         //check row
         if ($this->db->rowCount() > 0) {
             return $row;
         } else return false;
     }

     public function highPriorityCount($id)
     {
         $this->db->query('SELECT COUNT(*) AS num_rows FROM donation_table WHERE Donation_Priority = "High" AND B_Id = :Id');
         $this->db->bind(':Id', $id);
         $row = $this->db->single();
         //check row
         if ($this->db->rowCount() > 0) {
             return $row;
         } else return false;
     }

     public function normalPriorityCount($id)
     {
         $this->db->query('SELECT COUNT(*) AS num_rows FROM donation_table WHERE Donation_Priority = "Normal" AND B_Id = :Id');
         $this->db->bind(':Id', $id);
         $row = $this->db->single();
         //check row
         if ($this->db->rowCount() > 0) {
             return $row;
         } else return false;
     }

     public function TotalDonationMonth($month, $id)
     {
         $this->db->query('SELECT Count(*) AS num_rows FROM donation_table WHERE MONTH(Donation_Time)=:month AND B_Id = :Id');
         $this->db->bind(':month', $month);
         $this->db->bind(':Id', $id);
         $row = $this->db->single();
         //check row
         if ($this->db->rowCount() > 0) {
             return $row;
         } else return false;

     }

     public function TotalCompletedDonationMonth($month, $id)
     {
         $this->db->query('SELECT Count(*) AS num_rows FROM donation_table WHERE MONTH(Donation_Time)=:month AND B_Id = :Id AND Completed = 1');
         $this->db->bind(':month', $month);
         $this->db->bind(':Id', $id);
         $row = $this->db->single();
         //check row
         if ($this->db->rowCount() > 0) {
             return $row;
         } else return false;

     }

     public function breakfastQuantityMonth($month, $id)
     {
         $this->db->query('SELECT SUM(Donation_Quantity) AS Total_Donation_Quantity FROM shedule_request_table WHERE MONTH(D_Date)=:month AND B_Id = :Id AND Time = "Breakfast"');
         $this->db->bind(':month', $month);
         $this->db->bind(':Id', $id);
         $row = $this->db->single();
         //check row
         if ($this->db->rowCount() > 0) {
             return $row;
         } else return false;
     }

     public function lunchQuantityMonth($month, $id)
     {
         $this->db->query('SELECT SUM(Donation_Quantity) AS Total_Donation_Quantity FROM shedule_request_table WHERE MONTH(D_Date)=:month AND B_Id = :Id AND Time = "Lunch"');
         $this->db->bind(':month', $month);
         $this->db->bind(':Id', $id);
         $row = $this->db->single();
         //check row
         if ($this->db->rowCount() > 0) {
             return $row;
         } else return false;
     }

     public function dinnerQuantityMonth($month, $id)
     {
         $this->db->query('SELECT SUM(Donation_Quantity) AS Total_Donation_Quantity FROM shedule_request_table WHERE MONTH(D_Date)=:month AND B_Id = :Id AND Time = "Dinner"');
         $this->db->bind(':month', $month);
         $this->db->bind(':Id', $id);
         $row = $this->db->single();
         //check row
         if ($this->db->rowCount() > 0) {
             return $row;
         } else return false;
     }

        public function completedDonationViaMonths($month, $id){

                $this->db->query('SELECT * FROM donation_table WHERE MONTH(Donation_Time)=:month AND B_Id = :Id AND Completed = 1');
                $this->db->bind(':Id', $id);
                $this->db->bind(':month', $month);
                $row = $this->db->resultSet();
                //check row
                if ($this->db->rowCount() > 0) {
                    return $row;
                }
                else return false;


     }

     public function maxQuantityMeals($id){


     }







}