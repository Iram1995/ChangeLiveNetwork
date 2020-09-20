<?php
   
    ini_set('display_errors', 0); 
    include $_SERVER['DOCUMENT_ROOT'] . "/dbcon/conn.php";

     $recipientprofileid=mysql_real_escape_string($_POST['recipientprofileid']);

        $sql="SELECT * FROM mlmmembers WHERE profileid='$recipientprofileid'";
        $result=mysql_query($sql) or die(mysql_error());

    //}

    $num=mysql_num_rows($result);

    if($num==0){
        echo "Membership ID not found/invalid";
    }else{
        $rows=mysql_fetch_array($result);
        echo $fullname = $rows['firstname'] . ", " . $rows['lastname'];
        $username=$rows['username'];
        
    }

?>

