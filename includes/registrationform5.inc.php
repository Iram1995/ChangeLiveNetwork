
<div class="registrationform" style="margin-top: 24px;max-width: 960px;">
      <div class="status"><?php echo $errMsg;?></div>
      <h2 style="background: #002366;">Create a new Account</h2>
      <form name="register" id="register" method="post" action="/?section=addnewmember">
            <!--<p style="text-align: center;font-weight: normal;">Please note, mandatory fields are marked with <span class="required">*</span></p>-->

            <!--<div class="control-group">
                  <div class="">
                        <input type="checkbox" name="sponsor" style="float: left;margin-left: 5px;margin-top: 3px;">
                        <label style="float: left;font-size: 1.5em;margin-left: 5px;">Select this box if you do not have a sponsor (or referrer)</label>
                  </div>
            </div>-->
            <div class="control-group">
                  <div class="control" style="border: 0px solid #333;">
                        <p><span class="required">*</span>Sponsor ID: <span class="errors" id="sponsoridErr"><?php echo $sponsoridErr;?></span></p>
                        <input type="text" name="sponsorid" id="sponsorid" placeholder="Enter Sponsor ID" value="<?php echo $profileid;?>">
                  </div>
                  <div class="control" style="border: 0px solid #333;">
                        <p><span class="required">*</span>e-Pin Code: <span class="errors" id="epincodeErr"><?php echo $epincodeErr;?></span></p>
                        <input type="text" name="epincode" id="epincode" placeholder="Enter e-Pin Code" value="<?php echo $epincode;?>">
                  </div>  
            </div>

            <h1 class="sectionhead">Login Details</h1>
            <div class="control-group">
                    <div class="control" style="border: 0px solid #333;">
                        <p><span class="required">*</span>Username: <span class="errors" id="usernameErr"><?php echo $usernameErr;?></span></p>
                        <input type="text" name="musername" id="musername" placeholder="Choose Username" value="<?php echo $musername;?>">
                    </div>   
            </div>
            <div class="control-group" style="border: 0px solid #333;">
                  <div class="control" style="border: 0px solid #333;">
                        <p><span class="required">*</span>Password: <span class="errors" id="passwordErr"><?php echo $passwordErr;?></span></p>
                        <input type="password" name="password" id="password" placeholder="Enter Password">
                  </div>

                  <div class="control" style="border: 0px solid #333;">
                        <p><span class="required">*</span>Confirm Password: <span class="errors" id="confirmpasswordErr"><?php echo $confirmpasswordErr;?></span></p>
                        <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password">
                  </div>
            </div>
            
            <h1 class="sectionhead">Personal Details</h1>
            <div class="control-group" style="border: 0px solid #333;">
                  <div class="control" style="border: 0px solid #333;">
                        <p><span class="required">*</span>First Name: <span class="errors" id="firstnameErr"><?php echo $firstnameErr;?></span></p>
                        <input type="text" name="mfirstname" id="mfirstname" placeholder="Enter First Name" value="<?php echo $mfirstname;?>">
                  </div>

                  <div class="control" style="border: 0px solid #333;">
                        <p><span class="required">*</span>Last Name: <span class="errors" id="lastnameErr"><?php echo $lastnameErr;?></span></p>
                        <input type="text" name="mlastname" id="mlastname" placeholder="Enter Last Name" value="<?php echo $mlastname;?>">
                  </div>
            </div>


            <div class="control-group" style="border: 0px solid #333;">
                  <div class="control" style="border: 0px solid #333;">
                        <p><span class="required">*</span>Email Address: <span class="errors" id="emailErr"><?php echo $emailErr;?></span></p>
                        <input type="text" name="memailaddress" id="emailaddress" placeholder="Enter Email Address" value="<?php echo $memailaddress;?>">
                  </div>

                  <div class="control" style="border: 0px solid #333;">
                        <p>Phone No:<span class="errors" id="phoneErr"><?php echo $phoneErr;?></span></p>
                        <input type="text" name="mphoneno" placeholder="Enter Phone" value="<?php echo $mphoneno;?>">
                  </div>
            </div>


            <h1 class="sectionhead">Bank Details</h1>
            <div class="control-group" style="border: 0px solid #333;">
                  <div class="control" style="border: 0px solid #333;">
                        <p>Account Name: <span class="errors" id="accountnameErr"><?php echo $accountnameErr;?></span></p>
                        <input type="text" name="accountname" id="accountname" placeholder="Enter Account Name" value="<?php echo $accountname;?>">
                  </div>

                  <div class="control" style="border: 0px solid #333;">
                        <p>Account Number: <span class="errors" id="accountnoErr"><?php echo $accountnoErr;?></span></p>
                        <input type="text" name="accountno" id="accountno" placeholder="Enter Account No." value="<?php echo $accountno;?>">
                  </div>
            </div>

            <div class="control-group" style="border: 0px solid #333;">
                  <div class="control" style="border: 0px solid #333;">
                        <p>Bank Name: <span class="errors" id="bankname"><?php echo $banknameErr;?></span></p>
                        <input type="text" name="bankname" id="bankname" placeholder="Enter Bank Name" value="<?php echo $bankname;?>">
                  </div>

                  <div class="control" style="border: 0px solid #333;">
                        <p>Branch Code:<span class="errors" id="bankswiftcodeErr"><?php echo $bankswiftcodeErr;?></span></p>
                        <input type="text" name="bankswiftcode" placeholder="Enter Branch Code" value="<?php echo $bankswiftcode;?>">
                  </div>
            </div>

            <div class="control-group">

                  <div class="">
                        <p><span class="errors"><?php echo $termsErr;?></span></p>
                        <input type="checkbox" name="terms"  value='1' style="float: left;margin-left: 5px;margin-top:10px;">
                        <label style="float: left;font-size: 1.5em;margin-left: 5px;"><span class="required">*</span>Accept Our Terms and Conditions</label>
                  </div>
            </div>

            <div class="control-group">
                  <div class="control">
                        <input type="submit" name="submit" value="Add Member">
                  </div>
            </div>
      </form>
</div><!--registrationform-->  