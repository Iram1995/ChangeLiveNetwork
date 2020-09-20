<?php   
    //echo "Hello";
    //echo md5('admin');
   // ini_set("display_errors", 0);
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
   $newMemberErrMSG = "";
   $demailErr = "";
   $dusernameErr = "";
   $dpass2Err = "";
   $errors = "";
   
//   if($username==""){
//             echo $dusernameErr="<p class='alert alert-danger'><b>Session expired! Please login again to continue.</b></p>";
//              $errors=1;
//     }

   if(isset($_POST['addmember'])){
        $dfname=$_POST['dfname'];
        $dlname=$_POST['dlname'];
        $dphone=$_POST['dphone'];
        $dusername=$_POST['dusername']; 
        
        // if($username==""){
        //     echo $dusernameErr="<p class='alert alert-danger'><b>Session expired! Please login again to continue.</b></p>";
        //      $errors=1;
        // }

        $checkUsername=mysqli_query($con,"SELECT * FROM mlmmembers WHERE username='" . $dusername . "'");
        $countUser=mysqli_num_rows($checkUsername);
        if($countUser >=1){
            echo $dusernameErr="<p class='alert alert-danger'><b>Username already taken</b></p>";
             $errors=1;
            //echo "new username is: ".$dusername=$dusername+1;
        }
                    
        $demail=$_POST['demail'];
        $demail = filter_input(INPUT_POST, 'demail', FILTER_VALIDATE_EMAIL);
        if ($demail === false) {
            echo $demailErr= "<p class='alert alert-danger'><b>Email address is invalid.</b></p>";
            $errors=1;
        }
        $checkEmail=mysqli_query($con,"SELECT * FROM mlmmembers WHERE emailaddress='" . $demail . "'");
        $countEmail=mysqli_num_rows($checkEmail);
        if($countEmail >=1){
            echo $emailErr="<p class='alert alert-danger'><b>Email address already taken</b></p>";
            $errors=1;
        }
                    
        $dpass=testinput(md5($_POST['dpass']));
        $dpass2=testinput(md5($_POST['dpass2']));
  
        if($dpass!=$dpass2){
            echo $dpass2Err="<p class='alert alert-danger'><b>Passwords do not match.</b></p>";
            $errors=1;
        }

        $dterms = "1";

        $l_member=isset($_POST['l_member'])?$_POST['l_member']:'NA';
        $r_member=isset($_POST['r_member'])?$_POST['r_member']:'NA';

        $totalMembersQ=mysqli_query($con,"SELECT * FROM mlmmembers");
        $totalMembers=mysqli_num_rows($totalMembersQ);

        $memberRegNo = $totalMembers+1;

        $bt1 = "100";
        $bt2 = $bt1+300;
        $bt3 = $bt2+900;
        $bt4 = $bt3+2700;
        $bt5 = $bt4+8100;
        $bt6 = $bt5+24300;
        $bt7 = $bt6+72900;
        $bt8 = $bt7+218700;
        $bt9 = $bt8+656100;
        $bt10 = $bt9+1968300;
        $bt11 = $bt10+5904900;
        $bt12 = $bt11+17714700;
        $bt13 = $bt12+53144100;

        if ($totalMembers<$bt1) {
            $memberBatchNo = "1";
        }
        elseif ($totalMembers<$bt2) {
            $memberBatchNo = "2";
        }
        elseif ($totalMembers<$bt3) {
            $memberBatchNo = "3";
        }
        elseif ($totalMembers<$bt4) {
            $memberBatchNo = "4";
        }
        elseif ($totalMembers<$bt5) { 
            $memberBatchNo = "5";
        }
        elseif ($totalMembers<$bt6) {
            $memberBatchNo = "6";
        }
        elseif ($totalMembers<$bt7) {
            $memberBatchNo = "7";
        }
        elseif ($totalMembers<$bt8) {
            $memberBatchNo = "8";
        }
        elseif ($totalMembers<$bt9) {
            $memberBatchNo = "9";
        }
        elseif ($totalMembers<$bt10) {
            $memberBatchNo = "10";
        }
        elseif ($totalMembers<$bt11) {
            $memberBatchNo = "11";
        }
        elseif ($totalMembers<$bt12) {
            $memberBatchNo = "12";
        }
        elseif ($totalMembers<$bt13) {
            $memberBatchNo = "13";
        }
        
        $target_date = "";
        $target_date = date('Y-m-d H:i:s', strtotime($target_date . ' +5 day'));

        //check error count
        if($errors==1){
            $newMemberErrMSG = "<p class='alert alert-danger'><b>Errors found!</b> Check form and try again.</p>";
        }else{
            //echo "No errors found";
            // first Get The first tree with <3 downliners 

            if($zSQL = mysqli_query($con,"SELECT * FROM mlmmembers WHERE treecount<'3' AND treecompleted='0' order by userid ASC LIMIT 1")){

                while ($zROWS = mysqli_fetch_assoc($zSQL)){
                    $parent_Userid = $zROWS['userid'];
                    $parent_treecount = $zROWS['treecount'];
                    $current_tree = $zROWS['treenumber'];
                }

                $sysError = "";
                if ($parent_treecount=="0") {
                    // add last 3 downliner
                    if($zSQLtreecount = mysqli_query($con,"UPDATE mlmmembers SET treecount='1' WHERE userid=$parent_Userid")){
                       // echo "<p class='alert alert-success'>Tree number ".$current_tree." is completed.</p>";
                    }else{
                        echo "<p class='alert alert-danger'>System could not update tree ".$current_tree." treecount column</p>";
                        $sysError=1;
                    }
                }
                elseif ($parent_treecount=="1") {
                    // add last 3 downliner
                    if($zSQLtreecount = mysqli_query($con,"UPDATE mlmmembers SET treecount='2' WHERE userid=$parent_Userid")){
                       // echo "<p class='alert alert-success'>Tree number ".$current_tree." is completed.</p>";
                    }else{
                        echo "<p class='alert alert-danger'>System could not update tree ".$current_tree." treecount column.</p>";
                        $sysError=1;
                    }
                }
                elseif ($parent_treecount=="2") {
                    // add last 3 downliner
                    if($zSQLtreecount = mysqli_query($con,"UPDATE mlmmembers SET treecount='3', treecompleted='1' WHERE userid=$parent_Userid")){
                     //   echo "<p class='alert alert-success'>Tree number ".$current_tree." is completed.</p>";
                    }else{
                        echo "<p class='alert alert-danger'>System could not update tree ".$current_tree." treecount column. .</p>";
                        $sysError=1;
                    }
                }else{
                    echo "<p class='alert alert-danger'>System could not update tree ".$current_tree." treecount column..</p>";
                    $sysError=1;
                    
                }

                $dsponsorid = $username;
                $phase1 = "Phase 1";

                if ($sysError==1) {
                    echo $newMemberErrMSG = "<p class='alert alert-danger'><b>Update Errors found!</b> Try again.</p>";
                }else{
                    if($insertSQL1=mysqli_query($con,"INSERT INTO mlmmembers(sponsorid, parentid, currentstage, username, profileid, firstname, lastname, emailaddress, password, phoneno, status, datecreated, batch, terms, memberregno, activation, targetdate, treecount, treenumber,treecompleted,phase1completed,phase2completed,phase3completed) VALUES ('$dsponsorid','$parent_Userid','$phase1','$dusername','$dusername', '$dfname', '$dlname', '$demail', '$dpass','$dphone','1',CURDATE(),'$memberBatchNo', '$dterms','$memberRegNo','0','$target_date','0','$memberRegNo','0','0','0','0')")){
    
                     //create session variables
                        $duserid=mysqli_insert_id(); 
                        $newMemberErrMSG = "<p class='alert alert-success'><b>Good job!</b> Member added successfully..</p>";
                        // header("Refresh:0; url=/profile.php#passwords");
                        // we can also send email notification here
                    }
                    else{
                        echo $newMemberErrMSG = "<p class='alert alert-danger'>Error! <b>".$dusername.","."</b> could not be added. Pls try again or contact IT Department</p>";  
                    }
                }
            }
        }
}
?>

<?php
	
	include 'user-style/add_members.php';

?>