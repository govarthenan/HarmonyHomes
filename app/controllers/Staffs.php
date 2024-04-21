<?php

/**
 * Master controller class for all staff
 */
class Staffs extends Controller
{
    private $model;
    public $data = [];  // to store data entered by user, as well as to be passed to view
    public $errors = [];  // to store errors, as well as to be passed to view
    public function __construct()
    {
        // load DB model
        $this->model = $this->loadModel('Staff');  // load DB model. PDO instance is inside private property
    }


    public function index()
    {
        // by default load sign in page
        // this is the only usage of this controller
        // after signing in, another controller will be loaded, based on user role
        $this->signIn();
    }

    public function signIn()
    {
        // check for post/get to see if form was submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // process login

            // sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // store data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'role' => trim($_POST['role'])  // ToDo: implement server side error handling
            ];

            // array to store errors
            $errors = [];

            // check if email exists
            if ($this->model->isEmailTaken($data['email'])) {
                // continue login process

                $logInResult = $this->model->logIn($data['email'], $data['password'], $data['role']);

                // extract user data for creating session
                $user_data = [
                    'user_id' => $logInResult->staff_id,
                    'email' => $logInResult->email,
                    'name' => $logInResult->name,
                    'role' => $logInResult->role
                ];

                // check password and login
                if ($logInResult) {
                    // according to role, instantiate a new controller
                    // and load the index method, with user data to create session
                    if ($data['role'] == 'general') {
                        require_once APP_ROOT . '/controllers/Generals.php';
                        $general_controller = new Generals();
                        $general_controller->index($user_data);
                    } elseif ($data['role'] == 'finance') {
                        // add controllers for other users
                    }
                } else {
                    $errors['password_err'] = 'Password incorrect';
                    die(print_r($errors));  // ToDo: improve error handling
                }
            } else {
                // email does not exist
                $errors['email_err'] = 'No such email found';
                die(print_r($errors));  // ToDo: improve error handling
            }
        } else {
            // load form
            $this->loadView('staffs/sign_in');
        }
    }
}
