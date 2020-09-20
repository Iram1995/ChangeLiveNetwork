<?php

    $section=isset($_GET['section'])?$_GET['section']:'na';

    if($section=='personal'){
        echo "<h2>Personal Information</h2>";
        $usernameErr=$emailErr=$passwordErr=$phoneErr=$confirmpasswordErr=$firstnameErr=$lastnameErr=$sponsoridErr=$epincodeErr='';
        $errors=0;
        if(isset($_POST['submit'])){

            $firstname=isset($_POST['firstname'])?($_POST['firstname']):'';
            if(empty($firstname)){
                $firstnameErr='First name cannot be empty';
                $errors=1;
            }

            $lastname=isset($_POST['lastname'])?($_POST['lastname']):'';
            if(empty($lastname)){
                $lastnameErr='Last name cannot be empty';
                $errors=1;
            }


            $emailaddress=isset($_POST['emailaddress'])?$_POST['emailaddress']:'';
            $emailaddress = filter_input(INPUT_POST, 'emailaddress', FILTER_VALIDATE_EMAIL);
            if ($emailaddress === false) {
                $emailErr= "Email address is invalid.";
                $errors=1;
            }

            $phoneno=isset($_POST['phoneno'])?$_POST['phoneno']:'na';
            $city=isset($_POST['city'])?$_POST['city']:'NA';

            $address=isset($_POST['address'])?$_POST['address']:'na';                    
            $country=isset($_POST['country'])?$_POST['country']:'NA';                    

            $gender=isset($_POST['gender'])?$_POST['gender']:'NA';
            $dob=isset($_POST['dob'])?$_POST['dob']:'0000-00-00';
            $zipcode=isset($_POST['zipcode'])?$_POST['zipcode']:'NA';
            $nomineename=isset($_POST['nomineename'])?$_POST['nomineename']:'NA';
            $nomineephoneno=isset($_POST['nomineephoneno'])?$_POST['nomineephoneno']:'NA';
            $relationship=isset($_POST['relationship'])?$_POST['relationship']:'NA';
            $nomineeaddress=isset($_POST['nomineeaddress'])?$_POST['nomineeaddress']:'NA';
           
            if($errors==1){
                include $_SERVER['DOCUMENT_ROOT'] . "/includes/personalform.php";
            }else{
                $sql="UPDATE mlmmembers SET firstname='$firstname', lastname='$lastname', emailaddress='$emailaddress', phoneno='$phoneno', country='$country', nomineename='$nomineename', nomineephoneno='$nomineephoneno', relationship='$relationship', nomineeaddress='$nomineeaddress', dob='$dob', city='$city', gender='$gender' WHERE userid=$userid";
                $result=mysql_query($sql) or die(mysql_error());

                if($result){
                    echo "<h3 style='color:green'>Congratulations! Your Personal Information successfully updated.</h3>";

                    //header("Refresh: ")
                }
            }


        }else{
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
                $country=$rows['country'];
                $city=$rows['city'];
                $nomineename=$rows['nomineename'];
                $nomineephoneno=$rows['nomineephoneno'];
                $relationship=$rows['relationship'];
                $nomineeaddress=$rows['nomineeaddress'];
                $gender=$rows['gender'];


                include $_SERVER['DOCUMENT_ROOT'] . "/includes/personalform.php";
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

        if(isset($_POST['submit'])){

            $accountname=isset($_POST['accountname'])?$_POST['accountname']:'na'; 
            $accountno=isset($_POST['accountno'])?$_POST['accountno']:'na';
            $bankname=isset($_POST['bankname'])?$_POST['bankname']:'na';
            $bankswiftcode=isset($_POST['bankswiftcode'])?$_POST['bankswiftcode']:'NA';
            $sql="UPDATE mlmmembers SET accountname='$accountname', accountno='$accountno', bankname='$bankname', bankswiftcode='$bankswiftcode' WHERE userid=$userid";
            $result=mysql_query($sql) or die(mysql_error());
            
            if($result){
                echo "<h3 style='color:green;'>Your Bank Account Information successfully updated</h3>";

            }else{
                echo "<h3 style='color:red;>Error updating your Bank Account Information.</h3>";
            }

        }else{
            $sql="SELECT * FROM mlmmembers WHERE userid=$userid";
            $result=mysql_query($sql) or die(mysql_error());           

            if($result){
                $rows=mysql_fetch_array($result);
                $accountname=$rows['accountname'];
                $accountno=$rows['accountno'];
                $bankname=$rows['bankname'];
                $bankswiftcode=$rows['bankswiftcode'];
            }

           include $_SERVER['DOCUMENT_ROOT'] . "/includes/bankform.php";    
        }
        
    }elseif ($section=='uploadprofilepix') {
        # code...
        echo "<h2>Upload/Change Profile Picture</h2>";

       if(isset($_POST['submit']) && $_POST['submit']=='Upload Picture'){
            //echo "Submiited";
            /*$image=$_FILES['picture']['name'];
            if(empty($image)){
                $errors="File is empty, please select image to upload.";
            }else if($_FILES['picture']['type']=="application/msword"){
                $errors="Invalid image type,use (e.g. png, jpeg, gif).";
            }else if($_FILES['picture']['error']>0){
                $errors="Oops sorry, seem there is an error upload your image, please try again later";
            }else{
                $filename=stripslashes($_FILES['picture']['name']);
                $ext=get_file_extension($filename);
                echo "---" . $ext=strtolower($ext);
            }*/

            /*$upload_image = $_FILES["picture"]["name"];

            $folder= $_SERVER['DOCUMENT_ROOT'] . "/passports/";
            move_uploaded_file($_FILES["picture"]["tmp_name"], "$folder".$_FILES["picture"]["name"]);

            $file="/passports/".$_FILES['picture']['name'];

            $uploadimage=$folder.$_FILES['picture']['name'];
            $newname=$_FILES['picture']['name'];

            //set the resize image name
            $resize_image=$folder.$newname."_resize.jpg";
            $actual_image=$folder.$newname.".jpg";
            $upload_image = $_FILES['picture']['tmp_name'];

            //it gets the size of the image
            list($width,$height)=getimagesize($uploadimage);
            //echo "W" . $width;
            $newwidth=100;
            $newheight=($height/$width)*$newwidth;

            $thumb=imagecreatetruecolor($newwidth, $newheight);
            $source=imagecreatefromjpeg($upload_image);

            //resize to thumb image
            imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
            imagejpeg($thumb,$resize_image,100);*/

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
                    
                    $sql="UPDATE mlmmembers SET passport='$new_name' WHERE userid=$userid";
                    $result=mysql_query($sql) or die(mysql_error());

                    if($result){
                        ?>
                            <div class="profileimage" style="width: 140px;border: 0px solid #ccc;padding: 5px;">
                                <?php
                                    echo '<img src="/passports/' . $new_name . '"  style="width: 140px;height:140px;border-radius: 50%;"/>';
                                ?>                                
                            </div>
                        <?php
                        include $_SERVER['DOCUMENT_ROOT'] . "/includes/uploadpicture.inc.php";
                    }
                }else{
                    echo "Image file Size must be less than 1MB";
                }

            }
            /*if(isset($_FILES['picture']['name'])){
                $name=
            }*/

        }else{
            $sql="SELECT * FROM mlmmembers WHERE userid=$userid";
            $result=mysql_query($sql) or die(mysql_error());
            if($result){
                $rows=mysql_fetch_array($result);
                
                $passport=$rows['passport'];
                ?>
                <div class="profileimage" style="width: 140px;border: 0px solid #ccc;padding: 5px;">
                    <img src="/passports/<?php echo $passport;?>" style='width: 140px;height:140px;border-radius: 50%;'>
                </div>
                <?php

                include $_SERVER['DOCUMENT_ROOT'] . "/includes/uploadpicture.inc.php";
            }
            
        }
        
    }elseif ($section=='changetranspassword') {
        # code...\
        echo "<h2>Change Transaction Password</h2>";

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
                    $password = ($rows['transpassword']);
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
                include $_SERVER['DOCUMENT_ROOT'] . "/includes/changetranspassword.inc.php";    
            }else{
                $sql="UPDATE mlmmembers SET transpassword='$newpassword' WHERE userid=$userid";
                $result=mysql_query($sql) or die(mysql_error());

                if($result){
                    echo "<h3>Congratulations</h3>";
                    echo "<p>Transaction Password successfully changed</p>";
                }
            }

        }else{
            include $_SERVER['DOCUMENT_ROOT'] . "/includes/changetranspassword.inc.php";

        }
    }
    
?>
                        
                
