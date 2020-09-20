<?php
	session_start();

	unset($_SESSION['username']);
    unset($_SESSION['userid']);
    unset($_SESSION['logged']);
    unset($_SESSION['adminuser']);
    echo "<h4>You have successfully logged out from your account</h4>";
    header('Refresh: 2;url=/cln-office/login.php');
?>