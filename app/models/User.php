<?php

/**
 * User page class
 */

 class User extends Model
 {

    public $errors=[];
    protected $table="users";

    protected $allowedColumns=[
        'email','firstname','lastname','password','role','date',
    ];

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

        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
        {
            $this->errors['email'] = 'Користувач з таким email вже існує';
        }else if($this->where(['email'=>$data['email']]))
        {
            $this->errors['email'] = 'Такий email вже існує';
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