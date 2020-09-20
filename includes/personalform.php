
<div class="registrationform" style="margin-top: 24px;max-width: 960px;border:none;">
      
      <form name="register" id="register" method="post" action="/?section=personal">
            <div class="control-group">                  
                  <div class="control">
                        <p>Username</p>
                        <input type="text" name="Username" value="<?php echo $username;?>" readonly>
                  </div>
                  <div class="control">
                        <p>Date Joined</p>
                        <input type="text" name="datejoined" value="<?php echo $datejoin;?>" readonly>
                  </div>
            </div>            
            
            <h1 class="sectionhead">Personal Details</h1>
            <div class="control-group" style="border: 0px solid #333;">
                  <div class="control" style="border: 0px solid #333;">
                        <p><span class="required">*</span>First Name: <span class="errors" id="firstnameErr"><?php echo $firstnameErr;?></span></p>
                        <input type="text" name="firstname" id="firstname" placeholder="Enter First Name" value="<?php echo $firstname;?>">
                  </div>

                  <div class="control" style="border: 0px solid #333;">
                        <p><span class="required">*</span>Last Name: <span class="errors" id="lastnameErr"><?php echo $lastnameErr;?></span></p>
                        <input type="text" name="lastname" id="lastname" placeholder="Enter Last Name" value="<?php echo $lastname;?>">
                  </div>
            </div>
            <!--
            <div class="control-group" style="border: 0px solid #333;">
                  <div class="control" style="border: 0px solid #333;">
                        <p>Gender: <span class="errors" id="genderErr"><?php echo $genderErr;?></span></p>
                        <select name="gender">                              
                              <?php
                                    
                                    foreach ($genderlist as $key => $value) {
                                         if($key==$gender){
                                                echo '<option value="' . $key . '" selected >' . $value . '</option>';
                                          }else{
                                                echo '<option value="' . $key . '">' . $value . '</option>';
                                          }
                                    }
                              ?>
                        </select>
                  </div>

                  <div class="control" style="border: 0px solid #333;">
                        <p>Date of Birth: <span class="errors" id="dobErr"><?php echo $dobErr;?></span></p>
                        <input type="date" name="dob">
                  </div>
            </div>
            -->
            <div class="control-group" style="border: 0px solid #333;">
                  <div class="control" style="border: 0px solid #333;">
                        <p><span class="required">*</span>Email Address: <span class="errors" id="emailErr"><?php echo $emailErr;?></span></p>
                        <input type="text" name="emailaddress" id="emailaddress" placeholder="Enter Email Address" value="<?php echo $emailaddress;?>">
                  </div>

                  <div class="control" style="border: 0px solid #333;">
                        <p>Phone No:<span class="errors" id="phoneErr"><?php echo $phoneErr;?></span></p>
                        <input type="text" name="phoneno" placeholder="Enter Phone" value="<?php echo $phoneno;?>">
                  </div>
            </div>
            <!--
             <div class="control-group" style="border: 0px solid #333;">
                  <div class="control" style="border: 0px solid #333;">
                        <p>Country: <span class="errors" id="contryErr"><?php echo $contryErr;?></span></p>
                        <select name="country" id="country">
                              <option value="">Select Country</option>
                              <?php
                                    $sql="SELECT * FROM mlmcountries";
                                    $result=mysql_query($sql) or die(mysql_error());

                                    while($rows=mysql_fetch_array($result)){
                                          if($country==$rows['countryname']){
                                                echo '<option value="' . $rows['countryname'] . '" selected >' . $rows['countryname'] . '</option>';
                                          }else{
                                                echo '<option value="' . $rows['countryname'] . '">' . $rows['countryname'] . '</option>';
                                          } 
                                    }
                              ?>
                        </select>
                  </div>

                  <div class="control" style="border: 0px solid #333;">
                        <p>City:<span class="errors" id="cityErr"><?php echo $cityErr;?></span></p>
                        <input type="text" name="city" placeholder="Enter City" value="<?php echo $city;?>">
                  </div>
            </div>

            <div class="control-group">
                  <div class="control" style="border: 0px solid #333;">
                        <p>Address: <span class="errors" id="addressErr"><?php echo $addressErr;?></span></p>
                        <textarea name="address" id="address"><?php echo $address;?></textarea>
                  </div> 
                  <div class="control" style="border: 0px solid #333;">
                        <p>Zip Code:<span class="errors" id="zipcodeErr"><?php echo $zipcodeErr;?></span></p>
                        <input type="text" name="zipcode" placeholder="Enter Zip Code" value="<?php echo $zipcode;?>">
                  </div>  
            </div>
            

            <h1 class="sectionhead">Nominee Details</h1>            
            <div class="control-group" style="border: 0px solid #333;">
                  <div class="control" style="border: 0px solid #333;">
                        <p>Nominee Name: <span class="errors" id="nomineenameErr"><?php echo $nomineenameErr;?></span></p>
                        <input type="text" name="nomineename" id="nomineename" placeholder="Enter Nominee Name" value="<?php echo $nomineename;?>">
                  </div>

                  <div class="control" style="border: 0px solid #333;">
                        <p>Nominee Phone Number: <span class="errors" id="nomineephonenoErr"><?php echo $nomineephonenoErr;?></span></p>
                        <input type="text" name="nomineephoneno" id="nomineephoneno" placeholder="Nominee Phone No." value="<?php echo $nomineephoneno;?>">
                  </div>
            </div>
            <div class="control-group" style="border: 0px solid #333;">
                  <div class="control" style="border: 0px solid #333;">
                        <p>Relationship: <span class="errors" id="relationshipErr"><?php echo $relationshipErr;?></span></p>
                        <select name="relationship">                              
                              <?php
                                    
                                    foreach ($relationshiplist as $key => $value) {
                                          
                                          if($key==$relationship){
                                                echo '<option value="' . $key . '" selected >' . $value . '</option>';
                                          }else{
                                                echo '<option value="' . $key . '">' . $value . '</option>';
                                          }
                                    }
                              ?>
                        </select>
                  </div>

                  <div class="control" style="border: 0px solid #333;">
                        <p>Contact Address: <span class="errors" id="nomineeaddressErr"><?php echo $nomineeaddressErr;?></span></p>
                        <textarea name="nomineeaddress"><?php echo $nomineeaddress;?></textarea>
                  </div>
            </div>
            -->

            
            <div class="control-group">
                  <div class="control">
                        <input type="submit" name="submit" value="Submit">
                  </div>
            </div>
      </form>
</div><!--registrationform-->  