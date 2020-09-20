<?php
    session_start();
    ini_set('display_errors', 0); 
    include $_SERVER['DOCUMENT_ROOT'] . "/dbcon/conn.php";

    if(isset($_POST['username'])){
        $username=mysql_real_escape_string($_POST['username']);

        echo "<span>" . $sql="SELCT * FROM mlmusers WHERE username='$username'" . "</span>";
        $result=mysql_query($sql) or die(mysql_error());

    }

    echo "<span>No. " . $num=mysql_num_rows($result) . "</span>";

    if($num ==0){
        echo "<span style='color:green;'>Username is available</span>";        
    }else{
        //echo $username;
        echo "<span style='color:red;'>Username is already taken</span>";        
    }

?>

