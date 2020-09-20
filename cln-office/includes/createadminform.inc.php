<div class="status"><?php echo $errMsg;?></div>
<div class="registrationform">
      
      <form name="registeradmin" id="registeradmin" method="post" action="/admin/?section=createadmin">           
            <h1 class="sectionhead" style="margin-top: 0;">Login Details</h1>
            <input type="hidden" name="adminuserid" value="<?php echo $adminuserid;?>">
            <div class="control-group">
                  <div class="control" style="border: 0px solid #333;">
                        <p>Username: <span class="errors" id="usernameErr"><?php echo $usernameErr;?></span></p>
                        <input type="text" name="adminusername" id="adminusername" placeholder="Choose Username" value="<?php echo $adminusername;?>">
                  </div> 
                  <div class="control">
                        <p>Role: <span class="errors" id="roleErr"><?php echo $roleErr;?></span></p>
                        <select name="role">
                              <?php
                                    foreach ($adminroles as $key => $value) {
                                          # code...
                                          ?>
                                                <option value="<?php echo $key;?>"><?php echo $value;?></option>
                                          <?php
                                    }

                              ?>
                        </select>
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
                        <input type="text" name="phoneno" placeholder="Enter Phone" value="<?php echo $adminphoneno;?>">
                  </div>
            </div>

            <div class="control-group" style="">
                  <div class="control">
                        <input type="submit" name="submit" value="Submit">
                  </div>
            </div>
      </form>
</div><!--registrationform-->  