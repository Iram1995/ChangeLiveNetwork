<div id="" style='padding-top: 24px;margin-bottom: 48px;'>
    <?php
        $table="<table border=1 class='col100 compact display tables'>";
        $table.="<thead><tr><th class='col5'>SN</th><th class='col10'>Pin Serial No</th><th class='col10'>Pincode</th><th class='col5'>Pin Status</th><th class='col5'>Date Created</th></tr></thead><tbody>";
            $sn=1;
            $sql="SELECT * FROM mlmepins WHERE createdby='$username' ORDER BY pid ASC";
            $result=mysql_query($sql);
            while($rows=mysql_fetch_array($result)){
                $table.="<tr><td>$sn</td><td>" . $rows['pinserialno'] . "</td><td>" . $rows['pincode'] . "</td><td>" . $rows['status'] . "</td><td>" . $rows['datecreated'] . "</td></tr>";
                $sn+=1;
            }
        echo $table . "</tbody></table>";
    ?>
</div>