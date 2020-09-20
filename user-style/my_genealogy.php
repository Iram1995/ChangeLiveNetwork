
<!DOCTYPE html>
<head>
<title>Change Lives Network : My Genealogy</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="User Genealogy" />
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
<!-- <script src="user-style/js/raphael-min.js"></script>
<script src="user-style/js/morris.js"></script> -->

<style>
/*----------------genealogy-scroll----------*/

.genealogy-scroll::-webkit-scrollbar {
    width: 5px;
    height: 8px;
}
.genealogy-scroll::-webkit-scrollbar-track {
    border-radius: 10px;
    background-color: #e4e4e4;
}
.genealogy-scroll::-webkit-scrollbar-thumb {
    background: #212121;
    border-radius: 10px;
    transition: 0.5s;
}
.genealogy-scroll::-webkit-scrollbar-thumb:hover {
    background: #d5b14c;
    transition: 0.5s;
}


/*----------------genealogy-tree----------*/
.genealogy-body{
    white-space: nowrap;
    overflow-y: hidden;
    padding: 50px;
    min-height: 500px;
    padding-top: 10px;
}
.genealogy-tree ul {
    padding-top: 20px; 
    position: relative;
    padding-left: 0px;
    display: flex;
}
.genealogy-tree li {
    float: left; text-align: center;
    list-style-type: none;
    position: relative;
    padding: 20px 5px 0 5px;
}
.genealogy-tree li::before, .genealogy-tree li::after{
    content: '';
    position: absolute; 
  top: 0; 
  right: 50%;
    border-top: 2px solid #ccc;
    width: 50%; 
  height: 18px;
}
.genealogy-tree li::after{
    right: auto; left: 50%;
    border-left: 2px solid #ccc;
}
.genealogy-tree li:only-child::after, .genealogy-tree li:only-child::before {
    display: none;
}
.genealogy-tree li:only-child{ 
    padding-top: 0;
}
.genealogy-tree li:first-child::before, .genealogy-tree li:last-child::after{
    border: 0 none;
}
.genealogy-tree li:last-child::before{
    border-right: 2px solid #ccc;
    border-radius: 0 5px 0 0;
    -webkit-border-radius: 0 5px 0 0;
    -moz-border-radius: 0 5px 0 0;
}
.genealogy-tree li:first-child::after{
    border-radius: 5px 0 0 0;
    -webkit-border-radius: 5px 0 0 0;
    -moz-border-radius: 5px 0 0 0;
}
.genealogy-tree ul ul::before{
    content: '';
    position: absolute; top: 0; left: 50%;
    border-left: 2px solid #ccc;
    width: 0; height: 20px;
}
.genealogy-tree li a{
    text-decoration: none;
    color: #666;
    font-family: arial, verdana, tahoma;
    font-size: 11px;
    display: inline-block;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
}

.genealogy-tree li a:hover+ul li::after, 
.genealogy-tree li a:hover+ul li::before, 
.genealogy-tree li a:hover+ul::before, 
.genealogy-tree li a:hover+ul ul::before{
    border-color:  #fbba00;
}

/*--------------memeber-card-design----------*/
.member-view-box{
    padding:0px 20px;
    text-align: center;
    border-radius: 4px;
    position: relative;
}
.member-image{
    width: 60px;
    position: relative;
}
.member-image img{
    width: 60px;
    height: 60px;
    border-radius: 6px;
  background-color :#000;
  z-index: 1;
}
.member-details h3{
    font-size: 14px;
}

</style>
<script>
  $(function () {
    $('.genealogy-tree ul').hide();
    $('.genealogy-tree>ul').show();
    $('.genealogy-tree ul.active').show();
    $('.genealogy-tree li').on('click', function (e) {
        var children = $(this).find('> ul');
        if (children.is(":visible")) children.hide('fast').removeClass('active');
        else children.show('fast').addClass('active');
        e.stopPropagation();
    });
});

</script>
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

<?php
  

?>

<section id="main-content" style="background: #ffffff;">
  <section class="wrapper">
    <!-- page start-->
