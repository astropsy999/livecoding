<?php

/**
 * Course page class
 */

 class Course_model extends Model
 {

    public $errors=[];
    protected $table="users";

    protected $allowedColumns=[
       'id',
       'title',
       'description',
       'user_id',
       'category_id',
       'subcategory_id',
       'level_id',
       'language_id',
       'price_id',
       'promo_link',
       'course_image',
       'course_promo_video',
       'primary_subject',
       'date',
       'tags',
       'welcome_message',
       'congratulation_message',
       'approved',
       'published',
    ];

    /**
     * Validate course data
     *
     * @param array $data Course data to validate
     * @return bool Validation result
     */

    public function validate($data)
    {
        $this->errors = [];

         if(empty($data['title']))
        {
            $this->errors['title'] = 'Назва курсу обовʼязкова';
        }else
        if(!preg_match("/^[a-zA-Z \-\_\&]+$/", trim($data['title'])))
        {
            $this->errors['title'] = 'Назва курсу може складатися тільки із літер та пробілів';
        }

        if(empty($data['сategory_id']))
        {
            $this->errors['сategory_id'] = 'Категорія обовʼязкова';
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