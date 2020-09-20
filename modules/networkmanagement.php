<?php

    $section=isset($_GET['section'])?$_GET['section']:'';
    if($section=='genealogy'){
        echo "<h2>My Genealogy</h2>";

        $parentid=isset($_SESSION['parentid'])?$_SESSION['parentid']:0;
        
        
        ?>
       <!--<div class="tree" style="width: 100%;margin: 0 auto;text-align: center;font-size: 1.5em;">
        
            <ul style="font-size: 14px;">
                <?php
                    $sql="SELECT * FROM mlmmembers WHERE parentid=10";
                    $result=mysql_query($sql) or die(mysql_error());
                    if(mysql_num_rows($result)>0){                       
                        while($rows=mysql_fetch_array($result)){
                            ?>
                                <li>
                                    <a href="#"><?php echo $rows['username'];?></a>
                                    <?php get_all_children($rows['userid'],true);?>
                                </li>
                            <?php
                        }                        
                    }
                ?>
            </ul>
            
        </div>-->
        <!--<ul id="org" style="display:none;max-width: 960px; margin: 0 auto;background: #ddd;">
            <?php
                $result=mysql_query("SELECT * FROM mlmmembers WHERE parentid=$parentid");
                if(mysql_num_rows($result)>0){
                    while($rows=mysql_fetch_array($result)){
                        ?>
                            <li>
                                <?php echo $rows['username'];?>
                                <?php get_all_children($rows['userid'],true);?>
                            </li>
                        <?php
                    }
                }
            ?>
           
        </ul>-->
        
        <div id="chart_div" style="max-width: 960px;"></div>

        
    
    <?php
    }elseif ($section=='downline') {
        # code...
        //echo $userid;
        echo "<h2>Downline Members</h2>";
        echo "<p style='font-weight:2em;text-align:center;'>" . $username=getmember($userid) . "</p>";
        $mynewarray=mychildren($userid);
    /*echo "<pre>";
    print_r($mynewarray);
    echo "</pre>";*/
        ?>
        <h3>Members to the Left Leg</h3>
        <table class="display compact tables" style="font-size: 1.2em;">
            <thead><th>Profile ID</th><th>Username</th><th>First Name</th><th>Last Name</th></thead>
            <tbody>
                <?php
                foreach ($mynewarray as $rows) {                
                    $leftmembers=$rows['l_member'];
                    if($leftmembers!=NULL){   
                        ?>             
                        <tr><td><?php echo $rows['profileid'];?></td><td><span style="margin-right: 5px;"><?php echo '<img src="/passports/' . $rows['passport'] . '" style="width:15px;border-radius:50%;"/>';?></span><?php echo $rows['username'];?></td><td><?php echo $rows['firstname'];?></td><td><?php echo $rows['lastname'];?></td></tr>

                        <?php               
                    }

                }
                ?>
            </tbody>            
        </table>
        <h3 style="margin-top: 48px;">Members to the Right Leg</h3>
        <table class="display compact tables" style="font-size: 1.2em;">
            <thead><th>Profile ID</th><th>Username</th><th>First Name</th><th>Last Name</th></thead>
            <tbody>
                <?php
                foreach ($mynewarray as $rows) {                
                    $rightmembers=$rows['r_member'];
                    $gravatar_link = 'http://www.gravatar.com/avatar/' . md5($rows['emailaddress']) . '?s=12';
                    
                    if($rightmembers!=NULL){   
                        ?>             
                        <tr><td><?php echo $rows['profileid'];?></td><td><span style="margin-right: 5px;"><?php echo '<img src="/passports/' . $rows['passport'] . '" style="width:15px;border-radius:50%;"/>';?></span><?php echo $rows['username'];?></td><td><?php echo $rows['firstname'];?></td><td><?php echo $rows['lastname'];?></td></tr>

                        <?php               
                    }

                }
                ?>
            </tbody>            
        </table>
        <?php

    }elseif ($section=='teamview') {
        # code...
        echo "<h2>My Team View</h2>";
        ?>
            <div class="parentboxcontainer" style="border: 0px solid #333;">
                <?php $passport=getuserpassport($userid);?>
                
                <div class="card" style="max-width: 300px; box-shadow: 0 4px 8px 0 rgba(0,0,0,.2); margin: auto; text-align: center;font-family: arial">
                    <img src="/passports/<?php echo $passport;?>" style='width: 100%;'>
                    <h1 style="margin: 12px 0 24px;"><?php echo getfullname($userid);?></h1>
                    <p><?php echo getmember($userid);?></p>
                </div>
            </div>
        <?php
       
        
        $sql="SELECT * FROM mlmmembers WHERE parentid=$userid ORDER BY userid ASC";
        $result=mysql_query($sql) or die(mysql_error());

        if($result){
            while($rows=mysql_fetch_array($result)){
                ?>
                    <div class="cardcontainer" style="width: 50%;float: left;text-align: center;">
                        <div class="card" style="border: 0px solid #333; max-width: 300px; box-shadow: 0 4px 8px 0 rgba(0,0,0,.2); margin: auto; text-align: center;font-family: arial">
                            <img src="/passports/<?php echo $rows['passport'];?>" style='width: 80px;width: 100%;'>
                            
                            <h1  style="margin: 12px 0 24px;"><?php echo $rows['firstname'] . ', '. $rows['lastname'];?></h1>
                            <p><?php echo $rows['username'];?></p>
                            <!--<p style="text-align: center;margin-bottom: 0">Date Joined: <span style="font-weight: bold;"><?php echo $rows['datecreated'];?></span></p>-->
                            <p><?php echo $rows['currentstage'];?></p>
                        </div>
                    </div>
                <?php
            }
        }
    }
?>
                       

                

