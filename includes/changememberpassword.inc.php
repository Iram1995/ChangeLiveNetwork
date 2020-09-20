<form class="registrationform" method="post" action="/?section=changepassword">
    <div class="control-group">
        <div class="control">
            <p>Old Password<span class="errors"><?php echo $oldpasswordErr;?></span></p>
            <input type="Password" name="oldpassword" value="<?php echo $oldpassword;?>">
        </div>     
        <input type="hidden" name="userid" value="<?php echo $userid;?>">               
    </div>

    <div class="control-group">
        <div class="control">
            <p>New Password<span class="errors"><?php echo $newpasswordErr;?></span></p>
            <input type="Password" name="newpassword" value="<?php echo $newpassword;?>">
        </div>
        <div class="control">
            <p>Confirm New Password <span class="errors"><?php echo $confirmpasswordErr;?></span></p>
            <input type="Password" name="confirmpassword" value="<?php echo $confirmpassword;?>">
        </div>                    
    </div>

    <div class="control-group">
        <div class="control">                        
            <input type="submit" name="submit" value="Change Password">
        </div>                    
    </div>
</form>