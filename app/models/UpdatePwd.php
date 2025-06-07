<?php
class UpdatePwd
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

// Function to update user password in database
    public function updatePassword($userId, $newPassword)
    {
        // Hash password
        $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update password in database
        $this->db->query('UPDATE registered_users SET User_Password = :new_password WHERE User_Id = :user_id');
        $this->db->bind(':new_password', $newPassword);
        $this->db->bind(':user_id', $userId);

        // Execute query
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Function to check if password matches database record
    public function checkPassword($userId, $password)
    {
        // Get user record from database
        $this->db->query('SELECT User_Password FROM registered_users WHERE User_Id = :user_id');
        $this->db->bind(':user_id', $userId);
        $row = $this->db->single();

        // Check if password matches database record
        $hashed_password = $row->password;
        if(password_verify($password, $hashed_password)) {
            return true;
        } else {
            return false;
        }

    }
}
