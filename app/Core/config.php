<?php 
/***
 * app info 
 */
define('App_Name', 'AZRoses');
define('APP_DESC', 'online flower order app');



if($_SERVER['SERVER_NAME'] == 'localhost')
{
    //database cofig for the local machine
   //define('HOSTNAME', 'localhost');
   define('DBHOST', 'localhost');
   define('DBNAME', 'mvc_ps');
   define('DBUSER', 'root');
   define('DBPASS', '');
   define('DBDRIVER', 'mysql');
  
   //www.azroses.com
   define('ROOT', 'http://localhost/udemy1/public');
} else{
    // database config for live server
    define('DBHOST', 'localhost');
   define('DBNAME', 'mvc_ps');
   define('DBUSER', 'root');
   define('DBPASS', '');
   define('DBDRIVER', 'mysql');
}


