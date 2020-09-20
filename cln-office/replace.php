
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
    $blockedID=isset($_GET['blockeduser'])?$_GET['blockeduser']:'na';
    $replaceID="";
    $replaceID=isset($_GET['replace'])?$_GET['replace']:'na';

    $sqlblockedID=mysqli_query($con,"SELECT * FROM mlmmembers WHERE userid=$blockedID");
    $countBlockedID=mysqli_num_rows($sqlblockedID);

    if($countBlockedID>"0"){
        while ($blockedRow = mysqli_fetch_assoc($sqlblockedID)) {
        //  blocked user details
            $BLOckeduserid = $blockedRow["userid"];
            $BLOckedusername = $blockedRow["username"];
            $BLOckedsponsorid = $blockedRow['sponsorid'];
            $BLOckedparentid = $blockedRow['parentid'];
            $BLOckedactivation = $blockedRow['activation'];
            $BLOckedbatch = $blockedRow['batch'];
            $BLOckedcStage = $blockedRow['currentstage'];
            $BLOckedMemberRegNo = $blockedRow['memberregno'];
            $BLOckedTreeNo = $blockedRow['treeno'];
        }
    }

    // REPLACER DETAILS
    $sqlReplacerID=mysqli_query($con,"SELECT * FROM mlmmembers WHERE userid=$replaceID");
    $countreplacerID=mysqli_num_rows($sqlReplacerID);

    if($countreplacerID>"0"){
        while ($replacerRow = mysqli_fetch_assoc($sqlReplacerID)) {
        //  blocked user details
            $replacerUserid = $replacerRow["userid"];
            $replacerUsername = $replacerRow["username"];
            $replacerSponsorid = $replacerRow['sponsorid'];
            $replacerParentid = $replacerRow['parentid'];
            $replacerActivation = $replacerRow['activation'];
            $replacerBatch = $replacerRow['batch'];
            $replacecStage = $blockedRow['currentstage'];
            $replaceMemberRegNo = $blockedRow['memberregno'];
            $replaceTreeNo = $blockedRow['treeno'];
        }
    }
?>

<?php

    $replcErrMSG = "";
    // update replacer details
    $SQLreplMembers = mysqli_query($con,"UPDATE mlmmembers SET parentid='$BLOckedparentid', depth='$BLOckeddepth', activation='Pay' WHERE userid=$replacerUserid");
    // update replacer details
    $SQLreplMembers2 = mysqli_query($con,"UPDATE mlmmembers SET parentid='0', depth='0', status='0' WHERE userid=$BLOckeduserid");
    if ($SQLreplMembers && $SQLreplMembers2) {
        $replcErrMSG = "<p class='alert alert-success'><b>Success </b><br> <b>".$BLOckedusername. "</b> has been replaced by <b>".$replacerUsername."</b></p>";
        //header("Refresh:3; url=/cln-office/replace.php");
                // we can also send email notification here
    }
    else{
        $replcErrMSG = "<p class='alert alert-danger'><b>Error!</b><br> <b>".$BLOckedusername. "</b> not replaced!.</p>";
    }
    
?>

<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/admin-style/replace.php";
?>