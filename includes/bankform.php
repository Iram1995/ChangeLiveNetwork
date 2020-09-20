
<div class="registrationform" style="margin-top: 24px;max-width: 960px;border:none;">      
     <form method="post" action="/?section=bankinfo">
          <h1 class="sectionhead">Bank Details</h1>
          <div class="control-group" style="border: 0px solid #333;">
                <div class="control" style="border: 0px solid #333;">
                      <p>Account Holder:</p>
                      <input type="text" name="accountname" id="accountname" placeholder="Enter Account Holder" value="<?php echo $accountname;?>">
                </div>

                <div class="control" style="border: 0px solid #333;">
                      <p>Account Number:</p>
                      <input type="text" name="accountno" id="accountno" placeholder="Enter Account No." value="<?php echo $accountno;?>">
                </div>
          </div>

          <div class="control-group" style="border: 0px solid #333;">
                <div class="control" style="border: 0px solid #333;">
                      <p>Bank Name:</p>
                      <input type="text" name="bankname" id="bankname" placeholder="Enter Bank Name" value="<?php echo $bankname;?>">
                </div>

                <div class="control" style="border: 0px solid #333;">
                      <p>Branch Code:</p>
                      <input type="text" name="bankswiftcode" placeholder="Enter Branch Code" value="<?php echo $bankswiftcode;?>">
                </div>
          </div>

          <div class="control-group">
                  <div class="control">
                      
                      <input type="submit" name="submit" value="Submit">
                  </div>
                  
              </div>
      </form>
</div><!--registrationform-->  