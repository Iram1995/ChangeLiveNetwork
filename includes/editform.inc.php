
<div class="registrationform" style="margin-top: 24px;max-width: 960px;" id="">
      <div class="status"><?php echo $errMsg;?></div>
      <form name="editform" id="editform" method="post" action="/admin/?section=editprofile">
            <input type="hidden" name="memberuserid" value="<?php echo $memberuserid;?>">
            <p style="text-align: center;font-weight: normal;">Please note, mandatory fields are marked with <span class="required">*</span></p>
            
            <div class="control-group">
                  <div class="control" style="border: 0px solid #333;">
                        <p><span class="required">*</span>Sponsor ID: <span class="errors" id="sponsoridErr"><?php echo $sponsoridErr;?></span></p>
                        <input type="text" name="m_sponsorid" id="m_sponsorid" class='sponsorid' value="<?php echo $m_sponsorid;?>" readonly>
                  </div>
                  <div class="control" style="border: 0px solid #333;">
                        <p><span class="required">*</span>Username: <span class="errors" id="usernameErr"><?php echo $usernameErr;?></span></p>
                        <input type="text" name="m_username" id="m_username" value="<?php echo $m_username;?>" readonly>
                  </div>
                   
            </div>           
            
            <h1 class="sectionhead">Personal Details</h1>
            <div class="control-group" style="border: 0px solid #333;">
                  <div class="control" style="border: 0px solid #333;">
                        <p><span class="required">*</span>First Name: <span class="errors" id="firstnameErr"><?php echo $m_firstnameErr;?></span></p>
                        <input type="text" name="m_firstname" id="m_firstname" value="<?php echo $m_firstname;?>">
                  </div>

                  <div class="control" style="border: 0px solid #333;">
                        <p><span class="required">*</span>Last Name: <span class="errors" id="lastnameErr"><?php echo $m_lastnameErr;?></span></p>
                        <input type="text" name="m_lastname" id="m_lastname" value="<?php echo $m_lastname;?>">
                  </div>
            </div>
            
            <!--
            <div class="control-group" style="border: 0px solid #333;">
                  <div class="control" style="border: 0px solid #333;">
                        <p>Gender: <span class="errors" id="genderErr"><?php echo $genderErr;?></span></p>
                        <select name="m_gender">                              
                              <?php
                                    
                                    foreach ($genderlist as $key => $value) {
                                          if($key==$m_gender) {
                                              $selected = ' selected="selected"';
                                          }else{
                                              $selected='';
                                          }                                    
                                          echo "<option value='" . $key . "' $selected>" . $value . "</option>";
                                    }
                              ?>
                        </select>
                  </div>

                  <div class="control" style="border: 0px solid #333;">
                        <p>Date of Birth: <span class="errors" id="dobErr"><?php echo $dobErr;?></span></p>
                        <input type="date" name="m_dob" value="<?php echo $m_dob;?>">
                  </div>
            </div>
            -->
            <div class="control-group" style="border: 0px solid #333;">
                  <div class="control" style="border: 0px solid #333;">
                        <p><span class="required">*</span>Email Address: <span class="errors" id="emailErr"><?php echo $m_emailErr;?></span></p>
                        <input type="text" name="m_emailaddress" id="m_emailaddress" placeholder="Enter Email Address" value="<?php echo $m_emailaddress;?>">
                  </div>

                  <div class="control" style="border: 0px solid #333;">
                        <p>Phone No:<span class="errors" id="phoneErr"><?php echo $phoneErr;?></span></p>
                        <input type="text" name="m_phoneno" value="<?php echo $m_phoneno;?>">
                  </div>
            </div>
            <!--
             <div class="control-group" style="border: 0px solid #333;">
                  <div class="control" style="border: 0px solid #333;">
                        <p>Country: <span class="errors" id="contryErr"><?php echo $countryErr;?></span></p>
                        <select name="m_country" id="country">
                              <option value="">Select Country</option>
                              <?php
                                    $sql="SELECT * FROM mlmcountries";
                                    $result1=mysql_query($sql) or die(mysql_error());

                                    while($row1=mysql_fetch_array($result1)){
                                          $country=$row1['countryname'];
                                          if($country==$m_country) {
                                              $selected = ' selected="selected"';
                                          }else{
                                              $selected='';
                                          }                                    
                                          echo "<option value='" . $row1['countryname'] . "' $selected>" . $row1['countryname'] . "</option>";
                                    }
                              ?>
                        </select>
                  </div>

                  <div class="control" style="border: 0px solid #333;">
                        <p>City:<span class="errors" id="cityErr"><?php echo $cityErr;?></span></p>
                        <input type="text" name="m_city" placeholder="Enter City" value="<?php echo $m_city;?>">
                  </div>
            </div>

            <div class="control-group">
                  <div class="control" style="border: 0px solid #333;">
                        <p>Address: <span class="errors" id="addressErr"><?php echo $addressErr;?></span></p>
                        <textarea name="m_address" id="m_address"><?php echo $m_address;?></textarea>
                  </div> 
                  <div class="control" style="border: 0px solid #333;">
                        <p>Zip Code:<span class="errors" id="zipcodeErr"><?php echo $zipcodeErr;?></span></p>
                        <input type="text" name="m_zipcode" placeholder="Enter Zip Code" value="<?php echo $m_zipcode;?>">
                  </div>  
            </div>

            <h1 class="sectionhead">Nominee Details</h1>            
            <div class="control-group" style="border: 0px solid #333;">
                  <div class="control" style="border: 0px solid #333;">
                        <p>Nominee Name: <span class="errors" id="nomineenameErr"><?php echo $nomineenameErr;?></span></p>
                        <input type="text" name="m_nomineename" id="m_nomineename" placeholder="Enter Nominee Name" value="<?php echo $m_nomineename;?>">
                  </div>

                  <div class="control" style="border: 0px solid #333;">
                        <p>Nominee Phone Number: <span class="errors" id="nomineephonenoErr"><?php echo $nomineephonenoErr;?></span></p>
                        <input type="text" name="m_nomineephoneno" id="m_nomineephoneno" placeholder="Nominee Phone No." value="<?php echo $m_nomineephoneno;?>">
                  </div>
            </div>
            <div class="control-group" style="border: 0px solid #333;">
                  <div class="control" style="border: 0px solid #333;">
                        <p>Relationship: <span class="errors" id="relationshipErr"><?php echo $relationshipErr;?></span></p>
                        <select name="m_relationship">                              
                              <?php
                                    
                                    foreach ($relationshiplist as $key => $value) {
                                          if($key==$m_relationship) {
                                              $selected = ' selected="selected"';
                                          }else{
                                              $selected='';
                                          }                                        
                                          echo "<option value='" . $key . "' $selected>" . $key . "</option>";
                                    }
                              ?>
                        </select>
                  </div>

                  <div class="control" style="border: 0px solid #333;">
                        <p>Contact Address: <span class="errors" id="nomineeaddressErr"><?php echo $nomineeaddressErr;?></span></p>
                        <textarea name="m_nomineeaddress"><?php echo $m_nomineeaddress;?></textarea>
                  </div>
            </div>
            -->

            <h1 class="sectionhead">Bank Details</h1>
            <div class="control-group" style="border: 0px solid #333;">
                  <div class="control" style="border: 0px solid #333;">
                        <p>Account Holder: <span class="errors" id="accountnameErr"><?php echo $accountnameErr;?></span></p>
                        <input type="text" name="m_accountname" id="m_accountname" placeholder="Enter Account Holder" value="<?php echo $m_accountname;?>">
                  </div>

                  <div class="control" style="border: 0px solid #333;">
                        <p>Account Number: <span class="errors" id="accountnoErr"><?php echo $accountnoErr;?></span></p>
                        <input type="text" name="m_accountno" id="m_accountno" placeholder="Enter Account No." value="<?php echo $m_accountno;?>">
                  </div>
            </div>

            <div class="control-group" style="border: 0px solid #333;">
                  <div class="control" style="border: 0px solid #333;">
                        <p>Bank Name: <span class="errors"><?php echo $banknameErr;?></span></p>
                        <input type="text" name="m_bankname" id="m_bankname" placeholder="Enter Bank Name" value="<?php echo $m_bankname;?>">
                  </div>

                  <div class="control" style="border: 0px solid #333;">
                        <p>Branch Code:<span class="errors" id="bankswiftcodeErr"><?php echo $bankswiftcodeErr;?></span></p>
                        <input type="text" name="m_bankswiftcode" placeholder="Enter Branch Code" value="<?php echo $m_bankswiftcode;?>">
                  </div>
            </div>           

            <div class="control-group">
                  <div class="control double">
                        <input type="submit" name="submit" value="Update Record">
                  </div>
            </div>
      </form>
</div><!--registrationform-->  