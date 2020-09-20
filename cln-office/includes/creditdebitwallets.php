<?php

	$id=isset($_GET['id'])?$_GET['id']:0;
    $sql2="SELECT * FROM mlmmembers WHERE userid=$id";
    $result2=mysql_query($sql2) or die(mysql_error());
    $rows2=mysql_fetch_assoc($result2);
    $name=$rows2['username'];
    $memberid=$rows2['profileid'];
    ?>
        <div style="width: 100%;">
            <?php
                include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/addtowallet.php";
                include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/deductfromwallet.php";
            ?>                
            
        </div>
    <?php

?>
