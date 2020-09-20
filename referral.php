<?php
    if($section=='referralurl'){
        echo "<h2>Referral</h2>";   
        ?>
            <p>You can grow your network online by inviting others to join your business. Just enter your friends and family email addresses or/and phone below and invite them to join your team to help you grow!</p>

            <form class="registrationform" method="post" action="/?section=referralurl">
                <h1 class="sectionhead">Send Invitation</h1>
                <div class="control-group">
                    <div class="control">
                        <p>Email Address</p><input type="text" name="email">
                    </div>
                    <div class="control">
                        <p>Phone No.</p><input type="text" name="phone">
                    </div>
                </div>

                <div class="control-group">
                    <div class="control double">
                        <p>Message</p>
                        <textarea name="message"></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <div class="control">
                        <input type="submit" name="submit" value="Invite">
                    </div>
                </div>

            </form>
        <?php
    }elseif($section=='viewinvitations'){
        echo "<h2>View Invitations</h2>";
    }

?>
                        
                
