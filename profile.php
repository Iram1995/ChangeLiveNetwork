<?php   
    //echo "Hello";
    //echo md5('admin');
    //ini_set("display_errors", 0);
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

   //////////// UPDATE PASSWORD
   $passMSG = "";
   if(isset($_POST['updatepassword'])){
        $cpass=testinput(md5($_POST['cpass']));
        $npass=testinput(md5($_POST['npass']));
        $npass2=testinput(md5($_POST['npass2']));
        $errors = "";
        if ($cpass != $apass) {
            $errors = 1;
            echo $passMSG = "<p class='alert alert-danger'><b>Error! </b>Current Password entered is wrong. Try again.</p>";
        }

        if ($npass != $npass2) {
            $errors = 1;
            echo $passMSG = "<p class='alert alert-danger'><b>Error!</b> Your New Passwords do not match. Try again.</p>";
        }

        if($errors != 1){
            if($sqlPassword = mysqli_query($con,"UPDATE mlmmembers SET password='$npass' WHERE userid=$userid")){
                echo $passMSG = "<p class='alert alert-success'><b> Success!</b> Password Changed.</p>";
                // header("Refresh:0; url=/profile.php#passwords");
                // we can also send email notification here
            }
            else{
                echo $passMSG = "<p class='alert alert-danger'><b>Error!</b> Password not changed!.</p>";
            }
        }
   }

   ////////////// UPDATE PROFILE
   $profileMSG = "";
   if(isset($_POST['updateprofile'])){
        $nfname=$_POST['fname'];
        $nlname=$_POST['lname'];
        $nphone=$_POST['phone'];
        $nemail=$_POST['email'];

        
        if($sqlProfile = mysqli_query($con,"UPDATE mlmmembers SET firstname='$nfname', lastname='$nlname', phoneno='$nphone', emailaddress='$nemail' WHERE userid=$userid")){
            echo $profileMSG = "<p class='alert alert-success'><b> Success!</b>Profile Update.</p>";
            header("Refresh:1; url=/profile.php");
            // we can also send email notification here
        }
        else{
            echo $profileMSG = "<p class='alert alert-danger'><b>Error!</b>Profile not Updated!.</p>";
        }
   }

   ///////////// UPDATE BITCOIN DETAILS
   $bitcoinMSG = "";
   $verificationReq = "";
   if(isset($_POST['updatebitcoin'])){
        $nWalletName=$_POST['walletname'];
        $nBitAdrr=$_POST['bitress'];

        $bitOTP = $bitOTP = str_pad(mt_rand(0,999999),6,'0', STR_PAD_LEFT);
        $one = "1";
        $zero = "0";
        
        $siteName = "changelivesnetwork.com";
        $toMail = $emailaddress;
        $siteSlung = "changelivesnetwork.com";
        $fromEmail = "info@changelivesnetwork.com";
        $toSubject = "OTP for bitcoin address change";
        //$bitMessage = "Hello";
                
        $bitMessage = '<html><body>';
        $bitMessage .= "<br>";
        $bitMessage .= "<h1 style='text-align:center;color:#000000;'>Your OTP is <span style='color:orange;'>".$bitOTP." </span></h1>";
        $bitMessage .= "<hr>";
        $bitMessage .= "<p style='color:#333333;'>If this was not you, please change your password right now! and contact support@changelivesnetwork.com</p>";
        $bitMessage .= "<hr>";
        $bitMessage .= "</body></html>";
            
        //$mailHeaders = "From: " . $siteName . "<". $fromEmail .">\r\n";
        $mailHeaders .= "Reply-To: ".$fromEmail. "\r\n";
        $mailHeaders .= "MIME-Version: 1.0\r\n";
        $mailHeaders .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        
        if(mail($toMail, $toSubject, $bitMessage, $mailHeaders)){
            if($sqlProfileUpdate = mysqli_query($con,"UPDATE mlmmembers SET otpforbitchange='$bitOTP', otpbitstatus='$one', newbitaddress='$nBitAdrr', newwalletname='$nWalletName' WHERE userid=$userid")){
                //echo $profileMSG = "<p class='alert alert-warning'><b> Verification required!</b></p>";
                $verificationReq = '<p class="alert alert-warning">6-Digit OTP has been emailed to <b>'.$emailaddress.'</b> <br>
                                <a href="/profile.php#profile">Change Email Address</a>
                              </p>';
                header("Refresh:3; url=/profile.php");
                // we can also send email notification here
            }
            else{
                echo $profileMSG = "<p class='alert alert-danger'><b>Error!</b> Bitcoin Details not Updated!.</p>";
            }
        }else{
            echo $profileMSG = "<p class='alert alert-danger'><b>Error!</b> We could not send email. Your Bitcoin details were not changed</p>";
        }
    
   }

   // verify OTP
   $otpErr = "";
   if (isset($_POST['checkotp'])) {
       # code...
        $userSubmittedOTP = $_POST['bitotp'];
        if ($otpForBitChange != $userSubmittedOTP) {
            # code...
            echo $otpErr = "<p class='alert alert-danger'><b>Wrong OTP !</b> Please double check and try again!.</p>";
        }else{
            if($sqlChangeAddress = mysqli_query($con,"UPDATE mlmmembers SET walletname='$newWalletName', bitress='$newBitAddress', otpbitstatus='$zero' WHERE userid=$userid")){
                echo $profileMSG = "<p class='alert alert-success'><b> Success!</b> Bitcoin Details are Updated.</p>";
                header("Refresh:2; url=/profile.php");
                # we can also send email notification here
            }
            else{
                echo $profileMSG = "<p class='alert alert-danger'><b>Error!</b> Bitcoin Details not Updated!.</p>";
            }
        }
   }
   
//   $to1 = $emailaddress;
//   $subject1 = "Subject line";
//   $message1 = "testing PHP";
  
//     $mailHeaders = "From: thabanichris@yahoo.com"."\r\n";
//     $mailHeaders .= "Reply-To: ".$fromEmail. "\r\n";
//     $mailHeaders .= "MIME-Version: 1.0\r\n";
//     $mailHeaders .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        
   
//   if(mail($to1,$subject1,$message1,$mailHeaders)){
//       echo "<p class='alert alert-warning'>Test mail sent to ".$emailaddress."</p>";
//   }else{
//          echo "<p class='alert alert-danger'>Could not even send test email.</p>";
//   }

?>

<?php
    if($verificationReq){echo $verificationReq;}
    include 'user-style/profile.php';

?>