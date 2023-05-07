<?php

/**
 * Home page class
 */

 class Signup extends Controller
 {

    public function index()
    {

        $data['title'] = 'Sign Up';
        $this->view('signup',$data);
    }

 }