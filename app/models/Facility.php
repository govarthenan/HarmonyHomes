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
   


}
