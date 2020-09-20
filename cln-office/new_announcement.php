
<?php
    //echo "<pre>"; 
    //print_r($_SERVER); 
    //echo "</pre>";
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

            // include $_SERVER['DOCUMENT_ROOT'] . "/var/vars.php";

        }
                    
    }

?>

<?php   

   include $_SERVER['DOCUMENT_ROOT'] . "/var/vars.php";

   ////////////// Publish announcement
   $announcememntErrMSG = "";
   if(isset($_POST['publish'])){
        $aTitle=$_POST['title'];
        $announcement=$_POST['announcement'];
        
        if($sqlAnnounce = mysqli_query($con,"INSERT INTO mlmupdates (upsubject,upmessage,upstatus,updatetime) VALUES ('$aTitle','$announcement','1',CURDATE())")){
            $announcememntErrMSG = "<p class='alert alert-success'><b> Published!</b> All users will see your announcement on their dashboard.</p>";
            //header("Refresh:0; url=/cln-office/new_announcement.php");
            // we can also send email notification here
        }
        else{
            $announcememntErrMSG = "<p class='alert alert-danger'><b>Error!</b> Announcememnt not published!.</p>";
        }
   }

?>

<?php
	
	// include '../admin-style/profile.php';
    include $_SERVER['DOCUMENT_ROOT'] . "/admin-style/new_announcement.php";

?>