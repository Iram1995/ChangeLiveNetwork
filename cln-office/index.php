
<?php
    //echo "<pre>"; 
    //print_r($_SERVER); 
    //echo "</pre>";
 ini_set("display_errors", 0);
    $adminroles =  array('' =>'Select Role' ,'Master Admin'=>'Master Admin','Super Admin'=>'Super Admin','Normal Admin'=>'Normal Admin');
    session_start();
    //ini_set('display_errors',0);
    include $_SERVER['DOCUMENT_ROOT'] . "/dbcon/conn.php";
    
    include $_SERVER['DOCUMENT_ROOT'] . "/scripts/arraylist.php";


?>

<?php
    if(!isset($_SESSION['adminuser']) || empty($_SESSION['adminuser'])){
        header('Location: /cln-office/login.php');
    }else{
        $username=$_SESSION['adminuser'];
        $sqlUD = mysqli_query($con,"SELECT * FROM mlmadminusers WHERE username='" . $username . "'");
        while ($rows = mysqli_fetch_assoc($sqlUD)) {
            $fullname=$rows['lastname'] . ", " . $rows['firstname'];
            $passport=$rows['passport'];
            $phoneno=$rows['phoneno'];

            $userid=$_SESSION['userid']=$rows['userid'];

            // include $_SERVER['DOCUMENT_ROOT'] . "/var/vars.php";

        }
                    
    }

?>
<?php include '../var/vars.php'; ?>
<?php 
   include $_SERVER['DOCUMENT_ROOT'] . "/admin-style/index.php"; 
?>