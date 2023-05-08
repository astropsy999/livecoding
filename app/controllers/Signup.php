<?php

/**
 * Home page class
 */

 class Signup extends Controller
 {

    public function index()
    {
        // $db = new Database();
        // $db->create_tables();
        $user= new User();
        if($user->validate($_POST)){
            $query = "INSERT INTO users (email, firstname, lastname, password, role, date) VALUES (:email, :firstname, :lastname, :password, :role, :date)";

            $db = new Database();
            $db->query($query, $_POST);
        }


        $data['title'] = 'Sign Up';
        $this->view('signup',$data);
    }

 }