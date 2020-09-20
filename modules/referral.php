<?php
    if($section=='referralurl'){
        echo "<h2>Referral</h2>";   
        
        $email=$phoneno=$emailErr='';
        $errors=0;
        if(isset($_POST['submit'])){

            $sponsorurl=isset($_POST['sponsorurl'])?$_POST['sponsorurl']:'';
            $link=$_POST['link'];
            $email=isset($_POST['email'])?$_POST['email']:'';
            if(empty($email)){
                $emailErr="Email cannot be empty";
                $errors=1;
            }
            $msg=isset($_POST['message'])?$_POST['message']:'';

            if($errors==1){
                include $_SERVER['DOCUMENT_ROOT'] . "/includes/referralform.php";
            }else{
                $sql="INSERT INTO mlmreferrals(message, recipientemail,recipientphone, datesent) VALUES ('$sponsorurl', '$email','$phoneno', CURDATE())";
                $result=mysql_query($sql) or die(mysql_error());

                if($result){
                    $message="Hi,\n\nI am a member of " . $sitename . " and I will like to invite you to join me in the life changing business.\n\nClick this " . $link . " link to register and join my team";

                    if(!empty($msg)){
                        $message.="\n\n" . $msg;
                    }

                    sendmail($email, $message," Invitation");
                }
            }

        }else{
            include $_SERVER['DOCUMENT_ROOT'] . "/includes/referralform.php";
        }
    }elseif($section=='viewinvitations'){
        echo "<h2>View Invitations</h2>";
        $sql="SELECT * FROM mlmreferrals WHERE userid=$userid";
        $result=mysql_query($sql) or die(mysql_error());
        ?>
            <table class="tables display compact">
                <thead>
                    <tr><th>SN</th><th>Recipient eMail</th><th>Recipient Phone</th><th>Date</th></tr>
                </thead>
                <tbody>
                    <?php
                        while($rows=mysql_fetch_array($result)){
                            ?>
                                <tr><td><?php echo $rows['recipientemail'];?></td></tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        <?php
    }

?>
                        
                
