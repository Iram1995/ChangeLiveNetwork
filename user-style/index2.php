<?php


// echo $child1DLsp2."<br>";

// echo $child2_Userid."<br>";


?>
<!DOCTYPE html>
<head>
    <title>Change Lives Network : Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="User Dashboard" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="user-style/css/bootstrap.min.css" >
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="user-style/css/style.css" rel='stylesheet' type='text/css' />
    <link href="user-style/css/style-responsive.css" rel="stylesheet"/>
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="user-style/css/font.css" type="text/css"/>
    <link href="user-style/css/font-awesome.css" rel="stylesheet"> 
    <link rel="stylesheet" href="user-style/css/morris.css" type="text/css"/>
    <!-- calendar -->
    <link rel="stylesheet" href="user-style/css/monthly.css">
    <!-- //calendar -->
    <!-- //font-awesome icons -->
    <script src="user-style/js/jquery2.0.3.min.js"></script>
    <script src="user-style/js/raphael-min.js"></script>
    <script src="user-style/js/morris.js"></script>
</head>
<body>
    
<section id="container">
<!--header start-->
<?php include 'user-style/header.php'; ?>
<!--header end-->
<!--sidebar start-->
<?php include 'user-style/sidebar.php'; ?>
<!--sidebar end-->
<!--main content start-->

