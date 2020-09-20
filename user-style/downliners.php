
<!DOCTYPE html>
<head>
<title>Change Lives Network : Direct Downliners</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="User Dashboard" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- <link href="user-style/css/sb-admin-2.css" rel="stylesheet"> -->
<!-- bootstrap-css -->
<!-- <link rel="stylesheet" href="user-style/css/bootstrap.min.css" > -->
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
<!-- //font-awesome icons -->
<script src="user-style/js/jquery2.0.3.min.js"></script>
<script src="user-style/js/raphael-min.js"></script>
<script src="user-style/js/morris.js"></script>
<script>
	    $(function() {    
        $('#input-search').on('keyup', function() {
          var rex = new RegExp($(this).val(), 'i');
            $('.searchable-container .items').hide();
            $('.searchable-container .items').filter(function() {
                return rex.test($(this).text());
            }).show();
        });
    });
</script>

<style>
	.glyphicon-lg
{
    font-size:4em
}
.info-block
{
    margin-bottom:4%;
}
.info-block .square-box
{
    width:100px;min-height:110px;margin-right:22px;text-align:center!important;background-color:black;padding:20px 0;border-radius:50%;
}
.info-block.block-info
{
    border-color:#20819e
}
.info-block.block-info .square-box
{
    background-color:#000000;color:#FFF
}
</style>

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
			
      <div class="container">
		<div class="row">
			<h2 style="margin-left: 4%;margin-bottom: 4%;">Direct Downline List</h2>
			<!-- Means you have enough balance <button class='btn btn-success'>Activate</button> <br><br>
			Means you do not have enough balance<button disabled='You have insuffient balance'>Activate</button> -->
	        <div class="col-lg-12">
	            <input type="search" style="color:#111111;" class="form-control" id="input-search" placeholder="Search Downliners..." >
	        </div>
	        <div class="searchable-container">
	        	<?php
	                      $sqlDDownLs = mysqli_query($con,"SELECT * FROM mlmmembers WHERE sponsorid='$username' order by userid  ASC");
	                        while ($ddl = mysqli_fetch_assoc($sqlDDownLs)) {
	                          $uSid = $ddl["userid"];
	                          $uSfirstname = $ddl["firstname"];
	                          $uSusername = $ddl["username"];
	                            $uSlastname = $ddl['lastname'];
	                            $uSactivation = $ddl['activation'];
	                            $uSbatch = $ddl['batch'];
	                            $uSmemberregno = $ddl['memberregno'];

	                            if ($uSactivation == "Paid") {
	                            	$uSlastname = $ddl['lastname']." <i class='fa fa-check-circle' style='color:green;'></i>";
	                            	//$actDlBtn = "<a href='#' class='btn btn-success'>Activated</a>";
	                            	// $ddlIMGsrc = "https://image.flaticon.com/icons/svg/145/145867.svg";
	                            }
	                            // else{
	                            // 	$greatgrandIMGsrc = "https://icon-library.com/images/no-profile-pic-icon/no-profile-pic-icon-7.jpg";
	                            // }
	                            if ($UserAvalBal>"40") {
	                            	$actDlBtn = "<a href='#' class='btn btn-success'>Activate</a>";
	                            }else{
	                            	$actDlBtn = "<a href='#' class='btn btn-primary' disabled='You have insuffient balance'>Activate</a>";
	                            }


	                            
	                            echo '
	                            <br>
				                <div class="items col-xs-12 col-sm-6 col-md-6 col-lg-6 clearfix">
					               <div class="info-block block-info clearfix" style="border-radius:50%;">
					                    <div class="square-box pull-left">
					                        <span class="glyphicon glyphicon-user glyphicon-lg"></span>
					                    </div>
					                    <h4>'.$uSfirstname.' '.$uSlastname.'</h4>
					                    <h5>'.$uSusername.'</h5>
					                    <p>Rank '.$uSmemberregno.'</p>
					                    <span>Batch '.$uSbatch.'</span>'.$actDlBtn.'
					                    
					                </div>
					            </div>
	                            ';
	                            
	                        }
	                        ?>
	            
	        </div>
		</div>
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
