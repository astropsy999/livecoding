<?php

/**
 * Home page class
 */

 class Home extends Controller
 {
    public function index()
    {
        $data['title'] = 'Home Title';
        $this->view('home',$data);
    }

 }