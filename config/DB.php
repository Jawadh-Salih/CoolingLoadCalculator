
<?php

// Think about a singleton class.
session_start();

$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "laurantseries";
// $DB_pass = "";
$DB_name = "coolingload";

try
{

    $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
    $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    var_dump($DB_con);
}
catch(PDOException $e)
{
    echo "DB Not Connected ";
    echo $e->getMessage();
}

$DB = $DB_con;
//require_once 'constants.php';
//require_once $_SERVER['DOCUMENT_ROOT'].'/'.$app_dir.'/model/class.user.php';
//$user = new User($DB_con);
//
//include_once $_SERVER['DOCUMENT_ROOT'].'/'.$app_dir.'/model/class.course.php';
//$course = new Course($DB_con);
