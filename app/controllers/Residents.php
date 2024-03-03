<?php

/**
 * Controller class for posts.
 *
 * @property mixed $model An instance of DB model.
 */
class Residents extends Controller
{
    private $model;
    public $data = [];  // to store data entered by user, as well as to be passed to view
    public $errors = [];  // to store errors, as well as to be passed to view
    public function __construct()
    {
        // load DB model
        $this->model = $this->loadModel('Resident');  // load DB model. PDO instance is inside private property
    }

    public function index()
    {
        $this->loadView('residents/dashboard');
    }

    public function signUp()
    {
        // check for post/get to see if form was submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // process form

            // sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $this->data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'phone' => trim($_POST['phone']),
                'birthday' => trim($_POST['birthday']),
                'gender' => trim($_POST['gender']),
                'floor_number' => trim($_POST['floor_number']),
                'door_number' => trim($_POST['door_number']),
                'nic' => trim($_POST['nic']),
                'nic_path' => '',
                'agreement_path' => '',
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
            ];

            // array to store errors
            $this->errors = [];

            // validate input data
            // ToDo: add validation for floor, flat number limits

            // validate email
            if (empty($this->data['email'])) {
                $this->errors['email_err'] = 'Please enter email';
            } else {
                if ($this->model->isEmailTaken($this->data['email'])) {
                    $this->errors['email_err'] = 'Entered email is already registered.';
                }
            }

            // validate name
            if (empty($this->data['name'])) {
                $this->errors['name_err'] = 'Please enter name';
            }

            // validate phone
            if (empty($this->data['phone'])) {
                $this->errors['phone_err'] = 'Please enter phone number';
            } elseif (strlen($this->data['phone']) != 10) {
                $this->errors['phone_err'] = 'Phone number must be 10 digits';
            } elseif (!is_numeric($this->data['phone'])) {
                $this->errors['phone_err'] = 'Phone number must be numeric';
            } elseif ($this->data['phone'][0] != '0') {
                $this->errors['phone_err'] = 'Phone number must start with 0';
            }

            // validate birthday
            if (empty($this->data['birthday'])) {
                $this->errors['birthday_err'] = 'Please enter birthday';
            } elseif (strtotime($this->data['birthday']) > strtotime('today')) {
                $this->errors['birthday_err'] = 'Birthday cannot be in the future';
            }

            // validate gender
            if (empty($this->data['gender'])) {
                $this->errors['gender_err'] = 'Please select gender';
            }

            // validate floor number
            if (empty($this->data['floor_number'])) {
                $this->errors['floor_number_err'] = 'Please enter floor number';
            } elseif (!is_numeric($this->data['floor_number'])) {
                $this->errors['floor_number_err'] = 'Floor number must be numeric';
            }

            // validate door number
            if (empty($this->data['door_number'])) {
                $this->errors['door_number_err'] = 'Please enter door number';
            } elseif (!is_numeric($this->data['door_number'])) {
                $this->errors['door_number_err'] = 'Door number must be numeric';
            }

            // validate NIC
            if (empty($this->data['nic'])) {
                $this->errors['nic_err'] = 'Please enter NIC';
            }

            // validate password
            if (empty($this->data['password'])) {
                $this->errors['password_err'] = 'Please enter password';
            } elseif (strlen($this->data['password']) < 6) {
                $this->errors['password_err'] = 'Password must be at least 6 characters';
            }

            // validate confirm password
            if (empty($this->data['confirm_password'])) {
                $this->errors['confirm_password_err'] = 'Please confirm password';
            } elseif ($this->data['password'] != $this->data['confirm_password']) {
                $this->errors['confirm_password_err'] = 'Passwords do not match';
            }

            // validate nic and document file uploads
            if (empty($_FILES['nic_photo'])) {
                $this->errors['nic_photo_err'] = 'Please upload NIC photo';
            } elseif ($_FILES['nic_photo']['error'] != 0) {
                $this->errors['nic_photo_err'] = 'Error uploading NIC photo';
            }

            if (empty($_FILES['agreement_photo'])) {
                $this->errors['agreement_photo_err'] = 'Please upload document photo';
            } elseif ($_FILES['agreement_photo']['error'] != 0) {
                $this->errors['agreement_photo_err'] = 'Error uploading document photo';
            }

            // check if any errors exist by checking $this->errors array
            if (empty($this->errors)) {
                // register user

                // move both files and get their paths
                $this->data['nic_path'] = uploadFile($_FILES['nic_photo']);
                $this->data['agreement_path'] = uploadFile($_FILES['agreement_photo']);

                // ensure file uploads were successful before registering
                if ($this->data['nic_path'] && $this->data['agreement_path']) {
                    // hash password
                    $this->data['password'] = password_hash($this->data['password'], PASSWORD_DEFAULT);

                    // register user
                    if ($this->model->registerResident($this->data)) {
                        // register flash message to be shown in login page
                        flashMessage('signUp_success', 'You are now registered and can log in', 'alert alert-success');

                        // redirect to home page after successful registration
                        header('location: ' . URL_ROOT . '/residents/signIn');
                    } else {
                        die('Error with registering user to DB');  // ToDo: improve error handling

                        // delete uploaded files unique to this registration
                        unlink($this->data['nic_path']);
                        unlink($this->data['agreement_path']);
                    }
                } else {
                    die('Error uploading files');  // ToDo: improve error handling
                }
            } else {
                die(print_r($this->errors));  // ToDO: improve error handling
            }
        } else {
            // load form

            $this->loadView('residents/sign_up', $this->data);
        }
    }

    public function signIn()
    {
        // ToDo: implement sign in
        $this->loadView('residents/sign_in');
    }
}
