<form class="registrationform" method="post" action="/admin/?section=read&mailid=<?php echo $ticketid;?>">
    <input type="hidden" name="senderuserid" value="<?php echo $rows['userid'];?>">
    <input type="hidden" name="ticketid" value="<?php echo $rows['ticketid'];?>">
    <input type="hidden" name="senderemail" value="<?php echo $rows['senderemail'];?>">
    <div class="control-group">
        <div class="control double">
            <p>Subject</p>
            <input type="text" name="subject" value="<?php echo 'Re: ' . $rows['ticketsubject'];?>">
        </div>
    </div>
    <div class="control-group">
        <div class="control double">
            <p>Message</p>
            <textarea name="message" readonly="readonly"><?php echo $rows['ticketmessage'];?></textarea>
        </div>
    </div>
    <div class="control-group">
        <div class="control double">
            <p>Send Reply<span class="errors"><?php echo $replyErr;?></span></p>
            <textarea name="reply"><?php echo $reply;?></textarea>
        </div>
    </div>
    <div class="control-group">
        <div class="control">
            <input type="submit" name="submit" value="Send">
        </div>
    </div>
</form>