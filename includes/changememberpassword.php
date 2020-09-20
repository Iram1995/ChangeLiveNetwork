<form class="registrationform" method="post" action="/?section=changepassword&userid=<?php echo $userid;?>">
                <div class="control-group">
                    <div class="control">
                        <p>Old Password</p>
                        <input type="Password" name="oldpassword" value="<?php echo $oldpassword;?>">
                    </div>                    
                </div>

                <div class="control-group">
                    <div class="control">
                        <p>New Password</p>
                        <input type="Password" name="newpassword" value="<?php echo $newpassword;?>">
                    </div>
                    <div class="control">
                        <p>Confirm New Password</p>
                        <input type="Password" name="confirmpassword" value="<?php echo $confirmpassword;?>">
                    </div>                    
                </div>

                <div class="control-group">
                    <div class="control">                        
                        <input type="submit" name="submit" value="Change Password">
                    </div>                    
                </div>
            </form>