
<p>Success is teamwork. You need a team for this journey. Share your Profile ID by entering your friends and family email address and invite them to join your team to help you grow!</p>

<form class="registrationform" method="post" action="/?section=referralurl">
    <div class="control-group">
        <div class="control double">
            <p>Copy your Referral Link</p><input type="text" name='sponsorurl' value="<?php echo 'http://'.$websitelink.'/register/?id='.$profileid;?>" readonly>
        </div>   
        <input type="hidden" name="link" value="<?php echo 'http://'.$websitelink.'/register/?id='. $profileid;?>">                 
    </div>
    <div class="control double">
        <p>OR</p>
    <h1 class="sectionhead">Send Invitation using email addres</h1>
    
    <div class="control-group">
        <div class="control">
            <p>Email Address <span class="errors"><?php echo $emailErr;?></span></p><input type="text" name="email">
        </div>
        <!--<div class="control">-->
        <!--    <p>Phone No.</p><input type="text" name="phone">-->
        <!--</div>-->
    </div>

    <div class="control-group">
        <div class="control double">
            <p>Message</p>
            <textarea name="message"></textarea>
        </div>
    </div>
    <div class="control-group">
        <div class="control">
            <input type="submit" name="submit" value="Send Invite">
        </div>
    </div>

</form>