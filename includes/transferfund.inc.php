<div class="registrationform" style="border: none;">
    <form class="" method="post" action="/?section=transferfund">

        <div class="control-group">
            <div class="control">
                <p>Recipient Membership ID <span class="errors" id="noofpinErr"><?php echo $recipientprofileidErr;?></span></p>
                <input type="text" name="recipientprofileid" id="recipientprofileid" value="<?php echo $recipientprofileid;?>" placeholder="Enter Recipient Membership ID">
            </div>
            <div class="control">
                <p>Recipient Name</p>
                <input type="text" name="recipientname" id="recipientname" readonly>
            </div>
        </div>

        <div class="control-group">
            
            <div class="control">
                <p>Amount(R) <span class="errors" id="noofpinErr"><?php echo $transferamountErr;?></span></p>
                <input type="text" name="transferamount" placeholder="Amount to Transfer">
            </div>
            <div class="control">
                <p>Transfer Description</p>
                <textarea name="transdescription"><?php echo $transdescription;?></textarea>
            </div>
        </div>

        <div class="control-group">
            <div class="control double">
                
                <input type="submit" name="submit" value="Transfer">
            </div>
        </div>
    </form>
</div>