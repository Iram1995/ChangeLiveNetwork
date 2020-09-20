
<!DOCTYPE html>
<head>
<title>Change Lives Network : Send Email</title>
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
<!-- <script src="user-style/js/raphael-min.js"></script>
<script src="user-style/js/morris.js"></script> -->
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
  
  ///////////// Contact admin support
   $emailMsg = "";
   if(isset($_POST['contactsupport'])){
        $emailSubject=$_POST['emailsubject'];
        $emailMessage=$_POST['emailmessage'];

        $toMail = "support@changelivesnetwork.com";
        $readText = "read";
        $unreadText = "unread";
        $emailSentDate = date('Y-m-d H:i:s');
        
        //if(mail($toMail, $emailSubject, $emailMessage, $mailHeaders)){
            if($sqlContactSup = mysqli_query($con,"INSERT INTO mlmtickets (ticketsubject,ticketsender,senderemail,ticketmessage,datesent,status,recipientemail,userid) VALUES ('$emailSubject','$firstname','$emailaddress','$emailMessage','$emailSentDate','$unreadText','$toMail','$userid')")){
                //echo $profileMSG = "<p class='alert alert-warning'><b> Verification required!</b></p>";
                $emailMsg = '<p class="alert alert-success"><i class="fa fa-check"></i> Message sent!</p>';
                //header("Refresh:3; url=/profile.php");
                // we can also send email notification here
            }
            else{
                $emailMsg = "<p class='alert alert-danger'><b><i class='fa fa-times'></i>Error!</b> Message not sent!.</p>";
            }
        // }else{
        //       $emailMsg = "<p class='alert alert-danger'><b><i class='fa fa-times'></i> Error!</b> We could not send email.</p>";
        // }
    
   }

?>

<section id="main-content" style="background: #ffffff;">
  <section class="wrapper">
      <!-- page start-->
    <div class="mail-w3agile">
      <?php if ($emailMsg) {
  echo $emailMsg;
}?>
        <div class="row">
            <div class="col-sm-3 com-w3ls">
                <section class="panel">
                    <div class="panel-body">
                        <a href="compose_email.php"  class="btn btn-danger">
                            Compose Mail
                        </a>
                        <ul class="nav nav-pills nav-stacked mail-nav">
                            <li><a href="/inbox_mail.php"> <i class="fa fa-inbox"></i> Inbox  <span class="label label-danger pull-right inbox-notification"><?=$userInboxMsgs;?></span></a></li>
                            <li><a href="/sent_emails.php"> <i class="fa fa-envelope-o"></i> Sent <span class="label label-danger pull-right inbox-notification"><?=$userSentMsgs;?></span></a></li>
                        </ul>
                    </div>
                </section>

            </div>
            <div class="col-sm-9 mail-w3agile">
                <section class="panel">
                    <div class="panel-body">
                        <div class="compose-mail">
                            <form role="form-horizontal" action="" method="post">
                                <div class="form-group">
                                    <select class="form-control" name="emailsubject">
                                      <option value="">Choose Subject</option>
                                      <option value="Account Activation">Account Activation</option>
                                      <option value="Withdrawals">Withdrawals</option>
                                      <option value="System Error">System Error</option>
                                      <option value="General Question">General Question</option>
                                      <option value="Other">Other</option>
                                    </select>
                                </div>

                                <div class="compose-editor">
                                    <textarea class="wysihtml5 form-control" name="emailmessage" rows="7"></textarea>
                                    <!-- <input type="file" name="emailfile" class="default"> -->
                                </div>
                                <div class="compose-btn">
                                    <button class="btn btn-primary btn-sm" name="contactsupport"><i class="fa fa-check"></i> Send</button>
                                    <button class="btn btn-sm"><i class="fa fa-times"></i> Discard</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <!-- page end-->
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
