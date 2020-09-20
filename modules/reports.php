<?php

    
    $section=isset($_GET['section'])?$_GET['section']:'';
    if($section=='transactions'){
    	echo "<h2>Company Transactions</h2>";
    	$sql="SELECT * FROM mlmledger";
    	$result=mysql_query($sql) or die();
    	if($result){
    		?>
    			<table class="compact display tables" style="font-size: 1.12em;">
    				<thead>
    					<th>SN</th><th>Trans ID</th><th>Username</th><th>Date</th><th>CR.</th><th>DR.</th><th>Description</th><th>Type</th><th>Balance</th>
    				</thead>
    				<tbody>
    					<?php
    						$sn=1;
    						$balance=0;
    						while ($rows=mysql_fetch_assoc($result)) {
    							# code...
    							$balance=$balance+$rows['creditamount']-$rows['debitamount'];
    							?>
    								<tr><td><?php echo $sn;?></td><td><?php echo $rows['transid'];?></td><td><?php echo getmember($rows['beneficiaryid']);?></td><td><?php echo $rows['transdate'];?></td><td><?php echo number_format($rows['creditamount'],2);?></td><td><?php echo number_format($rows['debitamount'],2);?></td><td><?php echo ($rows['transdescription']);?></td><td><?php echo ($rows['type']);?></td><td style="text-align: right; padding-right: 5px;"><?php echo number_format($balance,2);?></td></tr>
    							<?php
    							$sn=$sn+1;
    						}
    					?>
    				</tbody>
    			</table>
    		<?php
    	}

    }elseif ($section=='joining') {
    	# code...
    	echo "<h2>Joining Report</h2>";
    	$sql="SELECT * FROM mlmmembers";
    	$result=mysql_query($sql) or die();
    	if($result){
    		?>
    			<table class="compact display tables" style="font-size: 1.12em;">
    				<thead>
    					<th>SN</th><th>Member ID</th><th>Username</th><th>Full Name</th><th>Date Joined</th>
    				</thead>
    				<tbody>
    					<?php
    						$sn=1;
    						while ($rows=mysql_fetch_assoc($result)) {
    							# code...
    							?>
    								<tr><td><?php echo $sn;?></td><td><?php echo $rows['profileid'];?></td><td><?php echo $rows['username'];?></td><td><?php echo getfullname($rows['userid']);?></td><td><?php echo $rows['datecreated'];?></td></tr>
    							<?php
    							$sn=$sn+1;
    						}
    					?>
    				</tbody>
    			</table>
    		<?php
    	}
    }elseif ($section=='rankachievers') {
    	# code...
    	echo "<h2>Rank Achievers</h2>";
    	$sql="SELECT * FROM mlmmembers";
    	$result=mysql_query($sql) or die();
    	if($result){
    		?>
    			<table class="compact display tables" style="font-size: 1.12em;">
    				<thead>
    					<th>SN</th><th>Member ID</th><th>Username</th><th>Full Name</th><th>Current Stage</th><th>Date Joined</th>
    				</thead>
    				<tbody>
    					<?php
    						$sn=1;
    						while ($rows=mysql_fetch_assoc($result)) {
    							# code...
    							?>
    								<tr><td><?php echo $sn;?></td><td><?php echo $rows['profileid'];?></td><td><?php echo $rows['username'];?></td><td><?php echo getfullname($rows['userid']);?></td><td><?php echo $rows['currentstage'];?></td><td><?php echo $rows['datecreated'];?></td></tr>
    							<?php
    							$sn=$sn+1;
    						}
    					?>
    				</tbody>
    			</table>
    		<?php
    	}

    }elseif ($section=='bonusreport') {
    	# code...

    	echo "<h2>Bonus Report</h2>";
    	$sql="SELECT * FROM mlmmembers";
    	$result=mysql_query($sql) or die();
    	if($result){
    		?>
    			<table class="compact display tables" style="font-size: 1.12em;">
    				<thead>
    					<th>SN</th><th>Member ID</th><th>Username</th><th>Date Joined</th><th>Welcome</th><th>Referrral</th><th>Matrix</th><th>StepOut</th><th>Balance</th>
    				</thead>
    				<tbody>
    					<?php
    						$sn=1;
    						while ($rows=mysql_fetch_assoc($result)) {
    							# code...
    							?>
    								<tr><td><?php echo $sn;?></td><td><?php echo $rows['profileid'];?></td><td><?php echo $rows['username'];?></td><td><?php echo $rows['datecreated'];?></td><td><?php echo welcomebonus($rows['userid']);?></td><td><?php echo referralbalance($rows['userid']);?></td><td><?php echo matrixbonus($rows['userid']);?></td><td><?php echo stepoutbonus($rows['userid']);?></td><td><?php echo memberwallet($rows['userid']);?></td></tr>
    							<?php
    							$sn=$sn+1;
    						}
    					?>
    				</tbody>
    			</table>
    		<?php
    	}


    }elseif ($section=='transferreport') {
    	# code...

    	echo "<h2>Transfer Report</h2>";
    	$sql="SELECT * FROM mlmfundtransfer";
    	$result=mysql_query($sql) or die();
    	if($result){
    		?>
    			<table class="compact display tables" style="font-size: 1.12em;">
    				<thead>
    					<th>SN</th><th>Trans ID</th><th>Sender ID</th><th>Amount</th><th>Recipient ID</th><th>Date</th>
    				</thead>
    				<tbody>
    					<?php
    						$sn=1;
    						while ($rows=mysql_fetch_assoc($result)) {
    							# code...
    							?>
    								<tr><td><?php echo $sn;?></td><td><?php echo ($rows['transferid']);?></td><td><?php echo getprofileid($rows['senderuserid']);?></td><td><?php echo $rows['transferamount'];?></td><td><?php echo getprofileid($rows['recipientuserid']);?></td><td><?php echo ($rows['transferdate']);?></td></td></tr>
    							<?php
    							$sn=$sn+1;
    						}
    					?>
    				</tbody>
    			</table>
    		<?php
    	}
    }

   
?>
                        
                
