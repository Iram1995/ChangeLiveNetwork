<?php
    if($section=='createadmin'){
        echo "<h2>Create New Administrator</h2>";

        if(isset($_POST['submit'])){
            //retrieve variables and validate
            $errMsg='';
            $adminusername=isset($_POST['username'])?($_POST['username']):'';
                if(empty($adminusername)){
                    $usernameErr='Username cannot be empty';
                    $errors=1;
                }

                $firstname=isset($_POST['firstname'])?($_POST['firstname']):'';
                if(empty($firstname)){
                    $firstnameErr='First name cannot be empty';
                    $errors=1;
                }

                $role=isset($_POST['role'])?($_POST['role']):'';
                if(empty($role)){
                    $roleErr='Select User Role';
                    $errors=1;
                }

                $lastname=isset($_POST['lastname'])?($_POST['lastname']):'';
                if(empty($lastname)){
                    $lastnameErr='Last name cannot be empty';
                    $errors=1;
                }


                $sql="SELECT * FROM mlmadminusers WHERE username='" . $username . "'";
                $result=mysql_query($sql) or die(mysql_error());
                $count=mysql_num_rows($result);

                if($count >=1){
                    $usernameErr='Username already taken';
                    $errors=1;
                }


                $emailaddress=isset($_POST['emailaddress'])?$_POST['emailaddress']:'';
                $emailaddress = filter_input(INPUT_POST, 'emailaddress', FILTER_VALIDATE_EMAIL);
                if ($emailaddress === false) {
                    $emailErr= "Email address is invalid.";
                     $errors=1;
                }

                $adminphoneno=isset($_POST['phoneno'])?$_POST['phoneno']:'';
                if(empty($adminphoneno)){
                    $phoneErr='Mobile no is required!';
                    $errors=1;
                }

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
                    $confirmpasswordErr='Password/Confirm Password not identical';
                    $errors=1;
                }


                if ($errors==1){
                    include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/createadminform.inc.php";
                }else{
                    //process
                    $sql="INSERT INTO mlmadminusers(username, firstname, lastname, emailaddress, phoneno, datecreated, password) VALUES ('$adminusername','$firstname','$lastname','$emailaddress','$phoneno',CURDATE(), '$password',role)";
                    $result=mysql_query($sql) or die(mysql_error());

                    if($result){
                        $errMsg="<p style='background:green;line-height:2.4em;color:white;'>User successfully created!</p>";
                        $username=$firstname=$lastname=$emailaddress=$phoneno=$password='';
                        include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/createadminform.inc.php";

                    }else{
                        $errMsg="<p style='background:red;line-height:2.4em;color:white;'>Error creating user. Please try again!</p>";
                        //$username=$firstname=$lastname=$emailaddress=$phoneno=$password='';
                        include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/createadminform.inc.php";
                    }
                }
        }else{
            include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/createadminform.inc.php";
        }
        

    }elseif($section=='manageadmin'){
        echo "<h2>Manage Administrators</h2>";
        $sql="SELECT * FROM mlmadminusers WHERE status>=0";
        $result=mysql_query($sql) or die(mysql_error());
        
        if(mysql_num_rows($result)>0){
            $sn=1;
            ?>
                <table class="tables compact display" style="font-size: 1.2em;">
                    <thead>
                        <th>SN</th><th>Username</th><th>Full Name</th><th>Role</th><th>Active</th><th>Action</th>
                    </thead>
            <?php 
            $sn=1;
            while ($rows=mysql_fetch_assoc($result)) {
                # code...
               
                ?>
                    
                <tr id="<?php echo $rows['userid'];?>">
                    <td><?php echo $sn;?></td><td><a href="/admin/?section=editadmininfo&userid=<?php echo $rows['userid'];?>"><?php echo $rows['username'];?></a></td><td><?php echo $rows['lastname'] . ', '. $rows['firstname'];?></td><td><?php echo $rows['role'];?></td><td><?php echo $rows['status'];?></td><td class="remove"><a href="/admin/?section=deleteadmin&userid=<?php echo $rows['userid'];?>">Delete Admin</a></td>
                </tr>
                <?php
                $sn++;
            }
            ?>
                </table>
            <?php
        }else{
            echo "<p>No active Administrator Account</p>";
        }

    }elseif ($section=='deletedadmin') {
        # code...

        $adminuserid=isset($_GET['userid'])?$_GET['userid']:0;

        if($adminuserid>0){
            echo "<h2>Account Reactivation</h2>";
            $sql="UPDATE mlmadminusers SET status=1 WHERE userid=$adminuserid";
            $result=mysql_query($sql) or die(mysql_error());

            if($result){
                echo "<h3>Account successfully re-activated</h3>";
            }

        }else{
            echo  "<h2>Deleted/Inactive Administrators' Account</h2>";
            $sql='SELECT * FROM mlmadminusers WHERE status=-1';
            $result=mysql_query($sql) or die(mysql_error());

            if($result){
                while ($rows=mysql_fetch_assoc($result)) {
                # code...
                    $sn=1;
                    ?>
                        <table class="tables compact display" style="font-size: 1.2em;">
                            <thead>
                                <th>SN</th><th>Username</th><th>Full Name</th><th>Role</th><th>Active</th><th>Action</th>
                            </thead>
                            <tr id="<?php echo $rows['userid'];?>">
                                <td><?php echo $sn;?></td><td><?php echo $rows['username'];?></td><td><?php echo $rows['lastname'] . ', '. $rows['firstname'];?></td><td><?php echo $rows['role'];?></td><td><?php echo $rows['status'];?></td><td class="activate"><a href="/admin/?section=deletedadmin&userid=<?php echo $rows['userid'];?>">Re-activate Account</a></td>
                            </tr>
                            
                        </table>
                    <?php
                    $sn+1;
                }
            }
        }       
        

    }elseif ($section=='editadmininfo') {
        # code...
        echo "<h2>Edit Administrator Information</h2>";

        if(isset($_POST['submit'])){
            //retrieve variables
            $errors=0;
            $adminuserid=isset($_POST['adminuserid'])?$_POST['adminuserid']:0;
            $role=isset($_POST['role'])?$_POST['role']:'';
            if(empty($role)){
                $roleErr='Select Administrator Role';
                $errors=1;
            }
            $adminlastname=isset($_POST['adminlastname'])?$_POST['adminlastname']:'';
            if(empty($adminlastname)){
                $lastnameErr='Enter Lastname';
                $errors=1;
            }
            $adminfirstname=isset($_POST['adminfirstname'])?$_POST['adminfirstname']:'';
            if(empty($adminfirstname)){
                $firstnameErr='Enter Firstname';
                $errors=1;
            }

            $adminemailaddress=isset($_POST['adminemailaddress'])?$_POST['adminemailaddress']:'';
            if(empty($adminemailaddress)){
                $emailErr='Enter emailaddress';
                $errors=1;
            }
            $adminphoneno=isset($_POST['adminphoneno'])?$_POST['adminphoneno']:'';

            if($errors==1){
                include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/editadminform.inc.php";
            }else{
                $sql="UPDATE mlmadminusers SET role='$role', firstname='$adminfirstname', lastname='$adminlastname', emailaddress='$adminemailaddress', phoneno='$adminphoneno' WHERE userid=$adminuserid";
                $result=mysql_query($sql) or die(mysql_error());
                if($result){
                    echo "<p>Administrator's Information successfully updated</p>";
                }else{
                    echo "<p>Error found. Please try again</p>";
                }
            }

        }else{
            $id=isset($_GET['userid'])?$_GET['userid']:0;
            $sql="SELECT * FROM mlmadminusers WHERE userid=$id";
            $result=mysql_query($sql) or die(mysql_error());

            if($result){
                $rows=mysql_fetch_array($result);
                $adminusername=$rows['username'];
                $adminuserid=$rows['userid'];
                $role=$rows['role'];
                $adminfirstname=$rows['firstname'];
                $adminlastname=$rows['lastname'];
                $adminemailaddress=$rows['emailaddress'];
                $adminphoneno=$rows['phoneno'];

                include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/editadminform.inc.php";

            }else{
                echo "<p>No matched record found in the database</p>";
            } 
        }
        
    }elseif ($section=='deleteadmin') {
        # code...
        echo "<h2>Delete Admin Account</h2>";

        if(isset($_POST['submit'])){
            $adminuserid=isset($_POST['adminuserid'])?$_POST['adminuserid']:0;
            $sql="UPDATE mlmadminusers SET status='-1' WHERE userid=$adminuserid";
            $result=mysql_query($sql) or die(mysql_error());

            if($result){
                echo "<h3 style='background:green;padding:10px; color:#fff;'>Account successfully deleted</h3>";
            }
        }else{
            $adminuserid=isset($_GET['userid'])?$_GET['userid']:0;
            $sql="SELECT * FROM mlmadminusers WHERE userid=$adminuserid";
            $result=mysql_query($sql) or die(mysql_error());

            if($result){
                $rows=mysql_fetch_assoc($result);
                $adminusername=$rows['username'];
                $adminfirstname=$rows['firstname'];
                $adminlastname=$rows['lastname'];
                ?>
                    <form class="registrationform" method="post" action="/admin/?section=deleteadmin"> 
                        <div class="control-group">
                            <div class="control">
                                <p>Admin UserId</p>
                                <input type="hidden" name="adminuserid" value="<?php echo $adminuserid;?>">
                            </div>
                            <div class="control double">
                                <p>Admin Username</p>
                                <input type="text" name="adminusername" disabled="disabled" value="<?php echo $adminusername;?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="control">
                                <p>First Name</p>
                                <input type="text" name="firstname" disabled="disabled" value="<?php echo $adminfirstname;?>">
                            </div>
                            <div class="control">
                                <p>Last Name</p>
                                <input type="text" name="lastname" disabled="disabled" value="<?php echo $adminlastname;?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="control double">
                                <input type="submit" name="submit" value="Delete Account">
                            </div>
                            <!--<div class="control">
                                <input type="submit" name="submit" value="Cancel">
                            </div>-->
                        </div>
                    </form>
                <?php
            }
        } 

    }elseif ($section=='activateadmin') {
        # code...

    }elseif ($section=='manageadminroles') {
        # code...
        echo("<h2>Manage Administrator Role</h2>");

        ?>
            <form class="registrationform">
                <div class="control-group">
                    <div class="control">
                        <p>Role Name</p>
                        <input type="text" name="rolename">
                    </div>
                </div>

                <div class="control-group">
                    <div class="control double">
                        <p>Role Description</p>
                        <textarea name="roledescription"></textarea>
                    </div>
                </div>

                 <div class="control-group">
                    <div class="control double">
                        <p>Priviledges</p>
                        <select name="rolepriviledges" multiple="multiple"></select>
                    </div>
                </div>

                <div class="control-group">
                    <div class="control double">
                        <input type="submit" name="submit" value="submit">
                    </div>
                </div>
            </form>

            <h3 style="margin-bottom: 12px;text-transform: uppercase;">Roles &amp; Priviledges</h3>
            <table class="compact display tables">
                <thead>
                    <tr><th style="width: 5%;">SNo.</th><th>Role Name</th><th>Role Description</th><th>Role Priviledges</th></tr>
                </thead>
            </table>
        <?php
    }

?>
                        
                