<section id="main-content" style="background: #ffffff;">
	<section class="wrapper">
		<!-- //market-->
		<div class="market-updates">
			<h2 class="alert alert-warning alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert">
    				                <span aria-hidden="true">&times;</span>
    	                            <span class="sr-only">Close</span>
    	                        </button>
    	                        <b>Total downliners</b> and <b>potential earnings</b> are temporary hidden. 
    	                       	<br>They will shown again soon. 
    	                        <br>
    	                        <br>
    	                        Thank you for your co-operation.
			</h2>

			<!-- start news -->
			<?php if($sqlNewssCount = mysqli_num_rows($sqlNewss) > "0"){?>
			<!-- <h2 class="alert alert-warning alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert">
    				                <span aria-hidden="true">&times;</span>
    	                            <span class="sr-only">Close</span>
    	                        </button>
				<b><i class="fa fa-bullhorn"></i> <?=$newsTitle;?>..</b>
				<hr>
				<br><a class="btn btn-warning" href="/announcement.php?read=<?=$newsID;?>"><i class="fa fa-book"></i> Check Update</a>
			</h2> -->
			<?php } ?>

			<!-- // end news -->
			<?php

						// EXAMPLE SECTION 

				// $zSQL = mysqli_query($con,"SELECT * FROM mlmmembers WHERE treecount<'3' AND treecompleted='0' order by treenumber ASC LIMIT 1 ");
	   //              while ($zROWS = mysqli_fetch_assoc($zSQL)){
	   //                  echo "userid ".$parent_Userid = $zROWS['userid']."<br>";
	   //                  echo "parent treecount ".$parent_treecount = $zROWS['treecount']."<br>";
	   //                  echo "Tree number ".$current_tree = $zROWS['treenumber'];
	   //              }
			
			// $myTotalDLs = $lastMemberRegNo-$userRank;
			// echo "User ranking ".$userRank."<br>";
			// echo "My total downliners are ".$myTotalDLs;

		// UPDATE DATABASE

		// $zSQL1212 = mysqli_query($con,"UPDATE mlmmembers SET phase1completed='0', phase2completed='0', phase3completed='0' WHERE userid>'1'");
		// if ($zSQL1212) {
		// 	# code...
		// 	echo "All users updated successfully";
		// }
		
			?>

			<!-- show orange batch  -->
			<?php if ($userActStatus == "0" || $userActStatus == "Pay"){?>
            <H2 class="alert alert-primary" style="text-align: center;font-size: 1.2em;background: orange;color: #fff;">
                <i class="fa fa-star"></i>
                Batch <?=$batchno;?>
            </H2>
            <?php } ?>
            <!--  show green batch -->
            <?php if ($userActStatus == "Paid"){?>
            <H2 class="alert alert-warning" style="text-align: center;font-size: 1.2em;background: green;color: #fff;">
                <i class="fa fa-star"></i>
                Batch <?=$batchno;?>
            </H2>
            <?php } ?>
            <!-- //end batches -->

            <!-- Auto Block all users with <3 direct downliners and not paid -->
            <?php
                //$autounBlockSQL = mysqli_query($con,"UPDATE mlmmembers SET status='1',statusreason='0',statusdate='$currentDate' WHERE currentstage='Phase 2'");
            	if($directDownliners>"2"){
            	     $automark3SQL = mysqli_query($con,"UPDATE mlmmembers SET directdownliners='1' WHERE username='$username'");
            	}
            	if($currentDate>$targetDate && $userdirectdownliners!='1'){
            	    $autoBlockSQL = mysqli_query($con,"UPDATE mlmmembers SET status='0',statusreason='Downliners',statusdate='$currentDate' WHERE username='$username'");
            	}

            ?>
            <!-- /// END auto block users -->

            <?php if($directDownliners<"3"){?>
            
	            <!-- count down for Direct members -->
	            <?php
	                $findOverDate = mysqli_query($con, "SELECT * FROM mlmmembers WHERE directdownliners!='1' AND targetdate<'$currentDate'");
	                while ($rowDate = mysqli_fetch_assoc($findOverDate)) {
                        $DateUsername=$rowDate['username'];
                        $autoBlockSQL2 = mysqli_query($con,"UPDATE mlmmembers SET status='0',statusreason='Downliners',statusdate='$currentDate' WHERE username='$DateUsername' AND targetdate<'$currentDate'");
	                }
	               // $findOverDateDLs = mysqli_query($con, "SELECT * FROM mlmmembers WHERE sponsorid='$DateUsername'");
	               // $userDLs = mysqli_num_rows($findOverDateDLs);
	               // if($userDLs<3){
	               //     $currentDate = date('Y-m-d H:i:s');
	               //     $autoBlockSQL = mysqli_query($con,"UPDATE mlmmembers SET status='0',statusreason='downlines',statusdate='$currentDate' WHERE username='$DateUsername' AND targetdate<'$datecreated'");
	               // }
	                
	            	$requiredDownliners = 3-$directDownliners;
	            	
	            ?>
	            <h2 class="alert alert-danger" style="text-align: center;font-size: 1.5em;">
	            	<span style="font-size:0.85em;">You <?php if ($requiredDownliners>"0" && $requiredDownliners<$directDownliners){echo "still";}else{echo "";}?> have to add <?=$requiredDownliners;?> member<?php if ($requiredDownliners=="1"){echo " ";}else{echo "s";}?> into batch</span>
	            	<br>
	            	<?php if(!$userActStatus == "Paid"){?>
	            	<span style="font-size: 2.5em;">TIME LEFT</span>
	            	<br><br>
	            	<script language="JavaScript">
						// TargetDate = "12/31/2020 5:00 AM";
						TargetDate = <?php echo json_encode($targetDate); ?>;
						BackColor = "";
						ForeColor = "red";
						CountActive = true;
						CountStepper = -1;
						LeadingZero = true;
						DisplayFormat = "%%D%% Days, %%H%% Hrs, %%M%% Min, %%S%% Sec.";
						FinishMessage = "System will block you any minutes now!";
						</script>
						<script language="JavaScript" src="https://rhashemian.github.io/js/countdown.js"></script>
					<?php } ?>
	            </h2>
	            <!-- ///end count down -->
        	<?php } ?>

            <!-- activations -->
            <?php if ($userBatchStatus == "Pay"){?>
            <h2 class="alert alert-danger" style="text-align:center;font-size: 1em;">
            	<!-- <b>Hi <?=$fullname;?>, </b>
                <br>
                It's time for you to pay<br><br> -->
                <br>
                <a class="btn btn-danger" href="/process/activate.php" style="font-size: 1.5em;">ACTIVATE ACCOUNT</a></b> 
                <br><br>
                <script language="JavaScript">
						// TargetDate = "12/31/2020 5:00 AM";
						TargetDate = <?php echo json_encode($dueDate); ?>;
						BackColor = "";
						ForeColor = "#D9534F";
						CountActive = true;
						CountStepper = -1;
						LeadingZero = true;
						DisplayFormat = "%%D%% Days, %%H%% Hrs, %%M%% Min, %%S%% Sec.";
						FinishMessage = "System will block you any minutes now!";
						</script>
						<script language="JavaScript" src="https://rhashemian.github.io/js/countdown.js"></script>

						<br><br>
            </h2>
            <!-- // end activations -->

            <?php } ?>

			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2" style="background:#147EFB;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-sitemap" style="color: #fff;font-size: 3.05em;"></i>
					</div>
					 <div class="col-md-8 market-update-left">
					 <h4>Total Downliners</h4>
					 <h3><?php echo $userTotalDownliners;?></h3> 
					<!--<h3>N/A <span style="font-size: 11px;">Temporary Hidden</span></h3>-->
                    <hr>
					<a style="color:#ffffff" href="/genealogy.php">View all downliners</a>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4" style="background:#147EFB;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>Direct Downliners</h4>
						<h3><?php echo number_format($directDownliners);?></h3>
                        <hr>
                        <a style="color:#ffffff" href="/downliners.php">View direct downliners</a>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-lightbulb-o" style="color: #fff;font-size: 4em;"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Potential Earnings</h4>
						 <h3>$<?php echo number_format($userTotalPotentialsEarnings);?></h3> 
						<!--<h3>N/A <span style="font-size: 11px;">Temporary Hidden</h3>-->
                        <a style="color:#ffffff" href="my_genealogy.php">View more</a>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-dollar" style="color: #fff;font-size: 4em;" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Available Earnings</h4> 
						<h3><?php if($UserAvalBal == ""){echo "$0.00";} else{echo "$".$UserAvalBal;}?></h3>
						<?php if($UserAvalBal == ""){?>
						<button class="btn btn-primary" disabled>Withdraw</button>
                    	<?php } ?>
                    	<?php if($UserAvalBal>"0"){?>
                    	<a style="color:#ffffff" href="/withdraw.php" class="btn btn-primary">Click to withdraw</a>
                       	<?php } ?>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<?php// if ($userActStatus == "Paid"){?>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
			<?php// if ($userActStatus == "Paid"){?>
						<i class="fa fa-dollar" style="color: #fff;font-size: 4em;"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Total Earnings</h4>
						<h3><?php if($UserTotalCredit == ""){echo "$0.00";} else{ echo "$".$UserTotalCredit;}?></h3>
                        <a style="color:#ffffff" href="/earnings.php">View more</a>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-check" style="color: #fff;font-size: 4em;" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Total Transactions</h4> 
						<h3><?php echo $UserTotalEarnings;?></h3>
                        <!-- <a style="color:#ffffff" href="#">Click to withdraw</a> -->
                       <a style="color:#ffffff" href="#earnings_section">View more</a>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<?php// } ?>
		   <div class="clearfix"> </div>
		</div>	
		<!-- //market-->
		<!-- <div class="row">
			<div class="panel-body">
				<div class="col-md-12 w3ls-graph">
						<div class="agileinfo-grap">
							<div class="agileits-box">
								<header class="agileits-box-header clearfix">
									<h3>Your Downliners Statistics</h3>
										<div class="toolbar">
											
											
										</div>
								</header>
								<div class="agileits-box-body clearfix">
									<div id="hero-area"></div>
								</div>
							</div>
						</div>

				</div>
			</div>
		</div> -->
	
		<div class="agileits-w3layouts-stats">
					<!-- Phase1 -->
					<div class="col-md-4 stats-info widget">
						<div class="stats-info-agileits panel panel-primary">
							<div class="stats-title">
								<h4 class="title">Phase 1 <?php if($userphase1completed == "1"){ echo '<img src="data:image/png;base64,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" style="width: 30px;">';}?></h4>
							</div>
							<div class="stats-body">
								<ul class="list-unstyled">
									<li>Level 1 <span class="label label-<?php if($user3Downliners == 3){echo "success";}else{echo "danger";}?> pull-right" style="font-size:12px;"><?php echo $level1D = $user3Downliners;?> / 3</span>  
										<div class="progress progress-striped active progress-right">
											<div class="bar <?php if($user3Downliners == 3){echo "green";}else{echo "red";}?>" style="width:<?php echo $level1D = $user3Downliners/3*100;?>%;"></div> 
										</div>
									</li>
									<li>Level 2 <span class="label label-<?php if($user9Downliners == 9){echo "success";}else{echo "danger";}?> pull-right" style="font-size:12px;"><?php echo $level2D = $user9Downliners;?> / 9</span>  
										<div class="progress progress-striped active progress-right">
											<div class="bar <?php if($user9Downliners == 9){echo "green";}else{echo "red";}?>" style="width:<?php echo $level2D = $user9Downliners/9*100;?>%;"></div>
										</div>
									</li>
									<li>Level 3 <span class="label label-<?php if($user27Downliners == 27){echo "success";}else{echo "danger";}?> pull-right" style="font-size:12px;"><?php echo $level3D = $user27Downliners;?> / 27</span>  
										<div class="progress progress-striped active progress-right">
											<div class="bar <?php if($user27Downliners == 27){echo "green";}else{echo "red";}?>" style="width:<?php echo $level3D = $user27Downliners/27*100;?>%;"></div>
										</div>
									</li>
									<li>Level 4 <span class="label label-<?php if($user81Downliners == 81){echo "success";}else{echo "danger";}?> pull-right" style="font-size:12px;"><?php echo $level4D = $user81Downliners;?> / 81</span>  
										<div class="progress progress-striped active progress-right">
											<div class="bar <?php if($user81Downliners == 81){echo "green";}else{echo "red";}?>" style="width:<?php echo $level4D = $user81Downliners/81*100;?>%;"></div>
										</div>
									</li> 
								</ul>
							</div>
						</div>
					</div>
					<?php 
					
					if($user3Downliners == "3" && $user9Downliners == "9" && $user27Downliners == "27" && $user81Downliners == "81" && $userphase1completed=="0"){
					    $text_phase2 ="Phase 2";
						if($addMeToPhase2 = mysqli_query($con,"UPDATE mlmmembers SET currentstage='$text_phase2', phase1completed='1' WHERE userid=$userid")){
						    echo "<p class='alert alert-success'><b>Good News! </b>You have been upgraded to Phase 2</p>";
						}else{
						    echo "<p class='alert alert-warning'><b>You should be on Phase 2! </b>You can also <a class='btn btn-success' href='#'>upgrade manually</a>.</p>";
						}
					}
					//if()
					
					
					// if($upliner81Downliners == "81" && $par_userphase1completed=="0"){
					// 	$addUplinerToPhase2 = mysqli_query($con,"UPDATE mlmmembers SET currentstage='Phase 2' AND phase1completed='1' WHERE userid='$parentid'");
					// }
					// if($child1_81Downliners == "81" && $child1_userphase1completed=="0"){
					// 	$addChild1ToPhase2 = mysqli_query($con,"UPDATE mlmmembers SET currentstage='Phase 2' AND phase1completed='1' WHERE userid='$child1_Userid'");
					// }

					// if($child2_81Downliners == "81" && $child2_userphase1completed=="0"){
					// 	$addChild2ToPhase2 = mysqli_query($con,"UPDATE mlmmembers SET currentstage='Phase 2' AND phase1completed='1' WHERE userid='$child2_Userid'");
					// }
					// if($child1_81Downliners == "81" && $child1_userphase1completed=="0"){
					// 	$addChild3ToPhase2 = mysqli_query($con,"UPDATE mlmmembers SET currentstage='Phase 2' AND phase1completed='1' WHERE userid='$child1_Userid'");
					// 	}
					?>

					<!-- Phase1 -->
					<div class="col-md-4 stats-info widget">
						<div class="stats-info-agileits panel panel-primary">
							<div class="stats-title">
								<h4 class="title">Phase 2 <?php if($userphase2completed == "1"){ echo '<img src="data:image/png;base64,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" style="width: 30px;">';}?></h4>
							</div>
							<div class="stats-body">
								<ul class="list-unstyled">
									<li>Level 1 <span class="label label-<?php if($user3_Downliners == 3){echo "success";}else{echo "danger";}?> pull-right" style="font-size:12px;"><?php echo $level1D_p2 = $user3_Downliners;?> / 3</span>  
										<div class="progress progress-striped active progress-right">
											<div class="bar <?php if($user3_Downliners == 3){echo "green";}else{echo "red";}?>" style="width:<?php echo $level1D_p2 = $user3_Downliners/3*100;?>%;"></div> 
										</div>
									</li>
									<li>Level 2 <span class="label label-<?php if($user9_Downliners == 9){echo "success";}else{echo "danger";}?> pull-right" style="font-size:12px;"><?php echo $level2D_p2 =$user9_Downliners;?> / 9</span>  
										<div class="progress progress-striped active progress-right">
											<div class="bar <?php if($user9_Downliners == 9){echo "green";}else{echo "red";}?>" style="width:<?php echo $level2D_p2 = $user9_Downliners/9*100;?>%;"></div> 
										</div>
									</li>
									<li>Level 3 <span class="label label-<?php if($user27_Downliners == 27){echo "success";}else{echo "danger";}?> pull-right" style="font-size:12px;"><?php echo $level3D_p2 = $user27_Downliners;?> / 27</span>  
										<div class="progress progress-striped active progress-right">
											<div class="bar <?php if($user27_Downliners == 27){echo "green";}else{echo "red";}?>" style="width:<?php echo $level3D_p2 = $user27_Downliners/27*100;?>%;"></div>
										</div>
									</li>
									<li>Level 4 <span class="label label-<?php if($user81_Downliners == 81){echo "success";}else{echo "danger";}?> pull-right" style="font-size:12px;"><?php echo $level4D_p2 = $user81_Downliners;?> / 81</span>  
										<div class="progress progress-striped active progress-right">
											<div class="bar <?php if($user81_Downliners == 81){echo "green";}else{echo "red";}?>" style="width:<?php echo $level4D_p2 = $user81_Downliners/81*100;?>%;"></div>
										</div>
									</li>  
								</ul>
							</div>
						</div>
					</div>

					<!-- Phase3 -->
					<div class="col-md-4 stats-info widget">
						<div class="stats-info-agileits panel panel-primary">
							<div class="stats-title">
								<h4 class="title">Phase 3</h4>
							</div>
							<div class="stats-body">
								<ul class="list-unstyled">
									<li>Level 1 <span class="label label-danger pull-right" style="font-size:13px;">0 / 3</span>  
										<div class="progress progress-striped active progress-right">
											<div class="bar red" style="width:0%;"></div> 
										</div>
									</li>
									<li>Level 2 <span class="label label-danger pull-right" style="font-size:13px;">0 / 9</span>  
										<div class="progress progress-striped active progress-right">
											<div class="bar red" style="width:0%;"></div>
										</div>
									</li>
									<li>Level 3 <span class="label label-danger pull-right" style="font-size:13px;">0 / 27</span>  
										<div class="progress progress-striped active progress-right">
											<div class="bar red" style="width:0%;"></div>
										</div>
									</li>
									<li>Level 4 <span class="label label-danger pull-right" style="font-size:13px;">0 / 81</span>  
										<div class="progress progress-striped active progress-right">
											<div class="bar red" style="width:0%;"></div>
										</div>
									</li> 
								</ul>
							</div>
						</div>
					</div>
				


					<div class="col-md-8 stats-success stats-last widget-shadow" id="earnings_section">
						<div class="stats-last-agile">
                            <div class="stats-title">
                                <h4 class="title">Account Earnings</h4>
                            </div>
							<table class="table stats-table ">
								<thead>
									<tr>
										<th>DATE</th>
										<th>NAME</th>
										<th>AMOUNT</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sqlTr = mysqli_query($con,"SELECT * FROM mlmmemberledger WHERE creditamount>'0' AND userid=$userid");
								        while ($row = mysqli_fetch_assoc($sqlTr)) {
								                $trIDate=$row['transdate'];
								                $trDesc=$row['transdescription'];
								                $trCredit=$row['creditamount'];
								                $trDebit=$row['debitamount'];
								                $trStatus=$row['status'];

								                if($trCredit=="0.00"){
								                	$trCredit="";
								                }else{
								                	$trCredit = "<span style='color:green;'>+ $".$row['creditamount']."</span>";
								                }


								                echo '
                    	    <tr>
                              <td> '.$trIDate.' </td>
                              <td> '.$trDesc.'</td>
                              <td> '.$trCredit.'</td>
                            </tr>
                    	    ';
								        }
									?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
</section>
 <!-- footer -->
		  <div class="footer" style="background:#000000;">
			<div class="wthree-copyright">
			  <p>© 2020 Change Lives Network. All rights reserved </p>
			</div>
		  </div>
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="user-style/js/bootstrap.js"></script>
<script src="user-style/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="user-style/js/scripts.js"></script>
<script src="user-style/js/jquery.slimscroll.js"></script>
<script src="user-style/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="user-style/js/jquery.scrollTo.js"></script>
<!-- morris JavaScript -->	
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
			
			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
<!-- calendar -->
	<script type="text/javascript" src="user-style/js/monthly.js"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
	<!-- //calendar -->
</body>
</html>
