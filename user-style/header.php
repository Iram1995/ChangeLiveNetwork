<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="/index.php" class="logo">
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
                <span class="badge bg-important"><?=$userUnreadMsgs?></span>
            </a>
            <ul class="dropdown-menu extended inbox">
                <li>
                    <p class="red">Inbox Messages</p>
                </li>
                <?php
                            $sqlUserMSG = mysqli_query($con,"SELECT * FROM mlmtickets WHERE sender='admin' order by datesent DESC");
                            while ($usermsg = mysqli_fetch_assoc($sqlUserMSG)) {
                                $msgSubject = $usermsg['ticketsubject'];
                                $msgMessage = $usermsg['ticketmessage'];
                                $msgStatus = $usermsg['status'];
                                // $withAmount = $usermsg['amount'];
                                // $withStatus = $usermsg['status'];
                                $msgDate = $usermsg['datesent'];
                                echo '
                                  <li>
                                    <a href="#">
                                        <span class="photo"><img alt="avatar" src="user-style/images/3.png"></span>
                                        <span class="subject">

                                            <span class="from">Support</span>
                                            <span class="time">'.$msgDate.'</span>
                                        </span>
                                        <span class="message">
                                           '.$msgSubject.'
                                        </span>
                                    </a>
                                </li>';
                             }
                             if($userInboxMsgs==""){
                              echo '

                                <li>
                                    <a href="#">
                                        <span class="photo"></span>
                                        <span class="subject">
                                            <span class="from"></span>
                                            <span class="time"></span>
                                        </span>
                                        <span class="message">
                                        You have no messages yet
                                        </span>
                                    </a>
                                </li>
                              ';
                             }
                          ?>
                <li>
                    <a href="/inbox_mail.php">See all messages</a>
                </li>
            </ul>
        </li>
        <!-- inbox dropdown end -->
        <!-- notification dropdown start-->
        <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                <i class="fa fa-bell-o"></i>
                <span class="badge bg-warning"><?=$totalNewsUpdates;?></span>
            </a>
            <ul class="dropdown-menu extended notification">
                <li>
                    <p>Annoucements</p>
                </li>
                <?php
                      $sqlVallUser = mysqli_query($con,"SELECT * FROM mlmupdates order by upid DESC");
                        while ($member = mysqli_fetch_assoc($sqlVallUser)) {
                          $upid = $member["upid"];
                          $upsubject = $member["upsubject"];
                          $upmessage = $member["upmessage"];
                            $upstatus = $member['upstatus'];
                            $updatetime = $member['updatetime'];
                            
                            echo '
                            <li>
                                <div class="alert alert-info clearfix">
                                    <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                                    <div class="noti-info">
                                        <a href="/announcement.php?read='.$upid.'"> '.$upsubject.'</a>
                                    </div>
                                </div>
                            </li>
                            ';
                            
                        }
                        ?>
                

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
                <img alt="" src="https://icon-library.com/images/no-profile-pic-icon/no-profile-pic-icon-7.jpg">
                <span class="username"><?=$username?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <!-- <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li> -->
                <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="profile.php"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="logout.php"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>