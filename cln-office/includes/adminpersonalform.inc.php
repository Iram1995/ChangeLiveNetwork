<div class="status"><?php echo $errMsg;?></div>
<div class="registrationform">
      
      <form name="registeradmin" id="registeradmin" method="post" action="/admin/?section=personalinfo">           
            <h1 class="sectionhead" style="margin-top: 0;">Username</h1>
            <input type="hidden" name="adminuserid" value="<?php echo $_SESSION['loginid'];?>">
            <div class="control-group">
                  <div class="control" style="border: 0px solid #333;">
                        <p>Username: <span class="errors" id="usernameErr"><?php echo $usernameErr;?></span></p>
                        <input type="text" name="adminusername" id="adminusername" placeholder="Choose Username" value="<?php echo $adminusername;?>" readonly>
                  </div>                
            </div>
            <h1 class="sectionhead">Personal Details</h1>
            <div class="control-group" style="border: 0px solid #333;">
                  <div class="control" style="border: 0px solid #333;">
                        <p>First Name: <span class="errors" id="firstnameErr"><?php echo $firstnameErr;?></span></p>
                        <input type="text" name="adminfirstname" id="adminfirstname" placeholder="Enter First Name" value="<?php echo $adminfirstname;?>">
                  </div>

                  <div class="control" style="border: 0px solid #333;">
                        <p>Last Name: <span class="errors" id="lastnameErr"><?php echo $lastnameErr;?></span></p>
                        <input type="text" name="adminlastname" id="adminlastname" placeholder="Enter Last Name" value="<?php echo $adminlastname;?>">
                  </div>
            </div>

            <div class="control-group" style="border: 0px solid #333;">
                  <div class="control" style="border: 0px solid #333;">
                        <p>Email Address: <span class="errors" id="emailErr"><?php echo $emailErr;?></span></p>
                        <input type="text" name="adminemailaddress" id="adminemailaddress" placeholder="Enter Email Address" value="<?php echo $adminemailaddress;?>">
                  </div>

                  <div class="control" style="border: 0px solid #333;">
                        <p>Phone No:<span class="errors" id="phoneErr"><?php echo $phoneErr;?></span></p>
                        <input type="text" name="adminphoneno" placeholder="Enter Phone" value="<?php echo $adminphoneno;?>">
                  </div>
            </div>

            <div class="control-group" style="">
                  <div class="control double">
                        <input type="submit" name="submit" value="Submit">
                  </div>
            </div>
      </form>
</div><!--registrationform-->  