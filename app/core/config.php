<?php
/**
 * App config
 */
define('APP_NAME', 'liveCodingUA');
define('APP_DESC', 'Free and Paid Tutorials');


/**
 * database config
 */

if($_SERVER['SERVER_NAME'] == 'localhost') {
    // database local server config
    define('DBHOST','localhost');
    define('DBNAME','livecod_db');
    define('DBUSER','astro');
    define('DBPASS','1881');
    define('DBDRIVER','mysql');
    //root path e.g. localhost
    define('ROOT', 'http://localhost:8888/livecoding/public');
}else{
    // database live server config
    define('DBHOST','localhost');
    define('DBNAME','livecod_db');
    define('DBUSER','root');
    define('DBPASS','');
    define('DBDRIVER','mysql');
    //root path e.g. liveserver
    define('ROOT', 'http://');
}
