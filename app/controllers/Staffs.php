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

                // check password and login
                if ($logInResult) {
                    // extract user data for creating session
                    $user_data = [
                        'user_id' => $logInResult->staff_id,
                        'email' => $logInResult->email,
                        'name' => $logInResult->name,
                        'role' => $logInResult->role
                    ];

                    // create user session and redirect user to homepage
                    $this->createUserSession($user_data);
                    $this->redirectUser($user_data['role']);
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
     * Redirects the user based on their role.
     *
     * @param string $role The role of the user.
     * @return void
     */
    public function redirectUser($role)
    {
        // according to the role, import controller class and redirect
        if ($role == 'general') {
            require_once APP_ROOT . '/controllers/Generals.php';
            header('Location: ' . URL_ROOT . '/generals');
        }

        switch ($role) {
            case 'general':
                require_once APP_ROOT . '/controllers/Generals.php';
                header('Location: ' . URL_ROOT . '/generals');
                break;
            case 'finance':
                require_once APP_ROOT . '/controllers/Finances.php';
                header('Location: ' . URL_ROOT . '/finances');
                break;
            case 'security':
                require_once APP_ROOT . '/controllers/Securities.php';
                header('Location: ' . URL_ROOT . '/securities');
                break;
            case 'technician':
                require_once APP_ROOT . '/controllers/Technicians.php';
                header('Location: ' . URL_ROOT . '/technicians');
                break;
            case 'facility':
                require_once APP_ROOT . '/controllers/Facilities.php';
                header('Location: ' . URL_ROOT . '/facilities');
                break;
            default:
                die('Invalid role');
        }
    }
}
