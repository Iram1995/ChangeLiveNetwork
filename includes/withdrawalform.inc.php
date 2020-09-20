<div class="registrationform">
    <form name="withdrawal" method="post" action="/?section=withdrawalrequest">

        <div class="control-group">
            <div class="control">
                <p>Request Date</p>
                <input type="text" name="requestdate" value="<?php echo $today;?>" readonly>
            </div>
            <div class="control">
                <p>Amount(R)<span class="errors"><?php echo $amountErr;?></span></p>
                <input type="text" name="amount" placeholder="Enter Amount" value="<?php echo $amount ;?>">
            </div>
        </div>

        <!--<div class="control-group">-->
        <!--    <div class="control">-->
        <!--        <p>Transaction Password<span class="errors"><?php echo $transpasswordErr;?></span></p>-->
        <!--        <input type="Password" name="transpassword" placeholder="Transction Password">-->
        <!--    </div>-->
        <!--</div>-->
        <div class="control-group">
            <div class="control double">                            
                <input type="submit" name="submit" value="Submit">
            </div>                        
        </div>                    
    </form>
</div>