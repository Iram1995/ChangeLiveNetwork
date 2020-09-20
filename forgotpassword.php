<?php
    // sanitize $_GET variables
    $_GET   = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);        
    // sanitize $_POST variables
    $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
    session_start();
    include $_SERVER['DOCUMENT_ROOT'] . "/dbcon/conn.php";
    //include $_SERVER['DOCUMENT_ROOT'] . "/var/vars.php";
    //include $_SERVER['DOCUMENT_ROOT'] . "/var/functions.php";
    function testinput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <title><?php echo $sitename;?> | Forgot Password</title>
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <link href="/icofont/css/icofont.css" rel="stylesheet" type="text/css"/>
              
    </head>
    <body class="bg-gradient-primary"> 
        <?php
                # code...
                $errFound=$error=$errEmail=$errUsername=$status=$username=$email='';
                $errors=0;

                if(isset($_POST['submit'])){
                    $username=isset($_POST['username'])?$_POST['username']:'';
                    $email=isset($_POST['email'])?$_POST['email']:'';

                    if(empty($username)){
                        $errUsername='Username cannot be blank';
                        $errors=1;
                    }
                    if(empty($email)){
                        $errEmail='Email cannot be blank';
                        $errors=1;
                    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        # code...
                        $errEmail = 'Please enter a valid email address';
                        $errors=1;
                    }
                    
                    
                    if($errors==1){
                        include $_SERVER['DOCUMENT_ROOT'] . "/includes/resetpassword.php";    
                    }else{
                        $password = substr(md5(uniqid(rand(),1)),3,5);
                        $sqlFP=mysqli_query($con,"SELECT * FROM mlmmembers WHERE username='$username' AND emailaddress='$email'");

                        if(mysqli_num_rows($sqlFP)>0){
                             // echo "account found";
                            $password = substr(md5(uniqid(rand(),1)),3,5);
                            $pass = md5($password); //encrypted version for database entry

                            echo "Your password is: ".$password;

                            //sendmail
                            $to=$email;
                            $from = "From:"."noreply@changelivesnetwork.com";
                            $subject='Password Reset';
                            $status='A password reset information has been sent to your mail box';
                            $msg="Hi " . $username . ", \n\nyou have requested your account details. \n\nHere is your account information please keep this as you may need this at a later stage. \n\nYour username is $username \n\n your password is: " .  $password . " \n\nYour password has been updated please login now and change your password.\n\n changelivesnetwork.com";

                            if($status=mail($to,$msg,$subject,$from)){
                                echo "<p class='alert alert-success'>new password has been emailed to: <b>".$email."</b>";
                              if($sqlUD=mysqli_query($con,"UPDATE mlmmembers SET password='$pass' WHERE username='$username'")){
                                //echo "database updated";
                                    include $_SERVER['DOCUMENT_ROOT'] . "/includes/resetpassword.php"; 
                                }
                            }else{
                             $errFound='<p class="alert alert-danger">We could not email your password for some technical reasons.</p>';
                            include $_SERVER['DOCUMENT_ROOT'] . "/includes/resetpassword.php";
                            } 
                        }
                        else{
                             $errFound='<p class="alert alert-danger">Account with that username and email not found</p>';
                            include $_SERVER['DOCUMENT_ROOT'] . "/includes/resetpassword.php";
                        }
                    }
                }else{
                    include $_SERVER['DOCUMENT_ROOT'] . "/includes/resetpassword.php";    
                }
        
            ?>
            <script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>
        <script src='/js/mlm.js'> </script>
    </body>
</html>