<?php
    $section=isset($_GET['section'])?$_GET['section']:'';
    if($section=='addnewmember'){
        echo "<h2>Add New Member</h2>";

        if(isset($_POST['submit']) && $_POST['submit']=='Add Member'){
            include $_SERVER['DOCUMENT_ROOT'] . "/scripts/addnewmember.php";
            
        }else{
            include $_SERVER['DOCUMENT_ROOT'] . '/includes/registrationform5.inc.php';
        }        

    }elseif($section=='listmembers'){
        echo "<h2>List Members</h2>";
        ?>
            <table class="tables compact display" style="font-size: 1.1em;">
                <thead><th>SN</th><th>Profile ID</th><th>Sponsor ID</th><th>User ID</th><th>Username</th><th>E-Wallet</th><th>eMail Address</th><th>Action</th></thead>
                <tbody>
                <?php
                    $sn=1;
                    $sql="SELECT * FROM mlmmembers";
                    $result=mysql_query($sql) or die(mysql_error());
                    if($result){
                        while($rows=mysql_fetch_array($result)){
                            ?>
                            <tr><td><?php echo $sn;?></td><td><?php echo $rows['profileid'];?></td><td><?php echo $rows['sponsorid'];?></td><td><?php echo $rows['userid'];?></td><td><?php echo $rows['username'];?></td><td style="text-align: right;padding-right: 10px;"><a style="text-decoration: none;" href="/admin/?section=creditdebit&id=<?php echo $rows['userid'];?>"><?php echo 'R' . memberwallet($rows['userid']);?></a></td><td><?php echo $rows['emailaddress'];?></td><td><a href="/admin/?section=memberdetails&userid=<?php echo $rows['userid'];?>">Details</a></td></tr>
                            <?php
                            $sn+=1;
                        }
                    }
                ?>
                </tbody>
            </table>
        <?php


    }elseif ($section=='activatemember') {
        echo "<h2>Manage Management - Activate Account</h2>";
        echo "<p>Enter your e-Pin to completed and validate registration</p>";
    }elseif ($section=='memberstatus') {
        # code...
        echo "<h2>Members' Status</h2>";

        $sql="SELECT * FROM mlmmembers";
        $result=mysql_query($sql) or die(mysql_error());
        if($result){
            ?>
                <table class="compact display tables" style="font-size: 1.2em;">
                    <thead>
                        <th>User ID</th><th>Username</th><th>Current Stage</th><th>Level</th><th>Lily</th><th>Rose</th><th>Petunia</th><th>Daisy</th><th>Heather</th><th>Azalea</th><th>Begonia</th><th>Carnation</th><th>Infinity</th>
                    </thead>
                    <tbody>
                        <?php
                            while($rows=mysql_fetch_array($result)){
                                $userid=$rows['userid'];
                                $stage=$rows['currentstage'];
                                $username2=$rows['username'];
                                $depth=$rows['depth'];
                                $f=countallpawn($userid);
                                $count=0;
                                $b=countallrook($userid);
                                $count=0;
                                $p=countallknight($userid);
                                $count=0;
                                $s=countallbishop($userid);
                                $count=0;
                                $m=countallking($userid);
                                $count=0;
                                $i=countallqueen($userid);
                                $count=0;
                                $m=countallbegonia($userid);
                                $count=0;
                                $i=countallcarnation($userid);
                                $count=0;
                                $m=countallinfinity($userid);
                                $count=0;
                                ?>
                                    <tr>
                                        <td><?php echo $userid;?></td><td><?php echo $username2;?></td><td><?php echo $stage;?></td><td><?php echo $depth;?></td><td><?php echo $f;?></td><td><?php echo $b;?></td><td><?php echo $p;?></td><td><?php echo $s;?></td><td><?php echo $m;?></td><td><?php echo $i;?></td>
                                    </tr>
                                <?php
                                $count=0;
                                $b=$f=$p=0;

                            }
                        ?>
                    </tbody>
                </table>
            <?php
            
        }
    }elseif ($section=='memberdetails') {
        # code...
        echo("<h2>Member's Details</h2>");
        $memberuserid=isset($_GET['userid'])?$_GET['userid']:0;
        $sql="SELECT * FROM mlmmembers WHERE userid=$memberuserid";
        $result=mysql_query($sql) or die(mysql_error());

        if($result){
            $rows=mysql_fetch_assoc($result);
            ?>
                <div class="registrationform" style="border: none;">
                    <div class="control-group">
                        <div class="control double">
                            <p>Member's Fullname</p>
                            <p class="formdata"><?php echo $rows['firstname'] . ", " . $rows['lastname'];?></p>
                        </div>
                        
                    </div>
                    <div class="control-group">
                        <div class="control">
                            <p>Username</p>
                            <p class='formdata'><?php echo $rows['username'];?></p>
                        </div>
                        <div class="control">
                            <p>Membership ID</p>
                            <p class='formdata'><?php echo $rows['profileid'];?></p>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="control">
                            <p>Date Joined</p>
                            <p class='formdata'><?php echo date_format(date_create($rows['datecreated']),'jS F Y');?></p>
                        </div>
                        <div class="control">
                            <p>Current Stage</p>
                            <p class='formdata'><?php echo $rows['currentstage'];?></p>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="control">
                            <p>Sponsor's Name</p>
                            <p class='formdata'><?php echo getsponsor($rows['sponsorid']);?></p>
                        </div>
                        <div class="control">
                            <p>Sponsor's ID</p>
                            <p class='formdata'><?php echo $rows['sponsorid'];?></p>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="control">
                            <p>Phone No.</p>
                            <p class='formdata'><?php echo $rows['phoneno'];?></p>
                        </div>
                        <div class="control">
                            <p>Email Address</p>
                            <p class='formdata'><?php echo $rows['emailaddress'];?></p>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="control">
                            <p>Login Password</p>
                            <p class='formdata'><?php echo $rows['password'];?></p>
                        </div>
                        <div class="control">
                            <p>Transaction Password</p>
                            <p class='formdata'><?php echo $rows['transpassword'];?></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control">
                            <p>Bank Name</p>
                            <p class='formdata'><?php echo $rows['bankname'];?></p>
                        </div>
                        <div class="control">
                            <p>Branch Code</p>
                            <p class='formdata'><?php echo $rows['bankswiftcode'];?></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control">
                            <p>Account Holder</p>
                            <p class='formdata'><?php echo $rows['accountname'];?></p>
                        </div>
                        <div class="control">
                            <p>Account Number</p>
                            <p class='formdata'><?php echo $rows['accountno'];?></p>
                        </div>
                    </div>

                    <!--<div class="control-group">-->
                    <!--    <div class="control double">-->
                    <!--        <p>Nominee Name</p>-->
                    <!--        <p class='formdata'><?php echo $rows['nomineename'];?></p>-->
                    <!--    </div>                        -->
                    <!--</div>-->

                    <div class="linkbutton control-group">
                        <ul class="control double">
                            <li><a href="/admin/?section=editprofile&memberuserid=<?php echo($rows['userid']);?>">Edit Profile</a></li>
                            <!--<li><a href="#">Manage e-Wallet</a></li>-->
                            <li><a href="#">Export to PDF</a></li>
                        </ul>
                        
                    </div>
                </div>
            <?php

        }
    }elseif ($section=='bannedaccounts') {
        # code...
        echo "<h2>Banned Accounts</h2>";
    }elseif ($section=='editprofile') {
        # code...
        echo("<h2>Edit Member's Profile</h2>");

        if(isset($_POST['submit'])){
            $m_firstname=$m_lastname=$m_emailaddress=$m_firstnameErr=$m_lastnameErr=$m_emailErr='';
            $errors=0;
            $memberuserid=$_POST['memberuserid'];
            $m_firstname=isset($_POST['m_firstname'])?$_POST['m_firstname']:'';
            if(empty($m_firstname)){
                $m_firstnameErr="First name cannot be blank";
                $errors=1;
            }
            $m_lastname=isset($_POST['m_lastname'])?$_POST['m_lastname']:'';
            if(empty($m_lastname)){
                $m_lastnameErr="Last name cannot be blank";
                $errors=1;
            }

            $m_emailaddress=isset($_POST['m_emailaddress'])?$_POST['m_emailaddress']:'';
            if(empty($m_emailaddress)){
                $m_emailErr="Email Address missing";
                $errors=1;
            }elseif (filter_input(INPUT_POST, 'm_emailaddress', FILTER_VALIDATE_EMAIL)==false) {
                $m_emailErr= "Email address is invalid.";
                $errors=1;
            }

            $m_sponsorid=isset($_POST['m_sponsorid'])?$_POST['m_sponsorid']:'NA';
            $m_username=isset($_POST['m_username'])?mysql_real_escape_string($_POST['m_username']):'NA';
            $m_gender=isset($_POST['m_gender'])?$_POST['m_gender']:'NA';
            $m_country=isset($_POST['m_country'])?$_POST['m_country']:'NA';
            $m_city=isset($_POST['m_city'])?mysql_real_escape_string($_POST['m_city']):'NA';
            $m_address=isset($_POST['m_address'])?mysql_real_escape_string($_POST['m_address']):'NA';
            $m_dob=isset($_POST['m_dob'])?$_POST['m_dob']:'0000-00-00';
            $m_phoneno=isset($_POST['m_phoneno'])?mysql_real_escape_string($_POST['m_phoneno']):'NA';
            $m_zipcode=isset($_POST['m_zipcode'])?mysql_real_escape_string($_POST['m_zipcode']):'NA';

            $m_nomineename=isset($_POST['m_nomineename'])?mysql_real_escape_string($_POST['m_nomineename']):'NA';
            $m_nomineephoneno=isset($_POST['m_nomineephoneno'])?mysql_real_escape_string($_POST['m_nomineephoneno']):'NA';
            $m_nomineeaddress=isset($_POST['m_nomineeaddress'])?mysql_real_escape_string($_POST['m_nomineeaddress']):'NA';
            $m_accountname=isset($_POST['m_accountname'])?mysql_real_escape_string($_POST['m_accountname']):'NA';
            $m_accountno=isset($_POST['m_accountno'])?mysql_real_escape_string($_POST['m_accountno']):'0000000000';
            $m_bankname=isset($_POST['m_bankname'])?mysql_real_escape_string($_POST['m_bankname']):'NA';
            $m_bankswiftcode=isset($_POST['m_bankswiftcode'])?mysql_real_escape_string($_POST['m_bankswiftcode']):'NA';
            $m_relationship=isset($_POST['m_relationship'])?$_POST['m_relationship']:'NA';

            if($errors==1){
                include $_SERVER['DOCUMENT_ROOT'] . "/includes/editform.inc.php";
            }else{
                $sql="UPDATE mlmmembers SET firstname='$m_firstname', lastname='$m_lastname', gender='$m_gender', dob='$m_dob', emailaddress='$m_emailaddress', phoneno='$m_phoneno', country='$m_country', city='$m_city', address='$m_address', zipcode='$m_zipcode', nomineename='$m_nomineename', nomineephoneno='$m_nomineephoneno', nomineeaddress='$m_nomineeaddress', relationship='$m_relationship', accountname='$m_accountname', accountno='$m_accountno', bankname='$m_bankname', bankswiftcode='$m_bankswiftcode' WHERE userid=$memberuserid";
                $result=mysql_query($sql) or die(mysql_error());

                if($result){
                    echo "<p>Record successfully updated. Click <a href='/admin/?section=memberdetails&userid=$memberuserid'>here</a> to view updated profile</p>";
                }

            }

        }else{
            $memberuserid=isset($_GET['memberuserid'])?$_GET['memberuserid']:0;
            $sql="SELECT * FROM mlmmembers WHERE userid=$memberuserid";
            $result=mysql_query($sql) or die(mysql_error());
            if($result){
                $rows=mysql_fetch_assoc($result);
                $m_username=$rows['username'];
                $m_sponsorid=$rows['sponsorid'];
                $m_firstname=$rows['firstname'];
                $m_lastname=$rows['lastname'];
                $m_emailaddress=$rows['emailaddress'];
                $m_phoneno=$rows['phoneno'];
                $m_country=$rows['country'];
                $m_city=$rows['city'];
                $m_address=$rows['address'];
                $m_accountname=$rows['accountname'];
                $m_accountno=$rows['accountno'];
                $m_bankname=$rows['bankname'];
                $m_bankswiftcode=$rows['bankswiftcode'];
                $m_gender=$rows['gender'];
                $m_dob=$rows['dob'];
                $m_nomineename=$rows['nomineename'];
                $m_nomineephoneno=$rows['nomineephoneno'];
                $m_nomineeaddress=$rows['nomineeaddress'];
                $m_relationship=$rows['relationship'];
                $m_zipcode=$rows['zipcode'];

                include $_SERVER['DOCUMENT_ROOT'] . "/includes/editform.inc.php";    
            } 
        }
        
        
    }

?>
                        
                
