<?php

/**
 * User page class
 */

 class User
 {
    protected $table="users";
    public $errors=[];
    public function validate($data)
    {
        $this->errors = [];

        if(empty($data['firstname']))
        {
            $this->errors['firstname'] = 'Імʼя обовʼязкове';
        }

        if(empty($data['lastname']))
        {
            $this->errors['lastname'] = 'Прізвище обовʼязкове';
        }

        if(empty($data['email']))
        {
            $this->errors['email'] = 'Email обовʼязковий';
        }

        if(empty($data['password']))
        {
            $this->errors['password'] = 'Пароль обовʼязковий';
        }

        if($data['password'] !== $data['retype_password'])
        {
            $this->errors['password'] = 'Паролі не співпадають';
        }

        if(empty($data['terms']))
        {
            $this->errors['terms'] = 'Будь ласка, прийміть положення та умови';
        }

        if(empty($this->errors)) {
            return true;
        }

        return false;

    }

 }