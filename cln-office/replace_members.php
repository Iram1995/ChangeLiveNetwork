
<?php
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

    // $annID="";
    // $annID=isset($_GET['edit'])?$_GET['edit']:'na';

    // $sqlAnn=mysqli_query($con,"SELECT * FROM mlmupdates WHERE upid=$annID");
    // $count=mysqli_num_rows($sqlAnn);

    // if($count>"0"){
    //     while ($row = mysqli_fetch_assoc($sqlAnn)) {
    //     //  sponsor details
    //         $annTitle=$row['upsubject'];
    //         $annMessage=$row['upmessage'];
    //         $annPubDate=$row['updatetime'];
    //     }
    // }
?>

<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/admin-style/replace_members.php";
?>