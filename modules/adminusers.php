<?php

    $section=isset($_GET['section'])?$_GET['section']:'na';

    if($section=='personalinfo'){
        echo "<h2>Personal Information</h2>";
        $usernameErr=$emailErr=$passwordErr=$phoneErr=$confirmpasswordErr=$firstnameErr=$lastnameErr=$sponsoridErr=$epincodeErr='';
        $errors=0;
        if(isset($_POST['submit'])){
            $adminuserid=$_POST['adminuserid'];
            $adminusername=isset($_POST['adminusername'])?$_POST['adminusername']:'na';
            $adminfirstname=isset($_POST['adminfirstname'])?$_POST['adminfirstname']:'na';
            $adminlastname=isset($_POST['adminlastname'])?$_POST['adminlastname']:'na';
            $adminemailaddress=isset($_POST['adminemailaddress'])?$_POST['adminemailaddress']:'na';
            $adminphoneno=isset($_POST['adminphoneno'])?$_POST['adminphoneno']:'na';


           
            if($errors==1){
                include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/adminpersonalform.inc.php";
            }else{
                $sql="UPDATE mlmadminusers SET firstname='$adminfirstname', lastname='$adminlastname', emailaddress='$adminemailaddress', phoneno='$adminphoneno' WHERE userid=$adminuserid";
                $result=mysql_query($sql) or die(mysql_error());

                if($result){
                    echo "<h3 style='color:green'>Congratulations! Your Personal Information successfully updated.</h3>";

                    //header("Refresh: ")
                }
            }


        }else{
            $sql="SELECT * FROM mlmadminusers WHERE userid=" . $_SESSION['loginid'];
            $result=mysql_query($sql) or die(mysql_error());
            if($result){
                $rows=mysql_fetch_array($result);
                $adminusername=$rows['username'];
                $adminfirstname=$rows['firstname'];
                $adminlastname=$rows['lastname'];
                $adminemailaddress=$rows['emailaddress'];
                $adminphoneno=$rows['phoneno'];

                include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/adminpersonalform.inc.php";
            }
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
                $sql="SELECT * FROM mlmadminusers WHERE userid=" . $_SESSION['loginid'];
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
                include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/changememberpassword.inc.php";    
            }else{
                $sql="UPDATE mlmadminusers SET password='$newpassword' WHERE userid=" . $_SESSION['loginid'];
                $result=mysql_query($sql) or die(mysql_error());

                if($result){
                    echo "<h3>Congratulations</h3>";
                    echo "<p>Password successfully changed</p>";
                }
            }

        }else{
            include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/changememberpassword.inc.php";

        }
    }elseif ($section=='changepix') {
        # code...
        echo "<h2>Upload/Change Profile Picture</h2>";

       if(isset($_POST['submit']) && $_POST['submit']=='Upload Picture'){
           
            if(isset($_FILES['picture']['name'])){
                $name=$_FILES['picture']['name'];
                $size=$_FILES['picture']['size'];
                $ext=getExtension($name);
                $_FILES['picture']['tmp_name'];

                $allowed_ext= array("png","jpg","jpeg");

                if($size <(1024*1024)){
                    $new_image='';
                    $new_name=md5(rand()) . '.' . $ext;
                    $path = $_SERVER['DOCUMENT_ROOT'] . "/passports/" . $new_name;
                    list($width,$height)=getimagesize($_FILES['picture']['tmp_name']);

                    if($ext=='jpg' || $ext='jpeg'){
                        $new_image=imagecreatefromjpeg($_FILES['picture']['tmp_name']);
                    }
                    if($ext=='png'){
                        $new_image=imagecreatefrompng($_FILES['picture']['tmp_name']);
                    }
                    $new_width=200;
                    $new_height=($height/$width)*$new_width;
                    $tmp_image=imagecreatetruecolor($new_width, $new_height);
                    imagecopyresampled($tmp_image, $new_image, 0, 0,0, 0, $new_width, $new_height, $width,$height);
                    imagejpeg($tmp_image,$path,100);
                    imagedestroy($new_image);
                    imagedestroy($tmp_image);
                    
                    $sql="UPDATE mlmadminusers SET passport='$new_name' WHERE userid=" . $_SESSION['loginid'];
                    $result=mysql_query($sql) or die(mysql_error());

                    if($result){
                        ?>
                            <div class="profileimage" style="width: 140px;border: 0px solid #ccc;padding: 5px;">
                                <?php
                                    echo '<img src="/passports/' . $new_name . '"  style="width: 140px;height:140px;border-radius: 50%;"/>';
                                ?>                                
                            </div>
                        <?php
                        include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/uploadpicture.inc.php";
                    }
                }else{
                    echo "Image file Size must be less than 1MB";
                }

            }
            /*if(isset($_FILES['picture']['name'])){
                $name=
            }*/

        }else{
            $sql="SELECT * FROM mlmadminusers WHERE userid=" . $_SESSION['loginid'];
            $result=mysql_query($sql) or die(mysql_error());
            if($result){
                $rows=mysql_fetch_array($result);
                
                $passport=$rows['passport'];
                ?>
                <div class="profileimage" style="width: 140px;border: 0px solid #ccc;padding: 5px;">
                    <img src="/passports/<?php echo $passport;?>" style='width: 140px;height:140px;border-radius: 50%;'>
                </div>
                <?php

                include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/uploadpicture.inc.php";
            }
            
        }
        
    }
    
?>
                        
                
