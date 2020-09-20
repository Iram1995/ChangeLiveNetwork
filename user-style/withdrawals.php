
<!DOCTYPE html>
<head>
<title>Change Lives Network | Withdrawals</title>
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

<!-- //font-awesome icons -->
<script src="user-style/js/jquery2.0.3.min.js"></script>
<script src="user-style/js/raphael-min.js"></script>
<script src="user-style/js/morris.js"></script>

<!-- table -->
<link href="user-style/css/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
    
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.php" class="logo">
       <!-- <img src="user-style/images/cln.jpg"> -->
       C.L.N
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
        <!-- inbox dropdown start-->
        <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="fa fa-envelope-o"></i>
                <span class="badge bg-important">1</span>
            </a>
            <ul class="dropdown-menu extended inbox">
                <li>
                    <p class="red">You have 1 Message</p>
                </li>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="user-style/images/3.png"></span>
                                <span class="subject">
                                <span class="from">Jonathan Smith</span>
                                <span class="time">Just now</span>
                                </span>
                                <span class="message">
                                    Hello, this is an example msg.
                                </span>
                    </a>
                </li>
                <li>
                    <a href="#">See all messages</a>
                </li>
            </ul>
        </li>
        <!-- inbox dropdown end -->
        <!-- notification dropdown start-->
        <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                <i class="fa fa-bell-o"></i>
                <span class="badge bg-warning">1</span>
            </a>
            <ul class="dropdown-menu extended notification">
                <li>
                    <p>Notifications</p>
                </li>
                <li>
                    <div class="alert alert-info clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="#"> Server #1 overloaded.</a>
                        </div>
                    </div>
                </li>

            </ul>
        </li>
        <!-- notification dropdown end -->
    </ul>
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <!-- <li>
        </li> -->
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="user-style/images/2.png">
                <span class="username"><?=$username?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="logout.php"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<?php include 'user-style/sidebar.php'; ?>
<!--sidebar end-->
<!--main content start-->

<section id="main-content" style="background: #ffffff;">
  <section class="wrapper">
    <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Withdrawal Transactions</h1>
           <br>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>

                    <tr>
                      <th>Date</th>
                      <th>Amount</th>
                      <th>Status</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                      $sqlUserWithdrawalHis = mysqli_query($con,"SELECT * FROM mlmwithdrawals WHERE userid=$userid AND amount>'0' order by date DESC");
                      while ($withdrawal = mysqli_fetch_assoc($sqlUserWithdrawalHis)) {
                          $withAmount = $withdrawal["amount"];
                          $withStatus = $withdrawal['status'];
                          $withDate = $withdrawal['date'];
                          if ($withAmount=="0.00") {
                             $withAmount ="";
                          }else{
                             $withAmount = "<span style='color:red;'>- $".$withdrawal["amount"]."</span>";
                          }
                          
                          echo '
                          <tr>
                              <td> '.$withDate.' </td>
                              <td> '.$withAmount.' </td>
                              <td> '.$withStatus.'</td>
                            </tr>
                          ';
                          
                      }
                      ?>
                  </tbody>
                </table>
              </div>
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
<!-- tables -->
<script src="user-style/js/datatables/jquery.min.js"></script>
<script src="user-style/js/bootstrap.js"></script>
<script src="user-style/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="user-style/js/scripts.js"></script>
<script src="user-style/js/jquery.slimscroll.js"></script>
<script src="user-style/js/jquery.nicescroll.js"></script>

<script src="user-style/js/datatables/jquery.dataTables.min.js"></script>
<script src="user-style/js/datatables/dataTables.bootstrap4.min.js"></script>
<script src="user-style/js/datatables/datatables-demo.js"></script>
<!-- // tables -->

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
</body>
</html>
