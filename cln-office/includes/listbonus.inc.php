<table class='display compact tables' style='font-size:1.3em;'>
    <thead><th>SN</th><th>Type</th><th>Description</th><th>Amount</th><th>Stage Earn</th><th>Action</th></thead>
    <tbody>
        <?php 
            $sql="SELECT * FROM mlmbonus ORDER BY bonusid DESC";
            $result=mysql_query($sql) or die(mysql_error());
            $sn=1;
            while($rows=mysql_fetch_array($result)){
            ?>
                <tr><td><?php echo $sn;?></td><td><?php echo $rows['bonustype'];?></td><td><?php echo $rows['bonusdescription'];?></td><td><?php echo $rows['bonusamount'];?></td><td><?php echo $rows['bonusstage'];?></td><td><a href="/admin/?section=createbonus&bonusid=<?php echo $rows['bonusid'];?>">Edit</a></td></tr>
            <?php
            $sn+=1;
        }
    ?>
    </tbody>
</table>
