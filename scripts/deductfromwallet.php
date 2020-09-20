<?php
	include $_SERVER['DOCUMENT_ROOT'] .'/dbcon/conn.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/var/vars.php';

	//start session
	session_start();

	//retrieve variables
	$memberid=isset($_POST['memberid'])?$_POST['memberid']:0;
	$deductamount=isset($_POST['deductamount'])?$_POST['deductamount']:0;
	$deductdescription=isset($_POST['deductdescription'])?$_POST['deductdescription']:'NA';

	$sql="INSERT INTO mlmmemberledger(userid,transdate, debitamount,creditamount,transdescription, type) VALUES ($memberid, CURDATE(), $deductamount,0, '$deductdescription', 'Payment')";
	$result=mysql_query($sql) or die(mysql_error());
	$transrefid=mysql_insert_id();

	$recipient=getmember($memberid);
	$sql2="INSERT INTO mlmledger(beneficiaryid, transdate, creditamount, debitamount, transdescription,type,transrefid) VALUES ($memberid, CURDATE(), $deductamount,0, 'Recieved from $recipient','Received',$transrefid)";
	$result2=mysql_query($sql2) or die(mysql_error());

	if($result){
		echo "Transaction successfully completed";
	}else{
		echo "Error completing the transaction. Please try again";
	}

	
	
?>