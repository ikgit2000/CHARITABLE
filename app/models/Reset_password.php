<?php
class Reset_password {
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function deleteToken($userEmail){
        $this->db->query('DELETE FROM pwdReset WHERE pwdResetEmail = :email');
        $this->db->bind(':email', $userEmail);
        $this->db->execute();
    }

    public function insertToken($selector, $token, $expires, $userEmail){
        
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        $this->db->query('INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (:email, :selector, :token, :expires)');
        $this->db->bind(':email', $userEmail);
        $this->db->bind(':selector', $selector);
        $this->db->bind(':token', $hashedToken);
        $this->db->bind(':expires', $expires);
        $this->db->execute();
    }
    public function getToken($selector){
        $currentDate = date("U");
        $this->db->query(' SELECT * FROM pwdReset WHERE pwdResetSelector = :selector AND pwdResetExpires >= NOW()');
        $this->db->bind(':selector', $selector);
        $row = $this->db->single();
        return $row;
    }
    public function updatePassword($password, $userEmail){
        $this->db->query('UPDATE beneficiary_details SET B_Password = :password WHERE B_Email = :email');
        $this->db->bind(':password', $password);
        $this->db->bind(':email', $userEmail);
        $this->db->execute();
    }

    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM beneficiary_details WHERE B_Email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        //check row
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

}