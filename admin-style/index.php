
<!DOCTYPE html>
<head>
<title>Change Lives Network - Admin Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="User Dashboard" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="/admin-style/css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="/admin-style/css/style.css" rel='stylesheet' type='text/css' />
<link href="/admin-style/css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="/admin-style/css/font.css" type="text/css"/>
<link href="/admin-style/css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="/admin-style/css/morris.css" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="/admin-style/css/monthly.css">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="/admin-style/js/jquery2.0.3.min.js"></script>
<script src="/admin-style/js/raphael-min.js"></script>
<script src="/admin-style/js/morris.js"></script>
</head>
<body>
    
<section id="container">
<!--header start-->
<?php include '../admin-style/header.php'; ?>
<!--header end-->
<!--sidebar start-->
<?php include '../admin-style/sidebar.php'; ?>
<!--sidebar end-->
<!--main content start-->

<section id="main-content" style="background: #ffffff;">
	<section class="wrapper">
		<!-- //market-->
		<div class="market-updates">

			<div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-2" style="background:#000000;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" style="color: #fff;font-size: 3em;"></i>
					</div>
					 <div class="col-md-8 market-update-left">
					 	<h4><a style="color: #fff;" href="#">Total members</a></h4>
						<h4><?=$totalMembers?></h4>
						<!-- <a style="color:#ffffff" href="#">View all members</a> -->
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-4" style="background:#000000;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4> <a style="color: #fff;" href="#">Active members</a></h4>
						<h4><?=$totalActiveMembers;?></h4>
                       <!-- <a style="color:#ffffff" href="#">View active downliners</a> -->
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-2" style="background:blue;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" style="color: #fff;font-size: 3em;"></i>
					</div>
					 <div class="col-md-8 market-update-left">
					 	<h4><a style="color: #fff;" href="/cln-office/phase1members.php">Phase 1 members</a></h4>
						<h4><?=$phase1Members?></h4>
						<!-- <a style="color:#ffffff" href="#">View all members</a> -->
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-4" style="background:blue;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4> <a style="color: #fff;" href="/cln-office/phase2members.php">Phase 2 members</a></h4>
						<h4><?=$phase2Members;?></h4>
                       <!-- <a style="color:#ffffff" href="#">View active downliners</a> -->
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3" style="background:#278bbb;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-lightbulb-o" style="color: #fff;font-size: 3em;"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4><a style="color: #fff;" href="#">Potential Earnings</a></h4>
						<h4><b>$<?=number_format($systemPotentialEarnings,2);?></b></h4>
                        <!-- <a style="color:#ffffff" href="#">View more</a> -->
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-money" style="color: #fff;font-size: 3em;" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4><a style="color: #fff;" href="#">Real Earnings</a></h4> 
						<h4><?php echo "$".number_format($realSystemEarnings,2);?></h4>
                        <!-- <a style="color:#ffffff" href="#">View all earnings</a> -->
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		   <div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3" style="background: #f00;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-money" style="color: #fff;font-size: 3em;"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4><a style="color: #fff;" href="#">Paid Withdrawals</a></h4>
						<h4>$<?=number_format($systemPaidWithdrawals,2);?></h4>
                        <!-- <a style="color:#ffffff" href="#">View all withdrawals</a> -->
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1" style="background:orange;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-money" style="color: #fff;font-size: 3em;" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4><a style="color: #fff;" href="#">Pending Withdrawals</a></h4> 
						<h4><?php echo "$".number_format($systemPendingWithdrawals,2);?></h4>
                        <!-- <a style="color:#ffffff" href="#">View all income</a> -->
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>

			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1" style="background:#26ea60;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-money" style="color: #fff;font-size: 3em;" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4><a style="color: #fff;" href="#">Company Profits</a></h4> 
						<h4><?php echo "$".number_format($systemProfits,2);?></h4>
                        <!-- <a style="color:#ffffff" href="#">View all income</a> -->
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>

			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1" style="background:#999999;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" style="color: #fff;font-size: 3em;" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4><a style="color: #fff;" href="#">Gabs</a></h4> 
						<h4><?php echo number_format($realSystemEarnings);?></h4>
                        <!-- <a style="color:#ffffff" href="#">View all Gabs</a> -->
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>

			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1" style="background:red;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-bitcoin" style="color: #fff;font-size: 3em;" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4><a style="color: #fff;" href="#">Paid Withdrawals</a></h4> 
						<h4><?php echo $paidWithdrawals;?></h4>
                        <!-- <a style="color:#ffffff" href="#">View all withdrawals</a> -->
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1" style="background:red;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-bitcoin" style="color: #fff;font-size: 3em;" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4><a style="color: #fff;" href="pending_withdrawals.php">Pending Withdrawals</a></h4> 
						<h4><?php echo $pendingWithdrawals;?></h4>
                        <!-- <a style="color:#ffffff" href="#">View all withdrawals</a> -->
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>	
	
		<div class="agileits-w3layouts-stats">
					<div class="col-md-8 stats-info stats-last widget-shadow">
						<div class="stats-last-agile">
                            <div class="stats-title">
                                <h4 class="title">Latest Transactions</h4>
                            </div>
							<table class="table stats-table ">
								<thead>
									<tr>
										<th>DATE</th>
										<th>NAME</th>
										<th>Deposits</th>
										<th>Withdrawals</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sqlTr = "SELECT * FROM mlmledger ORDER BY transid Desc LIMIT 10";
									$SQLTransTesults = mysqli_query($con,$sqlTr);
								        while ($row = mysqli_fetch_assoc($SQLTransTesults)) {
								                $trIDate=$row['transdate'];
								                $trDesc=$row['transdescription'];
								                $trCredit=$row['creditamount'];
								                $trDebit=$row['debitamount'];
								                // $trStatus=$row['status'];

								                // if($trDebit=="0.00"){
								                // 	$trDebit="";
								                // }
								                // if($trCredit=="0.00"){
								                // 	$trCredit="";
								                // }


								                echo '
                    	    <tr>
                              <td> '.$trIDate.' </td>
                              <td> '.$trDesc.'</td>
                              <td> $'.$trCredit.' </td>
                              <td> $'.$trDebit.'</td>
                            </tr>
                    	    ';
								        }
									?>
									<!-- <tr>
										<th scope="row">1</th>
										<td>Account Activation</td>
										<td><span class="label label-success"><B>+Deposited</B></span></td>
										<td><h5>$40 <i class="fa fa-level-up"></i></h5></td>
									</tr> -->
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
<script src="/admin-style/js/bootstrap.js"></script>
<script src="/admin-style/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="/admin-style/js/scripts.js"></script>
<script src="/admin-style/js/jquery.slimscroll.js"></script>
<script src="/admin-style/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="/admin-style/js/jquery.scrollTo.js"></script>
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
	<script type="text/javascript" src="/admin-style/js/monthly.js"></script>
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
