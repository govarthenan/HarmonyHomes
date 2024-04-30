<?php

/**
 * Controller class for posts.
 *
 * @property mixed $model An instance of DB model.
 */
class Generals extends Controller
{
    private $model;
    public $data = [];  // to store data entered by user, as well as to be passed to view
    public $errors = [];  // to store errors, as well as to be passed to view
    public $controller_role = "general";

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
                flash('invalid_role', 'Error with assigning role!', 'alert alert-danger');
                header('Location: ' . URL_ROOT . '/staffs/sign_in');
            }
            // check if user has the right role
            if ($_SESSION['user_role'] != $this->controller_role) {
                flash('invalid_role', 'Error with assigning role!', 'alert alert-danger');
                header('Location: ' . URL_ROOT . '/staffs/sign_in');
            }
        } else {
            header('Location: ' . URL_ROOT . '/staffs/sign_in');
        }

        // load DB model
        $this->model = $this->loadModel('General');  // load DB model. PDO instance is inside private property
    }

    public function index()
    {
        $this->loadView('generals/dashboard');
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

    public function moreInfo()
    {
        $this->loadView('generals/more_info');
    }

    public function complaintsLog()
    {
        $data['complaints'] = $this->model->fetchAllComplaints();
        $this->loadView('generals/complaints_log', $data);
    }

    /**
     * Fetches and displays the details of a complaint.
     *
     * @param int $complaint_id The ID of the complaint to fetch details for.
     * @return void
     */
    public function complaintDetails($complaint_id)
    {
        $complaint_detail = $this->model->fetchComplaintDetails($complaint_id);

        // check DB result
        if (!$complaint_detail) {
            flash('invalid_role', 'Complaint not found', 'alert alert-danger');
            header('Location: ' . URL_ROOT . '/generals/complaintsLog');
        }

        $data['complaint'] = $complaint_detail;

        $this->loadView('generals/complaint_details', $data);
    }

    /**
     * Updates the status of a complaint.
     *
     * @param int $complaint_id The ID of the complaint to update.
     * @return void
     */
    public function complaintStatusUpdate($complaint_id)
    {
        $new_status = trim($_POST['new_status']);

        if ($this->model->updateComplaintStatus($complaint_id, $new_status)) {
            $this->complaintsLog();
        } else {
            flash('invalid_role', 'Problem updating status', 'alert alert-danger');
            header('Location: ' . URL_ROOT . '/generals/complaintsLog');
        }
    }

    public function test()
    {
        $complaints_list = $this->model->fetchAllComplaints();
        $data['complaints'] = $complaints_list;
        $this->loadView('generals/test', $data);
    }



    /**
     * Fetches all announcements and loads the complaints log view.
     *
     * @return void
     */
    public function announcementsLog()
    {
        $data['announcements'] = $this->model->fetchAllAnnouncements();
        $this->loadView('generals/announcements_log', $data);
    }


    /**
     * Adds a announcment for a general manger.
     *
     * This method is responsible for handling the submission of a complaint form. It checks if the form was submitted using the POST method, sanitizes the input data, and calls the model to add the complaint to the database. If the complaint is successfully added, the user is redirected to the complaints log page. Otherwise, an error message is displayed.
     *
     * @return void
     */
    public function announcementAdd()
    {
        // check for post/get to see if form was submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // determine the 'from' value
            $sender = $_SESSION['user_role'];
            switch ($sender) {
                case 'general':
                    $sender = 'General Manager';
                    break;
                case 'finance':
                    $sender = 'Finance Manager';
                    break;
                case 'facility':
                    $sender = 'Facility Manager';
                    break;
                default:
                    $sender = '';
            }

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            // try to get announcement data
            try {
                $data = [
                    'user_id' => $_SESSION['user_id'],  // Assuming user_id is stored in session
                    'sender' => $sender,  // Assuming user_name is stored in session
                    'receiver' => trim($_POST['receiver']),
                    'title' => trim($_POST['title']),
                    'message' => trim($_POST['message'])
                ];
            } catch (Error $th) {
                flash('error_unknown_announcement', 'Error with announcement data', 'alert alert-error');
                header('location: ' . URL_ROOT . '/generals/announcementAdd');
                // Remove the unused variable $th
            }

            // call model to add announcment
            if ($this->model->writeAnnouncement($data)) {
                flash('success_announcement_added', 'Announcement added!', 'alert alert-success');
                header('location: ' . URL_ROOT . '/generals/announcementsLog');
                //$this->announcementsLog();
            } else {
                flash('error_add_announcement', 'Error adding announcement!', 'alert alert-success');
                header('location: ' . URL_ROOT . '/generals/announcementsLog');
            }
        } else {
            $this->loadView('generals/announcement_add');
        }
    }

    /**
     * Edit a announcement.
     *
     * This method is responsible for editing a announcement based on the provided complaint ID.
     * It checks if the form was submitted via POST or GET method, sanitizes the input data,
     * and calls the model to update the announcement in the database. If the update is successful,
     * it redirects the user to the announcements log page. Otherwise, it displays an error message.
     * If the form was not submitted, it fetches the announcement details and checks if the complaint
     * belongs to the current user. If not, it displays an unauthorized access message. Finally,
     * it loads the view for editing the announcement.
     *
     * @param int $announcement_id The ID of the announcement to be edited.
     * @return void
     */
    public function announcementEdit($announcement_id)
    {
        // check for post/get to see if form was submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data = [
                'announcement_id' => $announcement_id,
                'user_id' => $_SESSION['user_id'],
                'receiver' => trim($_POST['receiver']),
                'title' => trim($_POST['title']),
                'message' => trim($_POST['message']),
            ];

            // call model to add announcement
            if ($this->model->editAnnouncement($data)) {
                flash('success_announcement_updated', 'Announcement updated!', 'alert alert-success');
                header('location: ' . URL_ROOT . '/generals/announcementsLog');
            } else {
                flash('error_announcement_updated', 'Error updating announcement', 'alert alert-error');
                header('location: ' . URL_ROOT . '/generals/announcementEdit/' . $announcement_id);
            }
        } else {
            $announcement_detail = $this->model->fetchAnnouncementDetails($announcement_id);

            // check DB result
            if (!$announcement_detail) {
                flash('error_announcement_details', 'Announcement not found', 'alert alert-success');
                header('location: ' . URL_ROOT . '/generals/announcementsLog');
            }

            // check if complaint belongs to user
            if ($announcement_detail->user_id != $_SESSION['user_id']) {
                flash('error_access', 'Unauthorized access', 'alert alert-success');
                header('location: ' . URL_ROOT . '/generals/announcementsLog');
            }

            $data['announcement'] = $announcement_detail;

            $this->loadView('generals/announcement_edit', $data);
        }
    }


    /**
     * Displays the details of a specific announcement.
     *
     * @param int $announcement_id The ID of the announcement to fetch details for.
     * @return void
     */
    public function announcementDetail($announcement_id)
    {
        $announcement_detail = $this->model->fetchAnnouncementDetails($announcement_id);

        // check DB result
        if (!$announcement_detail) {
            flash('error_complaint', 'Complaint not found', 'alert alert-success');
            header('location: ' . URL_ROOT . '/generals/announcementsLog');
        }

        // check if complaint belongs to user
        if ($announcement_detail->user_id != $_SESSION['user_id']) {
            flash('error_access', 'Unauthorized access', 'alert alert-success');
            header('location: ' . URL_ROOT . '/generals/announcementsLog');
        }

        $data['announcement'] = $announcement_detail;

        $this->loadView('generals/announcement_detail', $data);
    }


    /**
     * Deletes a announcement for a resident.
     *
     * @param int $announcement_id The ID of the announcement to be deleted.
     * @return void
     */
    public function announcementDelete($announcement_id)
    {
        // check if announcement belongs to user
        $announcement_detail = $this->model->fetchAnnouncementDetails($announcement_id);

        if ($announcement_detail->user_id != $_SESSION['user_id']) {
            flash('error_access', 'Unauthorized access', 'alert alert-success');
            header('location: ' . URL_ROOT . '/generals/announcementsLog');
        }

        $announcement_delete_result = $this->model->deleteAnnouncement($announcement_id);

        if (!$announcement_delete_result) {
            flash('error_announce_delete', 'Error deleting announcement', 'alert alert-success');
            header('location: ' . URL_ROOT . '/generals/announcementsLog');
        }

        header('location: ' . URL_ROOT . '/generals/announcementsLog');
    }


    public function registrations()
    {
        // fetch data
        $data['signup_requests'] = $this->model->fetchAllUsersForManagement();

        $this->loadView('generals/signup_request', $data);
    }

    public function signUpRequestDetails($user_id)
    {
        $signup_request_detail = $this->model->fetchSignupRequestDetails($user_id);

        // check DB result
        if (!$signup_request_detail) {
            flash('error_user_not_found', 'User details not found', 'alert alert-error');
        }

        $data['signup_request'] = $signup_request_detail;

        $this->loadView('generals/signup_request_details', $data);
    }

    public function userManagement($target_resident_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // sanitize input
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            $action = $_POST['action'];

            if ($action == 'toggle-approval') {
                if ($_POST['approval'] == 1) {
                    if ($this->model->toggleResidentApproval($target_resident_id, 0)) {
                        flash('success_user_suspended', 'User suspended!', 'alert alert-success');
                    } else {
                        flash('error_user_suspended', 'Error suspending user', 'alert alert-error');
                    }
                } else {
                    if ($this->model->toggleResidentApproval($target_resident_id, 1)) {
                        flash('success_user_approved', 'User approved!', 'alert alert-success');
                    } else {
                        flash('error_user_approved', 'Error approving user', 'alert alert-error');
                    }
                }
            } elseif ($action == 'delete-user') {
                if ($this->model->deleteResident($target_resident_id)) {
                    flash('success_user_deleted', 'User deleted!', 'alert alert-success');
                } else {
                    flash('error_user_deleted', 'Error deleting user', 'alert alert-error');
                }
            } elseif ($action == 'set-wing') {
                // set PHP null for HTML null
                if ($_POST['wing'] == '') {
                    $_POST['wing'] = null;
                }

                if ($this->model->setWing($target_resident_id, $_POST['wing'])) {
                    flash('success_wing_set', 'Wing set!', 'alert alert-success');
                } else {
                    flash('error_wing_set', 'Error setting wing', 'alert alert-error');
                }
            } else {
                flash('error_wing_action', 'Unknown action. Please try again!', 'alert alert-error');
            }
        }

        header('location: ' . URL_ROOT . '/generals/signUpRequestDetails/' . $target_resident_id);
    }
}
