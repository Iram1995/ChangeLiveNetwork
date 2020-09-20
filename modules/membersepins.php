<?php
    if($section=='generatepin'){
        echo "<h2>Generate E-Pins</h2>";

        $pinamount=300.00;
        $amountused=0;
        if(isset($_POST['submit'])){
            //retrieve variables and validate
            $errMsg='';
            //$pinamount=isset($_POST['pinamount'])?($_POST['pinamount']):'';
                
            $noofpin=isset($_POST['noofpin'])?($_POST['noofpin']):'';
            if(empty($noofpin) || $noofpin==0){
                $noofpinErr='Enter number of Pin to generate';
                $errors=1;
            }

            $sql="SELECT SUM(creditamount), SUM(debitamount) FROM mlmmemberledger WHERE userid=$userid";
            $result=mysql_query($sql) or die(mysql_error());                
                            
            if($result){
                $rows=mysql_fetch_array($result);
                $balance=$rows[0]-$rows[1];
                //$pinamount;
                //echo 'number of pin ' . $noofpin;
                $amountused=$noofpin * $pinamount;
                //echo 'Username: '. $username . ' Userid: ' . $userid;die(); 

                $balance-$amountused;
                if(($balance-$amountused)<0){
                    $insufficientbalance="<p style='color:#ff0000;font-size:1.3em;padding-left:20px;'>Insufficient balance in your account. Fund your account to generate pins</p>";
                    $errors=1;
                }
            }
            
            if ($errors==1){
                include $_SERVER['DOCUMENT_ROOT'] . "/includes/generatepinform.inc.php";
            }else{
                //process
                $username=$_SESSION['username'];
                $sql="SELECT Max(pid) as sn FROM mlmepins";
                $result=mysql_query($sql) or die(mysql_error());

                if($result){
                    $rows=mysql_fetch_array($result);
                    $maxsn=$rows['sn'];
                    $maxsn+=1;
                }
                    

                for($i=1;$i<=$noofpin;$i++){
                    $sn=date('Y') . str_pad($maxsn, 6,'0',STR_PAD_LEFT);
                    $pincode=abs(rand(30000000, 90000000));
                    $sql="INSERT INTO mlmepins(pinserialno, pincode, createdby,pinamount) VALUES ($sn,$pincode,'$username',$pinamount)";
                    $result=mysql_query($sql) or die(mysql_error());
                    $maxsn+=1;
                   
                }
                   

                if($result){
                    $errMsg="<p style='background:green;line-height:2.4em;color:white;font-weight:normal;padding-left:10px;'>e-Pins successfully generated!</p>";
                    $pinamount=$noofpin='';
                    include $_SERVER['DOCUMENT_ROOT'] . "/includes/generatepinform.inc.php";

                    //debit memberledger
                    $sql="INSERT INTO mlmmemberledger(userid, transdate, debitamount, transdescription, status,type) VALUES ($userid, CURDATE(), $amountused, 'Purchase of e-Pins', 'Approved', 'Purchase')";
                    $result1=mysql_query($sql) or die(mysql_error());

                    if($result1){
                        //credit company ledger
                        $transrefid=mysql_insert_id();
                        $sql2="INSERT INTO mlmledger(beneficiaryid, transdate, creditamount, transdescription, transrefid, type) VALUES ($userid, CURDATE(), $amountused, 'Sales of e-Pins', $transrefid, 'Sales')";
                        $result2=mysql_query($sql2) or die(mysql_error());    
                    }                    

                }else{
                    $errMsg="<p style='background:red;line-height:2.4em;color:white;font-weight:normal;padding-left:10px;'>Error generating e-Pins. Please try again!</p>";
                    $username=$firstname=$lastname=$emailaddress=$phoneno=$password='';
                    include $_SERVER['DOCUMENT_ROOT'] . "/includes/generatepinform.inc.php";
                }
            }
        }else{
            include $_SERVER['DOCUMENT_ROOT'] . "/includes/generatepinform.inc.php";
        }
        

    }elseif($section=='viewepins'){
        echo "<h2>My e-Pins</h2>";
        include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/myepins.inc.php";
    }

?>
                        
                