<h2 style="text-align:center;">Phase 1 Genealogy</h2>
      <div class="tree" style="width: 100%;margin: 0 auto;text-align:center;font-size: 1.5em;">
          <!-- <ul style="font-size: 14px;">
            <?php
              $sql="SELECT * FROM mlmmembers WHERE parentid=$userid";
              $result=mysqli_query($con,$sql) or die(mysqli_error());
              if(mysqli_num_rows($result)>0){                       
                while($rows=mysqli_fetch_assoc($result)){
              ?>
                  <li>
                      <a href="#">
                          <span><?php echo $rows['username'];?></span>
                          <br>
                          <?php echo $rows['userid'];?></a>
                          <ul>
                            <li><a href="#">a</a>
                                <ul>
                                  <li><a href="#">b</a></li>
                                  <li><a href="#">b</a></li>
                                  <li><a href="#">b</a></li>
                                </ul>
                            </li>
                            <li><a href="#">a</a>

                            </li>
                            <li><a href="#">a</a></li>
                          </ul>
                  </li>
              <?php
              }}
              ?>
            </ul> -->

            <div class="body genealogy-body genealogy-scroll">
    <div class="genealogy-tree">
        <ul>
            <li>
                <a href="javascript:void(0);">
                    <div class="member-view-box">
                        <div class="member-image">
                            <img src="https://image.flaticon.com/icons/svg/145/145867.svg" alt="Member">
                            <div class="member-details">
                                <h3><?=$username;?></h3>
                            </div>
                        </div>
                    </div>
                </a>
                <ul class="active">
                    <?php
                      $geneasql="SELECT * FROM mlmmembers WHERE parentid='$userid' order by userid ASC";
                      $genearesult=mysqli_query($con,$geneasql) or die(mysqli_error());
                      if(mysqli_num_rows($genearesult)>0){                       
                        while($DLrows=mysqli_fetch_assoc($genearesult)){
                          $dlUserid = $DLrows['userid'];
                          $dlActSt = $DLrows['activation'];

                          if ($dlActSt == 'Paid') {
                            $dlIMGsrc = "https://image.flaticon.com/icons/svg/145/145867.svg";
                          }else{
                            $dlIMGsrc = "https://icon-library.com/images/no-profile-pic-icon/no-profile-pic-icon-7.jpg";
                          }
                    ?>
                    <li>
                        <a href="javascript:void(0);">
                            <div class="member-view-box">
                              <span class="badge badge-success">level 1</span>
                                <div class="member-image">
                                    
                                    <img src="<?php echo $dlIMGsrc;?>" alt="Member">
                                    <div class="member-details">
                                        <h3><?php echo $DLrows['username'];?></h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <ul class="active">
                          <?php
                            $geneasql1="SELECT * FROM mlmmembers WHERE parentid=$dlUserid order by userid ASC";
                            $genearesult1=mysqli_query($con,$geneasql1) or die(mysqli_error());
                            if(mysqli_num_rows($genearesult1)>0){                       
                              while($Granrows=mysqli_fetch_assoc($genearesult1)){
                                $granUserid = $Granrows['userid'];
                                $granActSt = $Granrows['activation'];

                                if ($granActSt == 'Paid') {
                                  $granIMGsrc = "https://image.flaticon.com/icons/svg/145/145867.svg";
                                }else{
                                  $granIMGsrc = "https://icon-library.com/images/no-profile-pic-icon/no-profile-pic-icon-7.jpg";
                                }

                          ?>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="member-view-box">
                                        <div class="member-image">
                                            <span class="badge badge-success">level 2</span>
                                            <div class="member-details">
                                            <img src="<?php echo $granIMGsrc;?>" alt="Member">
                                                <h3><?php echo $Granrows['username'];?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                              <ul>
                                <?php
                                  $geneasql2="SELECT * FROM mlmmembers WHERE parentid=$granUserid order by userid ASC";
                                  $genearesult2=mysqli_query($con,$geneasql2) or die(mysqli_error());
                                  if(mysqli_num_rows($genearesult2)>0){                       
                                    while($Greatrows=mysqli_fetch_assoc($genearesult2)){
                                      $greatUserid = $Greatrows['userid'];
                                      $greatActSt = $DLrows['activation'];

                                    if ($greatActSt == 'Paid') {
                                      $greatIMGsrc = "https://image.flaticon.com/icons/svg/145/145867.svg";
                                    }else{
                                      $greatIMGsrc = "https://icon-library.com/images/no-profile-pic-icon/no-profile-pic-icon-7.jpg";
                                    }
                                ?>
                                  
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="member-view-box">
                                              <span class="badge badge-success">level 3</span>
                                                <div class="member-image">
                                                    <img src="<?php echo $greatIMGsrc;?>" alt="Member">
                                                    <div class="member-details">
                                                        <h3><?php echo $Greatrows['username'];?></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <ul>
                                          <?php
                                            $geneasql3="SELECT * FROM mlmmembers WHERE parentid=$greatUserid order by userid ASC";
                                            $genearesult3=mysqli_query($con,$geneasql3) or die(mysqli_error());
                                            if(mysqli_num_rows($genearesult3)>0){                       
                                              while($Greatgrandrows=mysqli_fetch_assoc($genearesult3)){
                                                $greatgrandUserid = $Greatgrandrows['userid'];
                                                $greatgrandActSt = $Greatgrandrows['activation'];

                                                if ($greatgrandActSt == 'Paid') {
                                                  $greatgrandIMGsrc = "https://image.flaticon.com/icons/svg/145/145867.svg";
                                                }else{
                                                  $greatgrandIMGsrc = "https://icon-library.com/images/no-profile-pic-icon/no-profile-pic-icon-7.jpg";
                                                }
                                                                ?>
                                            
                                              <li>
                                                  <a href="javascript:void(0);">
                                                      <div class="member-view-box">
                                                        <span class="badge badge-success">level 4</span>
                                                          <div class="member-image">
                                                            
                                                              <img src="<?php echo $greatgrandIMGsrc;?>" alt="Member">
                                                              <div class="member-details">
                                                                  <h3><?php echo $Greatgrandrows['username'];?></h3>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </a>
                                              </li>
                                            <?php } } ?>
                                        </ul>
                                    </li>
                                  <?php } } ?>
                                </ul>
                            </li>
                            <?php } } ?>
                        </ul> 
                    </li>
                     <?php } } ?>
                </ul>
            </li>
        </ul>
    </div>
</div>
    
            
        <!-- page end-->
    </div>
    <h2 style="text-align:center;">Phase 2 Genealogy</h2>
                         
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
