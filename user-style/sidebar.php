<aside>
    <div id="sidebar" class="nav-collapse" style="background: #147EFB;">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="/index.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="/profile.php">
                        <i class="fa fa-user"></i>
                        <span>My account</span>
                    </a>
                </li>

                <li>
                    <a href="/add_members.php">
                        <i class="fa fa-user-plus"></i>
                        <span>Add members</span>
                    </a>
                </li>

                <?php if ($userBatchStatus == "Pay" && $userActStatus != "Paid"){?>
                <li>
                    <a href="/process/activate.php">
                        <i class="fa fa-bitcoin"></i>
                        <span>Activate <span class="badge bg-important">Urgent</span></span>
                    </a>
                </li>
                <?php } ?>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-dollar"></i>
                        <span>Transactions </span>
                    </a>
                    <ul class="sub">
                        <li>
                    <a href="/withdraw.php">
                        <i class="fa fa-bitcoin"></i>
                        <span>Withdraw Earnings <?php if($UserAvalBal>"10"){?><span class="badge bg-success">$<?=$UserAvalBal;?></span><?php } ?></span>
                    </a>
                </li>
                        <li><a href="/earnings.php"><i class="fa fa-plus"></i> Earnings History <span class="badge bg-success"><?=$UserTotalEarnings;?></span></a></li>
                        <li><a href="/withdrawals.php"><i class="fa fa-minus"></i> Withdrawals History <span class="badge bg-danger"><?=$UserWithdrawals;?></span></a></li>
                    </ul>
                </li>

                <li>
                    <a href="/announcements.php">
                        <i class="fa fa-bullhorn"></i>
                        <span>Announcements <span class="badge bg-warning"><?=$totalNewsUpdates;?></span></span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-envelope"></i>
                        <span>Contact Support <span class="badge bg-warning"><?=$userUnreadMsgs;?></span></span>
                    </a>
                    <ul class="sub">
                        <li><a href="/inbox_mail.php"><i class="fa fa-inbox"></i> Inbox  <span class="badge bg-warning">0</span></a></li>
                        <li><a href="/compose_email.php"><i class="fa fa-pencil"></i> Compose Mail</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class=" fa fa-users"></i>
                        <span>Team View <span class="badge bg-success">new</span></span>
                    </a>
                    <ul class="sub">
                        <li><a href="/downliners.php"><i class=" fa fa-list"></i> Direct DownLiners</a></li>
                        <li><a href="/genealogy_phase1.php"><i class=" fa fa-sitemap"></i> Genealogy (Phase 1)</a></li>
                        <?php if($userPhase != "Phase 2"){ ?>
                        <li><a href="#" style="color:silver;" onclick="alert('You are not on Phase 2 Yet!')"><i class="fa fa-sitemap"></i> Genealogy (Phase 2)</a></li>
                        <?php } ?>
                        <?php if($userPhase == "Phase 2"){ ?>
                        <li><a href="/genealogy_phase2.php"><i class=" fa fa-sitemap"></i> Genealogy (Phase 2)</a></li>
                        <?php } ?>
                        
                        <?php if($userPhase != "Phase 3"){ ?>
                        <li><a href="#" style="color:silver;" onclick="alert('You are not on Phase 3 Yet!')"><i class="fa fa-sitemap"></i> Genealogy (Phase 3)</a></li>
                        <?php } ?>
                        <?php if($userPhase == "Phase 3"){ ?>
                        <li><a href="/genealogy_phase3.php"><i class=" fa fa-sitemap"></i> Genealogy (Phase 3)</a></li>
                        <?php } ?>
                    </ul>
                </li>
                
                <li>
                    <a href="/logout.php">
                        <i class="fa fa-key"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>