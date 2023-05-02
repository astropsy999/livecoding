<?php

/**
 * Home page class
 */

 class Home
 {
    public function index()
    {
        echo("Home View page");
    }
    public function edit()
    {
        echo("Home Edit page");
    }
    public function delete($id)
    {
        echo("Home Delete page ".$id);
    }
 }