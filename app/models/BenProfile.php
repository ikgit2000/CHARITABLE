<?php
  class BenProfile
  {
      private $db;

      public function __construct()
      {
          $this->db = new Database;
      }

      public function getOrigin($id)
      {
          $this->db->query('SELECT latitude,longitude FROM donor_details where User_Id = :id');
          $this->db->bind(':id', $id);
          if ($this->db->execute()) {
              $result = $this->db->resultSet();
              return $result;
          } else {
              return false;
          }

      }

      public function getDestination($id)
      {
          $this->db->query('SELECT longitude,latitude FROM beneficiary_details where User_Id = :id');
          $this->db->bind(':id', $id);
          if ($this->db->execute()) {
              $result = $this->db->resultSet();
              return $result;
          } else {
              return false;
          }
      }
  }