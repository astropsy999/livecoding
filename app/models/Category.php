<?php

/**
 * Categories model
 */

 class Category extends Model
 {

    public $errors=[];
    protected $table="categories";

    protected $allowedColumns=[
        'category',
        'disabled',

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

         if(empty($data['category']))
        {
            $this->errors['category'] = 'Назва категорії обовʼязкове';
        }else
        if(!preg_match("/^[a-zA-Z \&\']$/", trim($data['category'])))
        {
            $this->errors['category'] = 'Назва категорії може складатися тільки із літер та пробілів';
        }
        if(empty($this->errors)) {
            return true;
        }

        return false;

    }



 }