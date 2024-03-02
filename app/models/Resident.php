<?php

/**
 * Specialized version (ideally) of the Database class for the Post model.
 *
 * @property mixed $db An instance of the Database class.
 */
class Resident
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * Checks the DB whether given email is already used
     *
     * @param string $email
     *
     * @return boolean
     */
    public function isEmailTaken(string $email)
    {
        $this->db->prepareQuery('SELECT * FROM resident WHERE email = :email');
        $this->db->bind('email', $email);

        $row = $this->db->singleResult();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Register user during sign up process.
     * This method is used to insert a new resident into the database.
     * It takes an array of data as input and returns a boolean, acquired from PDO execute() method.
     *
     * @param [mixed] $data
     */
    public function registerResident($data)
    {
        $this->db->prepareQuery('INSERT INTO resident ' .
            '(email, name, phone, birthday, gender, floor_number, door_number, nic, nic_path, agreement_path, password) ' .
            'VALUES (:email, :name, :phone, :birthday, :gender, :floor_number, :door_number, :nic, :nic_path, :agreement_path, :password)');

        // Bind values
        $this->db->bind('email', $data['email']);
        $this->db->bind('name', $data['name']);
        $this->db->bind('phone', $data['phone']);
        $this->db->bind('birthday', $data['birthday']);
        $this->db->bind('gender', $data['gender']);
        $this->db->bind('floor_number', $data['floor_number']);
        $this->db->bind('door_number', $data['door_number']);
        $this->db->bind('nic', $data['nic']);
        $this->db->bind('nic_path', $data['nic_path']);
        $this->db->bind('agreement_path', $data['agreement_path']);
        $this->db->bind('password', $data['password']);

        // Execute the query and return bool
        return $this->db->execute();
    }
}
