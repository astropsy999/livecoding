<?php

class Database
{
    private function connect(){
        $str = DBDRIVER.":hostname=".DBHOST.";dbname=".DBNAME;
        return new PDO($str,DBUSER,DBPASS);

    }

    public function query($query,$data=[],$type='object') {
        $con = $this->connect();
        $stm = $con->prepare($query);
        if($stm) {
            $check = $stm->execute($data);
            if($check){

                if($type!='object')
                {
                    $type =PDO::FETCH_ASSOC;
                }else
                {
                    $type =PDO::FETCH_OBJ;
                }
                $result = $stm->fetchAll($type);
                if(is_array($result) && count($result) > 0) {
                    return $result;
                }
            }
        }
        return false;
    }

    public function create_tables(){

        // users table
        $query="CREATE TABLE IF NOT EXISTS `users` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `email` varchar(100) NOT NULL,
                `firstname` varchar(30) NOT NULL,
                `lastname` varchar(30) NOT NULL,
                `password` varchar(255) NOT NULL,
                `role` varchar(20) NOT NULL,
                `date` date DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `email` (`email`),
                KEY `firstname` (`firstname`),
                KEY `lastname` (`lastname`),
                KEY `date` (`date`)) ENGINE=InnoDB DEFAULT CHARSET=utf8
                ";

        $this->query($query);

        // courses table
        $query="CREATE TABLE `courses` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `title` varchar(100) NOT NULL,
                `description` text,
                `user_id` int(11) NOT NULL,
                `category_id` int(11) NOT NULL,
                `subcategory_id` int(11) DEFAULT NULL,
                `level_id` int(11) DEFAULT NULL,
                `language_id` int(11) DEFAULT NULL,
                `price_id` int(11) DEFAULT NULL,
                `promo_link` varchar(1024) DEFAULT NULL,
                `course_image` varchar(1024) DEFAULT NULL,
                `course_promo_video` varchar(1024) DEFAULT NULL,
                `primary_subject` varchar(100) DEFAULT NULL,
                `date` datetime DEFAULT NULL,
                `tags` varchar(2048) DEFAULT NULL,
                `welcome_message` varchar(2048) DEFAULT NULL,
                `congratulation_message` varchar(2048) DEFAULT NULL,
                `approved` tinyint(1) NOT NULL DEFAULT '0',
                `published` tinyint(1) NOT NULL DEFAULT '0',
                PRIMARY KEY (`id`),
                KEY `title` (`title`),
                KEY `user_id` (`user_id`),
                KEY `category_id` (`category_id`),
                KEY `subcategory_id` (`subcategory_id`),
                KEY `level_id` (`level_id`),
                KEY `language_id` (`language_id`),
                KEY `price_id` (`price_id`),
                KEY `primary_subject` (`primary_subject`),
                KEY `date` (`date`),
                KEY `approved` (`approved`),
                KEY `published` (`published`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        $this->query($query);
    }
}