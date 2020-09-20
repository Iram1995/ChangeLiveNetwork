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

        $sqlUU = mysqli_query($con,"SELECT * FROM mlmmembers WHERE userid=$userid");
        while ($row = mysqli_fetch_assoc($sqlUU)) {
                $fullname=$row['firstname'] . " " . $row['lastname'];
                //$status=$_SESSION['status']=$rows['status'];
                $firstname=$row['firstname'];
                $lastname=$row['lastname'];
                $emailaddress=$row['emailaddress'];
                $phoneno=$row['phoneno'];
                $batchno=$row['batch'];
                $datecreated=$row['datecreated'];
                $lastupdate=$row['lastupdate'];

                $apass=$row['password'];

                $profileid=$_SESSION['profileid']=$row['profileid'];
                $userid=$_SESSION['userid']=$row['userid'];
                $parentid=$_SESSION['parentid']=$row['parentid'];
        }
    }

   include $_SERVER['DOCUMENT_ROOT'] . "/var/vars.php";

    // $annID="";
    // $annID=isset($_GET['read'])?$_GET['read']:'na';

    // $sqlAnn=mysqli_query($con,"SELECT * FROM mlmupdates WHERE upid=$annID");
    //                 $count=mysqli_num_rows($sqlAnn);

    //                 if($count>"0"){
    //                     while ($row = mysqli_fetch_assoc($sqlAnn)) {
    //                         //  sponsor details
    //                         $annTitle=$row['upsubject'];
    //                         $annMessage=$row['upmessage'];
    //                         $annPubDate=$row['updatetime'];
    //                     }
    //                 }


?>

<?php
	
	include 'user-style/downliners.php';

?>