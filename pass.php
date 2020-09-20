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
        <title><?php echo $sitename;?> | Login</title>
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <link href="/icofont/css/icofont.css" rel="stylesheet" type="text/css"/>
              
    </head>
    <body class="bg-gradient-primary">        
        <?php
            unset($_SESSION['username']);
            unset($_SESSION['userid']);
            unset($_SESSION['logged']);
            //$section=isset($_GET['section'])?$_GET['section']:'';
            
            $usernameErr=$passwordErr=$error='';

            if(isset($_POST['pass'])){
                $usernameErr=$passwordErr=$error='';
                $username=$_POST['username'];

                $sqlLGN=mysqli_query($con,"SELECT * FROM mlmmembers WHERE username='$username'");

                if($rows=mysqli_num_rows($sqlLGN)>0){  
                    echo "Username found!";
                    
                    $sqlLGN=mysqli_query($con,"SELECT * FROM mlmmembers WHERE username='$username'");                      
                    if($rows=mysqli_num_rows($sqlLGN)>0){ 
                        while ($row = $sqlLGN->fetch_assoc()) {
                            $_SESSION['userid']=$row['userid'];
                            $_SESSION['logged']=1;
                            $_SESSION['username']=$row['username'];

                            $error="<p class='alert alert-success'>Login successful!</p>";
                            include $_SERVER['DOCUMENT_ROOT'] . "/includes/loginform.inc.php";
                            header('Refresh: 1;url=/index.php');
                        }
                    }
                }
                else{
                    header('Refresh: 1;url=/pass.php');    
                }
        
            }                       
            
        ?> 
        <form action="" method="POST">
            <br><br><br><br>
            <input name="username" style="margin-left:10%;" type="text" placeholder="Enter username" name="password" class="form-group" />
            <button name="pass">Login</button>
        </form>
        <script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>
        <script src='/js/mlm.js'> </script>
    </body>
</html>

