<?php

    session_start();
    include $_SERVER['DOCUMENT_ROOT'] . "/dbcon/conn.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/var/vars.php";
    
    $id=isset($_GET['id'])?$_GET['id']:0;
    //$id=21;
    $id=$_SESSION['userid'];
    $data=mychildren($id);
    echo json_encode($data);
    /*$sql= "SELECT userid,username,parentid FROM mlmmembers";
    $result=mysql_query($sql) or die(mysql_error());
    $rows=mysql_fetch_array($result);
    $data=array();
    
    while($rows=mysql_fetch_assoc($result)){
      array_push($data,[
        'userid'=>$rows['userid'],
        'username'=>$rows['username'],
        'parentid'=>$rows['parentid']
      ]);
    }   
    */
    //echo json_encode($data);

?>
                        
                
