<?php

    $section=isset($_GET['section'])?$_GET['section']:'';
    if($section=='funddeposit'){
        echo "<h2>Members Proof of Payment</h2>";
        //echo "<h2>Fund Deposits</h2>";
        $sql="SELECT f.*, m.userid, m.username FROM mlmfundaccount f INNER JOIN mlmmembers m ON f.userid=m.userid WHERE fundstatus='PENDING' ORDER BY fundid DESC";
        $result=mysql_query($sql) or die(mysql_error());

        if($result){
            $sn+=1;
            ?>
                <table class="tables compact display" style="font-size: 1.0em;">
                    <thead>
                        <tr><th>SN</th><th>Reference No.</th><th>Payment Date</th><th>Depositor's Name</th><th>Phone No.</th><th>Amount</th><th>Mode of Payment</th><th>Username</th><th>Status</th><th>Action</th></tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($rows=mysql_fetch_array($result)) {
                            # code...
                            ?>
                                <tr><td><?php echo $sn;?></td><td><?php echo $rows['tellerno'];?></td><td><?php echo $rows['tellerdate'];?></td><td><?php echo $rows['depositorname'];?></td><td><?php echo $rows['phoneno'];?></td><td><?php echo $rows['telleramount'];?></td><td><?php echo $rows['modeofpayment'];?></td><td><?php echo $rows['username'];?></td><td><?php echo $rows['fundstatus'];?></td><td><a href="/admin/?section=confirmdeposit&fundid=<?php echo $rows['fundid'];?>">Confirm Deposit</a></td></tr>
                            <?php
                        }                                               
                        ?>
                    </tbody>
                </table>
            <?php
        }

    }elseif($section=='withdrawalrequest') {
        # code...
        echo "<h2>All Members' Withrawal Requests</h2>";
        echo "<p>Click the Transaction ID [Trans ID] to approve/decline the request</p>";
        $sql="SELECT * FROM mlmmemberledger WHERE type='Withdrawal' ORDER BY transdate DESC";
        $result=mysql_query($sql) or die(mysql_error());

        if($result){
            ?>
                <table class="compact display tables">
                    <thead>
                        <th>SN</th><th>Member ID</th><th>Trans ID</th><th>Date Requested</th><th>Amount</th><th>Description</th><th>Status</th>
                    </thead>
                    <tbody>
                        <?php
                            $sn=1;
                            while ($rows=mysql_fetch_array($result)) {
                                # code...
                                ?>
                                    <tr><td><?php echo $sn;?></td><td><?php echo getprofileid($rows['userid']);?></td>
                                        <td><a href="/admin/?section=approvewithdrawal&transid=<?php echo $rows['transid'];?>"><?php echo $rows['transid'];?></a></td><td><?php echo $rows['transdate'];?></td><td><?php echo $rows['debitamount'];?></td><td><?php echo $rows['transdescription'];?></td><td><?php echo $rows['status'];?></td></tr>
                                <?php

                                $sn+=1;
                            }
                        ?>                        

                    </tbody>
                    
                </table>
            <?php
        }
    }elseif($section=='confirmdeposit') {

    	# code...
    	$fundid=isset($_GET['fundid'])?$_GET['fundid']:0;
    	$telleramount=0;

    	if(isset($_POST['submit'])){
    		$fundid=$_POST['fundid'];
    		$muserid=$_POST['userid'];
    		$amount=isset($_POST['dollaramount'])?$_POST['dollaramount']:0;
    		$refno=isset($_POST['refno'])?$_POST['refno']:'NA';
    		$transdate=$_POST['transdate'];
    		$depositorname=$_POST['depositorname'];
    		$musername=isset($_POST['username'])?$_POST['username']:'NA';
    		$emailaddress=isset($_POST['emailaddress'])?$_POST['emailaddress']:'NA';
    		$sql1="INSERT INTO mlmmemberledger(userid,creditamount,transdescription, transdate, type) VALUE ($muserid,$amount, 'Deposit to eWallet', CURDATE(),'Deposit')";
    		$result=mysql_query($sql1) or die(mysql_error());

    		if($result){
    			//sendmail to member
    			//$username='test';
				$to=$emailaddress;
				$msg="Hi " . $username ." \n\nYour deposit has been confirmed. \n\nThe details of the deposit is as follows:. \n\nRef No: ". $refno . " \n\n Amount : " . $amount . "  \n\n Date : " . $transdate . "\n\nPlease note that, the equivalent of the amount paid in has been credited to your account with us.";
				$subject="Fund Account Confirmation";

				//$mail=sendmail($to,$msg,$subject);
                $mail=sendmail($to,$msg,$subject,'Transaction successfully approved');
                mysql_query("UPDATE mlmfundaccount SET fundstatus='Approved' WHERE fundid=$fundid");
				
    			//display success mesage
    			echo "<h3 style='color:green;'>Transaction successfully completed. An email has also been sent to the beneficiary</h3>";
    			
    		}else{
    			echo "<h3 style='color:red;'>Transaction cannot be completed. Please try again.</h3>";
    		}

    	}else{
    		$sql="SELECT f.*, m.userid, m.username,m.emailaddress FROM mlmfundaccount f INNER JOIN mlmmembers m ON f.userid=m.userid WHERE fundid=$fundid";
	    	$result=mysql_query($sql) or die(mysql_error());
	    	//echo mysql_num_rows($result);
	    	$rows=mysql_fetch_array($result);
	    	?>
                <!--<p>Please note that, member's account will be credited with dollar equivalent of amount paid in @ N200.00 to $1.</p>-->
	    		<form class="registrationform" action="/admin/?section=confirmdeposit" method="post">
	    			<div class="control-group">
                        <div class="control">
                            <p>User ID:</p>
                            <input type="text" name="userid" value="<?php echo $rows['userid'];?>" readonly>
                        </div>
	    				<div class="control">
                            <p>Transaction ID</p>
                            <input type="text" name="fundid" value="<?php echo $rows['fundid'];?>" readonly>
                        </div>	    				
                    </div>
                    <div class="control-group">
                        <div class="control">
                            <p>Transaction Date:</p>
                            <input type="text" name="transdate" value="<?php echo $rows['tellerdate'];?>" readonly>
                        </div>
                        <div class="control">
                            <p>Reference No</p>
                            <input type="text" name="refno" value="<?php echo $rows['tellerno'];?>" readonly>
                        </div>                      
                    </div>
                    <div class="control-group">
                        <div class="control">
                            <p>Username</p>
                            <input type="text" name="username" value="<?php echo $rows['username'];?>" readonly>
                        </div>
                        <div class="control">
                            <p>Email Address</p>
                            <input type="text" name="emailaddress" value="<?php echo $rows['emailaddress'];?>" readonly>
                        </div>
    				</div>
	    				
                    <!--<div class="control-group">
	    				<div class="control">
	    					<p>Transaction Date</p>
	    					<input type="text" name="tellerdate" value="<?php echo $rows['tellerdate'];?>" disabled='disabled'>
	    				</div>
	    				<div class="control">
	    					<p>Reference No</p>
	    					<input type="text" name="tellerno" value="<?php echo $rows['tellerno'];?>" disabled='disabled'>
	    				</div>
	    			</div>-->
	    			<div class="control-group">    				
	    				<!---->
	    				<div class="control">
	    					<p>Depositor's Name</p>
	    					<input type="text" name="depositorname" value="<?php echo $rows['depositorname'];?>"  readonly>
	    				</div>
                        <div class="control">
                            <p>Proof of Payment</p>
                            <?php
                                if($rows['document']=='NA'){
                                    ?>
                                        <p style="font-weight: normal; margin: 0;">No attachment</p>
                                    <?php
                                }else{
                                    ?>
                                        <a style="font-size: 1.5em;" href="/documents/<?php echo $rows['document'];?>">Download Proof of Payment</a>
                                    <?php
                                }
                            ?>
                            
                        </div>
	    			</div>
	    			<div class="control-group">	    				
	    				<div class="control">
	    					<p>Amount(R)</p>
	    					<input type="text" name="telleramount" value="<?php echo $rows['telleramount'];?>" readonly>
	    				</div>
                        <div class="control">
                            <p>Amount(R)</p>
                            <input type="text" name="dollaramount" value="<?php echo $rows['telleramount']/1;?>" readonly>
                        </div>
					</div>
					<div class="control-group">
	    				<div class="control">    					
	    					<input type="submit" name="submit" value="Approve">
	    				</div>
	    			</div>
	    		</form>
	    	<?php
	
    	}
    	
    }elseif ($section=='approvewithdrawal') {
        # code...
        echo "<h2>Approve</h2>";
        $transid=isset($_GET['transid'])?$_GET['transid']:0;

        if(isset($_POST['submit'])){
            $transid=$_POST['transid'];
            $sql="UPDATE mlmmemberledger SET status ='Paid' WHERE transid=$transid";
            $result=mysql_query($sql) or die(mysql_error());
            if($result){
                echo "<p>Withdrawal request successfully completed</p>";
            }
        }else{
            $sql="SELECT l.*, m.* FROM mlmmemberledger l INNER JOIN mlmmembers m ON m.userid=l.userid WHERE transid=$transid";
            $result=mysql_query($sql) or die(mysql_error());

            if($result){
                $rows=mysql_fetch_assoc($result);
                include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/approverequestform.inc.php";
            }
        }
    }elseif ($section=='pendingwithdrawals') {
        # code...
        echo "<h2>Pending Withdrawals</h2>";
        $sql="SELECT * FROM mlmmemberledger WHERE type='Withdrawal' AND status='Pending' ORDER BY transdate DESC";
        $result=mysql_query($sql) or die(mysql_error());

        if($result){
            ?>
                <table class="compact display tables">
                    <thead>
                        <th>SN</th><th>Trans ID</th><th>Date Requested</th><th>Amount</th><th>Description</th><th>Status</th>
                    </thead>
                    <tbody>
                        <?php
                            $sn=1;
                            while ($rows=mysql_fetch_array($result)) {
                                # code...
                                ?>
                                    <tr><td><?php echo $sn;?></td>
                                        <td><a href="/admin/?section=approvewithdrawal&transid=<?php echo $rows['transid'];?>"><?php echo $rows['transid'];?></a></td><td><?php echo $rows['transdate'];?></td><td><?php echo $rows['debitamount'];?></td><td><?php echo $rows['transdescription'];?></td><td><?php echo $rows['status'];?></td></tr>
                                <?php

                                $sn+=1;
                            }
                        ?>                        

                    </tbody>
                    
                </table>
            <?php
        }
    }elseif ($section=='fundtransfer') {
        # code...
        echo "<h2>Fund Transfer</h2>";
        $sql="SELECT * FROM mlmfundtransfer";
        $result=mysql_query($sql) or die(mysql_error());

        ?>
            <table class="tables compact display">
                <thead>
                    <th>SN</th><th>Sender ID</th><th>Sender Name</th><th>Recipient ID</th><th>Recipeint Name</th><th>Amount</th><th>Date</th><th>Description</th>
                </thead>
                <tbody>
                <?php
                    $sn=1;
                    while ($rows=mysql_fetch_assoc($result)) {
                        # code...
                        ?>
                            <tr>
                                <td><?php echo $sn;?></td><td><?php echo getprofileid($rows['senderuserid']);?></td><td><?php echo getmember($rows['senderuserid']);?></td><td><?php echo getprofileid($rows['recipientuserid']);?></td><td><?php echo getmember($rows['recipientuserid']);?></td><td><?php echo $rows['transferamount'];?></td><td><?php echo $rows['transferdate'];?></td><td><?php echo $rows['transferdescription'];?></td>
                            </tr>
                        <?php
                    $sn=$sn+1;
                    }

                ?>
                </tbody>
            </table>
        <?php
    }elseif ($section=='ewalletcredits') {
        echo "<h2>E-Wallet Credits</h2>";
        # code...
        $sql="SELECT * FROM mlmfundtransfer";
        $result=mysql_query($sql) or die(mysql_error());
        ?>
            <table class="compact display tables">
                <thead>
                    <th>SN</th>
                    <th>Trans ID</th>
                    <th>Username</th>
                    <th>Member ID</th>
                    <th>Full Name</th>
                    <th>Sender ID</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <td>Balance</td>
                </thead>
                <tbody>
                <?php
                    $sn=1;
                    while ($rows=mysql_fetch_assoc($result)) {
                        # code...
                        ?>
                            <tr>
                                <td><?php echo $sn;?></td>
                                <td><?php echo $rows['transferid'];?></td>
                                <td><?php echo getmember($rows['recipientuserid']);?></td>
                                <td><?php echo getprofileid($rows['recipientuserid']);?></td>
                                <td><?php echo getfullname($rows['recipientuserid']);?></td>
                                <td><?php echo getprofileid($rows['senderuserid']);?></td>
                                <td><?php echo $rows['transferamount'];?></td>
                                <td><?php echo $rows['transferdate'];?></td>
                                <td><?php echo memberwallet($rows['recipientuserid']);?></td>
                            </tr>
                        <?php
                    $sn=$sn+1;
                    }

                ?>
                </tbody>
                
            </table>
        <?php
    }elseif ($section=='ewalletdebits') {

        # code...
        echo "<h2>E-Wallet Debits</h2>";
        $sql="SELECT * FROM mlmfundtransfer";
        $result=mysql_query($sql) or die(mysql_error());
        ?>
            <table class="compact display tables">
                <thead>
                    <th>SN</th>
                    <th>Trans ID</th>
                    <th>Username</th>
                    <th>Member ID</th>
                    <th>Full Name</th>
                    <th>Recipient ID</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <td>Balance</td>
                </thead>
                <tbody>
                <?php
                    $sn=1;
                    while ($rows=mysql_fetch_assoc($result)) {
                        # code...
                        ?>
                            <tr>
                                <td><?php echo $sn;?></td>
                                <td><?php echo $rows['transferid'];?></td>
                                <td><?php echo getmember($rows['senderuserid']);?></td>
                                <td><?php echo getprofileid($rows['senderuserid']);?></td>
                                <td><?php echo getfullname($rows['senderuserid']);?></td>
                                <td><?php echo getprofileid($rows['recipientuserid']);?></td>
                                <td><?php echo $rows['transferamount'];?></td>
                                <td><?php echo $rows['transferdate'];?></td>
                                <td><?php echo memberwallet($rows['senderuserid']);?></td>
                            </tr>
                        <?php
                    $sn=$sn+1;
                    }

                ?>
                </tbody>
                
            </table>
        <?php
    }elseif ($section=='managewallet') {
        # code...
        echo "<h2>Manage Members e-Wallet</h2>";
        $sql="SELECT * FROM mlmmembers";
        $result=mysql_query($sql) or die(mysql_error());

        if($result){
           
            ?>
                <table class="tables compact display">
                    <thead>
                        <th>SN</th><th>Membership ID</th><th>Username</th><th>Current Stage</th><th>E-Wallet Balance</th>
                    </thead>
                    <?php
                    $sn=1;
                     while($rows=mysql_fetch_assoc($result)){
                        echo "<tr><td style='text-align:center;'>" . $sn . "</td><td><a href='/admin/?section=creditdebit&id=" . $rows['userid'] . "'>" . $rows['profileid'] . "</a></td><td>" . $rows['username'] . "</td><td>" . $rows['currentstage'] . "</td><td style='text-align:right; padding-right:10px;'>" . number_format(memberwallet($rows['userid']),2) . "</td></tr>";
                        $sn=$sn+1;
                    }

                    ?>
                </table>                
            <?php
        
        }
    }elseif ($section=='creditdebit') {
        # code...
        echo "<h2>Credit/Debit Wallet</h2>";

        $addamount=0;$errors=0;$deductamount=0;
        $addamountErr=$deductdescriptionErr=$deductamountErr=$adddescriptionErr=$addStatus=$deductStatus=$adddescription=$deductdescription='';
        if(isset($_POST['submit']) && $_POST['submit']=='Add to Wallet'){
            //echo "add";
            //retrieve variables from POST
            $memberid=$_POST['memberid'];
            $addamount=isset($_POST['addamount'])?$_POST['addamount']:0;
            if($addamount==0 || $addamount=='' || $addamount<0){
                $addamountErr='Invalid amount entered';
                $errors=1;
            }

            $adddescription=isset($_POST['adddescription'])?mysql_real_escape_string($_POST['adddescription']):'';
            if($adddescription=='' || strlen($adddescription)<10){
                $adddescriptionErr='Missing description/too short';
                $errors=1;
            }

            if($errors==1){
                include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/creditdebitwallets.php";
            }else{
                $sql="INSERT INTO mlmmemberledger(userid, transdate,creditamount,transdescription,debitamount,type,status) VALUES ($memberid,CURDATE(),$addamount, '$adddescription', 0,'Received','NA')";
                $result=mysql_query($sql) or die(mysql_error());


                if($result){
                    $transrefid=mysql_insert_id();
                    $sql2="INSERT INTO mlmledger(beneficiaryid,transdate,creditamount,debitamount,type,transdescription,transrefid) VALUES ($memberid, CURDATE(), 0,$addamount,'Payment','$adddescription',$transrefid)";
                    $result2=mysql_query($sql2) or die(mysql_error());

                    if($result2){
                        $addStatus="<p style='background:green;text-align:center;color:#fff;'>Member's Wallet successfully credited!</p>";
                        $addamount=0;
                        $adddescription="";
                        include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/creditdebitwallets.php";
                    }
                }

            }


        }elseif (isset($_POST['submit']) && $_POST['submit']=='Deduct from Wallet') {
            # code...
            //echo "deduct";
            //retrieve variables from POST
            $memberid=$_POST['memberid'];
            $walletbalance=memberwallet($memberid);
            $deductamount=isset($_POST['deductamount'])?$_POST['deductamount']:0;
            if($deductamount==0 || $deductamount=='' || $deductamount<0){
                $deductamountErr='Invalid amount entered';
                $errors=1;
            }elseif (($walletbalance-abs($deductamount))<5) {
                # code...
                $deductamountErr='No enough wallet balance';
                $errors=1;
            }

            $deductdescription=isset($_POST['deductdescription'])?mysql_real_escape_string($_POST['deductdescription']):'';
            if($deductdescription=='' || strlen($deductdescription)<10){
                $deductdescriptionErr='Missing description/too short';
                $errors=1;
            }

            if($errors==1){
                include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/creditdebitwallets.php";
            }else{
                $sql="INSERT INTO mlmmemberledger(userid, transdate,creditamount,transdescription,debitamount,type,status) VALUES ($memberid,CURDATE(),0, '$deductdescription', $deductamount,'Payment','NA')";
                $result=mysql_query($sql) or die(mysql_error());


                if($result){
                    $transrefid=mysql_insert_id();
                    $sql2="INSERT INTO mlmledger(beneficiaryid,transdate,creditamount,debitamount,type,transdescription,transrefid) VALUES ($memberid, CURDATE(), $deductamount,0,'Received','$deductdescription',$transrefid)";
                    $result2=mysql_query($sql2) or die(mysql_error());

                    if($result2){
                        $deductStatus="<p style='background:red;text-align:center;color:#fff;'>Member's Wallet successfully debited!</p>";
                        $deductamount=0;
                        $deductdescription="";
                        //include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/creditdebitwallets.php";
                    }
                }

            }
            if($errors==1){

            }else{

                include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/creditdebitwallets.php";    
            }
        }else{
            include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/creditdebitwallets.php";
        }       

    }
?>
                       

                

