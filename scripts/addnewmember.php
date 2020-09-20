<?php
error_reporting(0);
ini_set("display_errors", "off");
    
    $usernameErr=$emailErr=$passwordErr=$phoneErr=$confirmpasswordErr=$firstnameErr=$lastnameErr=$sponsoridErr=$epincodeErr='';
    
     //retrieve variables and validate
    $errors=0;
    $sponsorid=isset($_POST['sponsorid'])?$_POST['sponsorid']:'0';
    $sql="SELECT * FROM mlmmembers WHERE profileid='" . $sponsorid . "'";
    $result=mysql_query($sql) or die(mysql_error());
    $count=mysql_num_rows($result);

    if($count <=0){
        $sponsoridErr='Invalid Sponsor ID entered';
        $errors=1;
    }else{
        $rows=mysql_fetch_array($result);
        $sponsorid=$rows['profileid'];
        $referralid=$rows['userid'];
    }

    $username=isset($_POST['musername'])?($_POST['musername']):'';
    if(empty($username)){
        $usernameErr='Username cannot be empty';
        $errors=1;
    }

    $epincode=isset($_POST['epincode'])?($_POST['epincode']):'';
    if(empty($epincode)){
        $epincodeErr='e-Pin cannot be empty';
        $errors=1;
    }else{
        $sql="SELECT * FROM mlmepins WHERE pincode='" . $epincode . "' AND status='NOT USED' ANd blocked='NO'";
        $result=mysql_query($sql) or die(mysql_error());

        $count=mysql_num_rows($result);

        if($count<=0){
            $epincodeErr='e-Pin invalid/already used';
            $errors=1;
        }
    }                    

    $firstname=isset($_POST['mfirstname'])?($_POST['mfirstname']):'';
    if(empty($firstname)){
        $firstnameErr='First name cannot be empty';
        $errors=1;
    }
    $lastname=isset($_POST['mlastname'])?($_POST['mlastname']):'';
    if(empty($lastname)){
        $lastnameErr='Last name cannot be empty';
        $errors=1;
    }

    $sql="SELECT * FROM mlmmembers WHERE username='" . $username . "'";
    $result=mysql_query($sql) or die(mysql_error());
    $count=mysql_num_rows($result);

    if($count >=1){
        $usernameErr='Username already taken';
        $errors=1;
    }

    $emailaddress=isset($_POST['memailaddress'])?$_POST['memailaddress']:'';
    $emailaddress = filter_input(INPUT_POST, 'memailaddress', FILTER_VALIDATE_EMAIL);
    if ($emailaddress === false) {
        $emailErr= "Email address is invalid.";
         $errors=1;
    }
    $phoneno=isset($_POST['mphoneno'])?$_POST['mphoneno']:'na';        
    $accountname=isset($_POST['accountname'])?$_POST['accountname']:'na';
    $accountno=isset($_POST['accountno'])?$_POST['accountno']:'na';
    $bankname=isset($_POST['bankname'])?$_POST['bankname']:'na';
    $bankswiftcode=isset($_POST['bankswiftcode'])?$_POST['bankswiftcode']:'NA';

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
        $confirmpasswordErr='Password and Confirm Password not the identical';
        $errors=1;
    }

    $terms=isset($_POST['terms'])?$_POST['terms']:'';
    if(isset($_POST['terms']) && $_POST['terms']!=""){

    }else{
        $termsErr="You must accept in our Terms &amp; Condition to continue";
        $errors=1;
    }
    if(empty($terms)){
        $termsErr="You must accept in our Terms &amp; Condition to continue";
        $errors=1;
    }

    $terms=isset($_POST['terms'])?$_POST['terms']:'0';
    $l_member=isset($_POST['l_member'])?$_POST['l_member']:'';
    $r_member=isset($_POST['r_member'])?$_POST['r_member']:'';

    //check error count
    if($errors==1){
        include $_SERVER['DOCUMENT_ROOT'] . '/includes/registrationform5.inc.php';
    }else{
         $insertSQL="INSERT INTO mlmmembers(sponsorid,username,firstname, lastname, emailaddress, password, phoneno,datecreated, accountname, accountno, bankname, bankswiftcode,epinused,currentstage, terms) VALUES ('$sponsorid','$username', '$firstname', '$lastname', '$emailaddress', '$password', '$phoneno',CURDATE(), '$accountname', '$accountno', '$bankname', '$bankswiftcode','$epincode','Feeder', '$terms')";
        
        $result=mysql_query($insertSQL) or die(mysql_error()); 

        if(1==1){
            //create session variables
            $childuserid=$userid=mysql_insert_id();
            

            //generate profileid consists of YearMonthID
            $profileID= 'GBF'.date('Y').date('m'). str_pad($userid,5,'0',STR_PAD_LEFT);
            $sql="UPDATE mlmmembers SET profileid='$profileID' WHERE userid=$userid";
            $result=mysql_query($sql) or die(mysql_error());

            //update pin code as used
            mysql_query("UPDATE mlmepins SET status ='USED' WHERE pincode=$epincode");
            
           if($result){               
                
                $parentid=setparentid_new($sponsorid,$childuserid);
                 
                newmatrixbonus($parentid);
              
                $count=0;
                newrookmatrix();
                $count=0;
                newknightmatrix();
                $count=0;
                newbishopmatrix();
                $count=0;
                newkingmatrix();
                $count=0;
                newqueenmatrix();
               
                $count=0;
                newbegoniamatrix();
                $count=0;
                newcarnationmatrix();
                $count=0;
                newinfinitymatrix();
                
                registrationcalculation($childuserid);
                referralbonus($sponsorid,$childuserid);
                stepoutbonus($sponsorid);             
               
           }
            
            echo "<h3 class='color:green;'>New member added successfully.</h3>";
        }else{
            echo "<p>Error! pls try again</p>";
        }
    }
?>

