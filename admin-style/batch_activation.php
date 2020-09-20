
<!DOCTYPE html>
<head>
<title>Change Lives Network -Batch Payments</title>
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
		<?php if($batchSucMsg){ echo $batchSucMsg;}?>
		<h3 class="alert alert-warning">If you click on <b>Start Activations</b> all members within that batch will be required to pay within 4days.</h3>
		<div class="market-updates">

			<?php if(!$batch1status =="Pay"){?>
			<div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-2" style="background:#278bbb;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" style="color: #fff;font-size: 3em;"></i>
					</div>
					 <div class="col-md-8 market-update-left">
					 	<h4><a style="color: #fff;" href="#">Batch 1</a></h4>
						<h4><?=$batch1total?></h4>
						<hr>
						<form action="" method="POST">
							<button class="btn btn-secondary" name="b1members"><b>Start Activations</b></button>
						</form>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<?php }?>

			<?php if(!$batch2status=="Pay"){?>
			<div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-2" style="background:#278bbb;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" style="color: #fff;font-size: 3em;"></i>
					</div>
					 <div class="col-md-8 market-update-left">
					 	<h4><a style="color: #fff;" href="#">Batch 2 members</a></h4>
						<h4><?=$batch2total?></h4>
						<hr>
						<form action="" method="POST">
							<button class="btn btn-secondary" name="b2members"><b>Start Activations</b></button>
						</form>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<?php }?>

			<?php if(!$batch3status=="Pay"){?>
			<div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-2" style="background:#278bbb;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" style="color: #fff;font-size: 3em;"></i>
					</div>
					 <div class="col-md-8 market-update-left">
					 	<h4><a style="color: #fff;" href="#">Batch 3 members</a></h4>
						<h4><?=$batch3total?></h4>
						<hr>
						<form action="" method="POST">
							<button class="btn btn-secondary" name="b3members"><b>Start Activations</b></button>
						</form>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<?php }?>

			<?php if(!$batch4status=="Pay"){?>
			<div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-2" style="background:#278bbb;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" style="color: #fff;font-size: 3em;"></i>
					</div>
					 <div class="col-md-8 market-update-left">
					 	<h4><a style="color: #fff;" href="#">Batch 4 members</a></h4>
						<h4><?=$batch4total?></h4>
						<hr>
						<form action="" method="POST">
							<button class="btn btn-secondary" name="b4members"><b>Start Activations</b></button>
						</form>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<?php }?>

			<?php if(!$batch5status=="Pay"){?>
			<div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-2" style="background:#278bbb;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" style="color: #fff;font-size: 3em;"></i>
					</div>
					 <div class="col-md-8 market-update-left">
					 	<h4><a style="color: #fff;" href="#">Batch 5 members</a></h4>
						<h4><?=$batch5total;?></h4>
						<hr>
						<form action="" method="POST">
							<button class="btn btn-secondary" name="b5members"><b>Start Activations</b></button>
						</form>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<?php }?>

			<?php if(!$batch6status=="Pay"){?>
			<div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-2" style="background:#278bbb;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" style="color: #fff;font-size: 3em;"></i>
					</div>
					 <div class="col-md-8 market-update-left">
					 	<h4><a style="color: #fff;" href="#">Batch 6 members</a></h4>
						<h4><?=$batch6total;?></h4>
						<hr>
						<form action="" method="POST">
							<button class="btn btn-secondary" name="b6members"><b>Start Activations</b></button>
						</form>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<?php }?>

			<?php if(!$batch7status=="Pay"){?>
			<div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-2" style="background:#278bbb;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" style="color: #fff;font-size: 3em;"></i>
					</div>
					 <div class="col-md-8 market-update-left">
					 	<h4><a style="color: #fff;" href="#">Batch 7 members</a></h4>
						<h4><?=$batch7total;?></h4>
						<hr>
						<form action="" method="POST">
							<button class="btn btn-secondary" name="b7members"><b>Start Activations</b></button>
						</form>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<?php }?>

			<?php if(!$batch8status=="Pay"){?>
			<div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-2" style="background:#278bbb;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" style="color: #fff;font-size: 3em;"></i>
					</div>
					 <div class="col-md-8 market-update-left">
					 	<h4><a style="color: #fff;" href="#">Batch 8 members</a></h4>
						<h4><?=$batch8total;?></h4>
						<hr>
						<form action="" method="POST">
							<button class="btn btn-secondary" name="b8members"><b>Start Activations</b></button>
						</form>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<?php }?>

			<?php if(!$batch9status=="Pay"){?>
			<div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-2" style="background:#278bbb;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" style="color: #fff;font-size: 3em;"></i>
					</div>
					 <div class="col-md-8 market-update-left">
					 	<h4><a style="color: #fff;" href="#">Batch 9 members</a></h4>
						<h4><?=$batch9total;?></h4>
						<hr>
						<form action="" method="POST">
							<button class="btn btn-secondary" name="b9members"><b>Start Activations</b></button>
						</form>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<?php }?>

			<?php if(!$batch10status=="Pay"){?>
			<div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-2" style="background:#278bbb;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" style="color: #fff;font-size: 3em;"></i>
					</div>
					 <div class="col-md-8 market-update-left">
					 	<h4><a style="color: #fff;" href="#">Batch 10 members</a></h4>
						<h4><?=$batch10total;?></h4>
						<hr>
						<form action="" method="POST">
							<button class="btn btn-secondary" name="b10members"><b>Start Activations</b></button>
						</form>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<?php }?>

			<?php if(!$batch11status=="Pay"){?>
			<div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-2" style="background:#278bbb;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" style="color: #fff;font-size: 3em;"></i>
					</div>
					 <div class="col-md-8 market-update-left">
					 	<h4><a style="color: #fff;" href="#">Batch 11 members</a></h4>
						<h4><?=$batch11total;?></h4>
						<hr>
						<form action="" method="POST">
							<button class="btn btn-secondary" name="b11members"><b>Start Activations</b></button>
						</form>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<?php }?>

			<?php if(!$batch12status=="Pay"){?>
			<div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-2" style="background:#278bbb;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" style="color: #fff;font-size: 3em;"></i>
					</div>
					 <div class="col-md-8 market-update-left">
					 	<h4><a style="color: #fff;" href="#">Batch 12 members</a></h4>
						<h4><?=$batch12total?></h4>
						<hr>
						<form action="" method="POST">
							<button class="btn btn-secondary" name="b12members"><b>Start Activations</b></button>
						</form>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<?php }?>

			<?php if(!$batch13status=="Pay"){?>
			<div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-2" style="background:#278bbb;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" style="color: #fff;font-size: 3em;"></i>
					</div>
					 <div class="col-md-8 market-update-left">
					 	<h4><a style="color: #fff;" href="#">Batch 13 members</a></h4>
						<h4><?=$batch13total;?></h4>
						<hr>
						<form action="" method="POST">
							<button class="btn btn-secondary" name="b13members"><b>Start Activations</b></button>
						</form>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<?php }?>

			<?php if(!$batch14status=="Pay"){?>
			<div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-2" style="background:#278bbb;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" style="color: #fff;font-size: 3em;"></i>
					</div>
					 <div class="col-md-8 market-update-left">
					 	<h4><a style="color: #fff;" href="#">Batch 14 members</a></h4>
						<h4><?=$batch14total;?></h4>
						<hr>
						<form action="" method="POST">
							<button class="btn btn-secondary" name="b14members"><b>Start Activations</b></button>
						</form>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<?php }?>

			<?php if(!$batch15status=="Pay"){?>
			<div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-2" style="background:#278bbb;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" style="color: #fff;font-size: 3em;"></i>
					</div>
					 <div class="col-md-8 market-update-left">
					 	<h4><a style="color: #fff;" href="#">Batch 15 members</a></h4>
						<h4><?=$batch15total;?></h4>
						<hr>
						<form action="" method="POST">
							<button class="btn btn-secondary" name="b15members"><b>Start Activations</b></button>
						</form>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<?php }?>

			<?php if(!$batch16status=="Pay"){?>
			<div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-2" style="background:#278bbb;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" style="color: #fff;font-size: 3em;"></i>
					</div>
					 <div class="col-md-8 market-update-left">
					 	<h4><a style="color: #fff;" href="#">Batch 16 members</a></h4>
						<h4><?=$batch16total;?></h4>
						<hr>
						<form action="" method="POST">
							<button class="btn btn-secondary" name="b16members"><b>Start Activations</b></button>
						</form>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<?php }?>

			<?php if(!$batch17status=="Pay"){?>
			<div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-2" style="background:#278bbb;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" style="color: #fff;font-size: 3em;"></i>
					</div>
					 <div class="col-md-8 market-update-left">
					 	<h4><a style="color: #fff;" href="#">Batch 17 members</a></h4>
						<h4><?=$batch17total;?></h4>
						<hr>
						<form action="" method="POST">
							<button class="btn btn-secondary" name="b17members"><b>Start Activations</b></button>
						</form>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<?php }?>

			<?php if(!$batch18status=="Pay"){?>
			<div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-2" style="background:#278bbb;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" style="color: #fff;font-size: 3em;"></i>
					</div>
					 <div class="col-md-8 market-update-left">
					 	<h4><a style="color: #fff;" href="#">Batch 18 members</a></h4>
						<h4><?=$batch18total;?></h4>
						<hr>
						<form action="" method="POST">
							<button class="btn btn-secondary" name="b18members"><b>Start Activations</b></button>
						</form>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<?php }?>

			<?php if(!$batch19status=="Pay"){?>
			<div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-2" style="background:#278bbb;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" style="color: #fff;font-size: 3em;"></i>
					</div>
					 <div class="col-md-8 market-update-left">
					 	<h4><a style="color: #fff;" href="#">Batch 19 members</a></h4>
						<h4><?=$batch19total;?></h4>
						<hr>
						<form action="" method="POST">
							<button class="btn btn-secondary" name="b19members"><b>Start Activations</b></button>
						</form>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<?php }?>

			<?php if(!$batch20status=="Pay"){?>
			<div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-2" style="background:#278bbb;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" style="color: #fff;font-size: 3em;"></i>
					</div>
					 <div class="col-md-8 market-update-left">
					 	<h4><a style="color: #fff;" href="#">Batch 20 members</a></h4>
						<h4><?=$batch20total;?></h4>
						<hr>
						<form action="" method="POST">
							<button class="btn btn-secondary" name="b20members"><b>Start Activations</b></button>
						</form>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<?php }?>

			<?php if(!$batch21status=="Pay"){?>
			<div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-2" style="background:#278bbb;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" style="color: #fff;font-size: 3em;"></i>
					</div>
					 <div class="col-md-8 market-update-left">
					 	<h4><a style="color: #fff;" href="#">Batch 21 members</a></h4>
						<h4><?=$batch21total;?></h4>
						<hr>
						<form action="" method="POST">
							<button class="btn btn-secondary" name="b21members"><b>Start Activations</b></button>
						</form>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<?php }?>

			<?php if(!$batch22status=="Pay"){?>
			<div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-2" style="background:#278bbb;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" style="color: #fff;font-size: 3em;"></i>
					</div>
					 <div class="col-md-8 market-update-left">
					 	<h4><a style="color: #fff;" href="#">Batch 22 members</a></h4>
						<h4><?=$batch22total;?></h4>
						<hr>
						<form action="" method="POST">
							<button class="btn btn-secondary" name="b22members"><b>Start Activations</b></button>
						</form>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<?php }?>

			<?php if(!$batch23status=="Pay"){?>
			<div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-2" style="background:#278bbb;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" style="color: #fff;font-size: 3em;"></i>
					</div>
					 <div class="col-md-8 market-update-left">
					 	<h4><a style="color: #fff;" href="#">Batch 23 members</a></h4>
						<h4><?=$batch23total;?></h4>
						<hr>
						<form action="" method="POST">
							<button class="btn btn-secondary" name="b23members"><b>Start Activations</b></button>
						</form>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<?php }?>

			<?php if(!$batch24status=="Pay"){?>
			<div class="col-md-2 market-update-gd">
				<div class="market-update-block clr-block-2" style="background:#278bbb;">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" style="color: #fff;font-size: 3em;"></i>
					</div>
					 <div class="col-md-8 market-update-left">
					 	<h4><a style="color: #fff;" href="#">Batch 24 members</a></h4>
						<h4><?=$batch24total;?></h4>
						<hr>
						<form action="" method="POST">
							<button class="btn btn-secondary" name="b24members"><b>Start Activations</b></button>
						</form>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<?php }?>
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
