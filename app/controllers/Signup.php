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
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            if($user->validate($_POST)){

                $_POST['date'] = date("Y-m-d H:m:s");
                $_POST['role'] = 'user';
                $user->insert($_POST);

                message('Ваш обліковий запис успішно створено. Будь ласка увійдіть');
                redirect('login');


            }
        }
        $data['errors'] = $user->errors;
        $data['title'] = 'Sign Up';
        $this->view('signup',$data);
    }

 }