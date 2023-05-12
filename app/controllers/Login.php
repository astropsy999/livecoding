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
                if(password_verify($_POST['password'], $row->password)) {
                    //authenticate
                    // $_SESSION['USER_DATA'] = $row;
                    Auth::authenticate($row);
                    redirect('home');

                }
            }

             $data['errors']['email'] = 'Невірний email або пароль';
        }
        $this->view('login',$data);
    }

 }