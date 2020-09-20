<?php

	// sanitize $_GET variables
	$_GET   = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

    session_start();
    include $_SERVER['DOCUMENT_ROOT'] . "/dbcon/conn.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/var/vars.php";
    
    
    $id=$_GET['id'];    
    $sql="UPDATE mlmepins SET status='Blocked', blocked='YES' WHERE pid=$id";
    $result=mysql_query($sql) or die(mysql_error());

   
?>
                        
                
