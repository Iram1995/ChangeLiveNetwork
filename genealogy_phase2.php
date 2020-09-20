<?php   
    //echo "Hello";
    //echo md5('admin');
   // ini_set("display_errors", 0);
    error_reporting(E_ALL);
    date_default_timezone_set('Africa/Johannesburg');
    session_start();

    include $_SERVER['DOCUMENT_ROOT'] . "/dbcon/conn.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/var/functions.php";
    
    //include $_SERVER['DOCUMENT_ROOT'] . "/scripts/arraylist.php";

    if(!isset($_SESSION['logged'])){
        header('Location: /login.php?');
    }else{
        $userid=$_SESSION['userid'];
        $username=$_SESSION['username'];
    }

   include $_SERVER['DOCUMENT_ROOT'] . "/var/vars.php";

?>

<?php
	
	include 'user-style/genealogy_phase2.php';

?>