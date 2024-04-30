<?php

/**
 * Controller class for posts.
 *
 * @property mixed $model An instance of DB model.
 */
class Technicians extends Controller
{
    private $model;
    public $data = [];  // to store data entered by user, as well as to be passed to view
    public $errors = [];  // to store errors, as well as to be passed to view
    public $controller_role = "technician";

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
        $this->model = $this->loadModel('Technician');  // load DB model. PDO instance is inside private property
    }

    public function index()
    {
        $this->loadView('technicians/dashboard');
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

    //view new tasks assigned

    public function viewNewTasks()
    {
        $tech_id = $_SESSION['user_id'];
        $data['new_issue'] = $this->model->taskAssigned($tech_id);

        $this->loadView('technicians/new_tasks', $data);
    }
    //accept button for assigned issue
    public function issueAccept($issue_id)
    {
        $tech_id = $_SESSION['user_id'];
        $this->model->acceptIssue($issue_id,$tech_id);
        $accept_issue = $this->model->acceptIssue($issue_id,$tech_id);
        
        if(!$accept_issue){
            die('Error in accepting issue');
        }else{
            header('Location: ' . URL_ROOT . '/technicians/viewNewTasks');
        }
    }

    public function ViewInventoryLevel()
    {
        $data['inventory'] = $this->model->viewInventoryDetails();

        $this->loadView('technicians/inventory_overview', $data);
    }

    public function ViewCompletedTask($issue_id)
    {   
        $tech_id = $_SESSION['user_id'];
        
        $data['completed_view'] = $this->model->taskCompletedView($issue_id,$tech_id);
        $this->loadView('technicians/completed_task_view',$data);
    }

    public function completedTask()
    {
        $tech_id = $_SESSION['user_id'];
        $data['completed'] = $this->model->taskCompleted($tech_id);
        
        $this->loadView('technicians/completed_tasks',$data);
    }
    public function taskOngoing(){
        $tech_id = $_SESSION['user_id'];
        $data['ongoing'] = $this->model->ongoingTaskView($tech_id);
        
         $this->loadView('technicians/task_ongoing',$data);
    }
    public function taskOngoingView(){
        $this->loadView('technicians/task_ongoing_view');
    }
    public function updateStatus(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data = [
                'user_id' => $_SESSION['user_id'],
                'status' => trim($_POST['status']),
                'issue_id' => trim($_POST['issue_id'])
                
            ];

            // call model to add complaint
            if ($this->model->insertStatus($data)) {
                flash('update_success', 'Update  added successfully!');
                header('location: ' . URL_ROOT . '/technicians/taskOngoing');
            } else {
                die('Error with adding complaint to DB');  // ToDo: improve error handling
            }
        } else {
            $this->loadView('technicians/task_ongoing');
        }
    }
    


}
