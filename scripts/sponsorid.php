<?php
    session_start();
    ini_set('display_errors', 0); 
    include $_SERVER['DOCUMENT_ROOT'] . "/dbcon/conn.php";

    //if(isset($_POST['sponsorid'])){
        $sponsorid=mysql_real_escape_string($_POST['sponsorid']);

        $sql="SELECT * FROM mlmmembers WHERE profileid='$sponsorid'";
        $result=mysql_query($sql) or die(mysql_error());

    //}

    $num=mysql_num_rows($result);

    if($num==0){
        echo "Sponsor ID not found/invalid";
    }else{
        $rows=mysql_fetch_array($result);
        $fullname = $rows['firstname'] . ", " . $rows['lastname'];
        $username=$rows['username'];
        echo "<span style='color:green;font-weight:bold;'>Your Sponsor is: " .$fullname . "  </span>";
    }

?>

