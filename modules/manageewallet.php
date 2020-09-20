<?php

    $section=isset($_GET['section'])?$_GET['section']:'';
    if($section=='transactions'){
        echo "<h2>View All Transactions</h2>";
        $userid=$_SESSION['userid'];
        $sql="SELECT m.userid, m.transdate, m.creditamount, m.debitamount, m.transdescription FROM mlmmemberledger m WHERE m.userid=$userid";
        $result=mysql_query($sql) or die(mysql_error());
        ?>
            <table class="compact display tables">
                <thead>
                    <th>S/N</th><th>Date</th><th>Description</th><th style="text-align: right;padding-right: 5px;">CR(R)</th><th style="text-align: right;padding-right: 5px;">DR(R)</th><th style="text-align: right;padding-right: 5px;">Bal.(R)</th>
                </thead>
                <tbody>
                    <?php
                        $sn=1;
                        $balance=0;
                        while($rows=mysql_fetch_array($result)){
                            $balance=$balance+$rows[2]-$rows[3];
                            ?>
                                <tr><td><?php echo $sn;?></td><td><?php echo $rows[1];?></td><td><?php echo $rows[4];?></td><td style="text-align: right;padding-right: 5px;"><?php echo $rows[2];?></td><td style="text-align: right;padding-right: 5px;"><?php echo $rows[3];?></td><td style="text-align: right;padding-right: 5px;"><?php echo number_format($balance,2);?></td></tr>
                            <?php
                            $sn+=1;
                        }
                    ?>                    
                </tbody>
                
            </table>
        <?php
    }elseif($section=='listbonus'){   
        echo "<h2>List Bonus</h2>";
        include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/listbonus.inc.php";        
    }elseif($section=='matrixbonus'){
        echo "<h2>Matrix Bonus Configuration</h2>";
    }elseif ($section=='ewalletbalance') {
        # code...
        echo "<h2>E-Wallet Balance</h2>";
        ?>
            <section>
                 <figure>
                    <div class="item balancebox">
                        <p><span style="display:block;"></span><?php echo "R" . memberwallet($userid);?></p>
                        <div class="caption"><a href="/?section=transactions"><p>Total e-Wallet Balance</p></a></div>
                    </div>
                </figure>

                <figure>
                    <div class="item referralbox">
                        <p><span style="display:block;"></span><?php echo "R" . referralbalance($userid);?></p>
                        <div class="caption"><p>Total Referral Bonus</p></div>
                    </div>
                </figure>
                <figure>
                    <div class="item matrixbox">
                        <p><span style="display:block;"></span><?php echo "R" .  matrixbonus($userid);?></p>
                        <div class="caption"><p>Total Matrix Bonus</p></div>
                    </div>
                </figure>
                <figure>
                    <div class="item stepoutbox">
                        <p><span style="display:block;"></span><?php echo "R" .  stepoutbonus($userid);?></p>
                        <div class="caption"><p>Total StepOut Bonus</p></div>
                    </div>
                </figure>
                <figure>
                    <div class="item debitbox">
                        <p><span style="display:block;"></span><?php echo "R" .  totaldebit($userid);?></p>
                        <div class="caption"><p>Total Debit</p></div>
                    </div>
                </figure>
                <figure>
                    <div class="item receivedbox">
                        <p><span style="display:block;"></span><?php echo  "R" .  totalreceived($userid);?></p>
                        <div class="caption"><p>Total Received</p></div>
                    </div>
                </figure>

                <figure>
                    <div class="item loginbox">
                        <p style="padding: 20px 5px;line-height: 1;box-sizing: border-box;"><span style="display:block;"></span><a href="/"></a></p>
                        <div class="caption"><a href="/?section=logintoewallet"><p>Login to Use the e-Wallet</p></a></div>
                    </div>
                </figure>            
                
                
            </section>
        <?php
    }elseif ($section=='ewalletdebit') {
        # code...
        echo "<h2>E-Wallet Debit</h2>";

    }elseif ($section=='withdrawalrequest') {
         
        # code...
        $today=date("F j, Y");
            $amount=$amountErr='';
            $errors=0;
            if(isset($_POST['submit'])){
                $amount=isset($_POST['amount'])?$_POST['amount']:0;
                if(empty($amount) || $amount==0){
                    $amountErr="Amount requested cannot be 0 (zero) or blank";
                    $errors=1;
                }

                $totalamount=$amount;
                //if(memberwallet($userid) - $totalamount < 600){
                
                if($amount < 600){
                    $amountErr="Minimum withdrawal is R600";
                    $errors=1;
                }
                if(memberwallet($userid) < $totalamount){
                    $amountErr="Insufficient Balance in your wallet";
                    $errors=1;
                }

                $sql="SELECT * FROM mlmmembers WHERE userid=$userid";
                $result=mysql_query($sql) or die(mysql_error());


                if($errors==1){
                    // echo "<p><a href='/?section=endsession'>Log out of e-Wallet</a></p>";
                    include $_SERVER['DOCUMENT_ROOT'] . "/includes/withdrawalform.inc.php";
                }else{
                    
                    
                    $sql="INSERT INTO mlmmemberledger (userid, debitamount, transdescription, type,transdate,status) VALUES ('$userid',$amount,'Withdrawal from e-Wallet', 'Withdrawal', CURDATE(), 'Pending')";
                    $result=mysql_query($sql) or die(mysql_error());

                    $sql1="INSERT INTO mlmmemberledger (userid, debitamount, transdescription, type,transdate,status) VALUES ('$userid',$commission,'Commission paid on withdrawal from e-Wallet', 'Withdrawal', CURDATE(),'Paid')";
                    $result1=mysql_query($sql1) or die(mysql_error());


                    if($result1){
                        $username=getmember($userid);
                        $transrefid=mysql_insert_id();
                        $sql="INSERT INTO mlmledger (beneficiaryid, creditamount, transdescription, type, transrefid, transdate) VALUES ('$userid',$commission,' Commission on Withdrawal from e-Wallet by $username', 'Withdrawal',$transrefid, CURDATE())";
                        $result=mysql_query($sql) or die(mysql_error());

                        if($result){
                            echo "<h2>Withdrawal Request</h2>";
                            echo "<p>Transaction successfully completed</p>";
                            //send mail to administraor
                            $recipientemail=$sitemail;
                            $message='A withdrawal request has been initiated by: ' . $username . '. The administraor should approve the withdrawal request. Thank you.';
                            $subject='Withdrawal Request';
                            $mail=sendmail($recipientemail,$message,$subject,'Your request has been sent. Thank you.');

                            //echo "<p>Click <a href='/?section=endsession'> here </a> to Log out of e-Wallet</p>";
                        }
                    }
                }


            }else{
                echo "<h2>Withdrawal Request</h2>";
                echo "<p>Note: Minimum withdrawable balance is R600.</p>";
                echo "<p><strong>Available Balance is: R" . memberwallet($userid) ."</strong></p>";
                include $_SERVER['DOCUMENT_ROOT'] . "/includes/withdrawalform.inc.php";
            }
        
        // if(!isset($_SESSION['eWalletlogging'])){
        //     echo "<h2>Withdrawal Request</h2>";
        //     echo "<p>You are currently not logged in to perform e-Wallet trasactions. <a href='/?section=ewalletbalance'><strong>Log in to Use the e-Wallet</strong></a></p>";
        // }else{
        //     echo "<p><a href='/?section=endsession'> Log out of e-Wallet </a></p>";
        // }

        
    }elseif ($section=='transferfund') {
        # code...
        echo "<h2>Transfer Fund</h2>";
            ?>
                <p><b style="color:#f00;">Note that transactions cannot be reversed.</b></p>           
            <?php

            $errors=0;
            $transferamount=$transferdescription=$recipientprofileid='';
            if(isset($_POST['submit'])){
                $senderprofileid=isset($profileid)?$profileid:'';
                $recipientprofileid=isset($_POST['recipientprofileid'])?$_POST['recipientprofileid']:'';
                if(empty($recipientprofileid)){
                    $recipientprofileidErr="Enter Recipient Profile ID";
                    $errors=1;
                }

                $transferamount=isset($_POST['transferamount'])?$_POST['transferamount']:'';
                if(empty($transferamount)){
                    $transferamountErr="Enter Amount to Transfer";
                    $errors=1;
                }

                if(($transferamount)<300){
                    $transferamountErr="Amount cannot be less than R300";
                    $errors=1;
                }


                /*$sql3="SELECT SUM(creditamount) FROM mlmmemberledger WHERE userid=$userid";
                $result3=mysql_query($sql3) or die(mysql_error());
                $rows=mysql_fetch_array($result3);*/
                $creditbalance = memberwallet($userid);
                //echo =$rows[0];die();
                if ($creditbalance < $transferamount){
                    $transferamountErr="Insufficient Balance.";
                    $errors=1;    
                }      

                
                $sql1="SELECT * FROM mlmmembers WHERE profileid='$recipientprofileid'";
                $result1=mysql_query($sql1) or die(mysql_error());

                if(!mysql_num_rows($result1)>0){
                    $recipientprofileidErr="Invalid Recipient ID!";
                    $errors=1;
                }

                if($errors==1){
                    include $_SERVER['DOCUMENT_ROOT'] . "/includes/transferfund.inc.php";
                }else{

                    $recipientuserid=getuserid($recipientprofileid);
                    $senderuserid=getuserid($senderprofileid);
                    $sendername=getmember($senderuserid);
                    $recipientname=getmember($recipientuserid);
                    //$sql="INSERT INTO mlmfundtransfer(recipientprofileid, senderprofileid, transferamount, transferdate, transferdescription) VALUES ('$recipientprofileid','$senderprofileid',$transferamount, CURDATE(), '$transferdescription')";
                    //$result=mysql_query($sql) or die(mysql_error());

                    $sql="INSERT INTO mlmmemberledger (userid, debitamount, transdescription, type,transdate) VALUES ($senderuserid,$transferamount,'Transfer to ($recipientname)', 'Transfer', CURDATE())";
                    $result=mysql_query($sql) or die(mysql_error());

                    $sql="INSERT INTO mlmmemberledger (userid, creditamount, transdescription, type,transdate) VALUES ($recipientuserid,$transferamount,'Transfer from ($sendername)', 'Received', CURDATE())";
                    $result=mysql_query($sql) or die(mysql_error());                


                    if($result){
                        echo "<h3>Transfer successfully completed</h3>";
                        $transstatus='Transfer successfully completed';
                        $sql="INSERT INTO mlmfundtransfer(recipientuserid, senderuserid, transferamount, transferdate,transferdescription) VALUES ($recipientuserid,$senderuserid, $transferamount, CURDATE(), 'Transfer between $sendername to $recipientname')";
                        $result=mysql_query($sql) or die(mysql_error());


                       
                        $subject1='Fund Transfer Alert - Debit';
                        $subject2='Fund Transfer Alert - Credit';
                        $senderprofileid=$senderprofileid;
                        $recipientprofileid=$recipientprofileid;
                        $amount=$transferamount;
                        $senderemail=memberemail($senderprofileid);
                        $recipientemail=memberemail($recipientprofileid);
                        $tdate= date("d-M-Y") . " @ " . date("h:i:sa");

                        $to=$senderprofileid;
                        $msg="Dear " . $username . "\n\nYou have successfully carried out a transaction on your eWallet. Details of the transaction are given below.\n\nType of Transaction: Debit. \nAmount:" . $amount . "\nDate: " . $tdate . "\nBeneficiary Membership ID: " . $recipientprofileid . "\n\n";

                        $mail=sendmail($to,$msg,$subject1,$transstatus);
                    }else{
                        echo "<h3>Error completing the transfer. Please try again</h3>";
                        include $_SERVER['DOCUMENT_ROOT'] . "/includes/transferfund.inc.php";
                    }
                }

            }else{
                //echo "<p>Click <a href='/?section=endsession'> here </a> to Log out of e-Wallet</p>";
                include $_SERVER['DOCUMENT_ROOT'] . "/includes/transferfund.inc.php";
            }
        

        //check for e-wallet session
        //echo "<p><a href='/?section=endsession'> Log out of e-Wallet </a></p>";
        // if(isset($_SESSION['eWalletlogging'])){
            
        // }else{
        //     echo "<h2>Transfer Fund</h2>";
        //     echo "<p>You are currently not logged in to perform e-Wallet trasactions. <a href='/?section=ewalletbalance'><strong>Log in to Use the e-Wallet</strong></a></p>";
        // }
        

    }elseif ($section=='fundaccount') {
        # code...
        echo "<h2>Fund Your Account</h2>";
        ?>
            <p>Enter the proof of payment details below. Your account will be credited once payment is confirmed.</p>            
        <?php

        $tellerno=$tellerdate=$telleramount=$depositorname=$phoneno=$bankname=$banklocation=$proofpaymentErr=$image='';
        $tellernoErr=$tellerdateErr=$telleramountErr=$depositornameErr=$phonenoErr=$banknameErr=$banklocationErr='';$errors=0;
        if(isset($_POST['submit'])){

            //retrieve variables
            $tellerno=isset($_POST['tellerno'])?$_POST['tellerno']:'';
            if(empty($tellerno)){
                $tellernoErr="Reference Number can't blank";
                $errors=1;
            }

            $tellerdate=isset($_POST['tellerdate'])?$_POST['tellerdate']:'';
            if(empty($tellerdate)){
                $tellerdateErr="Payment date can't empty";
                $errors=1;
            }

            $telleramount=isset($_POST['telleramount'])?$_POST['telleramount']:'';
            if(empty($telleramount)){
                $telleramountErr="Enter Amount Paid.";
                $errors=1;
            }
            $depositorname=isset($_POST['depositorname'])?$_POST['depositorname']:'';
            if(empty($depositorname)){
                $depositornameErr="Enter Depositor name.";
                $errors=1;
            }
            $phoneno=isset($_POST['phoneno'])?$_POST['phoneno']:'';
            /*if(empty($bankname)){
                $banknameErr="Enter Bank Name";
                $errors=1;
            }*/
            $modeofpayment=isset($_POST['modeofpayment'])?$_POST['modeofpayment']:'';
            if(empty($modeofpayment)){
                $modeofpaymentErr="Select mode of payment";
                $errors=1;
            }

            //echo $documentname=isset($_FILES['document']['name'])?$_FILES['document']:'NA';die;
            /*if($documentname!='NA' && $errors!=1){
                if($_FILES['document']['type']=='image/gif'
                || $_FILES['document']['type']=='image/jpeg'
                || $_FILES['document']['type']=='image/jpg'
                || $_FILES['document']['type']=='image/png'  
                && $_FILES['document']['size']<2000){
                    if($_FILES['document']['error']>0){
                        $proofofpaymentErr= $_FILES['document']['error'];
                        $errors=1;
                    }else{
                        $i=1;
                        $success=false;
                        $new_image_name=$documentname;
                        while(!$success){
                            if(file_exists('/documents/' . $new_image_name)){
                                $i++;
                                $new_image_name="$i" . $documentname;
                            }else{
                                $success=true;
                            }
                        }
                        move_uploaded_file($_FILES['document']['tmp_name'], '/documents/'.$new_image_name);
                    }
                }else{
                    $proofofpaymentErr='Invalid file selected';
                }
            }*/
            $image=$_FILES['file']['name'];
            $filename=stripslashes($image);
            $ext=getExtension($filename);
            $ext=strtolower($ext);
            $allowed_ext = array("png","jpg","jpeg","gif");

            if(!empty($image)){
                if(!in_array($ext, $allowed_ext)){
                    $proofpaymentErr='Invalid file type - jpeg, jpg, gif, png allowed';
                    $errors=1;
                }elseif($_FILES['file']['error']>0){
                    $proofpaymentErr='Oops, seems there is a problem with the file';
                    $errors=1;
                }elseif($_FILES['file']['size']>200000){
                    $proofpaymentErr='File size too large';
                    $errors=1;
                }else{
                    $newName='';
                    $newName= time() . basename($_FILES['file']['name']);
                }
            }



            if($errors==1){
                include $_SERVER['DOCUMENT_ROOT'] . "/includes/fundaccount.inc.php";
            }else{

                move_uploaded_file($_FILES['file']['tmp_name'], 'documents/' . $newName);

                $sql="INSERT INTO mlmfundaccount(tellerno, userid, telleramount, tellerdate, depositorname, phoneno, modeofpayment,document) VALUES ('$tellerno', $userid, $telleramount, '$tellerdate', '$depositorname', '$phoneno', '$modeofpayment','$newName')";
                $result=mysql_query($sql) or die(mysql_error());

                if($result){
                    echo "<h3>Fund wallet successfully completed.</h3>";
                    echo "<p>Your account will be credited Immediately after confirmation is done. Thank you.</p>";
                }
            }

        }else{
            include $_SERVER['DOCUMENT_ROOT'] . "/includes/fundaccount.inc.php";
        }
    }elseif ($section=='endsession') {
        # code...
        echo "<h2>End e-Wallet Session</h2>";

        unset($_SESSION['eWalletlogging']);
        echo "<p>Loggedout from eWallet.</p>";
        header('Location: /?section=ewalletbalance');
    }elseif ($section=='withdrawalstatus') {
        echo "<h2>All Withdrawals</h2>";
        $sql="SELECT * FROM mlmmemberledger WHERE userid=$userid AND type='Withdrawal' ORDER BY transdate DESC";
        $result=mysql_query($sql) or die(mysql_error());

        if($result){
            ?>
                <table class="compact display tables">
                    <thead>
                        <th>SN</th><th>Member ID</th><th>Trans ID</th><th>Date</th><th>Amount</th><th>Description</th><th>Status</th>
                    </thead>
                    <tbody>
                        <?php
                            $sn=1;
                            while ($rows=mysql_fetch_array($result)) {
                                # code...
                                ?>
                                    <tr><td><?php echo $sn;?></td><td><?php echo getprofileid($rows['userid']);?></td><td><?php echo $rows['transid'];?></td><td><?php echo $rows['transdate'];?></td><td><?php echo $rows['debitamount'];?></td><td><?php echo $rows['transdescription'];?></td><td><?php echo $rows['status'];?></td></tr>
                                <?php

                                $sn+=1;
                            }
                        ?>                        

                    </tbody>
                    
                </table>
            <?php
        }

        # code...
    }elseif ($section=='managewallet') {
        # code...
        echo "</h2>Manage Members' e-Wallet</h2>";
    }
?>
                       

                

