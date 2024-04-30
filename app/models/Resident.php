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
    public function writeComplaint($data)
    {
        $this->db->prepareQuery('INSERT INTO complaint (user_id, subject, description, topic, attachments) VALUES (:user_id, :subject, :description, :topic, :attachments)');

        // Bind values
        $this->db->bind('user_id', $_SESSION['user_id']);
        $this->db->bind('subject', $_POST['subject']);
        $this->db->bind('description', $_POST['description']);
        $this->db->bind('topic', $_POST['topic']);
        $this->db->bind('attachments', $data['attachment']);
        // Execute the query and return bool
        return $this->db->execute();
    }

    /**
     * Fetches all complaints for the current user.
     *
     * @return array An array containing all the complaints for the current user.
     */
    public function fetchAllComplaints()
    {
        $this->db->prepareQuery('SELECT * FROM complaint WHERE user_id = :user_id');
        $this->db->bind('user_id', $_SESSION['user_id']);
        return $this->db->resultSet();
    }

    /**
     * Updates a complaint in the database with the edited information.
     *
     * @param array $edited_complaint The edited complaint data.
     * @return bool Returns true if the update was successful, false otherwise.
     */
    public function editComplaint($edited_complaint)
    {
        $this->db->prepareQuery('UPDATE complaint SET subject = :subject, description = :description, topic = :topic WHERE complaint_id = :complaint_id');

        // Bind values
        $this->db->bind('subject', $edited_complaint['subject']);
        $this->db->bind('description', $edited_complaint['description']);
        $this->db->bind('topic', $edited_complaint['topic']);
        $this->db->bind('complaint_id', $edited_complaint['complaint_id']);

        // Execute the query and return bool
        return $this->db->execute();
    }

    /**
     * Fetches a single complaint based on the complaint ID.
     *
     * @param int $complaint_id The ID of the complaint.
     * @return mixed The complaint object if found, false otherwise.
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

    public function deleteComplaint($complaint_id)
    {
        $this->db->prepareQuery('DELETE FROM complaint WHERE complaint_id = :complaint_id');
        $this->db->bind('complaint_id', $complaint_id);
        // Execute the query and return bool
        return $this->db->execute();
    }

    public function getResidentWing($user_id)
    {
        $this->db->prepareQuery('SELECT wing FROM resident WHERE user_id = :user_id');
        $this->db->bind('user_id', $user_id);
        $row = $this->db->singleResult();

        return $row->wing;
    }

    public function fetchAllAnnouncements()
    {
        $this->db->prepareQuery("SELECT * FROM announcement WHERE receiver = :resident_wing OR receiver = 'all' ORDER BY announcement_id DESC");
        $this->db->bind('resident_wing', $_SESSION['resident_wing']);
        return $this->db->resultSet();
    }

    public function isFloorDoorTaken($floor_number, $door_number)
    {
        $this->db->prepareQuery('SELECT * FROM resident WHERE floor_number = :floor_number AND door_number = :door_number');
        $this->db->bind('floor_number', $floor_number);
        $this->db->bind('door_number', $door_number);

        $row = $this->db->singleResult();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function isNICTaken($nic)
    {
        $this->db->prepareQuery('SELECT * FROM resident WHERE nic = :nic');
        $this->db->bind('nic', $nic);

        $row = $this->db->singleResult();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function isPhoneTaken($phone)
    {
        $this->db->prepareQuery('SELECT * FROM resident WHERE phone = :phone');
        $this->db->bind('phone', $phone);

        $row = $this->db->singleResult();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
