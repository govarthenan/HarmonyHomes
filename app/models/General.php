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



    public function writeAnnouncement($data)
    {
       $this->db->prepareQuery('INSERT INTO announcement (user_id, receiver, title, message) VALUES (:user_id, :receiver, :title, :message)');
       

        $this->db->bind('user_id', $data['user_id']);
        $this->db->bind('receiver', $data['receiver']);
        $this->db->bind('title', $data['title']);
        $this->db->bind('message', $data['message']);

        return $this->db->execute();
    }


    
    /**
     * Fetches all announcements for the current user.
     *
     * @return array An array containing all the complaints for the current user.
     */
    public function fetchAllAnnouncements()
    {
        $this->db->prepareQuery('SELECT * FROM announcement WHERE user_id = :user_id');
        $this->db->bind('user_id', $_SESSION['user_id']);
        return $this->db->resultSet();
    }

    
    /**
     * Updates a announcement in the database with the edited information.
     *
     * @param array $edited_announcement The edited complaint data.
     * @return bool Returns true if the update was successful, false otherwise.
     */
    public function editAnnouncement($edited_announcement)
    {
        $this->db->prepareQuery('UPDATE announcement SET receiver = :receiver, title = :title, message = :message WHERE announcement_id = :announcement_id');

        // Bind values
        $this->db->bind('receiver', $edited_announcement['receiver']);
        $this->db->bind('title',$edited_announcement['title']);
        $this->db->bind('message', $edited_announcement['message']);
        $this->db->bind('announcement_id',$edited_announcement['announcement_id']);

        // Execute the query and return bool
        return $this->db->execute();
    }

    /**
     * Fetches a single complaint based on the complaint ID.
     *
     * @param int $complaint_id The ID of the complaint.
     * @return mixed The complaint object if found, false otherwise.
     */
    public function fetchAnnouncementDetails(int $announcement_id)
    {
        $this->db->prepareQuery('SELECT * FROM announcement WHERE announcement_id = :announcement_id');
        $this->db->bind('announcement_id', $announcement_id);

        $row = $this->db->singleResult();

        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }


    public function deleteAnnouncement($announcement_id)
    {
        $this->db->prepareQuery('DELETE FROM announcement WHERE announcement_id = :announcement_id');
        $this->db->bind('announcement_id', $announcement_id);
        // Execute the query and return bool
        return $this->db->execute();
    }


}
