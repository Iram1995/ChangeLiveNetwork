
<?php
 ini_set("display_errors", 0);
    $adminroles =  array('' =>'Select Role' ,'Master Admin'=>'Master Admin','Super Admin'=>'Super Admin','Normal Admin'=>'Normal Admin');
    session_start();
    //ini_set('display_errors',0);
    include $_SERVER['DOCUMENT_ROOT'] . "/dbcon/conn.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/scripts/arraylist.php";
?>

<?php
    if(!isset($_SESSION['adminuser']) || empty($_SESSION['adminuser'])){
        header('Location: /cln-office/login.php');
    }else{
        $username=$_SESSION['adminuser'];
        $sqlUD = mysqli_query($con,"SELECT * FROM mlmadminusers WHERE username='" . $username . "'");
        while ($rows = mysqli_fetch_assoc($sqlUD)) {
            $firstname=$rows['firstname'];
            $lastname=$rows['lastname'];
            $fullname=$rows['lastname'] . ", " . $rows['firstname'];
            $emailaddress=$rows['emailaddress'];
            $phoneno=$rows['phoneno'];
            $apass=$rows['password'];
            $userid=$_SESSION['userid']=$rows['userid'];
        }
                    
    }

?>

<?php   

   include $_SERVER['DOCUMENT_ROOT'] . "/var/vars.php";

    $blockedID="";
    $blockedID=isset($_GET['user'])?$_GET['user']:'na';

    $sqlblockedID=mysqli_query($con,"SELECT * FROM mlmmembers WHERE userid=$blockedID");
    $count=mysqli_num_rows($sqlblockedID);

    if($count>"0"){
        while ($blockedRow = mysqli_fetch_assoc($sqlblockedID)) {
        //  blocked user details
            $BLOckeduserid = $blockedRow["userid"];
            $BLOckedusername = $blockedRow["username"];
            $BLOckedsponsorid = $blockedRow['sponsorid'];
            $BLOckedparentid = $blockedRow['parentid'];
            $BLOckedactivation = $blockedRow['activation'];
            $BLOckedbatch = $blockedRow['batch'];
        }
    }
?>

<?php

    $editErrMSG = "";

    if (isset($_POST['replaceuser'])) {
        # code...
        $edTitle=$_POST['title'];
        $edMessage=$_POST['announcement'];

        $SQLDELETEANN = mysqli_query($con,"UPDATE mlmupdates SET upsubject='$edTitle', upmessage='$edMessage' WHERE upid=$blockedID");
        if ($SQLDELETEANN) {
            $editErrMSG = "<p class='alert alert-success'><b> Done!</b> announcement edit successfully!</p>";
            header("Refresh:3; url=/cln-office/view_announcements.php");
                // we can also send email notification here
            }
            else{
                $editErrMSG = "<p class='alert alert-danger'><b>Error!</b> announcement not was not edited!.</p>";
            }
    }
?>

<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/admin-style/replace_this_member.php";
?>