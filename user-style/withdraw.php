
<!DOCTYPE html>
<head>
<title>Change Lives Network | Withdraw your earnings</title>
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
			<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10">
        	<h3>Withdraw Your Earnings</h3>
        </div>
    </div>
    <br>
    <?php if ($userBitAddress == "") {?>
           <h2 class="alert alert-warning"><b>Warning! </b> Please <a href="/profile.php#payments">add your bitcoin address</a> so you can withdraw.</b><br></h2>
    <?php } ?>  

    <?php if ($userBitAddress != "") {?>
    <div class="row">
        <div class="col-sm-9">
            <?php 

            if ($userActiveDLs < "3"){
              echo '
                <h2 class="alert alert-warning"><b>You MUST HAVE 3 paid direct downliners to withdraw.</b><br><br> You currently have '.$userActiveDLs.' active/paid downliners</h2>
              ';
              //$btnErr = "1";
            }?>
            <?php
            if ($UserAvalBal < $systemMinWithdrawal){
              echo '
                <h2 class="alert alert-danger"><b>Your Balance is less than out Minimum withdrawal amount which is $10 </b><br></h2>
              ';
              $btnErr = "1";
            }?>
            <?php if($WithdrawErr){ echo $WithdrawErr;}?>
              
          <div class="tab-content">
            <div class="tab-pane active" id="Profile">
                <hr>
                <h4>You have <b style="color:green">$
                  <?php 
                  if($UserAvalBal==""){ 
                    echo "0.00";
                  }else{
                    echo $UserAvalBal;
                  }
                ?></b> 
              available to withdraw.
            </h4>
                <p>Note: This amount will be converted into bitcoin.</p>
                <br>
                  <form class="form" action="" method="post" >
                      <div class="form-group row">
                          
                          <div class="col-xs-10">
                              <!-- <label><h4>Enter Amount</h4></label> -->

                              <input type="text" class="form-control" name="amountrequested" placeholder="Enter amount to withdraw" title="Amount to withdraw" value="<?=$UserAvalBal;?>" disabled>
                          </div>
                      </div>
                      
                      <div class="form-group row">
                           <div class="col-xs-10">
                                <br>
                                <button  
                                		name="withdrawbalance" 
                                		type="submit" 
                                		<?php if ($btnErr=="1") {
                              				echo 'disabled=""';
                              				echo 'title="You are not allowed to withdraw!"';
                              				echo 'class="btn btn-lg btn-danger"';
                              			} else{
                              				echo 'class="btn btn-lg btn-success"';
                              			}
                              			?>
                              			>
                              			Withdraw
                              	</button>
                                <!-- <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button> -->
                            </div>
                      </div>
                </form>
              
              <hr>
              
             </div><!--/tab-pane-->
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
          <?php } ?>
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
