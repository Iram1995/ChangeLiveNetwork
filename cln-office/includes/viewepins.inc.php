<div id="paymentlist" style='padding-top: 24px;margin-bottom: 48px;'>
    <?php
        $table="<table border=1 class='col100 compact display tables'>";
        $table.="<thead><tr><th class='col5'>SN</th><th class='col10'>Pincode</th><th class='col5'>Pin Status</th><th class='col5'>Date Created</th><th class='col5'>Created By</th><th>Action</th></tr></thead><tbody>";
            $sn=1;
            $sql="SELECT * FROM mlmepins ORDER BY pid ASC";
            $result=mysql_query($sql);
            while($rows=mysql_fetch_array($result)){
                $table.="<tr id=" . $rows['pid'] . "><td>$sn</td><td>" . $rows['pincode'] . "</td><td>" . $rows['status'] . "</td><td>" . $rows['datecreated'] . "</td><td>" . $rows['createdby'] . "</td><td class='delete'>Block/Delete</td></tr>";
                $sn+=1;
            }
        echo $table . "</tbody></table>";
    ?>
</div>