
<?php
    //echo "<pre>"; 
    //print_r($_SERVER); 
    //echo "</pre>";
    $adminroles =  array('' =>'Select Role' ,'Master Admin'=>'Master Admin','Super Admin'=>'Super Admin','Normal Admin'=>'Normal Admin');
    session_start();
    ini_set('display_errors',0);
    include $_SERVER['DOCUMENT_ROOT'] . "/dbcon/conn.php";
    
    include $_SERVER['DOCUMENT_ROOT'] . "/scripts/arraylist.php";

?>

<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <title><?php echo $sitename;?> | admin</title>
        <link href="/css/styles.css" rel="stylesheet" type="text/css" />
        <link href="/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
        <link href="/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link href="/icofont/css/icofont.css" rel="stylesheet" type="text/css"/>
        <style type="text/css">
            

        </style>           
    </head>
    <body id="home">        
        <div id="bodycontainer" style="min-height: 100%">
            <?php
                if(!isset($_SESSION['adminuser']) || empty($_SESSION['adminuser'])){
                    header('Location: /admin/login.php');
                }else{
                    $username=$_SESSION['adminuser'];
                    $sqlUD = mysqli_query($con,"SELECT * FROM mlmadminusers WHERE username='" . $username . "'");
                    while ($rows = mysqli_fetch_assoc($sqlUD)) {
                            $fullname=$rows['lastname'] . ", " . $rows['firstname'];
                            $passport=$rows['passport'];
                            $phoneno=$rows['phoneno'];

                            $userid=$_SESSION['userid']=$rows['userid'];

                            include $_SERVER['DOCUMENT_ROOT'] . "/var/vars.php";

                    }
                    
                }

            ?>
      
             <div id="mainmenu" style="display: block;">
               <<a href="/admin/index.php"><img class="logo-main" width="100%" height="160px" style="margin-top:-4%;" src="/images/logo1.jpg" alt="logo"/></a>
               <div id="leftprofilecontainer">                  
                    <div class="profileimage"><?php echo "<img src='/passports/$passport' alt=''>"?></div>
                    <div class="username"><?php// echo $fullname;?> Admin User</div>                  
                </div><!--leftprofilecontainer-->
                <div id="leftnavigation">
                   <?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/adminmenu.inc.php';?>
                </div>
            </div><!--admnin menu-->
            <div id="maincontent">
                <div id="header">
                    <div style="float: left;margin-left: 10px;" id="toggleMenu"><span></span></div>
                    <ul id="profilenav">
                        <li class="profileimage"><?php// echo "<img src='/passports/$passport' alt=''>"?></li>
                        <li class="username"><?php echo $username;?></li>
                    </ul>
                </div>
                <div class="spacer"></div>
                <div id="innercontent">
                    <?php
                        $section=isset($_GET['section'])?$_GET['section']:'';
                        if($section=='createadmin' || $section=='deleteadmin' || $section=='demoteadmin' || $section=='editadmininfo' || $section=='manageadmin' || $section=='deletedadmin' || $section=='manageadminroles'){
                            include $_SERVER['DOCUMENT_ROOT'] . "/modules/usermanagement.php";
                        }elseif ($section=='generatepin' || $section=='viewepins' || $section=='viewusedpins' || $section=='viewblockedpins' || $section=='unusedpins') {
                            include $_SERVER['DOCUMENT_ROOT'] . "/modules/epinmanagement.php";
                        }elseif($section=='addmember' || $section=='listmembers' || $section=='memberstatus' || $section=='memberdetails' || $section=='bannedaccounts' || $section=='editprofile'){
                            include $_SERVER['DOCUMENT_ROOT'] . "/modules/membermanagement.php";
                        }elseif($section=='createbonus' || $section=='listbonus' || $section=='matrixbonus' || $section=='updatestage' || $section=='managebonus' || $section=='adjustbonus'){
                            include $_SERVER['DOCUMENT_ROOT'] . "/modules/bonusmanagement.php";
                        }elseif($section=='funddeposit' || $section=='withdrawalrequest' || $section=='confirmdeposit' || $section=='approvewithdrawal' || $section=='pendingwithdrawals' || $section=='fundtransfer' || $section=='ewalletcredits' || $section=='ewalletdebits' || $section=='managewallet' || $section=='creditdebit') {
                            include $_SERVER['DOCUMENT_ROOT'] . "/modules/ewalletmanagement.php";
                            
                        }elseif ($section=='dashboard' || $section=='') {
                            # code... 
                            echo "<h2>Dashboard</h2>";
                                $reg__incomes = number_format($registrationIncome,2) ;
                                // $epins__sales = number_format(totalsales(),2);
                                $epins__sales = number_format($totalsales,2);
                                // $cash_at_bank = $reg__incomes - $epins__sales;
                                $cash_at_bank = number_format($registrationIncome,2) - number_format($totalsales,2);
                                $total__paid = number_format($registrationIncome,2) - number_format($companyProfit,2);
                            ?>
                                <section class="dashboard">
                                    <figure>
                                        <div class="item registration">
                                            <p class="value"><?php echo '$' . $registrationIncome;?></p>
                                            <div class="caption"><p>Total Activation Income</p></div>
                                        </div>
                                    </figure>

                                    <figure>
                                        <div class="item withdrawalrequest">
                                            <p><span style="display:block;"></span><?php echo '$' . $totalsales .'K';?></p>
                                            <div class="caption"><p>E-Pin Sales </p></div>
                                        </div>
                                    </figure>
                                    
                                    <!--<figure>-->
                                    <!--    <div class="item welcomebonus">-->
                                            <!--<p><span style="display:block;"></span><?php echo '$'. number_format(welcomebonuspaid(),2);?></p>-->
                                    <!--        <div class="caption"><p>welcome bonus paid</p></div>-->
                                    <!--    </div>-->
                                    <!--</figure>-->
                                    <!--
                                    <figure>
                                        <div class="item referralbonus">
                                            <p><span style="display:block;"></span><?php echo '$'. number_format(referralbonuspaid(),2);?></p>
                                            <div class="caption"><p>Referral Bonus Paid(R)</p></div>
                                        </div>
                                    </figure>
                                    -->
                                    
                                    <figure>
                                        <div class="item totalsales">
                                            <p><span style="display:block;"></span><?php echo '$'. number_format($companyProfit,2);?></p>
                                            <div class="caption"><p>Company Profit</p></div>
                                        </div>
                                    </figure>
                                    
                                    <!--<figure>-->
                                    <!--    <div class="item companyprofit">-->
                                    <!--        <p><span style="display:block;"></span><?php echo '$'. number_format(profit(),2);?></p>-->
                                    <!--        <div class="caption"><a href="/admin/?section=transactions"><p>Company Profit</p></a></div>-->
                                    <!--    </div>-->
                                    <!--</figure>-->
                                    <figure>
                                        <div class="item stepoutbonus">
                                            <p><span style="display:block;"></span><?php echo '$'. number_format($compayProfit,2);?></p>
                                            <div class="caption"><p>Company Profit</p></div>
                                        </div>
                                    </figure>
                                    <figure>
                                        <div class="item welcomebonus">
                                            <p><span style="display:block;"></span><?php echo '$'. $total__paid .'K';?></p>
                                            <div class="caption"><p>Total Paid</p></div>
                                        </div>
                                    </figure>
                                    <figure>
                                        <div class="item totalmembers">
                                            <!--<p><?php ;?></p>-->
                                            <p><span style="display:block;"></span><?php echo $totalMembers;?></p>
                                            <div class="caption"><a href="/admin/?section=listmembers"><p>Total Members</p></a></div>
                                        </div>
                                    </figure>
                                    <!--<figure>-->
                                    <!--    <div class="item stepoutbonus">-->
                                    <!--        <p><span style="display:block;"></span><?php echo '$'. number_format(stepoutbonuspaid(),2);?></p>-->
                                    <!--        <div class="caption"><p>Incentives Paid</p></div>-->
                                    <!--    </div>-->
                                    <!--</figure>-->
                                    <!--<figure>-->
                                    <!--    <div class="item matrixbonus">-->
                                    <!--        <p><span style="display:block;"></span><?php echo '$'. number_format(matrixbonuspaid(),2);?></p>-->
                                    <!--        <div class="caption"><p>Matrix Bonus Paid</p></div>-->
                                    <!--    </div>-->
                                    <!--</figure>-->
                                    
                                    <figure>
                                        <div class="item withdrawalrequest">
                                            <p><span style="display:block;"></span><?php echo newwithdrawals();?></p>
                                            <div class="caption"><a href="/admin/?section=pendingwithdrawals"><p>New Withdrawals</p></a></div>
                                        </div>
                                    </figure>
                                    <figure>
                                        <div class="item pomegranate">
                                            <p><span style="display:block;"></span><?php echo '$' .number_format(newwithdrawalamount(),2);?></p>
                                            <div class="caption"><a href="/admin/?section=pendingwithdrawals"><p>Not Paid Withdrawals</p></a></div>
                                        </div>
                                    </figure>
                                    <figure>
                                        <div class="item unusedepins">
                                            <p><span style="display:block;"></span><?php echo unusedepins();?></p>
                                            <div class="caption"><a href="/admin/?section=viewepins"><p>Unused e-Pins</p></a></div>
                                        </div>
                                    </figure>
                                    <figure>
                                        <div class="item messagestickets">
                                            <p><span style="display:block;"></span><?php echo unreadmails();?></p>
                                            <div class="caption"><a href="/admin/?section=readmail"><p>Messages/Support Tickets</p></a></div>
                                        </div>
                                    </figure>
                                    
                                    <!--
                                    <figure>
                                        <div class="item promowinners">
                                            <p><?php ;?></p>
                                            <div class="caption"><a href="/?section=listmail"><p>Promo</p></a></div>
                                        </div>
                                    </figure>
                                    -->
                                </section>
                            <?php
                        }elseif ($section=='sendmail' || $section=='readmail' || $section=='mailinglist' || $section=='read') {
                            # code...
                            include $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/mailmanagement.php";
                        }elseif ($section=='transactions' || $section=='joining' || $section=='rankachievers' || $section=='bonusreport' || $section=='transferreport') {
                            include $_SERVER['DOCUMENT_ROOT'] . "/modules/reports.php";
                            # code...
                        }elseif($section=='personalinfo' || $section=='changepassword' || $section=='changepix') {
                            # code...
                            include $_SERVER['DOCUMENT_ROOT'] . "/modules/adminusers.php";
                        }elseif ($section=='backup') {
                            # code...
                            include $_SERVER['DOCUMENT_ROOT'] . "/modules/databaseadmin.php";
                        }
                    ?>
                </div>
           </div><!--admin content-->
                   
        </div>
        <script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>
        <script src='/js/mlm.js'> </script>
    </body>
</html>


