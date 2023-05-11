<?php

/**
 * Login page class
 */

 class Login extends Controller
 {

    public function index()
    {
        $data['errors'] = [];
        $data['title'] = 'Login Title';
        $user = new User();
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            //validate
            $row = $user->first([
                'email'=>$_POST['email'],
            ]);

            if($row) {
                if($row->password === $_POST['password']) {
                    //authenticate
                    $_SESSION['USER_DATA'] = $row;
                    redirect('home');

                }
            }

             $data['errors']['email'] = 'Невірний email або пароль';
        }
        $this->view('login',$data);
    }

 }