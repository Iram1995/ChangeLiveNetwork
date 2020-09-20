
<?php

    // sanitize $_GET variables
    $_GET   = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);        

    // sanitize $_POST variables
    $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
    //echo "<pre>"; 
    //print_r($_SERVER); 
    //echo "</pre>";
    
    ini_set('display_errors', 0);
    session_start();
    include $_SERVER['DOCUMENT_ROOT'] . "/dbcon/conn.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/var/vars.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <title><?php echo $sitename;?> | Admin Login</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="/icofont/css/icofont.css" rel="stylesheet" type="text/css"/>
        <style type="text/css">

            #loginbox {max-width: 320px; margin: 150px auto;font-size: 1em;font-family: arial;position: relative;background: rgba(0,0,0,0.75);color: #fff;}
            #loginbox {padding: 20px; border: 0px solid #b0c4de;padding-top: 72px;border-radius: 10px; }
            .input-group {margin: 15px 0;}
            .input-group  label {display: block; text-align: left;margin: 3px;}
            .input-group input{height: 30px;width: 93%;padding: 5px 10px; font-size: 16px;border-radius: 5px;border: 1px solid gray;}
            .btn1 {padding: 10px 20px;font-size: 15px;color: white; background: #4169e1;border: none;border-radius: 5px;margin: 0 auto;cursor: pointer;height: 30px;width: 93%}
            .user {width: 80px;height: 80px;border-radius: 50%; overflow: hidden; position: absolute;top: calc(-80px/2); left: calc(50% - 40px);}
            #loginbox input[type='submit'] {height: 40px;width: 100%;padding: 10px 10px; font-size: 16px;border-radius: 5px;border: 0px solid gray;background: royalblue;font-weight: bold;cursor: pointer;}
        </style>           
    </head>
    <body  style="background: url('/images/royalbackground2.png'); background-size: cover;">       
        
        <div id="loginbox" style="background:darkblue;">
            <img src="/../images/avatar.jpg" alt="useravatar"class="user">           

            <?php

            $section=isset($_GET['section'])?$_GET['section']:'';

            if($section=='login' || $section==''){
                $username=$errMsg='';
                $errors=0;
                if(isset($_POST['submit'])){
                    //retrieve and activate variables
                    $username=trim($_POST['username']);
                    if(empty($username)){
                        $errMsg="Username is missing";
                        $errors=1;
                    }else{
                        $password=isset($_POST['password'])?$_POST['password']:'na';
                        $password=md5($password);

                        $sqlal= mysqli_query($con,"SELECT * FROM mlmadminusers WHERE username='" . $username . "' AND password='" . $password . "' AND status>=0");

                        if(mysqli_num_rows($sqlal)>0) {
                           while( $rows=mysqli_fetch_assoc($sqlal)){
                                $_SESSION['adminuser']=$username;
                                $_SESSION['loginid']=$rows['userid'];
                                 // we can send email to admin as security notification.
                                header('Location: /cln-office/index.php');
                            }
                        }else{
                            $errors=1;
                            $errMsg='<p style="background:#fff;">Incorrect details. Please try again</p>';
                            // we can send email to admin as security notification.
                        }
                    }
                    include $_SERVER['DOCUMENT_ROOT'] . "/includes/adminloginform.inc.php"; 
                }else{
                   include $_SERVER['DOCUMENT_ROOT'] . "/includes/adminloginform.inc.php"; 
                }
            }elseif ($section=='reset') {
                # code...

                $errEmail=$errUsername=$status=$username=$email='';
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
                        include $_SERVER['DOCUMENT_ROOT'] . "/cln-office/includes/resetpassword.php";    
                    }else{
                        $password = substr(md5(uniqid(rand(),1)),3,5);
                        $sql="SELECT * FROM mlmadminusers WHERE username='$username' AND emailaddress='$email'";
                        $result=mysql_query($sql) or die(mysql_error());

                        if(mysql_num_rows($result)>0){
                            $password = substr(md5(uniqid(rand(),1)),3,5);
                            $pass = md5($password); //encrypted version for database entry


                            //sendmail
                            $to=$email;
                            $subject='Password Reset';
                            $status='A password reset information has been sent to your mail box';
                            $msg="Hi " . $username . ", \n\nYour password has been successfully changed. Please, log into your account to confirm. If you did not carryout this password change, if you no longer have access to your account.\n\nHere is your account information please keep this as you may need this at a later stage. \n\nYour username is $username \n\n your password is: " .  $password . " \n\nYour password has been reset please login and change your password.\n\n If you will require help, please contact the Admin using the Contact Us form on the website or Open a Ticket on your dashboard (recommended), or send an email ". $sitemail." .\n\nWishing you success,\n\nTeam ". $sitename." \n ". $websitelink;

                            $status=sendmail($to,$msg,$subject,$status);


                            $sql="UPDATE mlmadminusers SET password='$pass' WHERE username='$username'";
                            $result=mysql_query($sql) or die(mysql_error());
                            include $_SERVER['DOCUMENT_ROOT'] . "/cln-office/includes/resetpassword.php";
                        }else{
                           
                            $status="No matched record found";
                            include $_SERVER['DOCUMENT_ROOT'] . "/cln-office/includes/resetpassword.php"; 

                        }

                    }
                }else{
                    include $_SERVER['DOCUMENT_ROOT'] . "/cln-office/includes/resetpassword.php";    
                }
                
            }   
            ?>
            
        </div><!--loginbox-->                          
       
        <script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>
        <script src='/js/mlm.js'> </script>
    </body>
</html>

