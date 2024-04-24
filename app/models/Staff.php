<?php

/**
 * Specialized version (ideally) of the Database class for the Post model.
 *
 * @property mixed $db An instance of the Database class.
 */
class Staff
{
    private $db;
    public $primary_table = 'staff';

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * Logs in a resident with the given email and password.
     *
     * @param string $email The email of the resident.
     * @param string $password The password of the resident.
     * @return mixed Returns the resident object if the login is successful, false otherwise.
     */
    public function logIn(string $email, string $password, string $role)
    {
        $this->db->prepareQuery("SELECT * FROM {$this->primary_table} WHERE email = :email AND role = :role");
        $this->db->bind('email', $email);
        $this->db->bind('role', $role);

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
        $this->db->prepareQuery("SELECT name FROM {$this->primary_table} WHERE user_id = :id");
        $this->db->bind('id', $user_id);

        $row = $this->db->singleResult();

        return $row->name;  // return string full name
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
        $this->db->prepareQuery("SELECT * FROM {$this->primary_table} WHERE email = :email");
        $this->db->bind('email', $email);

        $row = $this->db->singleResult();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
