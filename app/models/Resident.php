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

    /**
     * Logs in a resident with the given email and password.
     *
     * @param string $email The email of the resident.
     * @param string $password The password of the resident.
     * @return mixed Returns the resident object if the login is successful, false otherwise.
     */
    public function logIn(string $email, string $password)
    {
        $this->db->prepareQuery('SELECT * FROM resident WHERE email = :email');
        $this->db->bind('email', $email);

        $row = $this->db->singleResult();

        $hashed_password = $row->password;
        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }

    /**
     * Retrieves the display name of a user based on their ID.
     *
     * @param int $user_id The ID of the user.
     * @return string The full name of the user.
     */
    public function getUserDisplayName(int $user_id)
    {
        $this->db->prepareQuery('SELECT name FROM resident WHERE user_id = :id');
        $this->db->bind('id', $user_id);

        $row = $this->db->singleResult();

        return $row->name;  // return string full name
    }

    /**
     * Writes a complaint to the database.
     *
     * This method prepares and executes an SQL query to insert a new complaint into the 'complaint' table.
     * It binds the necessary values from the session and the POST data, and returns a boolean indicating
     * the success of the query execution.
     *
     * @return bool Returns true if the query execution is successful, false otherwise.
     */
    public function writeComplaint()
    {
        $this->db->prepareQuery('INSERT INTO complaint (user_id, subject, description, topic) VALUES (:user_id, :subject, :description, :topic)');

        // Bind values
        $this->db->bind('user_id', $_SESSION['user_id']);
        $this->db->bind('subject', $_POST['subject']);
        $this->db->bind('description', $_POST['description']);
        $this->db->bind('topic', $_POST['topic']);

        // Execute the query and return bool
        return $this->db->execute();
    }
}
