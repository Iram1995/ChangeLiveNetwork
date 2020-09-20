<div class="status"><?php echo $errMsg;?></div>
<h3 style="font-size:1.6em;color:#f00;"><b>Note: </b>  Each E-Pin Costs R300</h3>
<div class="registrationform">
      <form name="generatepin" id="generatepin" method="post" action="/?section=generatepin">           
            <h1 class="sectionhead">Add Pins</h1>
            <!--<input type="hidden" name="pinamount" id="pinamount" class="numbers" placeholder="Enter Pin Amount" value="<?php echo $pinamount;?>">-->
            
            <div class="control-group" style="border: 0px solid #333;">
                <div class="control" style="border: 0px solid #333;">
                    <p>Pin Cost: <span class="errors" id="pinamountErr"><?php echo $pinamountErr;?></span></p>
                    <input type="text" name="pinamount" id="pinamount" class="numbers" placeholder="Enter Pin Amount" value="<?php echo $pinamount;?>" disabled>
                </div>

                <div class="control" style="border: 0px solid #333;">
                    <p>No. of Pins: <span class="errors" id="noofpinErr"><?php echo $noofpinErr;?></span></p>
                    <input type="text" name="noofpin" id="noofpin" class="numbers" placeholder="Enter Number of Pins" value="<?php echo $noofpin;?>">
                </div>
            </div>           
            

            <div class="control-group" style="">
                  <span class="errors" id=""><?php echo $insufficientbalance;?></span>
                  <div class="control">
                        <input type="submit" name="submit" value="Generate Pins">
                  </div>
            </div>
      </form>
</div><!--registrationform-->  