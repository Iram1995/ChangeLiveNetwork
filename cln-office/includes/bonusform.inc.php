<div class="status"><?php echo $errMsg;?></div>
<div class="registrationform" style='border:none;'>
      <form name="createbonus" id="createbonus" method="post" action="/admin/?section=createbonus">        

            <input type='hidden' name='bonusid' value=<?php echo $bonusid;?>>
            <div class="control-group" style="border: 0px solid #333;">
                <div class="control" style="border: 0px solid #333;">
                    <?php 
                        $bonuses=array('Referral','Welcome','Matrix','StepOut');
                    ?>
                    <p>Bonus Type <span class="errors" id="bonustypeerr"><?php echo $bonustypeErr;?></span></p>
                    <select name='bonustype'><option value="">- Select Bonus -</option>
                    <?php

                        foreach($bonuses as $bonus){ 
                            if($bonus==$bonustype) {
                                echo '<option value="' . $bonus . '" selected="selected">' . $bonus . '</option>';
                            }else{ 
                                echo '<option value="' . $bonus . '">' . $bonus . '</option>';
                            }
                        } 
                    ?>

                    </select>
                </div>
                <div class="control" style="border: 0px solid #333;">
                    <p>Bonus Amount <span class="errors" id="bonusamountErr"><?php echo $bonusamountErr;?></span></p>
                    <input type="text" name="bonusamount" id="bonusamount" class="numbers" placeholder="Enter Bonus Amount" value="<?php echo $bonusamount;?>">
                </div>

                

            </div>

            <div class="control-group" style="">
                <div class="control" style="border: 0px solid #333;">
                    <p>Bonus Stage <span class="errors" id="bonusstageeerr"><?php echo $bonusstageErr;?></span></p>
                    <?php 
                        // $stages=array('Feeder Star','Basic Star','Prime Star','Super Star','Mega Star','Infinity Star');
                         $stages=array('Lily Stage','Rose Stage','Petunia Stage','Daisy Stage','Heather Stage','Azalea Stage','Begonia Stage','Carnation Stage','Infinity Stage');
                    ?>
                    <select name='bonusstage'><option value="">- Select Stage - </option>
                        <?php
                        foreach($stages as $stage){
                            if($stage==$bonusstage) {
                                echo '<option value="' . $stage . '" selected="selected">' . $stage . '</option>';
                            }else{ 
                                echo '<option value="' . $stage . '">' . $stage . '</option>';
                            }
                        } 

                    ?>

                    </select>

                </div>

                <div class="control" style="border: 0px solid #333;">

                    <p>Bonus Description <span class="errors" id="bonusdescription"><?php echo $bonusdescriptionErr;?></span></p>

                    <textarea name="bonusdescription" id="bonusdescription"><?php echo $bonusdescription;?></textarea>

                </div>

            </div>

            

            <div class="control-group" style="border: 0px solid #333;">

                <div class="control">

                    <input type="submit" name="submit" value="Submit">

                </div>

            </div>

      </form>

</div><!--registrationform-->  