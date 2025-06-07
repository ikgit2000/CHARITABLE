<?php
class Request_ben
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getRequests()
    {
        $this->db->query('SELECT * FROM donation_table
                          INNER JOIN beneficiary_details

                          ON `donation_table`.`B_Id` = `beneficiary_details`.`B_Id` AND ' . $_SESSION['user_id'] . ' = `beneficiary_details`.`User_Id`

                          Order by `donation_table`.`Donation_Time` DESC');
        $results = $this->db->resultSet();
        return $results;
    }
    public function addRequests($data)
    {
        $this->db->query('INSERT INTO donation_table (Donation_Description, Donation_Quantity, Donation_Type, Donation_Priority,B_Id,Donation_Details,Remaining_Quantity) VALUES(:Donation_Description, :Donation_Quantity, :Donation_Type, :Donation_Priority,:B_Id,:Donation_Details,:Donation_Quantity)');
        // Bind values
        $this->db->bind(':Donation_Description', $data['Donation_Description']);
        $this->db->bind(':Donation_Quantity', $data['Donation_Quantity']);
        $this->db->bind(':Donation_Type', $data['Donation_Type']);
        $this->db->bind(':Donation_Priority', $data['Donation_Priority']);
        $this->db->bind(':B_Id', $data['user_id']);
        $this->db->bind(':Donation_Details', $data['Donation_Details']);
        $this->db->bind(':Donation_Quantity', $data['Donation_Quantity']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getRequestByID($id)
    {
        $this->db->query('SELECT * FROM donation_table WHERE Donation_ID = :Donation_ID');
        $this->db->bind(':Donation_ID', $id);
        $row = $this->db->single();
        return $row;
    }

    public function getBenId($id){
        $this->db->query('SELECT * FROM beneficiary_details WHERE User_Id = :User_Id');
        $this->db->bind(':User_Id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function UpdateRequest($data)
    {
        $this->db->query('UPDATE donation_table SET Donation_Description = :Donation_Description, Donation_Quantity = :Donation_Quantity, Donation_Type = :Donation_Type, Donation_Priority = :Donation_Priority, Donation_Details= :Donation_Details  WHERE Donation_ID = :Donation_ID');
        // Bind values
        if (isset($data['Donation_Description'])) {

            $this->db->bind(':Donation_Description', $data['Donation_Description']);
            $this->db->bind(':Donation_Quantity', $data['Donation_Quantity']);
            $this->db->bind(':Donation_Type', $data['Donation_Type']);
            $this->db->bind(':Donation_Priority', $data['Donation_Priority']);
            $this->db->bind(':Donation_Details', $data['Donation_Details']);
            $this->db->bind(':Donation_ID', $data['Donation_ID']);

        }

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }
    
    public function deleteRequest($id)
    {
        $this->db->query('DELETE FROM donation_table WHERE Donation_ID = :Donation_ID');
        // Bind values
        $this->db->bind(':Donation_ID', $id);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function totalRequestsByBen($id){
        $this->db->query('Select *  FROM donation_table WHERE B_Id = :B_Id');
        $this->db->bind(':B_Id', $id);
        $count=$this->db->resultSet();
        return $this->db->rowCount();


    }
    public function pendingRequestsBen($id){
        $this->db->query('Select * from donation_table Where B_Id = :B_Id AND Accepted = false AND Completed = false');
        $this->db->bind(':B_Id', $id);
        $count=$this->db->resultset();
        return $this->db->rowCount();
    }
    public function completedRequestsBen($id){
        $this->db->query('Select * from donation_table Where B_Id = :B_Id AND Accepted = true AND Completed = true');
        $this->db->bind(':B_Id', $id);
        $count=$this->db->resultset();
        return $this->db->rowCount();
    }
    public function acceptedRequestsBen($id){
        $this->db->query('Select * from donation_table Where B_Id = :B_Id AND Accepted = true AND Completed = false');
        $this->db->bind(':B_Id', $id);
        $count=$this->db->resultset();
        return $this->db->rowCount();
    }
    public function completedRequestsBenDetails($id){
        $this->db->query('Select * from donation_table Where B_Id = :B_Id AND Accepted = true AND Completed = true');
        $this->db->bind(':B_Id', $id);
        $array=$this->db->resultset();
        return $array;
    }
    public function AcceptedRequestsBenDetails($id){
        $this->db->query('Select * from donation_table Where B_Id = :B_Id AND Accepted = true AND Completed = false');
        $this->db->bind(':B_Id', $id);
        $array=$this->db->resultset();
        return $array;
    }
    public function partialRequestsDetails($id){
        $this->db->query('SELECT *
            FROM donor_details
           INNER JOIN partial_donations
ON donor_details.D_Id = partial_donations.donor_Id
WHERE partial_donations.Req_Id = :Req_Id ');
        $this->db->bind(':Req_Id', $id);
        $array=$this->db->resultset();
        return $array;

    }
    public function partialDonorId($id){
        $this->db->query('SELECT * FROM partial_donations WHERE Req_Id = :Donation_Id');
        $this->db->bind(':Donation_Id', $id);
        $array=$this->db->single();
        return $array;
    }
    public function completePartialRequest($id){
        $this->db->query('UPDATE partial_donations SET Completed = true,Completed_Time =current_time WHERE Id = :Id');
        // Bind values
        $this->db->bind(':Id', $id);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function completeFullRequest($id){
        $this->db->query('UPDATE donation_table SET Completed = true WHERE Donation_ID = :Donation_ID');
        // Bind values
        $this->db->bind(':Donation_ID', $id);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getReqIdPartial($id){
        $this->db->query('SELECT * FROM partial_donations WHERE Id = :Id');
        $this->db->bind(':Id', $id);
        $array=$this->db->single();
        return $array;
    }
    public function getNearDonors($latitude,$longitude)
    {
        $this->db->query("SELECT *,
       ( 6371 * acos( cos( radians(:lat) ) * cos( radians( $latitude ) ) * cos( radians( $longitude ) - radians(:lng) ) + sin( radians(:lat) ) * sin( radians( $latitude ) ) ) )
           AS distance FROM donor_details HAVING distance < 10 ORDER BY distance");
        $this->db->bind(':lat', $latitude);
        $this->db->bind(':lng', $longitude);
        $array = $this->db->resultset();
        return $array;
    }

    public function feedbackpartial($id,$data){
        $this->db->query('INSERT INTO feedback_partial (Partial_Id,D_Id,Feedback,Satisfaction) VALUES (:Partial_Id,:Donation_Id,:Feedback,:Satisfaction)');
        // Bind values
        $this->db->bind(':Partial_Id', $data['partialId']);
        $this->db->bind(':Donation_Id', $id);
        $this->db->bind(':Feedback', $data['Feedback']);
        $this->db->bind(':Satisfaction', $data['satisfaction']);
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function feedbackfull($id,$data){
        $this->db->query('INSERT INTO feedback_full (D_Id,Feedback,Satisfaction) VALUES (:Donation_Id,:Feedback,:Satisfaction)');
        // Bind values
        $this->db->bind(':Donation_Id', $id);
        $this->db->bind(':Feedback', $data['Feedback']);
        $this->db->bind(':Satisfaction', $data['satisfaction']);
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }
    public function feedbackPartialCheck($id){
        $this->db->query('SELECT * FROM feedback_partial WHERE Partial_Id = :Partial_Id');
        $this->db->bind(':Partial_Id', $id);
        $array=$this->db->single();
        if($array){
            return true;
        }else{
            return false;
        }
    }
    public function feedbackFullCheck($id){
        $this->db->query('SELECT * FROM feedback_full WHERE D_Id = :D_Id');
        $this->db->bind(':D_Id', $id);
        $array=$this->db->single();
        if($array){
            return true;
        }else{
            return false;
        }
    }
    public function getRequest($input){
        $this->db->query('SELECT * FROM donation_table WHERE Donation_Description LIKE :input OR Donation_Type LIKE :input OR Donation_Details LIKE :input OR Donation_Priority LIKE :input');
        $this->db->bind(':input', '%'.$input.'%');
        $this->db->execute();
        $result = $this->db->resultSet();
        return $result;
    }
    public function getAllRequest()
    {
        $this->db->query('SELECT * FROM donation_table');
        $this->db->execute();
        $result = $this->db->resultSet();
        return $result;
    }






}
