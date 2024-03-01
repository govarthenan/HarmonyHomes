<?php

/**
 * Controller class for posts.
 *
 * @property mixed $model An instance of DB model.
 */
class Residents extends Controller
{
    private $model;
    public function __construct()
    {
        // load DB model
        $this->model = $this->loadModel('Resident');  // load DB model. PDO instance is inside private property
    }

    public function signUp()
    {
        // check for post/get to see if form was submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // process form

            // sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'phone' => trim($_POST['phone']),
                'birthday' => trim($_POST['birthday']),
                'gender' => trim($_POST['gender']),
                'floor_number' => trim($_POST['floor_number']),
                'door_number' => trim($_POST['door_number']),
                'nic' => trim($_POST['nic']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
            ];

            // array to store errors
            $errors = [];

            // validate input data
            // ToDo: add validation for floor, flat number limits

            // validate email
            if (empty($data['email'])) {
                $errors['email_err'] = 'Please enter email';
            } else {
                if ($this->model->isEmailTaken($data['email'])) {
                    $errors['email_err'] = 'Entered email is already registered.';
                    echo $errors['email_err'];
                }
            }

            // validate name
            if (empty($data['name'])) {
                $errors['name_err'] = 'Please enter name';
            }

            // validate phone
            if (empty($data['phone'])) {
                $errors['phone_err'] = 'Please enter phone number';
            } elseif (strlen($data['phone']) != 10) {
                $errors['phone_err'] = 'Phone number must be 10 digits';
            } elseif (!is_numeric($data['phone'])) {
                $errors['phone_err'] = 'Phone number must be numeric';
            } elseif ($data['phone'][0] != '0') {
                $errors['phone_err'] = 'Phone number must start with 0';
            }

            // validate birthday
            if (empty($data['birthday'])) {
                $errors['birthday_err'] = 'Please enter birthday';
            } elseif (strtotime($data['birthday']) > strtotime('today')) {
                $errors['birthday_err'] = 'Birthday cannot be in the future';
            }

            // validate gender
            if (empty($data['gender'])) {
                $errors['gender_err'] = 'Please select gender';
            }

            // validate floor number
            if (empty($data['floor_number'])) {
                $errors['floor_number_err'] = 'Please enter floor number';
            } elseif (!is_numeric($data['floor_number'])) {
                $errors['floor_number_err'] = 'Floor number must be numeric';
            }

            // validate door number
            if (empty($data['door_number'])) {
                $errors['door_number_err'] = 'Please enter door number';
            } elseif (!is_numeric($data['door_number'])) {
                $errors['door_number_err'] = 'Door number must be numeric';
            }

            // validate NIC
            if (empty($data['nic'])) {
                $errors['nic_err'] = 'Please enter NIC';
            }

            // validate password
            if (empty($data['password'])) {
                $errors['password_err'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6) {
                $errors['password_err'] = 'Password must be at least 6 characters';
            }

            // validate confirm password
            if (empty($data['confirm_password'])) {
                $errors['confirm_password_err'] = 'Please confirm password';
            } elseif ($data['password'] != $data['confirm_password']) {
                $errors['confirm_password_err'] = 'Passwords do not match';
            }

            // check if any errors exist by checking $errors array
            if (empty($errors)) {
                // register user
                echo 'no errors. lets register user';
            } else {
                die(print_r($errors));  // ToDO: improve error handling
            }
        } else {
            // load form

            $this->loadView('residents/sign_up');
        }
    }
}
