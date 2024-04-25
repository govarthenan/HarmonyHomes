<?php

// league/csv library

use League\Csv\Reader;
use League\Csv\Statement;

require_once '../vendor/autoload.php';

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

    /**
     * Handles the CSV upload functionality.
     *
     * This method is responsible for handling the CSV file upload. It checks if the request method is POST,
     * validates the uploaded CSV file, and processes it if there are no errors. If there are errors, it flushes
     * the $_POST and $_FILES data and reloads the upload page.
     *
     * @return void
     */
    public function csvUpload()
    {
        // check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // call function to validate csv
            $validated_data = $this->preprocessCsv();

            // if no errors, proceed to process the csv file
            if ($validated_data) {
                // process the csv file
                echo var_dump($validated_data);
            } else {
                // if errors, flush $_POST and $_FILES data, and reload upload page
                $_POST = [];
                $_FILES = [];
                header('Location: ' . URL_ROOT . '/finances/csvUpload');  // redirect to the same page
            }
        } else {
            $this->loadView('finances/upload_csv');
        }
    }

    /**
     * Preprocesses the CSV file for water and electricity data.
     *
     * This method performs validation and preprocessing on the submitted CSV file.
     * It filters and validates the $_POST and $_FILES data, checks the file type,
     * validates the month and year, checks the billing type, and parses the CSV file.
     *
     * @return array|bool Returns an array containing the processed data if successful,
     *                    or false if there are any errors.
     */
    public function preprocessCsv()
    {
        // same validation and preprocessing for both water and electricity data

        // filter and validate $_POST data
        $_POST = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);

        // filter and validate $_FILES data
        $_FILES = filter_var_array($_FILES, FILTER_SANITIZE_SPECIAL_CHARS);

        // check file type and ensure it's a CSV file
        if ($_FILES['billing_data']['type'] != 'text/csv') {
            flash('error_csv_only_accepted', 'Only CSV files are accepted!', 'alert alert-error');  // schedule flash message
            return false;
        }

        // validate the data

        // check if month is valid
        if ($_POST['month'] < 1 || $_POST['month'] > 12) {
            flash('error_invalid_month', 'Invalid month!', 'alert alert-error');  // schedule flash message
            return false;
        }

        // check if year is valid
        // check for four digits and if its greater than the current year
        if (strlen($_POST['year']) != 4 || $_POST['year'] > date('Y')) {
            flash('error_invalid_year', 'Invalid year!', 'alert alert-error');  // schedule flash message
            header('Location: ' . URL_ROOT . '/financespphp for/csvUpload');  // redirect to the same page
        }

        // check if billing type is valid
        if ($_POST['billing_type'] != 'water' && $_POST['billing_type'] != 'power') {
            flash('error_invalid_billing_type', 'Invalid billing type!', 'alert alert-error');  // schedule flash message
            return false;
        }

        // using league/csv package, parse csv file
        // get header, see if certain columns are present
        // if not, error out

        try {
            $csv = Reader::createFromPath($_FILES['billing_data']['tmp_name'], 'r');
            $csv->setHeaderOffset(0); //set line 1 as header

            // get header columns
            $header = $csv->getHeader();

            // ensure follwing columns are present
            $required_columns = ['floor', 'door', 'amount'];

            // check if required columns are present
            foreach ($required_columns as $column) {
                if (!in_array($column, $header)) {
                    $this->errors['missing_column'] = 'Missing column: ' . $column;
                    flash('error_missing_column', 'Missing column: ' . $column, 'alert alert-error');  // schedule flash message
                    return false;
                }
            }

            // if no errors, collect other data and proceed to process the csv file
            $data['csv'] = $csv;  // store csv object
            $data['month'] = $_POST['month'];
            $data['year'] = $_POST['year'];
            $data['billing_type'] = $_POST['billing_type'];

            // if all is fine, return processed data
            return $data;
        } catch (Throwable $e) {
            flash('error_csv_parsing', 'Unknown error in CSV, please check and reupload!', 'alert alert-error');  // schedule flash message
            return false;
        }
    }
}
