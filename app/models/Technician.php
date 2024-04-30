<?php

/**
 * Specialized version (ideally) of the Database class for the Post model.
 *
 * @property mixed $db An instance of the Database class.
 */
class Technician
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
     //inventory
     public function viewInventoryDetails()
     {
         $this->db->prepareQuery('SELECT * FROM inventory ');
 
 
         return $this->db->resultSet();
 
     }
     public function taskAssigned($tech_id){
        $this->db->prepareQuery('SELECT 
        i.Date,
        r.floor_number,
        r.door_number,
        i.Issuetype,
        i.Description,
        i.issue_id
    FROM 
        issue AS i
    INNER JOIN 
        resident AS r ON i.user_id = r.user_id
    WHERE 
        i.technician_assign = :technician_id AND flag = 0');
        $this->db->bind('technician_id',$tech_id);
        return $this->db->resultSet();
     }
     // accept button in new issue
     public function acceptIssue($issue_id,$tech_id){
       $this->db->prepareQuery('UPDATE issue SET flag = 1 WHERE issue_id = :issue_id AND technician_assign =:technician_id') ;
       $this->db->bind('issue_id',$issue_id);
       $this->db->bind('technician_id',$tech_id);
       return $this->db->execute();
     }
     public function taskCompleted($tech_id){
        $this->db->prepareQuery('SELECT 
        i.Date,
        r.floor_number,
        r.door_number,
        i.Issuetype,
        i.Description,
        i.issue_id
    FROM 
        issue AS i
    INNER JOIN 
        resident AS r ON i.user_id = r.user_id
    WHERE 
        i.technician_assign = :technician_id AND i.status = "completed" ' );
        $this->db->bind('technician_id',$tech_id);
        return $this->db->resultSet();
     }
     public function taskCompletedView($issue_id,$tech_id){
        $this->db->prepareQuery('SELECT 
        i.Date,
        r.floor_number,
        r.door_number,
        i.Issuetype,
        i.Description,
        i.issue_id
    FROM 
        issue AS i
    INNER JOIN 
        resident AS r ON i.user_id = r.user_id
    WHERE 
        i.technician_assign = :technician_id AND i.issue_id = :issue_id ');
        $this->db->bind('issue_id',$issue_id);
        $this->db->bind('technician_id',$tech_id);
        return $this->db->singleResult();
     }
     public function ongoingTaskView($tech_id){
        $this->db->prepareQuery('SELECT 
        i.Date,
        r.floor_number,
        r.door_number,
        i.Issuetype,
        i.Description,
        i.issue_id,
        i.status
    FROM 
        issue AS i
    INNER JOIN 
        resident AS r ON i.user_id = r.user_id
    WHERE 
        i.technician_assign = :technician_id AND status <> 1 ');
        
        $this->db->bind('technician_id',$tech_id);
        return $this->db->resultSet();

     }
     public function insertStatus($data){
        $this->db->prepareQuery('UPDATE issue SET  status = :status WHERE issue_id = :issue_id ');
        $this->db->bind('issue_id', $data['issue_id']);
        $this->db->bind('status', $data['status']);

        return $this->db->execute();
      

     }
    
}