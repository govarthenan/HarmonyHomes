<?php

/**
 * Controller class for posts.
 *
 * @property mixed $model An instance of DB model.
 */
class Securities extends Controller
{
    private $model;
    public $data = [];  // to store data entered by user, as well as to be passed to view
    public $errors = [];  // to store errors, as well as to be passed to view
    public $controller_role = "security";

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
        $this->model = $this->loadModel('Security');  // load DB model. PDO instance is inside private property
    }

    public function index()
    {
        $this->loadView('securities/dashboard');
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
     * Fetches all visitors and loads the complaints log view.
     *
     * @return void
     */
    public function visitorsLog()
    {
        $data['visitors'] = $this->model->fetchAllVisitors();
        $this->loadView('securities/visitors_active', $data);
    }


    /**
     * Adds a visitor for a security.
     *
     * This method is responsible for handling the submission of a visitor form. It checks if the form was submitted using the POST method, sanitizes the input data, and calls the model to add the visitor to the database. If the visitort is successfully added, the user is redirected to the complaints log page. Otherwise, an error message is displayed.
     *
     * @return void
     */
    public function visitorAdd()
    {
        // check for post/get to see if form was submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data = [
                'user_id' => $_SESSION['user_id'],
                'fullName' => trim($_POST['fullName']),
                'contactNumber' => trim($_POST['contactNumber']),
                'entryTime' => trim($_POST['entryTime']),
                'purposeOfVisit' => trim($_POST['purposeOfVisit']),
                'hostName' => trim($_POST['hostName']),
                'notes' => trim($_POST['notes'])
            ];

            // call model to add complaint
            if ($this->model->writeVisitor($data)) {
                header('location: ' . URL_ROOT . '/securities/visitorsLog');
                //$this->announcementsLog();
            } else {
                die('Error with adding announcement to DB');  // ToDo: improve error handling
            }
        } else {
            $this->loadView('securities/visitor_add');
        }
    }

    /**
     * Fetches all visitors and loads the complaints log view.
     *
     * @return void
     */
    public function deliverysLog()
    {
        $data['deliveries'] = $this->model->fetchAlldeliveries();
        $this->loadView('securities/delivery_active', $data);
    }



    /**
     * Adds a delivery for a security.
     *
     * This method is responsible for handling the submission of a delivery form. It checks if the form was submitted using the POST method, sanitizes the input data, and calls the model to add the delivery to the database. If the delivery is successfully added, the user is redirected to the complaints log page. Otherwise, an error message is displayed.
     *
     * @return void
     */
    public function deliveryAdd()
    {
        // check for post/get to see if form was submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data = [
                'user_id' => $_SESSION['user_id'],
                'doorNumber' => trim($_POST['doorNumber']),
                'floorNumber' => trim($_POST['floorNumber']),
                'notes' => trim($_POST['notes'])
            ];

            // call model to add complaint
            if ($this->model->writedelivery($data)) {
                header('location: ' . URL_ROOT . '/securities/deliverysLog');
                //$this->announcementsLog();
            } else {
                die('Error with adding announcement to DB');  // ToDo: improve error handling
            }
        } else {
            $this->loadView('securities/delivery_add');
        }
    }

}
