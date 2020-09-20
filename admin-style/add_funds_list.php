
<!DOCTYPE html>
<head>
<title>Change Lives Network - Add funds</title>
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
<!-- table -->
<link href="/admin-style/css/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
    <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Choose member to add funds</h1>
          <p class="mb-4">You may sort or search within this table. </p>
            <br>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>

                    <tr>
                      <th>Rank</th>
                      <th>Username</th>
                      <th>Batch no</th>
                      <th>Add funds</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sqladdFunds = mysqli_query($con,"SELECT * FROM mlmmembers WHERE status='1' order by memberregno ASC");
                        while ($addF = mysqli_fetch_assoc($sqladdFunds)) {
                          $addfUsername = $addF["username"];
                          $addfBatch = $addF["batch"];
                          $addfFirstname = $addF["firstname"];
                            $addfLastname = $addF['lastname'];
                            $addfFullnames= $addF["firstname"]. " ".$addF['lastname'];
                            $addfJoinedDate = $addF['datecreated'];
                            $addfRank = $addF['memberregno'];
                            //$mJoinedDate = date('d F Y');
                            //$mStatus = $member['status'];
                            
                            
                            echo '
                            <tr>
                                <td> #'.$addfRank.' </td>
                                <td> '.$addfUsername.' </td>
                                <td> '.$addfBatch.'</td>
                                <td>
                                  <a href="/cln-office/add_funds.php?to='.$addfUsername.'" ui-toggle-class="" class="btn btn-primary">
                                  <i class="fa fa-plus text-success text"></i> ADD FUNDS</a>
                                </td>
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
<script src="/admin-style/js/datatables/jquery.min.js"></script>
<script src="/admin-style/js/bootstrap.js"></script>
<script src="/admin-style/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="/admin-style/js/scripts.js"></script>
<script src="/admin-style/js/jquery.slimscroll.js"></script>
<script src="/admin-style/js/jquery.nicescroll.js"></script>
 <script src="/admin-style/js/datatables/jquery.dataTables.min.js"></script>
  <script src="/admin-style/js/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="/admin-style/js/datatables/datatables-demo.js"></script>
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
</body>
</html>
