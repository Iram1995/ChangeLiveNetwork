<?php
# if batch is less than what is required update batch number to the batch we want and add code on index.php

//	$abcCHANGEtoB2 = mysqli_query($con,"UPDATE mlmmembers SET batch='3' WHERE batch='4'");
// if($batch1total<100){
//   $abcCHANGEtoB2 = mysqli_query($con,"UPDATE mlmmembers SET batch='3' WHERE batch='4'"); 
// }

?>

<!DOCTYPE html>
<head>
<title>Change Lives Network : Profile</title>
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
			<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10"><h1><?=$username;?></h1></div>
        <!-- <div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a></div> -->
    </div>
    <div class="row">
        <div class="col-sm-9">
            <?php if($profileMSG){ echo $profileMSG;}?>
            <?php if($passMSG){ echo $passMSG;}?>
            <?php if($bitcoinMSG){ echo $bitcoinMSG;}?>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#Profile">Profile</a></li>
                <li><a data-toggle="tab" href="#passwords">Passwords</a></li>
                <li><a data-toggle="tab" href="#payments">Payments</a></li>
              </ul>

              
          <div class="tab-content">
            <div class="tab-pane active" id="Profile">
                <hr>
                  <form class="form" action="" method="post" id="registrationForm">
                      <div class="form-group row">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4></label>
                              <input type="text" class="form-control" name="fname" id="first_name" placeholder="first name" title="enter your first name if any." value="<?=$firstname;?>">
                          </div>
                      </div>
                      <div class="form-group row">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input type="text" name="lname" class="form-control" id="last_name" placeholder="last name" title="enter your last name if any." value="<?=$lastname;?>">
                          </div>
                      </div>
      
                      <div class="form-group row">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Mobile</h4></label>
                              <input type="text" name="phone" class="form-control" id="mobile" placeholder="enter mobile number" title="enter your mobile number." value="<?=$phoneno?>">
                          </div>
                      </div>
                      <div class="form-group row">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" value="<?=$emailaddress;?>" readonly="">
                          </div>
                      </div>
                      <div class="form-group row">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Username</h4></label>
                              <input type="text" name="username" class="form-control" id="location" value="<?=$username;?>" readonly="">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" name="updateprofile" type="submit">Save</button>
                                <!-- <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button> -->
                            </div>
                      </div>
                </form>
              
              <hr>
              
             </div><!--/tab-pane-->
             <div class="tab-pane" id="passwords">
               
               <h2></h2>
               
               <hr>
                  <form class="form" action="" method="post" id="registrationForm">
                    <?php if($passMSG){ echo $passMSG;}?>
                     <div class="form-group row">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Current Password</h4></label>
                              <input type="password" class="form-control" name="cpass" id="password" placeholder="Enter your current password">
                          </div>
                      </div>
                      <div class="form-group row">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>New Password</h4></label>
                              <input type="password" class="form-control" name="npass" id="password" placeholder="password" title="enter your new password." required="">
                          </div>
                      </div>
                      <div class="form-group row">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Repeat Password</h4></label>
                              <input type="password" class="form-control" name="npass2" id="password" placeholder="password" title="Repeat your new password." required="">
                          </div>
                      </div>
          
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" name="updatepassword" type="submit">Save</button>
                                <!-- <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button> -->
                            </div>
                      </div>
                </form>
               
             </div><!--/tab-pane-->
             <div class="tab-pane" id="payments">
                    
                
                  <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group row">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Wallet Name</h4></label>
                              <input type="text" class="form-control" name="walletname" id="password" placeholder="Wallet Name" title="Enter Wallet Name" readonly="">
                          </div>
                      </div>
                      <div class="form-group row">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Bitcoin address</h4></label>
                              <input type="text" class="form-control" name="bitid" id="password" placeholder="Bitcoin address" title="Enter Bitcoin address" readonly="">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" name="updatepayments" type="submit" disabled="">Save</button>
                            </div>
                      </div>
                </form>
              </div>
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
                         
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
