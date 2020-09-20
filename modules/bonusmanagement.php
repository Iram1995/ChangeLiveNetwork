<?php

//$stages=$arrayName = array('Pawn Star' => 'Pawn Star','Rook Star' => 'Rook Star','Knight Star' => 'Knight Star', 'Bishop Star' => 'Bishop Star','King Star' => 'King Star','Queen Star' => 'Queen Star' );
    $stages=$arrayName = array('Lily' => 'Lily','Rose' => 'Rose','Petunia' => 'Petunia', 'Daisy' => 'Daisy','Heather' => 'Heather','Azalea' => 'Azalea', 'Begonia' => 'Begonia', 'Carnation' => 'Carnation', 'Infinity' => 'Infitity' );
    $bonuses = array('Bonus' =>'Welcome Bonus' ,'Referral Bonus' =>'Referral Bonus','Matrix Bonus' =>'Matrix Bonus','StepOut Bonus' =>'StepOut Bonus' );

    $section=isset($_GET['section'])?$_GET['section']:'';
    if($section=='createbonus'){
        echo "<h2>Create Bonus</h2>";
        $errors=0;
        $bonusid=isset($_POST['bonusid'])?$_POST['bonusid']:0;
        $bonustype=$bonusdescription=$bonusamount=$bonusstage='';
        $bonustypeErr=$bonusdescriptionErr=$bonusamountErr=$bonusstageErr='';
        if(isset($_POST['submit'])){
            //process and validate
            $bonustype=isset($_POST['bonustype'])?$_POST['bonustype']:'';
            if(empty($bonustype)){
                $bonustypeErr='Select bonus type';
                $errors=1;
            }
            $bonusdescription=isset($_POST['bonusdescription'])?$_POST['bonusdescription']:'';
            if(empty($bonusdescription)){
                $bonusdescriptionErr='Enter bonus description';
                $errors=1;
            }
            $bonusamount=isset($_POST['bonusamount'])?$_POST['bonusamount']:'';
           if(empty($bonusamount)){
                $bonusamountErr='Enter bonus amount';
                $errors=1;
            }
            $bonusstage=isset($_POST['bonusstage'])?$_POST['bonusstage']:'';
            if(empty($bonusstage)){
                $bonusstageErr='Select bonus stage';
                $errors=1;
            }

            if($errors==1){
                include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/bonusform.inc.php";
            }else{
                //process
            
               if($bonusid==0){
                    //insert new record
                    $sql="INSERT INTO mlmbonus(bonustype, bonusdescription, bonusamount, bonusstage) VALUES ('$bonustype','$bonusdescription',$bonusamount, '$bonusstage')";
                }else{
                    //update existing record
                    $sql="UPDATE mlmbonus SET bonustype='$bonustype', bonusdescription='$bonusdescription', bonusamount=$bonusamount, bonusstage='$bonusstage' WHERE bonusid=$bonusid"; 
               }
                $result=mysql_query($sql) or die(mysql_error());
                if($result){
                    $bonusid=0;
                    $bonustype=$bonusdescription=$bonusamount=$bonusstage='';
                    include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/bonusform.inc.php";
                    include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/listbonus.inc.php";
                }else{


                }

            }
            include $_SERVER['DOCUMENT_ROOT'] . "/includes/admin/listbonus.inc.php";
        }else{

            //display form
            $bonusid=isset($_GET['bonusid'])?$_GET['bonusid']:'0';
            $sql="SELECT * FROM mlmbonus WHERE bonusid=$bonusid";
            $result=mysql_query($sql) or die(mysql_error());
            if($result){ 
                //retrieve varables
                $rows=mysql_fetch_array($result);
                $bonustype=$rows['bonustype'];
                $bonusdescription=$rows['bonusdescription'];
                $bonusamount=$rows['bonusamount'];
                $bonusstage=$rows['bonusstage'];
            }
           include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/bonusform.inc.php";
           include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/listbonus.inc.php";
        }
    }elseif($section=='listbonus'){   
        echo "<h2>List Bonus</h2>";
        include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/listbonus.inc.php";        
    }elseif($section=='matrixbonus'){
        echo "<h2>Matrix Bonus Configuration</h2>";

        $sql="SELECT * FROM mlmmembers";
        $result=mysql_query($sql) or die(mysql_error());

        if($result){
            ?>
                <table class="tables compact display" style="font-size: 1.2em;">
                        <thead><th>SN</th><th>Profile ID</th><th>Username</th><th>Current Stage</th></thead>
                        <tbody>
                            <?php 
                                $sn=1;
                                while ( $rows=mysql_fetch_array($result)) {
                                    # code...
                                    ?>
                                        <tr><td><a href="/admin/?section=managebonus&memberid=<?php echo $rows['userid'];?>"><?php echo $rows['userid'];?></a></td><td><?php echo $rows['profileid'];?></td><td><a href="/admin/?section=adjustbonus&memberid=<?php echo $rows['userid'];?>"><?php echo $rows['username'];?></a></td><td><a href="/admin/?section=updatestage&&memberid=<?php echo $rows['userid'];?>"><?php echo $rows['currentstage'];?></a></td></tr>
                                    <?php
                                    $sn+=1;
                                }

                            ?>                
                        </tbody>
                    
                </table>
            <?php
            
        }
    }elseif ($section=='updatestage') {
        echo "<h2>Upgrade Members' Stage</h2>";       

        if(isset($_POST['submit'])){
            $memberid=$_POST['memberid'];
            $newstage=isset($_POST['currentstage'])?$_POST['currentstage']:'NA';

            $sql="UPDATE mlmmembers SET currentstage='" . $newstage . "' WHERE userid=$memberid";
            $result=mysql_query($sql) or die(mysql_error());

            if($result){
                echo "<h3>Members' Stage Successfully Updated</h3>";
            } 

        }else{
            $memberid=isset($_GET['memberid'])?$_GET['memberid']:0;
            $sql="SELECT * FROM mlmmembers WHERE userid=$memberid";
            $result=mysql_query($sql);
            if($result){
                $rows=mysql_fetch_array($result);
                $currentstage=$rows['currentstage'];

                ?>
                    <form class="registrationform" method="post" action="/admin/?section=updatestage">
                        <div class="control-group">
                            <input type="hidden" name="memberid" value="<?php echo $memberid;?>">
                            <div class="control">
                                <p>User Name</p>
                                <input type="text" name="username" value="<?php echo $rows['username'];?>" disabled='disabled'>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="control">
                                <p>Current Stage</p>
                                <input type="text" name=""  value="<?php echo $rows['currentstage'];?>">
                            </div>
                            <div class="control">
                                <p>New Stage:</p>
                                <select name="currentstage">
                                    <?php
                                        foreach ($stages as $key => $value) {
                                            # code...
                                            ?>
                                                <option value="<?php echo $key;?>"><?php echo $value;?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="control">
                                <input type="submit" name="submit" value="Update Stage">
                            </div>
                        </div>
                    </form>
                <?php
            }

        }
        # code...
    }elseif ($section=='managebonus') {
        echo "<h2>Manage Members' Bonus</h2>";
        $memberid=isset($_GET['memberid'])?$_GET['memberid']:0;

        if(isset($_POST['submit'])){
            $memberid=$_POST['memberid'];
            $creditamount=isset($_POST['creditamount'])?$_POST['creditamount']:0;
            $type=$_POST['type'];
            $description=isset($_POST['description'])?$_POST['description']:'na';

            $sql="INSERT INTO mlmmemberledger(userid, creditamount,transdescription, type,transdate) VALUES ($memberid,$creditamount,'$description','$type', CURDATE())";
            $result=mysql_query($sql) or die(mysql_error());

            if($result){
                echo "<h3>Trasaction Successfully completed!</h3>";
            }else{
                echo "<h3 style='color:red;>Error encountered. Please try again</h3>";
            }

        }else{
            $memberid=isset($_GET['memberid'])?$_GET['memberid']:0;
            $sql="SELECT * FROM mlmmembers WHERE userid=$memberid";
            $result=mysql_query($sql);
            if($result){
                $rows=mysql_fetch_array($result);
                $currentstage=$rows['currentstage'];

                ?>
                    <form class="registrationform" method="post" action="/admin/?section=managebonus">
                        <div class="control-group">
                            <input type="hidden" name="memberid" value="<?php echo $memberid;?>">
                            <div class="control">
                                <p>User Name</p>
                                <input type="text" name="username" value="<?php echo $rows['username'];?>" disabled='disabled'>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="control">
                                <p>Amount</p>
                                <input type="text" name="creditamount" >
                            </div>
                            <div class="control">
                                <p>Bonus Type:</p>
                                <select name="type">
                                    <?php
                                        foreach ($bonuses as $key => $value) {
                                            # code...
                                            ?>
                                                <option value="<?php echo $key;?>"><?php echo $value;?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">

                            <div class="control double">
                                <p>Description</p>
                                <textarea name="description"></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="control">
                                <input type="submit" name="submit" value="Submit">
                            </div>
                        </div>
                    </form>
                <?php
            }
        }

        # code...
    }elseif ($section=='adjustbonus') {
        echo "<h2>Adjust Members' Bonus</h2>";

        $sub=isset($_GET['sub'])?$_GET['sub']:'';

        if(!empty($sub) && $sub=='delete'){
            if(isset($_POST['submit'])){
                $transid=isset($_POST['transid'])?$_POST['transid']:0;
                $memberid=isset($_POST['memberid'])?$_POST['memberid']:0;
                $sql="DELETE FROM mlmmemberledger WHERE userid=$memberid AND transid=$transid";
                $result=mysql_query($sql) or die(mysql_error());

                if($result){
                    echo "<h3 style='color:green;'>Transaction Successfully deleted</h3>";
                }else{
                    echo "<h3 style='color:red;'>Error completing the Transaction. Please try again</h3>";
                }

            }else{
                $transid=isset($_GET['transid'])?$_GET['transid']:0;
                $memberid=isset($_GET['memberid'])?$_GET['memberid']:0;
                $sql="SELECT * FROM mlmmemberledger WHERE transid=$transid AND userid=$memberid";
                $result=mysql_query($sql) or die(mysql_error());
                if($result){
                    $rows=mysql_fetch_array($result);
                    ?>
                        <form class="registrationform" method="post" action="/admin/?section=adjustbonus&sub=delete">
                            <div class="control-group">
                                <input type="hidden" name="transid" value="<?php echo $transid;?>">
                                <input type="hidden" name="memberid" value="<?php echo $memberid;?>">
                                <div class="control">
                                    <p>Transaction Date</p>
                                    <input type="text" name=""  value="<?php echo $rows['transdate'];?>" disabled='disabled'>
                                </div>
                                <div class="control">
                                    <p>Transaction Description</p>
                                    <input type="text" name="username" value="<?php echo $rows['transdescription'];?>" disabled='disabled'>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="control">
                                    <p>Amount</p>
                                    <input type="text" name=""  value="<?php echo $rows['creditamount'];?>" disabled='disabled'>
                                </div>
                                <div class="control">
                                    <p>Transaction Type</p>
                                    <input type="text" name=""  value="<?php echo $rows['type'];?>" disabled='disabled'>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="control">
                                    <input type="submit" name="submit" value="Delete Transaction">
                                </div>
                            </div>
                        </form>
                    <?php
                }
            }

        }else{
            $memberid=isset($_GET['memberid'])?$_GET['memberid']:0;
            $sql="SELECT * FROM mlmmemberledger WHERE userid=$memberid";
            $result=mysql_query($sql) or die(mysql_error());
            if($result){
                ?>
                    <table class="compact display tables">
                        <thead><th>SN</th><th>Trans Date</th><th>Description</th><th>Cr.</th><th>Dr.</th><th>Type</th></thead>
                        <tbody>
                            <?php
                                $sn=1;
                                while ($rows=mysql_fetch_array($result)) {
                                    # code...
                                    ?>
                                        <tr><td><a href="/admin/?section=adjustbonus&sub=delete&memberid=<?php echo $rows['userid'];?>&transid=<?php echo $rows['transid'];?>"><?php echo $sn;?></a></td><td><?php echo $rows['transdate'];?></td><td><?php echo $rows['transdescription'];?></td><td><?php echo $rows['creditamount'];?></td><td><?php echo $rows['debitamount'];?></td><td><?php echo $rows['type'];?></td></tr>
                                    <?php
                                    $sn+=1;
                                }
                            ?>
                        </tbody>
                    </table>
                <?php                
            }
        }
        # code...
    }
?>
                       

                

