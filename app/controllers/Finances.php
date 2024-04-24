<?php

/**
 * Controller class for posts.
 *
 * @property mixed $model An instance of DB model.
 */
class Finances extends Controller
{
    private $model;
    public $data = [];  // to store data entered by user, as well as to be passed to view
    public $errors = [];  // to store errors, as well as to be passed to view
    public $controller_role = "finance";

    public function __construct($user_data = [])
    {
        // check if user is signed in
        $is_signed_in = isset($_SESSION['user_id']);

        if ($is_signed_in) {
            // check if user has the right role
            $role = $_SESSION['user_role'];

            if ($role == $this->controller_role) {
                // continue
            } else {
                die('You do not have the right role to access this page.');
            }
            // check if user has the right role
            if ($_SESSION['user_role'] != $this->controller_role) {
                die('You do not have the right role to access this page.');
            }
        } else {
            header('Location: ' . URL_ROOT . '/staffs/sign_in');
        }

        // load DB model
        $this->model = $this->loadModel('Finance');  // load DB model. PDO instance is inside private property
    }

    public function index()
    {
        $this->loadView('finances/dashboard');
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


    /**
     * Display the user's first name.
     *
     * This method retrieves the user's ID from the session and uses it to fetch the user's display name from the database.
     * It then returns the user's first name by extracting it from the display name.
     *
     * @return void
     */
    public function displayUserName()
    {
        // get user id from session
        $user_id = $_SESSION['user_id'];

        // get user name from DB
        $user_name = $this->model->getUserDisplayName($user_id);

        // return first name
        echo explode(' ', $user_name)[0];
    }

    public function billingHome()
    {
        $this->loadView('finances/bill_create');
    }
}
