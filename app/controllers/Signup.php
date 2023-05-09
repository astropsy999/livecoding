<?php

/**
 * Home page class
 */

 class Signup extends Controller
 {

    public function index()
    {
        $data['errors'] = [];
        $user= new User();
        if($user->validate($_POST)){

            $_POST['date'] = date("Y-m-d H:m:s");
            $user->insert($_POST);

        }
        $data['errors'] = $user->errors;
        $data['title'] = 'Sign Up';
        $this->view('signup',$data);
    }

 }