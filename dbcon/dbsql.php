<?php
    include 'dbaseconnection.php';
    //echo $db;
    
    $query="CREATE TABLE IF NOT EXISTS mlmusers (userid INT NOT NULL AUTO_INCREMENT PRIMARY KEY, username VARCHAR(50) NOT NULL DEFAULT 'NA', firstname VARCHAR(50) NOT NULL DEFAULT 'NA', lastname VARCHAR(50) NOT NULL DEFAULT 'NA', middlename VARCHAR(50) NOT NULL DEFAULT 'NA', emailaddress VARCHAR(50) NOT NULL, password  VARCHAR(255) NOT NULL, role VARCHAR(50) NOT NULL DEFAULT 'Member', passport VARCHAR(255) NOT NULL DEFAULT 'avatar.jpg',  phoneno VARCHAR(50) NOT NULL, status INT NOT NULL DEFAULT 0 , activationcode INT NOT NULL DEFAULT 0000000000, datecreated DATE NOT NULL DEFAULT '0000-00-00', lastlogindate DATE NOT NULL DEFAULT '0000-00-00', lastupdate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)ENGINE=MyISAM";
    mysql_query($query,$db) or die(mysql_error($db));
    echo "mlmusers' Table Successfully Created!<br/>";

    $query="CREATE TABLE IF NOT EXISTS mlmcountries (countryid INT NOT NULL AUTO_INCREMENT PRIMARY KEY, countrycode VARCHAR(5) NOT NULL DEFAULT 'NA', countryname VARCHAR(255) NOT NULL DEFAULT 'NA') ENGINE=MyISAM";
    mysql_query($query)  or die(mysql_error());
	echo "mlmcountries' Table Successfully Created!<br/>"; 

	$query="CREATE TABLE IF NOT EXISTS mlmmembers (
        userid INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
        profileid VARCHAR(50) NOT NULL, 
        sponsorid VARCHAR(50), 
        username VARCHAR(50) NOT NULL DEFAULT 'NA', 
        firstname VARCHAR(50) NOT NULL DEFAULT 'NA', 
        lastname VARCHAR(50) NOT NULL DEFAULT 'NA', 
        middlename VARCHAR(50) NOT NULL DEFAULT 'NA', 
        emailaddress VARCHAR(50) NOT NULL, 
        password  VARCHAR(255) NOT NULL, 
        passport VARCHAR(255) NOT NULL DEFAULT 'avatar.jpg',  
        phoneno VARCHAR(50) NOT NULL, 
        status INT NOT NULL DEFAULT 0 , 
        activationcode INT NOT NULL DEFAULT 0000000000, 
        datecreated DATE NOT NULL DEFAULT '0000-00-00', 
        lastlogindate DATE NOT NULL DEFAULT '0000-00-00', 
        lastupdate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
        country VARCHAR(50) NOT NULL, 
        address text, 
        accountname VARCHAR(255) NOT NULL DEFAULT 'NA', 
        accountno VARCHAR(50) NOT NULL, 
        bankname VARCHAR(255) NOT NULL DEFAULT 'NA', 
        bankswiftcode VARCHAR(255) NOT NULL DEFAULT 'NA',
        epinused VARCHAR(50) NOT NULL DEFAULT '00000000',
        city VARCHAR(255), referralid VARCHAR(200) NOT NULL, 
        parentid VARCHAR(200) NOT NULL, 
        leg VARCHAR(3),
        level VARCHAR(20) NOT NULL DEFAULT 'Level 0',
        transpassword VARCHAR(255) NOT NULL,
        gender VARCHAR(20) NOT NULL,
        dob date DEFAULT '0000-00-00',
        zipcode VARCHAR(255) NOT NULL DEFAULT 'NA',
        nomineename VARCHAR(255) NOT NULL DEFAULT 'NA',
        nomineephoneno VARCHAR(255)  NOT NULL DEFAULT 'NA',
        relationship VARCHAR(255) NOT NULL DEFAULT 'NA',
        nomineeaddress text,
        terms INT(2)  NOT NULL DEFAULT 0,
        l_member INT(1),
        r_member INT(1),
        currentstage VARCHAR(255))ENGINE=MyISAM"; 
	mysql_query($query)  or die(mysql_error());
	echo "mlmmembers' Table Successfully Created!<br/>"; 



    $query="CREATE TABLE IF NOT EXISTS mlmadminusers (userid INT NOT NULL AUTO_INCREMENT PRIMARY KEY, username VARCHAR(50) NOT NULL DEFAULT 'NA', firstname VARCHAR(50) NOT NULL DEFAULT 'NA', lastname VARCHAR(50) NOT NULL DEFAULT 'NA', middlename VARCHAR(50) NOT NULL DEFAULT 'NA', emailaddress VARCHAR(50) NOT NULL, password  VARCHAR(255) NOT NULL, role VARCHAR(50) NOT NULL DEFAULT 'Admin', passport VARCHAR(255) NOT NULL DEFAULT 'avatar.jpg',  phoneno VARCHAR(50) NOT NULL, status INT NOT NULL DEFAULT 0 , activationcode INT NOT NULL DEFAULT 0000000000, datecreated DATE NOT NULL DEFAULT '0000-00-00', lastlogindate DATE NOT NULL DEFAULT '0000-00-00', lastupdate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)ENGINE=MyISAM";
    mysql_query($query,$db) or die(mysql_error($db));
    echo "mlmadminusers' Table Successfully Created!<br/>";

    $query="CREATE TABLE IF NOT EXISTS mlmepins (pid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,pinserialno VARCHAR(50) NOT NULL, pincode VARCHAR(50) NOT NULL DEFAULT 'NA', pinamount INT NOT NULL DEFAULT 0, status VARCHAR(50) NOT NULL DEFAULT 'NOT USED', createdby  VARCHAR(255) NOT NULL, blocked VARCHAR(5) NOT NULL DEFAULT 'NO', datecreated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)ENGINE=MyISAM";
    mysql_query($query,$db) or die(mysql_error($db));
    echo "mlmepins' Table Successfully Created!<br/>";

    $query="CREATE TABLE IF NOT EXISTS mlmmemberledger(transid INT NOT NULL AUTO_INCREMENT PRIMARY KEY, userid INT NOT NULL, transdate date, transtype VARCHAR(20), creditamount double(10,2),debitamount double(10,2), transdescription VARCHAR(255), type VARCHAR(50), FOREIGN KEY (userid) REFERENCES mlmmembers(userid) ON DELETE CASCADE ) ENGINE=MyISAM";
    mysql_query($query) or die(mysql_error());

    echo "mlmmemberledger's Table Successfully Created!<br/>";
    
    $query="CREATE TABLE IF NOT EXISTS mlmledger(transid INT NOT NULL AUTO_INCREMENT PRIMARY KEY, beneficiaryid INT NOT NULL, transdate datetime, transtype VARCHAR(20), creditamount double(10,2), debitamount double(10,2), transdescription VARCHAR(255), transrefid INT NOT NULL, type VARCHAR(20) NOT NULL)ENGINE=MyISAM";
    mysql_query($query) or die(mysql_error());

    echo "mlmledger's Table Successfully Created!<br/>";
    $query="CREATE TABLE IF NOT EXISTS mlmmemberbonus(transid INT NOT NULL AUTO_INCREMENT PRIMARY KEY, beneficiaryid INT NOT NULL, transdate datetime, transtype VARCHAR(20), transamount double(10,2),transdescription VARCHAR(255), transrefid INT NOT NULL) ENGINE=MyISAM";
    mysql_query($query) or die(mysql_error());
    echo "mlmmemberbonus's Table Successfully Created!<br/>";


    $query="CREATE TABLE IF NOT EXISTS mlmbonus(bonusid INT NOT NULL AUTO_INCREMENT PRIMARY KEY, bonustype VARCHAR(50) NOT NULL, bonudescription VARCHAR(255), bonusstage VARCHAR(50) NOT NULL, bonusamount double(10,2) NOT NULL DEFAULT 0.00) ENGINE=MyISAM";
    mysql_query($query) or die(mysql_error());
    echo "mlmbonus's Table Successfully Created!<br/>";
    
    $query="CREATE TABLE IF NOT EXISTS mlmtickets(ticketid INT NOT NULL AUTO_INCREMENT PRIMARY KEY, ticketsubject VARCHAR(255) NOT NULL, ticketsender VARCHAR(255) NOT NULL, senderemail VARCHAR(255) NOT NULL, ticketmessage text, datesent datetime NOT NULL, status VARCHAR(20) NOT NULL DEFAULT 'Unread', recipientemail VARCHAR(255) NOT NULL, userid INT NOT NULL, FOREIGN KEY (userid) REFERENCES mlmmembers(userid) ON DELETE CASCADE)ENGINE=MyISAM";
    mysql_query($query) or die(mysql_error());
    echo "mlmtickets's Table Successfully Created!<br/>";

    $query="CREATE TABLE IF NOT EXISTS mlmreferrals(referralid INT NOT NULL AUTO_INCREMENT PRIMARY KEY, userid INT NOT NULL, recipientemail VARCHAR(255) NOT NULL, recipientphone VARCHAR(20) NOT NULL, message text, datesent date, FOREIGN KEY (userid) REFERENCES mlmmembers(userid) ON DELETE CASCADE)ENGINE=MyISAM";
    mysql_query($query) or die(mysql_error());
    echo "mlmreferrals's Table Successfully Created!<br/>";
    
    /*$query="CREATE TABLE IF NOT EXISTS family(id INT(11) NOT NULL, name VARCHAR(100), sex VARCHAR(20) NOT NULL, parentid INT (11) NOT NULL)ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1";


    mysql_query($query) or die(mysql_error());
    echo "mlmreferrals's Table Successfully Created!<br/>";

    $query="INSERT INTO family (id,name,parentid) VALUES 
        (1,'Parent',0), 
        (2,'Child 1',1),
        (3,'Child 2',1),
        (4,'Grand Child 1',2),
        (5,'Grand Child 1',2),
        (6,'Grand Child 2',3),
        (7,'Grand Child 3',3),
        (8,'Great Grand Child 1',6),
        (9,'Great Grand Child 2',6),
        (10,'Great Grand Child 3',7)";

    mysql_query($query) or die(mysql_error());
    echo "Insert success!<br/>";*/

    $query="CREATE TABLE IF NOT EXISTS mlmfundtransfer(transferid INT NOT NULL AUTO_INCREMENT PRIMARY KEY, recipientprofileid INT NOT NULL, senderprofileid INT NOT NULL, transferamount decimal(10,2) NOT NULL, transferdate date, transferstatus VARCHAR(20) NOT NULL DEFAULT 'PENDING', transferdescription text, approvedby VARCHAR(50))ENGINE=MyISAM";
    mysql_query($query) or die(mysql_error());
    echo "mlmfundtransfer's Table Successfully Created!<br/>"; 

    
    $query="CREATE TABLE IF NOT EXISTS mlmfundaccount (fundid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,userid INT NOT NULL, tellerno VARCHAR(50) NOT NULL, tellerdate date, telleramount decimal(10,2), depositorname VARCHAR(255) NOT NULL, phoneno VARCHAR(50) NOT NULL DEFAULT '2340000000000', bankname VARCHAR(255) NOT NULL DEFAULT 'NA', modeofpayment VARCHAR(255) NOT NULL DEFAULT 'NA', fundstatus VARCHAR(50) NOT NULL DEFAULT 'PENDING')ENGINE=MyISAM"; 

    mysql_query($query) or die(mysql_error());
    echo "mlmfundaccount's Table Successfully Created!<br/>";   

?>