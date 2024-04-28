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
     * Handles the CSV file upload for the Finances controller.
     *
     * This method is responsible for processing the uploaded CSV file, validating its data,
     * and recording it in the database. It also checks if records already exist for the
     * specified month, year, and billing type, and schedules flash messages accordingly.
     *
     * @return void
     */
    public function csvUpload()
    {
        // check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // call function to validate csv
            $validated_data = $this->preprocessCsv();

            if ($validated_data) {
                // check if records exist for the month and year for the billing type
                $record_exists = $this->model->checkRecordsExist($validated_data['month'], $validated_data['year'], $validated_data['billing_type']);

                // if records exist, schedule flash message
                if ($record_exists) {
                    // flush $_POST and $_FILES data
                    $_POST = [];
                    $_FILES = [];

                    flash('error_csv_record_exists', 'Payment details already exist for  ' . $validated_data['month'] . '/' . $validated_data['year'] . '!', 'alert alert-error');
                    header('Location: ' . URL_ROOT . '/finances/csvUpload');  // redirect to the same page
                } else {
                    // if no records exist for the month and year

                    // record csv file in DB
                    if ($this->model->recordCsv($validated_data)) {
                        // update billing_resident table, which is the focal point for all billing data
                        $update_master_status = $this->model->updateMasterFromCsv($validated_data['month'], $validated_data['year'], $validated_data['billing_type']);

                        // if successful, schedule flash message
                        if ($update_master_status) {
                            flash('csv_record_success', 'CSV file uploaded successfully!', 'alert alert-success');
                            header('Location: ' . URL_ROOT . '/finances/csvUpload');  // redirect to the same page
                        } else {
                            // if errors, schedule flash message
                            flash('csv_record_error', 'Error while uupdating master billing table!', 'alert alert-error');
                            header('Location: ' . URL_ROOT . '/finances/csvUpload');  // redirect to the same page
                        }
                    } else {
                        // if errors, schedule flash message
                        flash('csv_record_error', 'Error uploading CSV file!', 'alert alert-error');
                        header('Location: ' . URL_ROOT . '/finances/csvUpload');  // redirect to the same page
                    }
                }
            } else {
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
            return false;
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
                    // flush $_POST and $_FILES data
                    $_POST = [];
                    $_FILES = [];

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

    public function paymentsOverview()
    {
        $this->loadView('finances/payments_overview');
    }

    /**
     * Retrieve and display payments due for the current month.
     *
     * @return void
     */
    public function paymentsDue()
    {
        // get unpaid payments of this month
        $data['payments'] = $this->model->getPaymentsDue();

        $this->loadView('finances/payments_due', $data);
    }

    public function paymentsOverDue()
    {
        // get overdue payments of past months
        $data['payments'] = $this->model->getPaymentsOverdue();

        $this->loadView('finances/payments_overdue', $data);
    }

    public function paymentsLog()
    {
        // get finished payments
        $data['payments'] = $this->model->getFinishedPayments();

        $this->loadView('finances/payments_log', $data);
    }

    public function createNotification()
    {
        // get finished payments
       

        $this->loadView('finances/create_notification');
    }
}
