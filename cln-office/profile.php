
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

   //////////// UPDATE PASSWORD
   $passMSG = "";
   if(isset($_POST['updatepassword'])){
        $cpass=md5($_POST['cpass']);
        $npass=md5($_POST['npass']);
        $npass2=md5($_POST['npass2']);
        $errors = "";
        if ($cpass != $apass) {
            $errors = 1;
            $passMSG = "<p class='alert alert-danger'><b>Error! </b>Current Password entered is wrong. Try again.</p>";
        }

        if ($npass != $npass2) {
            $errors = 1;
            $passMSG = "<p class='alert alert-danger'><b>Error!</b> Your New Passwords do not match. Try again.</p>";
        }

        if($errors != 1){
            if($sqlPassword = mysqli_query($con,"UPDATE mlmadminusers SET password='$npass' WHERE userid=$userid")){
                $passMSG = "<p class='alert alert-success'><b> Success!</b> Password Changed.</p>";
                // header("Refresh:0; url=/profile.php#passwords");
                // we can also send email notification here
            }
            else{
                $passMSG = "<p class='alert alert-danger'><b>Error!</b> Password not changed!.</p>";
            }
        }
   }

   ////////////// UPDATE PROFILE
   $profileMSG = "";
   if(isset($_POST['updateprofile'])){
        $nfname=$_POST['fname'];
        $nlname=$_POST['lname'];
        $nphone=$_POST['phone'];

        
        if($sqlProfile = mysqli_query($con,"UPDATE mlmadminusers SET firstname='$nfname', lastname='$nlname', phoneno='$nphone' WHERE userid=$userid")){
            $profileMSG = "<p class='alert alert-success'><b> Success!</b>Profile Update.</p>";
            header("Refresh:0; url=/cln-office/profile.php");
            // we can also send email notification here
        }
        else{
            $profileMSG = "<p class='alert alert-danger'><b>Error!</b>Profile not Updated!.</p>";
        }
   }



   ///////////// UPDATE BITCOIN DETAILS
   $bitcoinMSG = "";
   // if(isset($_POST['updatebitdetails'])){
    
   // }

?>

<?php
	
	// include '../admin-style/profile.php';
    include $_SERVER['DOCUMENT_ROOT'] . "/admin-style/profile.php";

?>