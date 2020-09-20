 <form class="registrationform" method="post" action="/?section=sendmail">
    <div class="control-group">
        <div class="control"><p>Sender's Name</p><input type="text" name="sender" disabled="disabled" value="<?php echo $sender;?>"></div>
        <div class="control"><p>Sender's Email</p><input type="text" name="email" disabled="disabled" value="<?php echo $email;?>"></div>
    </div>

    <div class="control-group">        
            <div class="control"><p>Recipient Email: <span class="errors" id="errRecipientemail"><?php echo $errRecipientemail;?></span></p><input type="text" name="recipientemail" value="<?php echo $recipientemail;?>"></div>
        
    </div>

    <div class="control-group">
        
            <div class="control double"><p>Subject: <span class="errors" id="errSubject"><?php echo $errSubject;?></span></p><input type="text" name="subject" value="<?php echo $subject;?>"></div>
        
    </div>

    <div class="control-group">
        <div class="control double"><p>Message: <span class="errors" id="errMessage"><?php echo $errMessage;?></span></p><textarea name="message" style="height: 300px;"></textarea></div>
    </div>

    <div class="control-group">
        <div class="control">
            <input type="submit" name="submit" value="Send">
        </div>
        
    </div>
</form>