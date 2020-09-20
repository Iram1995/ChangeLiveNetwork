<?php

    $section=isset($_GET['section'])?$_GET['section']:'na';

    if($section=='personal'){
        echo "<h2>Personal Information</h2>";
        $sql="SELECT * FROM mlmmembers WHERE userid=$userid";
        $result=mysql_query($sql) or die(mysql_error());
        if($result){
            $rows=mysql_fetch_array($result);
            $firstname=$rows['firstname'];
            $lastname=$rows['lastname'];
            $emailaddress=$rows['emailaddress'];
            $phoneno=$rows['phoneno'];
            $datejoin=$rows['datecreated'];
            $passport=$rows['passport'];

            ?>
                <form class="registrationform">
                    <div class="control-group">
                        <div class="control">
                            <p>First Name</p>
                            <input type="text" name="firstname" value="<?php echo $firstname;?>" disabled='disabled'>
                        </div>
                        <div class="control">
                            <p>Last Name</p>
                            <input type="text" name="lastname" value="<?php echo $lastname;?>" disabled='disabled'>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control">
                            <p>eMail Address</p>
                            <input type="text" name="emailaddress" value="<?php echo $emailaddress;?>" disabled='disabled'>
                        </div>
                        <div class="control">
                            <p>Phone Number</p>
                            <input type="text" name="phoneno" value="<?php echo $phoneno;?>" disabled='disabled'>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="control">
                            <p>Date Joined</p>
                            <input type="text" name="datejoin" value="<?php echo $datejoin;?>" disabled='disabled'>
                        </div>
                        
                    </div>
                </form>
            <?php
        }

    }elseif ($section=='changepassword') {
        # code...
        echo "<h2>Change Password</h2>";

        $userid=isset($userid)?$userid:'0';
        $errors=0;
        $oldpassword=$newpassword=$confirmpassword='';
        $oldpasswordErr=$newpasswordErr=$confirmpasswordErr='';
        if(isset($_POST['submit'])){
            $oldpassword=isset($_POST['oldpassword'])?$_POST['oldpassword']:'';
            if(empty($oldpassword)){
                $oldpasswordErr='Enter Old Password';
                $errors=1;
            }else{
                $sql="SELECT * FROM mlmmembers WHERE userid=".$userid;
                $result=mysql_query($sql) or die(mysql_error());

                if($result){
                    $rows=mysql_fetch_array($result);
                    $password = ($rows['password']);
                }

                if(md5($oldpassword)!=$password){
                    $oldpasswordErr="Old Password not valid";
                    $errors=1;
                }
            }

            $newpassword=isset($_POST['newpassword'])?$_POST['newpassword']:'';
            if(empty($newpassword)){
                $newpasswordErr='Enter New Password';
                $errors=1;
            }else{
                $newpassword=md5($newpassword);
            }
            $confirmpassword=isset($_POST['confirmpassword'])?$_POST['confirmpassword']:'';
            if(empty($confirmpassword)){
                $confirmpasswordErr='Confirm Password Cannot be blank';
                $errors=1;
            }elseif ($newpassword != md5($confirmpassword)) {
                # code...
                $confirmpasswordErr='Passwords do not match';
                $errors=1;
            }


            if($errors==1){
                include $_SERVER['DOCUMENT_ROOT'] . "/includes/changememberpassword.inc.php";    
            }else{
                $sql="UPDATE mlmmembers SET password='$newpassword' WHERE userid=$userid";
                $result=mysql_query($sql) or die(mysql_error());

                if($result){
                    echo "<h3>Congratulations</h3>";
                    echo "<p>Password successfully changed</p>";
                }
            }

        }else{
            include $_SERVER['DOCUMENT_ROOT'] . "/includes/changememberpassword.inc.php";

        }
    }elseif ($section=='bankinfo') {
        # code...
        echo "<h2>Bank Information</h2>";

        $sql="SELECT * FROM mlmmembers WHERE userid=$userid";
        $result=mysql_query($sql) or die(mysql_error());

        if($result){
            $rows=mysql_fetch_array($result);
            $accountname=$rows['accountname'];
            $accountno=$rows['accountno'];
            $bankname=$rows['bankname'];
            $bankswiftcode=$rows['bankswiftcode'];
        }

        ?>
            <form class="registrationform">
                <div class="control-group">
                    <div class="control">
                        <p>Account Name</p>
                        <input type="text" name="accountname" value="<?php echo($accountname);?>" disabled='disabled'>
                    </div>
                    <div class="control">
                        <p>Account Number</p>
                        <input type="text" name="accountno" value="<?php echo($accountno);?>" disabled='disabled'>
                    </div>
                </div>
                 <div class="control-group">
                    <div class="control">
                        <p>Bank Name</p>
                        <input type="text" name="bankname" value="<?php echo($bankname);?>" disabled='disabled'>
                    </div>
                    <div class="control">
                        <p>Bank Swift Code</p>
                        <input type="text" name="bankswiftcode" value="<?php echo($bankswiftcode);?>" disabled='disabled'>
                    </div>
                </div>
            </form>
        <?php
    }elseif ($section=='uploadprofilepix') {
        # code...
        echo "<h2>Upload/Change Profile Picture</h2>";
        $sql="SELECT * FROM mlmmembers WHERE userid=$userid";
        $result=mysql_query($sql) or die(mysql_error());
        if($result){
            $rows=mysql_fetch_array($result);
            
            $passport=$rows['passport'];
            ?>
            <div class="profileimage" style="width: 140px;border: 0px solid #ccc;padding: 5px;">
                <img src="/images/<?php echo $passport;?>" style='width: 120px;height: auto;border-radius: 50%;'>
            </div>

            <form name="uploadpix" enctype="multipart/form-data " action="" method="post" class="registrationform">
                <div class="control-group">
                    <div class="control">
                        <input type="file" name="picture">
                    </div>
                </div>
                
            </form>
            <?php

        }
    }
    
?>
                        
                
