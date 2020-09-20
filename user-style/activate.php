
<!DOCTYPE html>
<head>
<title>Change Lives Network | Pay to Activate Account</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="User Dashboard" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="../user-style/css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="../user-style/css/style.css" rel='stylesheet' type='text/css' />
<link href="../user-style/css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="../user-style/css/font.css" type="text/css"/>
<link href="../user-style/css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="../user-style/css/morris.css" type="text/css"/>
<!-- //font-awesome icons -->
<script src="../user-style/js/jquery2.0.3.min.js"></script>
<script src="../user-style/js/raphael-min.js"></script>
<script src="../user-style/js/morris.js"></script>

    <!-- BJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.12.0/js/all.js" crossorigin="anonymous"></script> -->
    <script src="<?php echo CRYPTOBOX_JS_FILES_PATH; ?>support.min.js" crossorigin="anonymous"></script>

 <!-- BCSS for Payment Box -->
    <style>
            /*html { font-size: 14px; }*/
            @media (min-width: 768px) { html { font-size: 16px; } .tooltip-inner { max-width: 350px; } }
            .mncrpt .container { max-width: 980px; }
            .mncrpt .box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); }
            img.radioimage-select { padding: 7px; border: solid 2px #ffffff; margin: 7px 1px; cursor: pointer; box-shadow: none; }
            img.radioimage-select:hover { border: solid 2px #a5c1e5; }
            img.radioimage-select.radioimage-checked { border: solid 2px #7db8d9; background-color: #f4f8fb; }
    </style>
</head>
<body>
    
<section id="container">
<!--header start-->
<?php include '../user-style/header.php'; ?>
<!--header end-->
<!--sidebar start-->
<?php include '../user-style/sidebar.php'; ?>
<!--sidebar end-->
<!--main content start-->

<section id="main-content" style="background: #ffffff;">
	<section class="wrapper">
			<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10">
        	<h3>Deposit to Activate</h3>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-9">
              
              <?php
  
                // Text above payment box
                $custom_text  = "";
                 
                // Display payment box  
                echo $box->display_cryptobox_bootstrap($coins, $def_coin, $def_language, $custom_text, 70, 100, false, "", "images/paid3.png", 150, "", "ajax", false);
                

                // You can setup method='curl' in function above and use code below on this webpage -
                // if successful bitcoin payment received .... allow user to access your premium data/files/products, etc.
                if ($box->is_paid()) {
                  echo "Paid";
              }


               ?>
              
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
<script src="../user-style/js/bootstrap.js"></script>
<script src="../user-style/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="../user-style/js/scripts.js"></script>
<script src="../user-style/js/jquery.slimscroll.js"></script>
<script src="../user-style/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="../user-style/js/jquery.scrollTo.js"></script>
<!-- morris JavaScript -->	

</body>
</html>
