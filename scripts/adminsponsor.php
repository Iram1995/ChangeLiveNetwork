<?php
    session_start();
    ini_set('display_errors', 0); 
    include $_SERVER['DOCUMENT_ROOT'] . "/dbcon/conn.php";

    //if(isset($_POST['sponsorid'])){
    $sql="SELECT * FROM mlmmembers ORDER BY userid ASC LIMIT 1";
    $result=mysql_query($sql) or die(mysql_error());

    //}

    $num=mysql_num_rows($result);

    if($num==0){
        echo "Sponsor Id not found/invalid";
    }else{
        $rows=mysql_fetch_array($result);
        echo $sponsorid = $rows['profileid'];
    }

?>

