<?php

/**
 * Login page class
 */

 class Login extends Controller
 {

    public function index()
    {

        $data['title'] = 'Login Title';
        $this->view('login',$data);
    }

 }