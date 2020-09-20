<?php
    error_reporting(0);
    // ini_set("display_errors",0);
    
    session_start();
    date_default_timezone_set('Africa/johanessburg');
    include $_SERVER['DOCUMENT_ROOT'] . "/dbcon/conn.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/var/functions.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/var/vars.php";
    //include $_SERVER['DOCUMENT_ROOT'] . "/scripts/arraylist.php";    //$userid=1;

   // header('/login.php');
    header('Refresh: 0;url=/login.php');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <title><?php echo $sitename;?> | User registration </title>
        <link href="/css/sb-admin-2.min.css" rel="stylesheet" type="text/css" />
        <link href="/icofont/css/icofont.css" rel="stylesheet" type="text/css"/>
        <style type="text/css">
            * {font-family: Arial;box-sizing: border-box;}
            .errors {font-weight: normal;font-size: .90em;margin-left: 5px;color: red;}

            @media screen and (max-width: 480px){
               .registrationform .control {float: left;width: 100%;padding: 0 1%;float: none;} 
            }
        </style>           
    </head>
    <body class="bg-gradient-primary">    
        <!-- <div > -->
            <?php
                $usernameErr=$emailErr=$passwordErr=$phoneErr=$confirmpasswordErr=$firstnameErr=$lastnameErr=$sponsoridErr='';
                $errors=0;

                
                if(isset($_POST['doregister'])){
                     //check sponsor
                    $sponsorid=isset($_POST['sponsorid'])?$_POST['sponsorid']:'0';
                    $sqlSpo=mysqli_query($con,"SELECT * FROM mlmmembers WHERE profileid='" . $sponsorid . "'");
                    $count=mysqli_num_rows($sqlSpo);

                    if($count>"0"){
                        while ($row = $sqlSpo->fetch_assoc()) {
                            //  sponsor details
                            $sUsername=$row['username'];
                            $sponsorid=$row['profileid'];
                            $referralid=$row['userid'];
                        }
                    }
                    else{
                        echo $sponsoridErr='Invalid Sponsor ID entered';
                        $errors=1;
                    }

                    // validate new user details
                    $username=isset($_POST['username'])?($_POST['username']):'';               
                    $firstname=isset($_POST['firstname'])?($_POST['firstname']):'';
                    $lastname=isset($_POST['lastname'])?($_POST['lastname']):'';

                    $checkUsername=mysqli_query($con,"SELECT * FROM mlmmembers WHERE username='" . $username . "'");
                    $countUser=mysqli_num_rows($checkUsername);
                    if($countUser >=1){
                       $usernameErr='Username already taken';
                        $errors=1;
                    }
                    
                    $emailaddress=isset($_POST['emailaddress'])?$_POST['emailaddress']:'';
                    $emailaddress = filter_input(INPUT_POST, 'emailaddress', FILTER_VALIDATE_EMAIL);
                    if ($emailaddress === false) {
                        $emailErr= "Email address is invalid.";
                         $errors=1;
                    }
                    $checkEmail=mysqli_query($con,"SELECT * FROM mlmmembers WHERE emailaddress='" . $emailaddress . "'");
                    $countEmail=mysqli_num_rows($checkEmail);
                    if($countEmail >=1){
                        $emailErr='Email address already taken';
                        $errors=1;
                    }

                    $phoneno=isset($_POST['phoneno'])?$_POST['phoneno']:'na';
                    
                    if(empty($_POST['password'])){
                        $passwordErr="Password required";
                        $errors=1;
                    }else{
                        $password=testinput(md5($_POST['password']));
                    }

                    if(empty($_POST['confirmpassword'])){
                       $confirmpasswordErr="Confirm password required!";
                        $errors=1;
                    }else{
                        $confirmpassword=testinput(md5($_POST['confirmpassword']));
                    }                               

                    if($password!=$confirmpassword){
                        $confirmpasswordErr='Passwords do not match.';
                        $errors=1;
                    }

                    $l_member=isset($_POST['l_member'])?$_POST['l_member']:'NA';
                    $r_member=isset($_POST['r_member'])?$_POST['r_member']:'NA';

                    $totalMembersQ=mysqli_query($con,"SELECT * FROM mlmmembers");
                    $totalMembers=mysqli_num_rows($totalMembersQ);

                    $memberRegNo = $totalMembers+1;

                    $bt1 = "100";
                    $bt2 = $bt1 * 3;
                    $bt3 = $bt2 * 3;
                    $bt4 = $bt3 * 3;
                    $bt5 = $bt4 * 3;
                    $bt6 = $bt5 * 3;
                    $bt7 = $bt6 * 3;
                    $bt8 = $bt7 * 3;
                    $bt9 = $bt8 * 3;
                    $bt10 = $bt9 * 3;
                    $bt11 = $bt10 * 3;
                    $bt12 = $bt11 * 3;
                    $bt13 = $bt12 * 3;
                    $bt14 = $bt13 * 3;
                    $bt15 = $bt14 * 3;
                    $bt16 = $bt15 * 3;
                    $bt17 = $bt16 * 3;
                    $bt18 = $bt17 * 3;
                    $bt19 = $bt18 * 3;
                    $bt20 = $bt19 * 3;
                    $bt21 = $bt20 * 3;
                    $bt22 = $bt21 * 3;
                    $bt23 = $bt22 * 3;
                    $bt24 = $bt23 * 3;

                    if ($memberRegNo<$bt1 || $memberRegNo == $bt1) {
                        $memberBatchNo = "1";
                    }
                    elseif ($memberRegNo<$bt2 || $memberRegNo == $bt2) {
                        $memberBatchNo = "2";
                    }
                    elseif ($memberRegNo<$bt3 || $memberRegNo == $bt3) {
                        $memberBatchNo = "3";
                    }
                    elseif ($memberRegNo< $bt4 || $memberRegNo == $bt4) {
                        $memberBatchNo = "4";
                    }
                    elseif ($memberRegNo< $bt5 || $memberRegNo == $bt5) {
                        $memberBatchNo = "5";
                    }
                    elseif ($memberRegNo< $bt6 || $memberRegNo == $bt6) {
                        $memberBatchNo = "6";
                    }
                    elseif ($memberRegNo<$bt7 || $memberRegNo == $bt7) {
                        $memberBatchNo = "7";
                    }
                    elseif ($memberRegNo<$bt8 || $memberRegNo == $bt8) {
                        $memberBatchNo = "8";
                    }
                    elseif ($memberRegNo< $bt9 || $memberRegNo == $bt9) {
                        $memberBatchNo = "9";
                    }
                    elseif ($memberRegNo< $bt10 || $memberRegNo == $bt10) {
                        $memberBatchNo = "10";
                    }
                    elseif ($memberRegNo< $bt11 || $memberRegNo == $bt11) {
                        $memberBatchNo = "11";
                    }
                    elseif ($memberRegNo<$bt12 || $memberRegNo == $bt12) {
                        $memberBatchNo = "12";
                    }
                    elseif ($memberRegNo<$bt13 || $memberRegNo == $bt13) {
                        $memberBatchNo = "13";
                    }
                    elseif ($memberRegNo< $bt14 || $memberRegNo == $bt14) {
                        $memberBatchNo = "14";
                    }
                    elseif ($memberRegNo< $bt15 || $memberRegNo == $bt15) {
                        $memberBatchNo = "15";
                    }
                    elseif ($memberRegNo< $bt16 || $memberRegNo == $bt16) {
                        $memberBatchNo = "16";
                    }
                    elseif ($memberRegNo< $bt17 || $memberRegNo == $bt17) {
                        $memberBatchNo = "17";
                    }
                    elseif ($memberRegNo< $bt18 || $memberRegNo == $bt18) {
                        $memberBatchNo = "18";
                    }
                    elseif ($memberRegNo< $bt19 || $memberRegNo == $bt19) {
                        $memberBatchNo = "19";
                    }
                    elseif ($memberRegNo<$bt20 || $memberRegNo == $bt20) {
                        $memberBatchNo = "20";
                    }
                    elseif ($memberRegNo<$bt21 || $memberRegNo == $bt21) {
                        $memberBatchNo = "21";
                    }
                    elseif ($memberRegNo< $bt22 || $memberRegNo == $bt22) {
                        $memberBatchNo = "22";
                    }
                    elseif ($memberRegNo< $bt23 || $memberRegNo == $bt23) {
                        $memberBatchNo = "23";
                    }
                    elseif ($memberRegNo< $bt24 || $memberRegNo == $bt24) {
                        $memberBatchNo = "24";
                    }else{
                        $memberBatchNo = "25";
                    }

                    //check error count
                    if($errors==1){
                        echo "<p class='alert alert-danger'><b>Errors found!</b> Check form and try again.</p>";
                        include $_SERVER['DOCUMENT_ROOT'] . '/includes/registrationform.inc.php';
                    }
                    else{
                        //echo "No errors found";
                        $profileID = $username;

                        if($insertSQL= mysqli_query($con,"INSERT INTO mlmmembers(sponsorid,username,firstname, lastname, emailaddress, password, phoneno,datecreated, batch, terms, memberregno) VALUES ('$sponsorid','$username', '$firstname', '$lastname', '$emailaddress', '$password', '$phoneno',CURDATE(),'$memberBatchNo', '$terms','$memberRegNo')")){
                           
                            //create session variables
                            $_SESSION['userid']=$userid=mysqli_insert_id();
                            $_SESSION['username']=$username;
                            $_SESSION['logged']=1;
                            
                            if($insertSQL){
                                header('Location: /index.php');
                            }else{
                                echo "<p class='alert alert-danger'>Error! <b>".$username.","."</b> could not add user profile ID <b>(".$profileID.")</b>, pls try again or contact IT Department</p>";
                                include $_SERVER['DOCUMENT_ROOT'] . '/includes/registrationform.inc.php';
                            }
                            
                        }else{
                            echo "<p class='alert alert-danger'>Error! could not add user records, pls try again or contact IT Department</p>";
                        }
                    }
                    
                }
                else{
                    include $_SERVER['DOCUMENT_ROOT'] . '/includes/registrationform.inc.php';
                }

            ?>      
            
        <div id="footer">
            <h2><p href="http://<?php echo $websitelink;?>">&copy 2020 | <?php echo $sitename;?>. All rights reserved.</p></h2>
        </div><!--footer-->
        <script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>
        <!--<script src='/js/mlm.js'> </script>-->

        <script type="text/javascript">
            
            $(document).ready(function(){
                //alert("Hellow");

                /*$("#username").on("blur",function(){
                    var profileid=$('#sponsorid').val();
                    alert(profileid);
                    var data='profileid='+profileid;
                    $.ajax({
                        url:'/scripts/populateparent.php',
                        type: 'POST',
                        data : data,
                        //beforeSend
                        success: function(response){
                            $('#parentid').html(response);
                        }
                    })
                })*/

                $("#sponsorid").on("blur",function(){
                    var sponsorid=$(this).val();
                    
                    var data='sponsorid='+sponsorid;
                    $.ajax({
                        url:'/scripts/sponsorid.php',
                        type: 'POST',
                        data : data,
                        //beforeSend: function() {
                        //    $('#sponsoridErr').text('Searching... Pls wait...');
                        //},
                        success: function(response){
                            $('#sponsoridErr').html(response);
                        }
                    })
                })


                $(".user #checksponsor").on('change',function(){
                    if(this.checked){
                        //$('#sponsorid').val('RL20180300001');
                        //$('input#sponsorid').prop({'readonly':true});
                        //var data='sponsorid='+sponsorid;
                        $.ajax({
                            url:'/scripts/adminsponsor.php',
                            //type: 'POST',
                            //data : data,
                            beforeSend: function() {
                                $('#sponsoridErr').text('Searching... Please wait...');
                            },
                            success: function(response){
                                $('#sponsorid').val(response);
                                 $('#sponsoridErr').text('');
                            }
                        })
                    }else{
                        $('#sponsorid').val('');
                    }
                })
                
            });
        </script>
    </body>
</html>

