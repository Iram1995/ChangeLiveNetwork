<?php
error_reporting(0);
ini_set("display_errors", "off");

	include $_SERVER['DOCUMENT_ROOT'] .'/dbcon/conn.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/var/vars.php';

	//start session
	session_start();

	//retrieve variables
	$memberid=isset($_POST['memberid'])?$_POST['memberid']:0;
	$addamount=isset($_POST['addamount'])?$_POST['addamount']:0;
	$adddescription=isset($_POST['adddescription'])?$_POST['adddescription']:'NA';

	$sql="INSERT INTO mlmmemberledger(userid,transdate, creditamount, transdescription, type) VALUES ($memberid, CURDATE(), $addamount, '$adddescription', 'Received')";
	$result=mysql_query($sql) or die(mysql_error());

	$recipient=getmember($memberid);
	$sql2="INSERT INTO mlmledger(beneficiaryid, transdate, debitamount, transdescription,type) VALUES ($memberid, CURDATE(), $addamount, 'Paid to $recipient','Payment')";
	$result2=mysql_query($sql2) or die(mysql_error());

	if($result){
		echo "Transaction successfully completed";
	}else{
		echo "Error completing the transaction. Please try again";
	}

	
	
?>