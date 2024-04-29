<?php

/**
 * Specialized version (ideally) of the Database class for the Post model.
 *
 * @property mixed $db An instance of the Database class.
 */
class Security
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


    /**
     * Fetches all visitors for the current user.
     *
     * @return array An array containing all the visitors for the current user.
     */
    public function fetchAllVisitors()
    {
        $this->db->prepareQuery('SELECT * FROM visitor WHERE user_id = :user_id');
        $this->db->bind('user_id', $_SESSION['user_id']);
        // die(var_dump($this->db->resultSet()));
        return $this->db->resultSet();
    }


    /**
     * Writes a visitors to the database.
     *
     * This method prepares and executes an SQL query to insert a new visitors into the 'visitor' table.
     * It binds the necessary values from the session and the POST data, and returns a boolean indicating
     * the success of the query execution.
     *
     * @return bool Returns true if the query execution is successful, false otherwise.
     */
    public function writeVisitor($data)
    {
        $this->db->prepareQuery('INSERT INTO visitor (user_id, fullName, contactNumber, entryTime, purposeOfVisit, hostName, notes) VALUES (:user_id, :fullName, :contactNumber, :entryTime, :purposeOfVisit, :hostName, :notes)');

        // Bind values
        $this->db->bind('user_id', $_SESSION['user_id']);
        $this->db->bind('fullName', $_POST['fullName']);
        $this->db->bind('contactNumber', $_POST['contactNumber']);
        $this->db->bind('entryTime', $_POST['entryTime']);
        $this->db->bind('purposeOfVisit', $_POST['purposeOfVisit']);
        $this->db->bind('hostName', $_POST['hostName']);
        $this->db->bind('notes', $_POST['notes']);

        // Execute the query and return bool
        return $this->db->execute();
    }

    /**
     * Fetches all visitors for the current user.
     *
     * @return array An array containing all the visitors for the current user.
     */
    public function fetchAlldeliveries()
    {
        $this->db->prepareQuery('SELECT * FROM delivery WHERE user_id = :user_id');
        $this->db->bind('user_id', $_SESSION['user_id']);
        return $this->db->resultSet();
    }


    /**
     * Writes a delivery to the database.
     *
     * This method prepares and executes an SQL query to insert a new visitors into the 'delivery' table.
     * It binds the necessary values from the session and the POST data, and returns a boolean indicating
     * the success of the query execution.
     *
     * @return bool Returns true if the query execution is successful, false otherwise.
     */
    public function writedelivery($data)
    {
        $this->db->prepareQuery('INSERT INTO delivery (user_id, doorNumber, floorNumber,  notes) VALUES (:user_id, :doorNumber, :floorNumber, :notes)');

        // Bind values
        $this->db->bind('user_id', $_SESSION['user_id']);
        $this->db->bind('doorNumber', $_POST['doorNumber']);
        $this->db->bind('floorNumber', $_POST['floorNumber']);
        $this->db->bind('notes', $_POST['notes']);

        // Execute the query and return bool
        return $this->db->execute();
    }

    public function updateVisitorDepartureTime($visitor_id)
    {
        $this->db->prepareQuery('UPDATE visitor SET exitTime = :exitTime WHERE visitor_id = :visitor_id');

        // Bind values
        $this->db->bind('exitTime', date('H:i:s'));
        $this->db->bind('visitor_id', $visitor_id);

        // Execute the query and return bool
        return $this->db->execute();
    }
}
