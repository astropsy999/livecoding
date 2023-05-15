<?php

/**
 * Admin page class
 */

 class Admin extends Controller
 {

    public function index()
    {

        $data['title'] = 'Dashboard';
        $this->view('admin/dashboard',$data);
    }

    public function profile($id=null)
    {
        $id = $id ?? Auth::getId();

        $user = new User();
        $data['row'] = $user->first(['id'=>$id]);
        $data['title'] = 'Profile';
        $this->view('admin/profile',$data);
    }

 }