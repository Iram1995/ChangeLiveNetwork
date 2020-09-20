<?php
error_reporting(0);
ini_set("display_errors", "off");

	include $_SERVER['DOCUMENT_ROOT'] .'/dbcon/conn.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/var/vars.php';

	//start session
	session_start();

	//retrieve variables
	$memberid=$profileid;
	$upgradeamount="1400";
	$add_description="Lily Stage Bonus";

	$sql="INSERT INTO mlmmemberledger(userid,transdate, creditamount, transdescription, type) VALUES ($memberid, CURDATE(), $upgradeamount, '$add_description', 'Received')";
	$result=mysql_query($sql) or die(mysql_error());

	$recipient=getmember($memberid);
	$sql2="INSERT INTO mlmledger(beneficiaryid, transdate, debitamount, transdescription,type) VALUES ($memberid, CURDATE(), $upgradeamount, 'Paid to $recipient','Payment')";
	$result2=mysql_query($sql2) or die(mysql_error());

	if($result){
		echo "Upgraded successfully!";
	}else{
		echo "Error can not upgrade!";
	}
	
	
?>