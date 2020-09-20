<div class="status"><?php echo $errMsg;?></div>
<div class="registrationform">
      <h2>Create a new Account</h2>
      <form name="register" id="register" method="post" action="/admin/?section=addmember">

            <div class="control-group">
                  <div class="control" style="border: 0px solid #333;">
                        <p>Sponsor ID: <span class="errors" id="sponsoridErr"><?php echo $sponsoridErr;?></span></p>
                        <input type="text" name="sponsorid" id="sponsorid" placeholder="Enter Sponsor ID" value="<?php echo $sponsorid;?>">
                  </div>
                  <div class="control" style="border: 0px solid #333;">
                        <p>e-Pin Code: <span class="errors" id="sponsoridErr"><?php echo $epincodeErr;?></span></p>
                        <input type="text" name="epincode" id="epincode" placeholder="Enter e-Pin Code" value="<?php echo $epincode;?>">
                  </div>  
            </div>

            <h1 class="sectionhead">Login Details</h1>
            <div class="control-group">
                  <div class="control" style="border: 0px solid #333;">
                        <p>Username: <span class="errors" id="usernameErr"><?php echo $usernameErr;?></span></p>
                        <input type="text" name="username" id="username" placeholder="Choose Username" value="<?php echo $username;?>">
                  </div>   
            </div>
            <div class="control-group" style="border: 0px solid #333;">
                  <div class="control" style="border: 0px solid #333;">
                        <p>Password: <span class="errors" id="passwordErr"><?php echo $passwordErr;?></span></p>
                        <input type="password" name="password" id="password" placeholder="Enter Password">
                  </div>

                  <div class="control" style="border: 0px solid #333;">
                        <p>Confirm Password: <span class="errors" id="confirmpasswordErr"><?php echo $confirmpasswordErr;?></span></p>
                        <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password">
                  </div>
            </div>
            
            <h1 class="sectionhead">Personal Details</h1>
            <div class="control-group" style="border: 0px solid #333;">
                  <div class="control" style="border: 0px solid #333;">
                        <p>First Name: <span class="errors" id="firstnameErr"><?php echo $firstnameErr;?></span></p>
                        <input type="text" name="firstname" id="firstname" placeholder="Enter First Name" value="<?php echo $firstname;?>">
                  </div>

                  <div class="control" style="border: 0px solid #333;">
                        <p>Last Name: <span class="errors" id="lastnameErr"><?php echo $lastnameErr;?></span></p>
                        <input type="text" name="lastname" id="lastname" placeholder="Enter Last Name" value="<?php echo $lastname;?>">
                  </div>
            </div>

            <div class="control-group" style="border: 0px solid #333;">
                  <div class="control" style="border: 0px solid #333;">
                        <p>Email Address: <span class="errors" id="emailErr"><?php echo $emailErr;?></span></p>
                        <input type="text" name="emailaddress" id="emailaddress" placeholder="Enter Email Address" value="<?php echo $emailaddress;?>">
                  </div>

                  <div class="control" style="border: 0px solid #333;">
                        <p>Phone No:<span class="errors" id="phoneErr"><?php echo $phoneErr;?></span></p>
                        <input type="text" name="phoneno" placeholder="Enter Phone" value="<?php echo $phoneno;?>">
                  </div>
            </div>


            <h1 class="sectionhead">Bank Details</h1>
            <div class="control-group" style="border: 0px solid #333;">
                  <div class="control" style="border: 0px solid #333;">
                        <p>Account Holder: <span class="errors" id="accountnameErr"><?php echo $accountnameErr;?></span></p>
                        <input type="text" name="accountname" id="accountname" placeholder="Enter Account Holder" value="<?php echo $accountname;?>">
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
                  <div class="control">
                        <input type="submit" name="submit" value="Create Account">
                  </div>
            </div>
      </form>
</div><!--registrationform-->  