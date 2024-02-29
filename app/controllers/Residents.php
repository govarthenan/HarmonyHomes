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
        // load Post model
        // $this->model = $this->loadModel('Resident');  // load DB model. PDO instance is inside private property
    }

    public function signUp()
    {
        // check for post/get to see if form was submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // process form
        } else {
            // load form
            $this->loadView('residents/sign_up');
        }
    }
}
