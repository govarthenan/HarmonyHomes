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
    public $controller_role = "resident";

    public function __construct()
    {
        // load DB model
        $this->model = $this->loadModel('Resident');  // load DB model. PDO instance is inside private property
    }

    public function index()
    {
        // get all announcements
        $data['announcements'] = $this->model->fetchAllAnnouncements();

        $this->loadView('residents/dashboard', $data);
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

    /**
     * Sign in function for the Residents controller.
     *
     * This function handles the sign in process for residents. It checks if the form was submitted,
     * sanitizes the input data, and processes the login. If the login is successful, it creates a session
     * for the user. If the login fails, it returns an error message.
     *
     * @return void
     */
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
            ];

            // array to store errors
            $errors = [];

            // check if email exists
            if ($this->model->isEmailTaken($data['email'])) {
                // continue login process

                $logInResult = $this->model->logIn($data['email'], $data['password']);

                // check password and login
                if ($logInResult) {
                    // check for account approval
                    if ($logInResult->approved) {
                        // create session
                        $this->createUserSession($logInResult);
                    } else {
                        flash('error_account_not_approved', "Account not yet approved!", 'alert alert-error');
                        $this->loadView('residents/sign_in');
                    }
                } else {
                    $errors['password_err'] = 'Password incorrect';
                    die(print_r($errors));  // ToDo: improve error handling
                }
            } else {
                // email does not exist
                $errors['email_err'] = 'No such email found';
            }
        } else {
            // load form
            $this->loadView('residents/sign_in');
        }
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
            echo 'pass 1';
            session_start();
        }

        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_role'] = $this->controller_role;

        header('location: ' . URL_ROOT . '/residents/index');
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

        // destroy session
        session_destroy();

        // load sign in page
        $this->loadView('residents/sign_in');
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

        // return user name
        echo explode(' ', $user_name)[0];
    }

    /**
     * Fetches all complaints and loads the complaints log view.
     *
     * @return void
     */
    public function complaintsLog()
    {
        $data['complaints'] = $this->model->fetchAllComplaints();
        $this->loadView('residents/complaints_log', $data);
    }

    /**
     * Adds a complaint for a resident.
     *
     * This method is responsible for handling the submission of a complaint form. It checks if the form was submitted using the POST method, sanitizes the input data, and calls the model to add the complaint to the database. If the complaint is successfully added, the user is redirected to the complaints log page. Otherwise, an error message is displayed.
     *
     * @return void
     */
    public function complaintAdd()
    {
        // check for post/get to see if form was submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data = [
                'user_id' => $_SESSION['user_id'],
                'topic' => trim($_POST['topic']),
                'subject' => trim($_POST['subject']),
                'description' => trim($_POST['description']),
                "attachment" => file_get_contents($_FILES['attachment']["tmp_name"])
            ];

            // call model to add complaint
            if ($this->model->writeComplaint($data)) {
                flash('complaint_add_success', 'Complaint added successfully!');
                header('location: ' . URL_ROOT . '/residents/complaintsLog');
            } else {
                die('Error with adding complaint to DB');  // ToDo: improve error handling
            }
        } else {
            $this->loadView('residents/complaint_add');
        }
    }

    /**
     * Edit a complaint.
     *
     * This method is responsible for editing a complaint based on the provided complaint ID.
     * It checks if the form was submitted via POST or GET method, sanitizes the input data,
     * and calls the model to update the complaint in the database. If the update is successful,
     * it redirects the user to the complaints log page. Otherwise, it displays an error message.
     * If the form was not submitted, it fetches the complaint details and checks if the complaint
     * belongs to the current user. If not, it displays an unauthorized access message. Finally,
     * it loads the view for editing the complaint.
     *
     * @param int $complaint_id The ID of the complaint to be edited.
     * @return void
     */
    public function complaintEdit($complaint_id)
    {
        // check for post/get to see if form was submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data = [
                'complaint_id' => $complaint_id,
                'user_id' => $_SESSION['user_id'],
                'topic' => trim($_POST['topic']),
                'subject' => trim($_POST['subject']),
                'description' => trim($_POST['description']),
            ];

            // call model to add complaint
            if ($this->model->editComplaint($data)) {
                header('location: ' . URL_ROOT . '/residents/complaintsLog');
            } else {
                die('Error with updating complaint in DB');  // ToDo: improve error handling
            }
        } else {
            $complaint_detail = $this->model->fetchComplaintDetails($complaint_id);

            // check DB result
            if (!$complaint_detail) {
                die('Complaint not found: fetchComplaintDetails()');  // ToDo: improve error handling
            }

            // check if complaint belongs to user
            if ($complaint_detail->user_id != $_SESSION['user_id']) {
                die('Unauthorized access');  // ToDo: improve error handling
            }

            $data['complaint'] = $complaint_detail;

            $this->loadView('residents/complaint_edit', $data);
        }
    }

    /**
     * Displays the details of a specific complaint.
     *
     * @param int $complaint_id The ID of the complaint to fetch details for.
     * @return void
     */
    public function complaintDetail($complaint_id)
    {
        $complaint_detail = $this->model->fetchComplaintDetails($complaint_id);

        // check DB result
        if (!$complaint_detail) {
            die('Complaint not found: fetchComplaintDetails()');  // ToDo: improve error handling
        }

        // check if complaint belongs to user
        if ($complaint_detail->user_id != $_SESSION['user_id']) {
            die('Unauthorized access');  // ToDo: improve error handling
        }

        $data['complaint'] = $complaint_detail;

        $this->loadView('residents/complaint_detail', $data);
    }

    /**
     * Deletes a complaint for a resident.
     *
     * @param int $complaint_id The ID of the complaint to be deleted.
     * @return void
     */
    public function complaintDelete($complaint_id)
    {
        // check if complaint belongs to user
        $complaint_detail = $this->model->fetchComplaintDetails($complaint_id);

        if ($complaint_detail->user_id != $_SESSION['user_id']) {
            die('Unauthorized access');  // ToDo: improve error handling
        }

        $complaint_delete_result = $this->model->deleteComplaint($complaint_id);

        if (!$complaint_delete_result) {
            die('Error deleting complaint');  // ToDo: improve error handling
        }

        header('location: ' . URL_ROOT . '/residents/complaintsLog');
    }

    /**
     * Shows support doc.
     *
     * @return void
     */
    public function supportLog()
    {
        $this->loadView('residents/support');
    }
}
