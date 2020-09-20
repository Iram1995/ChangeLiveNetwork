<?php   
    //echo "Hello";
    //echo md5('admin');
    ini_set("display_errors", 0);
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
    }

   include $_SERVER['DOCUMENT_ROOT'] . "/var/vars.php";


   ////////////// UPDATE PROFILE
   
   $WithdrawErr = "";
   $btnErr = "";
   $errors = "";

   if(isset($_POST['withdrawbalance'])){
        $amountRequested = $UserAvalBal;

        if ($userBitAddress == "") {
            echo $WithdrawErr = '<h2 class="alert alert-danger"><b>Error! </b> Please <a href="/profile.php#bitcoin">add your bitcoin address</a> so you can withdraw.</b><br></h2>';
            $errors = 1;
        }

        if ($amountRequested > $UserAvalBal) {
            echo $WithdrawErr = '<h2 class="alert alert-danger"><b>Error! </b>You can not withdraw amount more than $'.$UserAvalBal.'<br></h2>';
            $errors = 1;
        }
        if ($suspendUserWithdrawals == "1") {
           echo  $WithdrawErr = '<h2 class="alert alert-danger"><b>Error! </b>You are suspended from making withdrawals. Please contact admin or try again later</b><br></h2>';
            $errors = 1;
        }
        if ($amountRequested < $systemMinWithdrawal) {
            echo $WithdrawErr = '<h2 class="alert alert-danger"><b>Error! </b>Minimum withdrawal is <b>$'.$systemMinWithdrawal.'</b> You requested '.$amountRequested.'<br></h2>';
            $errors = 1;
        }
        if ($amountRequested > $systemMaxWithdrawal) {
            echo $WithdrawErr = '<h2 class="alert alert-danger"><b>Error! </b>Maximum withdrawal is <b>$'.$systemMaxWithdrawal.'</b>><br></h2>';
            $errors = 1;
        }
    
        //check error count
        if($errors==1){
            $WithdrawErr = "<p class='alert alert-danger'><b>Errors found!</b> Your withdrawal can not be processed at this time!</p>";
        }else{
            //echo "No errors found";
            $withdrawType = "Withdrawal";
            $withdrawalStatus = "Pending";
            $withdrawal2Status = "Approved";
            $withdrawalDate =  date('Y-m-d H:i:s');
            if($withdrawSQL1= mysqli_query($con,"INSERT INTO mlmwithdrawals (amount,date,status,userid) VALUES ('$UserAvalBal','$withdrawalDate','$withdrawalStatus','$userid')")){
                if($withdrawSQL2= mysqli_query($con,"UPDATE mlmmemberledger SET status='Withdrawn' WHERE userid=$userid")){
                    // if($withdrawSQL3= mysqli_query($con,"INSERT INTO mlmledger(beneficiaryid,transdate,crediitamount,type,status) VALUES ('$userid','$withdrawalDate','$amountRequested','$withdrawType','$withdrawal2Status')")){

                    // }
                    echo $WithdrawErr = "<p class='alert alert-success'><b>Good job!</b> Your funds are on their way!.</p>";
                    header("Refresh:3; url=/profile.php#passwords");
    
                    // we can also send email notification here
                    $toEmail = $emailaddress;
                    $siteName = "Change Lives Network";
                    $siteSlung = "changelivesnetwork.com";
                    $siteURL = "www".$siteSlung;
                    $fromEmail = "withdrawals@".$siteSlung;
                    $withdrawSubject = "Withdrawal from ".$siteName;
                    
                    $message = '<html><body>';
                    $message .= "<h2 style='text-align:center;color:#000000;'>Hello ".$firstname.",</h2>";
                    $message .= "<hr>";
                    $message .= "<h2 style='text-align:center;color:#26ae60;'>You made a withdrawal of $".$amountRequested." </h2>";
                    $message .= "<p>Time: <b>".$withdrawalDate."</b></p>";
                    $message .= "<hr>";
                    $message .= "<p style='color:#000000;font-size:11px;>If this was not you, please change your password right now! and contact support@changelivesnetwork.com</p>";
                    $message .= "<hr>";
                    $message .= "<p>Widrawals Department: <br><b>".$siteURL."</b></p>";
                    $message .= "</body></html>";
                
                    //$mailHeaders = "From: " . $siteName . "<". $fromEmail .">\r\n";
                    $mailHeaders .= "Reply-To: ". $fromEmail . "\r\n";
                    $mailHeaders .= "MIME-Version: 1.0\r\n";
                    $mailHeaders .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                    if (mail($toEmail, $withdrawSubject, $message, $mailHeaders)) {
                        $WithdrawErr = '<p class="alert alert-success"><b>Email sent!</b> We have sent you an email too.</p>';
                    }else{
                        $WithdrawErr = '<p class="alert alert-danger"><b>Email not sent!</b> We could not send you email. But your withdrawal is submitted.</p>';
                    }
                }
            }
            else{
                $WithdrawErr = "<p class='alert alert-danger'><b>Error! </b> Withdrawal can not be processed. Pls try again or contact IT Department</p>";  
            }
        }
}
?>

<?php
    
    include 'user-style/withdraw.php';

?>