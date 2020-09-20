<div class="registrationform">
    <form method="post" action="/?section=logintoewallet">
        <div class="control-group">
            <div class="control double">
                <p>Username<span class="errors"><?php echo $usernameErr;?></span></p>
                <input type="text" name="username" value="<?php echo $username;?>" readonly>
                <p>Transaction Password<span class="errors"><?php echo $transpasswordErr;?></span></p>
                <input type="password" name="transpassword">
            </div>

        </div>
        <div class="control-group">
            <div class="control double">
                <input type="submit" name="submit" value="Submit">
            </div>
            
        </div>
    </form>
</div>