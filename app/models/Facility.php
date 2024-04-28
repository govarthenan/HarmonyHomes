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
    //inventory
    public function viewInventoryDetails()
    {
        $this->db->prepareQuery('SELECT * FROM inventory ');
       

        return $this->db->resultSet();

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
   
   
    public function createInventory($data)
    {
        $this->db->prepareQuery('INSERT INTO `inventory`( inventory_type, count) VALUES (:inventory_type, :count)');
        // Bind values

        $this->db->bind('inventory_type', $data['inventory-type']);
        $this->db->bind('count', $data['inventory-count']);

        // Execute the query and return bool
        return $this->db->execute();
    }
    public function viewInventory()
    {
        $this->db->prepareQuery('SELECT * FROM `inventory` ');
        // Bind values

        // Execute the query and return bool
        return $this->db->resultSet();
    }

    public function fetchOneInventory($inventory_id)
    {
        $this->db->prepareQuery('SELECT * FROM inventory  WHERE inventory_id = :inventory_id');
        $this->db->bind('inventory_id', $inventory_id);

        $row = $this->db->singleResult();

        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }


    public function fetchOneInventoryDetail($inventory_type)
    {
        $this->db->prepareQuery('SELECT * FROM inventory  WHERE inventory_type = :inventory_type');
        $this->db->bind('inventory_type', $inventory_type);

        $row = $this->db->singleResult();

        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }
    public function updateInventory($edited_inventory)
    {
        $this->db->prepareQuery('UPDATE inventory SET count = :count WHERE inventory_id = :inventory_id');

        // Bind values
        $this->db->bind('count', $edited_inventory['inventory_count']);
        $this->db->bind('inventory_id', $edited_inventory['inventory_id']);

        // Execute the query and return bool
        return $this->db->execute();
    }

    public function deleteInventory($inventory_id)
    {
        $this->db->prepareQuery('DELETE FROM inventory
            WHERE inventory_id = :inventory_id;');
        // Bind values
        $this->db->bind('inventory_id', $inventory_id);
        // Execute the query and return bool
        return $this->db->execute();
    }

    //  public function updateInventoryCount($data){
    //         $this->db->prepareQuery('UPDATE inventory SET count = :count WHERE inventory_id = :inventory_id');
    //     $this->db->bind('new_count', $data);

    //         return $this->db->execute();
    //     }
    public function updateInventoryCount($data)
    {
        $this->db->prepareQuery('UPDATE inventory SET count = :count WHERE inventory_id = :inventory_id');

        // Bind values
        $this->db->bind('inventory_id', $data['inventory_id']);
        $this->db->bind('count', $data['updatedCount']);
        
        // Execute the query and return bool
        return $this->db->execute();
    }

    


}