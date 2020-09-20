<?php
    if($section=='supportticket'){
        echo "<h2>Submit Support Ticket</h2>";

        $errors=0;
        $subject=$message=$errSubject=$errMessage='';
        $sql="SELECT * FROM mlmmembers WHERE userid=$userid";
        $result=mysql_query($sql) or die(mysql_error());

        if($result){
            $rows=mysql_fetch_array($result);
            $sender=$rows['firstname'] . ", " . $rows['lastname'];
            $email=$rows['emailaddress'];                
        }

        if($_POST['submit']){
            //process and validate            
            $subject=isset($_POST['subject'])?$_POST['subject']:'';
            if(empty($subject)){
                $errSubject="Subject cannot be blank";
                $errors=1;
            }
            $message=isset($_POST['message'])?$_POST['message']:'';
            if(empty($message)){
                $errMessage="Message cannot be empty";
                $errors=1;
            }

            //check for errors
            if($errors==1){
                include $_SERVER['DOCUMENT_ROOT'] . "/includes/mailform.inc.php"; 
            }else{
                //save in database
                $recipientemail='admin@mlmpro.com';
                $sql="INSERT INTO mlmtickets (userid, ticketsubject, ticketsender, ticketmessage, datesent, recipientemail, senderemail) VALUES ($userid, '$subject', '$sender', '$message', CURDATE(), '$recipientemail', '$email')";
                $result=mysql_query($sql) or die(mysql_error());

                if($result){
                    
                    $mail=sendmail($recipientemail,$message,$subject,'Your ticket/message has been successfully submitted. We will get back to you shortly. Thank you.');

                }else{
                    echo "<p style='color:red;'>Error found sending your ticket/message. Please try again</p>";
                }
            }
        }else{
            include $_SERVER['DOCUMENT_ROOT'] . "/includes/mailform.inc.php";    
        }
        
    }elseif($section=='listmail'){
        echo "<h2>My Inbox</h2>";
        $sql="SELECT t.ticketid, t.ticketsubject subject, t.ticketsender sender, t.ticketmessage message, t.datesent, t.status, t.userid, m.userid, m.firstname, m.lastname, m.emailaddress, m.passport FROM mlmtickets t INNER JOIN mlmmembers m ON t.userid=m.userid WHERE t.userid=$userid ORDER BY t.datesent DESC";
        $result=mysql_query($sql) or die(msql_error());
        ?>
            <table class="compact display tables" style="font-size: 1.2em;">
                <thead>
                    <th>Subject</th><th>Sender</th><th>Message</th><th>Date Sent</th><th>Status</th>
                </thead>
                <tbody>
                    <?php
                        while($rows=mysql_fetch_array($result)){
                            ?>
                                <tr><td><a href="/?section=read&mailid=<?php echo $rows['ticketid'];?>"><?php echo $rows['subject'];?></a></td><td><!--<span style="padding-right: 10px; line-height: 24px;"><img src="/passports/<?php echo $rows['passport'];?>" style='width: 24px;border-radius: 50%;float: left;'></span>--><div><?php echo $rows['sender'];?></td></div><td><?php echo $rows['message'];?></td><td><?php echo $rows['datesent'];?></td><td><?php echo $rows['status'];?></td></tr>
                            <?php
                        }
                    ?>
                </tbody>

            </table>
            <p>Click message subject  to read.</p>
        <?php
    }elseif($section=='read'){
        $ticketid=isset($_GET['mailid'])?$_GET['mailid']:0;
        $sql="SELECT * FROM mlmtickets WHERE ticketid=$ticketid";
        $result=mysql_query($sql) or die(mysql_error());

        if($result){
            $rows=mysql_fetch_array($result);
            ?>
                <form class="registrationform">
                    <div class="control-group">
                        <div class="control double">
                            <p>Subject</p>
                            <input type="text" name="subject" value="<?php echo $rows['ticketsubject'];?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control double">
                            <p>Message</p>
                            <textarea name="message"><?php echo $rows['ticketmessage'];?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control double">
                            <p>Send Reply</p>
                            <textarea name="reply"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control">
                            <input type="submit" name="submit" value="Send">
                        </div>
                    </div>
                </form>
            <?php
        }

    }elseif($section=='sentitems'){
        echo "<h2>My Sent Items</h2>";
        $sql="SELECT t.ticketid, t.ticketsubject, t.ticketsender, t.ticketmessage, t.datesent, t.status, t.userid, m.userid, m.firstname, m.lastname, m.emailaddress, m.passport FROM mlmtickets t INNER JOIN mlmmembers m ON t.userid=m.userid WHERE t.userid=$userid ORDER BY t.datesent DESC";
        $result=mysql_query($sql) or die(msql_error());
        ?>
            <table class="compact display tables">
                <thead>
                    <th>Subject</th><th>Message</th><th>Recipient</th><th>Date Sent</th>
                </thead>
                <tbody>
                    <?php
                        while ($rows=mysql_fetch_array($result)) {
                            ?>
                                <tr><td><?php echo $rows['ticketsubject'];?></td><td><?php echo $rows['ticketmessage'];?></td><td><?php echo $rows['recipientemail'];?></td><td><?php echo $rows['datesent'];?></td></tr>
                            <?php
                        }                        
                    ?>
                </tbody>
            </table>
        <?php
    }elseif ($section=='sendmail') {
        echo "<h2>Send Message<span style='font-size:12px;color:purple;font-weight:normal;margin-left:10px;'>To Members within the Network ONLY</span></h2>";
        $errors=0;
        $subject=$message=$errSubject=$errMessage='';
        $sql="SELECT * FROM mlmmembers WHERE userid=$userid";
        $result=mysql_query($sql) or die(mysql_error());

        if($result){
            $rows=mysql_fetch_array($result);
            $sender=$rows['firstname'] . ", " . $rows['lastname'];
            $email=$rows['emailaddress'];                
        }

        if($_POST['submit']){
            //process and validate            
            $subject=isset($_POST['subject'])?$_POST['subject']:'';
            if(empty($subject)){
                $errSubject="Subject cannot be blank";
                $errors=1;
            }
            $recipientemail=isset($_POST['recipientemail'])?$_POST['recipientemail']:'';
            if(empty($recipientemail)){
                $errRecipientemail="Recipient email cannot be empty";
                $errors=1;
            }

            $sql="SELECT * FROM mlmmembers WHERE emailaddress='$recipientemail'";
            $result=mysql_query($sql) or die(mysql_error());
            $count=mysql_num_rows($result);
            if($count==0){
                $errRecipientemail="Address is not MLMPro Member's email address";
                $errors=1;
            }

            $message=isset($_POST['message'])?$_POST['message']:'';
            if(empty($message)){
                $errMessage="Message cannot be empty";
                $errors=1;
            }

            //check for errors
            if($errors==1){
                include $_SERVER['DOCUMENT_ROOT'] . "/includes/mailform2.inc.php"; 
            }else{
                //save in database
                
                $sql="INSERT INTO mlmtickets (userid, ticketsubject, ticketsender, ticketmessage, datesent, recipientemail, senderemail) VALUES ($userid, '$subject', '$sender', '$message', CURDATE(), 'admin@mlmpro.com', '$email')";
                $result=mysql_query($sql) or die(mysql_error());

                if($result){
                    
                    $mail=sendmail($recipientemail,$message,$subject,'Your message has been successfully sent.');

                }else{
                    echo "<p style='color:red;'>Error found sending your message. Please try again</p>";
                }
            }
        }else{
            include $_SERVER['DOCUMENT_ROOT'] . "/includes/mailform2.inc.php";    
        }
        
    }

?>
                        
                
