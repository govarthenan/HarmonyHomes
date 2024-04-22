<?php

/**
 * Controller class for posts.
 *
 * @property mixed $model An instance of DB model.
 */
class Generals extends Controller
{
    private $model;
    public $data = [];  // to store data entered by user, as well as to be passed to view
    public $errors = [];  // to store errors, as well as to be passed to view

    public function __construct()
    {
        // load DB model
        $this->model = $this->loadModel('General');  // load DB model. PDO instance is inside private property
    }

    public function index($user_data)
    {

        // if signed in, create user session
        $this->createUserSession($user_data);

        $this->loadView('generals/dashboard');
    }

    /**
     * Creates a user session and stores user information in the session variables.
     *
     * @param object $user The user object containing user information.
     * @return void
     */
    public function createUserSession($user)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_role'] = $user['role'];

        return;
    }

    /**
     * Signs out the current user.
     *
     * This method unsets the session variables for user_id, user_email, and user_name,
     * destroys the session, and loads the sign in page.
     *
     * @return void
     */
    public function signOut()
    {
        // unset session variables
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_role']);

        // destroy session
        session_destroy();

        // load sign in page
        $this->loadView('staffs/sign_in');
    }

    // ToDO: Start with complaints log function

    public function moreInfo()
    {
        $this->loadView('generals/more_info');
    }

    public function complaintsLog()
    {
        $data['complaints'] = $this->model->fetchAllComplaints();
        $this->loadView('generals/complaints_log', $data);
    }

    /**
     * Fetches and displays the details of a complaint.
     *
     * @param int $complaint_id The ID of the complaint to fetch details for.
     * @return void
     */
    public function complaintDetails($complaint_id)
    {
        $complaint_detail = $this->model->fetchComplaintDetails($complaint_id);

        // check DB result
        if (!$complaint_detail) {
            die('Complaint not found: fetchComplaintDetails()');  // ToDo: improve error handling
        }

        $data['complaint'] = $complaint_detail;

        $this->loadView('generals/complaint_details', $data);
    }

    /**
     * Updates the status of a complaint.
     *
     * @param int $complaint_id The ID of the complaint to update.
     * @return void
     */
    public function complaintStatusUpdate($complaint_id)
    {
        $new_status = trim($_POST['new_status']);

        if ($this->model->updateComplaintStatus($complaint_id, $new_status)) {
            $this->complaintsLog();
        } else {
            die("\nProblem updating status");
        }
    }

    public function test()
    {
        $complaints_list = $this->model->fetchAllComplaints();
        $data['complaints'] = $complaints_list;
        $this->loadView('generals/test', $data);
    }
}
