<?php

/**
 * User page class
 */

 class User extends Model
 {

    public $errors=[];
    protected $table="users";

    protected $allowedColumns=[
        'email',
        'firstname',
        'lastname',
        'password',
        'role',
        'date',
        'about',
        'company',
        'job',
        'country',
        'address',
        'phone',
        'slug',
        'image',
        'facebook_link',
        'instagram_link',
        'twitter_link',
        'linkedin_link',

    ];

    /**
     * Validate user data
     *
     * @param array $data User data to validate
     * @return bool Validation result
     */

    public function validate($data)
    {
        $this->errors = [];

         if(empty($data['firstname']))
        {
            $this->errors['firstname'] = 'Імʼя обовʼязкове';
        }else
        if(!preg_match("/^[a-zA-Z]$/", trim($data['firstname'])))
        {
            $this->errors['firstname'] = 'Імʼя може складатися тільки із літер без пробілів';
        }

        if(empty($data['lastname']))
        {
            $this->errors['lastname'] = 'Прізвище обовʼязкове';
        }else
        if(!preg_match("/^[a-zA-Z]$/", trim($data['lastname'])))
        {
            $this->errors['lastname'] = 'Прізвище може складатися тільки із літер без пробілів';
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

    public function edit_validate($data, $id)
    {
        $this->errors = [];

        // if(!empty($data['firstname']))
        // {
        //     $this->errors['firstname'] = 'Імʼя обовʼязкове';
        // }else
        // if(!preg_match("/^[a-zA-Z]+$/", trim($data['firstname'])))
        // {
        //     $this->errors['firstname'] = 'Імʼя може складатися тільки із літер без пробілів';
        // }

        // if(!empty($data['lastname']))
        // {
        //     $this->errors['lastname'] = 'Прізвище обовʼязкове';
        // }else
        // if(!preg_match("/^[a-zA-Z]+$/", trim($data['lastname'])))
        // {
        //     $this->errors['lastname'] = 'Прізвище може складатися тільки із літер без пробілів';
        // }
        if(!empty($data['email'])) {
            if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
            {
                $this->errors['email'] = 'Користувач з таким email вже існує';
            }else if($result = $this->where(['email'=>$data['email']]))
            {
                foreach($result as $result) {
                    if($id != $result->id) {

                        $this->errors['email'] = 'Такий email вже існує';
                    }
                }

            }
        }

        if(!empty($data['phone'])){
        if(!preg_match("/^[0-9]{8}$/", trim($data['phone']))) {

            $this->errors['phone'] = 'Номер телефону може містити тільки цифри';

        }

        }



        if(!empty($data['facebook_link'])) {
            if(!filter_var($data['facebook_link'], FILTER_VALIDATE_URL)){
                $this->errors['facebook_link'] = 'Адреса Facebook профілю невірна';
            }
        }
        if(!empty($data['twitter_link'])) {
            if(!filter_var($data['twitter_link'], FILTER_VALIDATE_URL)){
                $this->errors['twitter_link'] = 'Адреса Twitter профілю невірна';
            }
        }
        if(!empty($data['instagram_link'])) {
            if(!filter_var($data['instagram_link'], FILTER_VALIDATE_URL)){
                $this->errors['instagram_link'] = 'Адреса Instagram профілю невірна';
            }
        }
        if(!empty($data['linkedin_link'])) {
            if(!filter_var($data['linkedin_link'], FILTER_VALIDATE_URL)){
                $this->errors['linkedin_link'] = 'Адреса LinkedIn профілю невірна';
            }
        }

        if(empty($this->errors)) {
            return true;
        }

        return false;

    }

 }