<?php
	session_start();

	unset($_SESSION['username']);
    unset($_SESSION['userid']);
    unset($_SESSION['logged']);
    
    echo "<h4 class='alert alert-success'>You have successfully logged out from your account</h4>";
    header('Refresh: 2;url=/login.php');
?>