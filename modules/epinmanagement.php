<?php
    if($section=='generatepin'){
        echo "<h2>Generate E-Pins</h2>";

        if(isset($_POST['submit'])){
            //retrieve variables and validate
            $errMsg='';
            //$pinamount=isset($_POST['pinamount'])?($_POST['pinamount']):'';
            /*if(empty($pinamount)){
                $pinamountErr='Enter Pin Amount(Denomination)';
                $errors=1;
            }*/

            $noofpin=isset($_POST['noofpin'])?($_POST['noofpin']):'';
            if(empty($noofpin)){
                $noofpinErr='Enter number of Pin to generate';
                $errors=1;
            }

            
            if ($errors==1){
                include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/generatepinform.inc.php";
            }else{
                //process
                $username=$_SESSION['adminuser'];
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
                    $sql="INSERT INTO mlmepins(pinserialno, pincode, createdby) VALUES ($sn,$pincode,'Admin')";
                    $result=mysql_query($sql) or die(mysql_error());
                    $maxsn+=1;
                   
                }
                   

                if($result){
                    $errMsg="<p style='background:green;line-height:2.4em;color:white;font-weight:normal;padding-left:10px;'>e-Pins successfully generated!</p>";
                    $pinamount=$noofpin='';
                    include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/generatepinform.inc.php";

                }else{
                    $errMsg="<p style='background:red;line-height:2.4em;color:white;font-weight:normal;padding-left:10px;'>Error generating e-Pins. Please try again!</p>";
                    $username=$firstname=$lastname=$emailaddress=$phoneno=$password='';
                    include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/generatepinform.inc.php";
                }
            }
        }else{
            include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/generatepinform.inc.php";
        }
        

    }elseif($section=='viewepins'){
        echo "<h2>View All e-Pins</h2>";
        include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/viewepins.inc.php";
    }elseif ($section=='viewusedpins') {
        # code...
        echo "<h2>Used e-Pins</h2>";
        include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/viewusedpins.inc.php";
    }elseif ($section=='unusedpins') {
        # code...
        echo "<h2>Fresh e-Pins</h2>";
        include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/viewunusedpins.inc.php";
    }

?>
                        
                
