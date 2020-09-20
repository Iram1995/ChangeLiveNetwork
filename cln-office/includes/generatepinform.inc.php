<div class="status"><?php echo $errMsg;?></div>
<div class="registrationform">
      <form name="generatepin" id="generatepin" method="post" action="/admin/?section=generatepin">           
            <h1 class="sectionhead">Add Pins</h1>
            
            <div class="control-group" style="border: 0px solid #333;">
                  <!--<div class="control" style="border: 0px solid #333;">
                        <p>Pin Denomination: <span class="errors" id="pinamountErr"><?php echo $pinamountErr;?></span></p>
                        <input type="text" name="pinamount" id="pinamount" class="numbers" placeholder="Enter Pin Amount" value="<?php echo $pinamount;?>">
                  </div>-->

                  <div class="control" style="border: 0px solid #333;">
                        <p>No. of Pins: <span class="errors" id="noofpinErr"><?php echo $noofpinErr;?></span></p>
                        <input type="text" name="noofpin" id="noofpin" class="numbers" placeholder="Enter Number of Pins" value="<?php echo $noofpin;?>">
                  </div>
                  <div class="control">
                        <p></p>
                        <input type="submit" name="submit" value="Generate Pins">
                  </div>
            </div>
      </form>
</div><!--registrationform-->  