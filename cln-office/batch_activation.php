
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

    
     $batchSucMsg = "";
     $due_date = "";
     $due_date = date('Y-m-d H:i:s', strtotime($due_date . ' +5 day'));
    
    if(isset($_POST['b1members'])){
        $b1SQLup = mysqli_query($con,"UPDATE mlmmembers SET batchstatus='Pay', duedate='$due_date',duedate='$due_date' WHERE batch='1'");
        if ($b1SQLup) {
            $b1SQLupa = mysqli_query($con,"UPDATE mlmsystem SET batch1status='Pay' WHERE id='1'");
            $batchSucMsg = "<p class='alert alert-success'>Batch 1 members will now activate their accounts.</p>";
             header("Refresh:3; url=/cln-office/batch_activation.php");
        }else{
            $batchSucMsg = "Error! Please again or contact I.T Department.";
        }
    }
    if(isset($_POST['b2members'])){
        $b1SQLup = mysqli_query($con,"UPDATE mlmmembers SET batchstatus='Pay', duedate='$due_date' WHERE batch='2'");
        if ($b1SQLup) {
            $b1SQLupa = mysqli_query($con,"UPDATE mlmsystem SET batch2status='Pay' WHERE id='1'");
            $batchSucMsg = "<p class='alert alert-success'>Batch 2 members will now activate their accounts.</p>";
            header("Refresh:3; url=/cln-office/batch_activation.php");
        }else{
            $batchSucMsg = "Error! Please again or contact I.T Department.";
        }
    }
    if(isset($_POST['b3members'])){
        $b1SQLup = mysqli_query($con,"UPDATE mlmmembers SET batchstatus='Pay', duedate='$due_date' WHERE batch='3'");
        if ($b1SQLup) {
            $b1SQLupa = mysqli_query($con,"UPDATE mlmsystem SET batch3status='Pay' WHERE id='1'");
            $batchSucMsg = "<p class='alert alert-success'>Batch 3 members will now activate their accounts.</p>";
            header("Refresh:3; url=/cln-office/batch_activation.php");
        }else{
            $batchSucMsg = "Error! Please again or contact I.T Department.";
        }
    }
    if(isset($_POST['b4members'])){
        $b1SQLup = mysqli_query($con,"UPDATE mlmmembers SET batchstatus='Pay', duedate='$due_date' WHERE batch='4'");
        if ($b1SQLup) {
            $b1SQLupa = mysqli_query($con,"UPDATE mlmsystem SET batch4status='Pay' WHERE id='1'");
            $batchSucMsg = "<p class='alert alert-success'>Batch 4 members will now activate their accounts.</p>";
            header("Refresh:3; url=/cln-office/batch_activation.php");
        }else{
            $batchSucMsg = "Error! Please again or contact I.T Department.";
        }
    }
    if(isset($_POST['b5members'])){
        $b1SQLup = mysqli_query($con,"UPDATE mlmmembers SET batchstatus='Pay', duedate='$due_date' WHERE batch='5'");
        if ($b1SQLup) {
            $b1SQLupa = mysqli_query($con,"UPDATE mlmsystem SET batch5status='Pay' WHERE id='1'");
            $batchSucMsg ="<p class='alert alert-success'>Batch 5 members will now activate their accounts.</p>";
            header("Refresh:3; url=/cln-office/batch_activation.php");
        }else{
            $batchSucMsg = "Error! Please again or contact I.T Department.";
        }
    }
    if(isset($_POST['b6members'])){
        $b1SQLup = mysqli_query($con,"UPDATE mlmmembers SET batchstatus='Pay', duedate='$due_date' WHERE batch='6'");
        if ($b1SQLup) {
            $b1SQLupa = mysqli_query($con,"UPDATE mlmsystem SET batch6status='Pay' WHERE id='1'");
            $batchSucMsg = "<p class='alert alert-success'>Batch 6 members will now activate their accounts.</p>";
            header("Refresh:3; url=/cln-office/batch_activation.php");
        }else{
            $batchSucMsg = "Error! Please again or contact I.T Department.";
        }
    }
    if(isset($_POST['b7members'])){
        $b1SQLup = mysqli_query($con,"UPDATE mlmmembers SET batchstatus='Pay', duedate='$due_date' WHERE batch='7'");
        if ($b1SQLup) {
            $b1SQLupa = mysqli_query($con,"UPDATE mlmsystem SET batch7status='Pay' WHERE id='1'");
            $batchSucMsg = "<p class='alert alert-success'>Batch 7 members will now activate their accounts.</p>";
            header("Refresh:3; url=/cln-office/batch_activation.php");
        }else{
            $batchSucMsg = "Error! Please again or contact I.T Department.";
        }
    }
    if(isset($_POST['b8members'])){
        $b1SQLup = mysqli_query($con,"UPDATE mlmmembers SET batchstatus='Pay', duedate='$due_date' WHERE batch='8'");
        if ($b1SQLup) {
            $b1SQLupa = mysqli_query($con,"UPDATE mlmsystem SET batch8status='Pay' WHERE id='1'");
            $batchSucMsg = "<p class='alert alert-success'>Batch 8 members will now activate their accounts.</p>";
            header("Refresh:3; url=/cln-office/batch_activation.php");
        }else{
            $batchSucMsg = "Error! Please again or contact I.T Department.";
        }
    }
    if(isset($_POST['b9members'])){
        $b1SQLup = mysqli_query($con,"UPDATE mlmmembers SET batchstatus='Pay', duedate='$due_date' WHERE batch='9'");
        if ($b1SQLup) {
            $b1SQLupa = mysqli_query($con,"UPDATE mlmsystem SET batch9status='Pay' WHERE id='1'");
            $batchSucMsg = "<p class='alert alert-success'>Batch 9 members will now activate their accounts.</p>";
            header("Refresh:3; url=/cln-office/batch_activation.php");
        }else{
            $batchSucMsg = "Error! Please again or contact I.T Department.";
        }
    }
    if(isset($_POST['b10members'])){
        $b1SQLup = mysqli_query($con,"UPDATE mlmmembers SET batchstatus='Pay', duedate='$due_date' WHERE batch='10'");
        if ($b1SQLup) {
            $b1SQLupa = mysqli_query($con,"UPDATE mlmsystem SET batch10status='Pay' WHERE id='1'");
            $batchSucMsg = "<p class='alert alert-success'>Batch 10 members will now activate their accounts.</p>";
            header("Refresh:3; url=/cln-office/batch_activation.php");
        }else{
            $batchSucMsg = "Error! Please again or contact I.T Department.";
        }
    }
    if(isset($_POST['b11members'])){
        $b1SQLup = mysqli_query($con,"UPDATE mlmmembers SET batchstatus='Pay', duedate='$due_date' WHERE batch='11'");
        if ($b1SQLup) {
            $b1SQLupa = mysqli_query($con,"UPDATE mlmsystem SET batch11status='Pay' WHERE id='1'");
            $batchSucMsg ="<p class='alert alert-success'>Batch 11 members will now activate their accounts.</p>";
            header("Refresh:3; url=/cln-office/batch_activation.php");
        }else{
            $batchSucMsg = "Error! Please again or contact I.T Department.";
        }
    }
    if(isset($_POST['b12members'])){
        $b1SQLup = mysqli_query($con,"UPDATE mlmmembers SET batchstatus='Pay', duedate='$due_date' WHERE batch='12'");
        if ($b1SQLup) {
            $b1SQLupa = mysqli_query($con,"UPDATE mlmsystem SET batch12status='Pay' WHERE id='1'");
            $batchSucMsg = "<p class='alert alert-success'>Batch 12 members will now activate their accounts.</p>";
            header("Refresh:3; url=/cln-office/batch_activation.php");
        }else{
            $batchSucMsg = "Error! Please again or contact I.T Department.";
        }
    }
    if(isset($_POST['b13members'])){
        $b1SQLup = mysqli_query($con,"UPDATE mlmmembers SET batchstatus='Pay', duedate='$due_date' WHERE batch='13'");
        if ($b1SQLup) {
            $b1SQLupa = mysqli_query($con,"UPDATE mlmsystem SET batch13status='Pay' WHERE id='1'");
            $batchSucMsg = "<p class='alert alert-success'>Batch 13 members will now activate their accounts.</p>";
            header("Refresh:3; url=/cln-office/batch_activation.php");
        }else{
            $batchSucMsg = "Error! Please again or contact I.T Department.";
        }
    }
    if(isset($_POST['b14members'])){
        $b1SQLup = mysqli_query($con,"UPDATE mlmmembers SET batchstatus='Pay', duedate='$due_date' WHERE batch='14'");
        if ($b1SQLup) {
            $b1SQLupa = mysqli_query($con,"UPDATE mlmsystem SET batch14status='Pay' WHERE id='1'");
            $batchSucMsg = "<p class='alert alert-success'>Batch 14 members will now activate their accounts.</p>";
            header("Refresh:3; url=/cln-office/batch_activation.php");
        }else{
            $batchSucMsg = "Error! Please again or contact I.T Department.";
        }
    }
    if(isset($_POST['b15members'])){
        $b1SQLup = mysqli_query($con,"UPDATE mlmmembers SET batchstatus='Pay', duedate='$due_date' WHERE batch='15'");
        if ($b1SQLup) {
            $b1SQLupa = mysqli_query($con,"UPDATE mlmsystem SET batch15status='Pay' WHERE id='1'");
            $batchSucMsg = "<p class='alert alert-success'>Batch 15 members will now activate their accounts.</p>";
            header("Refresh:3; url=/cln-office/batch_activation.php");
        }else{
            $batchSucMsg = "Error! Please again or contact I.T Department.";
        }
    }
    if(isset($_POST['b16members'])){
        $b1SQLup = mysqli_query($con,"UPDATE mlmmembers SET batchstatus='Pay', duedate='$due_date' WHERE batch='16'");
        if ($b1SQLup) {
            $b1SQLupa = mysqli_query($con,"UPDATE mlmsystem SET batch16status='Pay' WHERE id='1'");
            $batchSucMsg = "<p class='alert alert-success'>Batch 16 members will now activate their accounts.</p>";
            header("Refresh:3; url=/cln-office/batch_activation.php");
        }else{
            $batchSucMsg = "Error! Please again or contact I.T Department.";
        }
    }
    if(isset($_POST['b17members'])){
        $b1SQLup = mysqli_query($con,"UPDATE mlmmembers SET batchstatus='Pay', duedate='$due_date' WHERE batch='17'");
        if ($b1SQLup) {
            $b1SQLupa = mysqli_query($con,"UPDATE mlmsystem SET batch17status='Pay' WHERE id='1'");
            $batchSucMsg = "<p class='alert alert-success'>Batch 17 members will now activate their accounts.</p>";
            header("Refresh:3; url=/cln-office/batch_activation.php");
        }else{
            $batchSucMsg = "Error! Please again or contact I.T Department.";
        }
    }
    if(isset($_POST['b18members'])){
        $b1SQLup = mysqli_query($con,"UPDATE mlmmembers SET batchstatus='Pay', duedate='$due_date' WHERE batch='18'");
        if ($b1SQLup) {
            $b1SQLupa = mysqli_query($con,"UPDATE mlmsystem SET batch18status='Pay' WHERE id='1'");
            $batchSucMsg = "<p class='alert alert-success'>Batch 18 members will now activate their accounts.</p>";
            header("Refresh:3; url=/cln-office/batch_activation.php");
        }else{
            $batchSucMsg = "Error! Please again or contact I.T Department.";
        }
    }
    if(isset($_POST['b19members'])){
        $b1SQLup = mysqli_query($con,"UPDATE mlmmembers SET batchstatus='Pay', duedate='$due_date' WHERE batch='19'");
        if ($b1SQLup) {
            $b1SQLupa = mysqli_query($con,"UPDATE mlmsystem SET batch19status='Pay' WHERE id='1'");
            $batchSucMsg = "<p class='alert alert-success'>Batch 19 members will now activate their accounts.</p>";
            header("Refresh:3; url=/cln-office/batch_activation.php");
        }else{
            $batchSucMsg = "Error! Please again or contact I.T Department.";
        }
    }
    if(isset($_POST['b20members'])){
        $b1SQLup = mysqli_query($con,"UPDATE mlmmembers SET batchstatus='Pay', duedate='$due_date' WHERE batch='20'");
        if ($b1SQLup) {
            $b1SQLupa = mysqli_query($con,"UPDATE mlmsystem SET batch20status='Pay' WHERE id='1'");
            $batchSucMsg = "<p class='alert alert-success'>Batch 20 members will now activate their accounts.</p>";
            header("Refresh:3; url=/cln-office/batch_activation.php");
        }else{
            $batchSucMsg = "Error! Please again or contact I.T Department.";
        }
    }
    if(isset($_POST['b21members'])){
        $b1SQLup = mysqli_query($con,"UPDATE mlmmembers SET batchstatus='Pay', duedate='$due_date' WHERE batch='21'");
        if ($b1SQLup) {
            $b1SQLupa = mysqli_query($con,"UPDATE mlmsystem SET batch21status='Pay' WHERE id='1'");
            $batchSucMsg = "<p class='alert alert-success'>Batch 21 members will now activate their accounts.</p>";
            header("Refresh:3; url=/cln-office/batch_activation.php");
        }else{
            $batchSucMsg = "Error! Please again or contact I.T Department.";
        }
    }
    if(isset($_POST['b22members'])){
        $b1SQLup = mysqli_query($con,"UPDATE mlmmembers SET batchstatus='Pay', duedate='$due_date' WHERE batch='22'");
        if ($b1SQLup) {
            $b1SQLupa = mysqli_query($con,"UPDATE mlmsystem SET batch22status='Pay' WHERE id='1'");
            $batchSucMsg = "<p class='alert alert-success'>Batch 22 members will now activate their accounts.</p>";
            header("Refresh:3; url=/cln-office/batch_activation.php");
        }else{
            $batchSucMsg = "Error! Please again or contact I.T Department.";
        }
    }
    if(isset($_POST['b23members'])){
        $b1SQLup = mysqli_query($con,"UPDATE mlmmembers SET batchstatus='Pay', duedate='$due_date' WHERE batch='23'");
        if ($b1SQLup) {
            $b1SQLupa = mysqli_query($con,"UPDATE mlmsystem SET batch23status='Pay' WHERE id='1'");
            $batchSucMsg = "<p class='alert alert-success'>Batch 23 members will now activate their accounts.</p>";
            header("Refresh:3; url=/cln-office/batch_activation.php");
        }else{
            $batchSucMsg = "Error! Please again or contact I.T Department.";
        }
    }
    if(isset($_POST['b24members'])){
        $b1SQLup = mysqli_query($con,"UPDATE mlmmembers SET batchstatus='Pay', duedate='$due_date' WHERE batch='24'");
        if ($b1SQLup) {
            $b1SQLupa = mysqli_query($con,"UPDATE mlmsystem SET batch24status='Pay' WHERE id='1'");
            $batchSucMsg = "<p class='alert alert-success'>Batch 24 members will now activate their accounts.</p>";
            header("Refresh:3; url=/cln-office/batch_activation.php");
        }else{
            $batchSucMsg = "Error! Please again or contact I.T Department.";
        }
    }

?>


<?php 
   include $_SERVER['DOCUMENT_ROOT'] . "/admin-style/batch_activation.php"; 
?>