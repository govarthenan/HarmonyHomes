<?php

/**
 * Specialized version (ideally) of the Database class for the Post model.
 *
 * @property mixed $db An instance of the Database class.
 */
class General
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

    public function fetchAllComplaints()
    {
        $this->db->prepareQuery('SELECT complaint.*, resident.name FROM complaint JOIN resident ON complaint.user_id = resident.user_id');
        return $this->db->resultSet();
    }

    /**
     * Fetches the details of a complaint from the database.
     *
     * @param int $complaint_id The ID of the complaint to fetch.
     * @return mixed Returns an associative array containing the details of the complaint if found, or false if not found.
     */
    public function fetchComplaintDetails(int $complaint_id)
    {
        $this->db->prepareQuery('SELECT * FROM complaint WHERE complaint_id = :complaint_id');
        $this->db->bind('complaint_id', $complaint_id);

        $row = $this->db->singleResult();

        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    /**
     * Updates the status of a complaint in the database.
     *
     * @param int $complaint_id The ID of the complaint to update.
     * @param string $new_status The new status to set for the complaint.
     * @return bool Returns true if the update was successful, false otherwise.
     */
    public function updateComplaintStatus(int $complaint_id, string $new_status)
    {
        $this->db->prepareQuery('UPDATE complaint SET status = :new_status WHERE complaint_id = :complaint_id');
        $this->db->bind('new_status', $new_status);
        $this->db->bind('complaint_id', $complaint_id);

        return $this->db->execute();
    }
}
