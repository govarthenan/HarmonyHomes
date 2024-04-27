<?php

/**
 * Specialized version (ideally) of the Database class for the Post model.
 *
 * @property mixed $db An instance of the Database class.
 */
class Facility
{
    private $db;
    public $primary_table = 'staff';

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * Retrieves the display name of a user based on their ID.
     *
     * @param int $user_id The ID of the user.
     * @return string The full name of the user.
     */
    public function getUserDisplayName(int $user_id)
    {
        $this->db->prepareQuery("SELECT name FROM {$this->primary_table} WHERE user_id = :id");
        $this->db->bind('id', $user_id);

        $row = $this->db->singleResult();

        return $row->name;  // return string full name
    }

    public function getIssues()
    {
        $this->db->prepareQuery('SELECT i.*, r.floor_number, r.door_number
        FROM issue i
        JOIN resident r ON r.user_id = i.user_id
        ');
        // $this->db->bind('user_id', $_SESSION['user_id']);
        $this->db->resultSet();
        return $this->db->resultSet();
        
    
    }
    public function addTechnician($data){
        $this->db->prepareQuery('INSERT INTO `technician_overview`( first_name, last_name, specialization, experience, email, phone_number,password) VALUES (:first_name, :last_name, :specialization, :experience, :email, :phone_number,:password)');
        // Bind values
        
        $this->db->bind('first_name', $data['first_name']);
        $this->db->bind('last_name', $data['last_name']);
        $this->db->bind('specialization', $data['specialization']);
        $this->db->bind('experience', $data['experience']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('phone_number', $data['phone_number']);
        $this->db->bind('password', $data['password']);
       
        // Execute the query and return bool
        return $this->db->execute();
        

    }

    public function viewTechnician(){
        $this->db->prepareQuery('SELECT * FROM `technician_overview` ');
        // Bind values
   
        // Execute the query and return bool
        return $this->db->resultSet();
    }

    public function fetchTechnicianDetails(int $technician_id)
    {
        $this->db->prepareQuery('SELECT * FROM technician_overview  WHERE technician_id = :technician_id');
        $this->db->bind('technician_id', $technician_id);

        $row = $this->db->singleResult();

        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }
    
    public function fetchTechnicianAllDetails()
    {
        $this->db->prepareQuery('SELECT * FROM technician_overview ');
        
         $this->db->resultSet();
        return  $this->db->resultSet();
        
    }

    public function deleteTechnician($technician_id){
        $this->db->prepareQuery('DELETE FROM technician_overview
        WHERE technician_id = :technician_id;');
        // Bind values
        $this->db->bind('technician_id',$technician_id);
        // Execute the query and return bool
        return $this->db->execute();
    }
    // fetch technician detail
    
    public function assignTechnician($data){
        $this->db->prepareQuery('UPDATE  issue SET technician_assign =:technician_assign WHERE issue_id = :issue_id ');
         
        $this->db->bind('issue_id', $data['issue_id']);
        $this->db->bind('technician_assign', $data['technician_assign']);
        
        $this->db->execute();
    }  


}
