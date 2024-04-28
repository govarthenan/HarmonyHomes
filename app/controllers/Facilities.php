<?php

/**
 * Controller class for posts.
 *
 * @property mixed $model An instance of DB model.
 */
class Facilities extends Controller
{
    private $model;
    public $data = [];  // to store data entered by user, as well as to be passed to view
    public $errors = [];  // to store errors, as well as to be passed to view
    public $controller_role = "facility";

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
        $this->model = $this->loadModel('Facility');  // load DB model. PDO instance is inside private property
    }

    public function index()
    {
        $this->loadView('facilities/dashboard');
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


    public function issueAssign()
    {
        $data['issues_data'] = $this->model->getIssues();

        // // Convert the PHP array to JSON format
        // $tech_data_json = json_encode($data['tech_data']);

        // Output the JSON data
        // echo "<script>var technicianData = $tech_data_json;</script>";

        $this->loadView('facilities/fac_issue_table', $data);


    }
    public function assignTechnician($issue_id)
    {
        $data['tech_data'] = $this->model->fetchTechnicianAllDetails();
        $data['issueId'] = $issue_id;
        $this->loadView('facilities/assign_view', $data);
       
    }
    public function technicianLog()
    {
        $data['tech_detail'] = $this->model->viewTechnician();
        $this->loadView('facilities/technician_view', $data);

    }
    public function technicianAdd()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // foreach ($_POST as $key => $value) {
            //     echo gettype($value) . PHP_EOL;
            // }
            // die();

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data = [
                'first_name' => trim($_POST['first_name']),  // Assuming user_id is stored in session
                'last_name' => trim($_POST['last_name']),
                'specialization' => trim($_POST['specialization']),
                'experience' => trim($_POST['experience']),
                'email' => trim($_POST['email']),
                'phone_number' => trim($_POST['phone_number']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['cpassword']),
            ];

            $this->errors = [];
            if (empty($data['password'])) {
                $this->errors['password_err'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6) {
                $this->errors['password_err'] = 'Password must be at least 6 characters';
            }


            // confirm password
            if (empty($data['confirm_password'])) {
                $this->errors['confirm_password_err'] = 'Please confirm password';
            } elseif ($data['password'] != $data['confirm_password']) {
                $this->errors['confirm_password_err'] = 'Passwords do not match';
            }
            //hash  password
            if (empty($this->errors)) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                // call model to add technician
                if ($this->model->addTechnician($data)) {
                    header('location: ' . URL_ROOT . '/facilities/technicianLog');
                    //$this->techniciansLog();
                } else {
                    die('Error with adding technician to DB');  // ToDo: improve error handling
                }

            } else {
                die(print_r($this->errors));  // ToDO: improve error handling
            }

        } else {
            $this->loadView('facilities/technician_view');
        }





    }
    public function technicianDelete($technician_id)
    {

        // check if technician belongs to user
        $technician_detail = $this->model->fetchtechnicianDetails($technician_id);

        // if ($announcement_detail->user_id != $_SESSION['user_id']) {
        //     die('Unauthorized access');  // ToDo: improve error handling
        // }

        $technician_delete_result = $this->model->deleteTechnician($technician_id);

        if (!$technician_delete_result) {
            die('Error deleting announcement');  // ToDo: improve error handling
        }

        header('location: ' . URL_ROOT . '/facilities/technicianLog');

    }
    public function getAssignDetails($issue_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data = [
                'issue_id' => $issue_id,  // Assign the value of $issue_id directly
                'technician_type' => trim($_POST['techType']),
                'technician_id' => trim($_POST['technician']),
                'description' => trim($_POST['description']),
            ];
            if ($this->model->assignTechnician($data)) {
                
                header('location: ' . URL_ROOT . '/facilities/issueAssign');
                //$this->techniciansLog();
            } else {
                die('Error with adding technician to DB');  // ToDo: improve error handling
            }
             
        }else{
            $this->loadView('facilities/issueAssign');
        }

       
    }
    // issuelog for assigned issue views
    public function fmIssueLog(){
        $result = $this->model->fetchAssignDetails();
        $this->model->addAssignDetails($result);
            
        // die(var_dump($result));
        $this->loadView('facilities/fac_issue_log',$result);
    }
    // completed issue table view
    public function fmIssueComplete(){
        $this->loadView('facilities/completed_issue');
    }
     // completed issue form view
     public function fmIssueCompleteView(){
        $this->loadView('facilities/completed_issue_view');
    }



    // public function test()
    // {
    //     $complaints_list = $this->model->fetchAllComplaints();
    //     $data['complaints'] = $complaints_list;
    //     $this->loadView('generals/test', $data);
    // }






}
