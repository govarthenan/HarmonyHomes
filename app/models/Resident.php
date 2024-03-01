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
}
