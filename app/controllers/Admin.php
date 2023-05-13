<?php

/**
 * Admin page class
 */

 class Admin extends Controller
 {

    public function index()
    {

        $data['title'] = 'Admin Title';
        $this->view('admin/dashboard',$data);
    }

 }