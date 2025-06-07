<?php 
class report {
    private $db;

    public function __cunstruct(){
        $this->db = new Database;
    }
    


    public function barchart(){

        $this->db->query('SELECT DATE(Donation_Time) AS donation_date, COUNT(*) AS row_count 
        FROM charitable.donation_table 
        GROUP BY donation_date');
        $value = $this->db->resultSet();
        return $value;
        if($this->db->rowCount()>0){
            return $value;
        }
        else return false;

    }


}
?>