<aside>
    <div id="sidebar" class="nav-collapse" style="background: orange;">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="/cln-office/index.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/cln-office/add_funds_list.php">
                        <i class="fa fa-user"></i>
                        <span>Add funds</span>
                    </a>
                </li>


                <li>
                    <a href="/cln-office/profile.php">
                        <i class="fa fa-user"></i>
                        <span>Admin account</span>
                    </a>
                </li>

                <li>
                    <a href="/cln-office/batch_activation.php">
                        <i class="fa fa-dollar"></i>
                        <span>Batch Activation</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-bars"></i>
                        <span>Batch List <span><i class="fa fa-angle-down"></i></span></span>
                    </a>
                    <ul class="sub">
                        <?php if($batch1total > "0"){?>
                        <li><a href="/cln-office/batch1.php">Batch 1  <span class="badge bg-primary"><?=$batch1total;?></span></a></li>
                        <?php }?>
                        <?php if($batch2total > "0"){?>
                        <li><a href="/cln-office/batch2.php">Batch 2 <span class="badge bg-primary"><?=$batch2total;?></span></a></li>
                        <?php }?>
                        <?php if($batch3total > "0"){?>
                        <li><a href="/cln-office/batch3.php">Batch 3 <span class="badge bg-primary"><?=$batch3total;?></span></a></li>
                        <?php }?>
                        <?php if($batch4total > "0"){?>
                        <li><a href="/cln-office/batch4.php">Batch 4 <span class="badge bg-primary"><?=$batch4total;?></span></a></li>
                        <?php }?>
                        <?php if($batch5total > "0"){?>
                        <li><a href="/cln-office/batch5.php">Batch 5 <span class="badge bg-primary"><?=$batch5total;?></span></a></li>
                        <?php }?>
                        <?php if($batch6total > "0"){?>
                        <li><a href="/cln-office/batch6.php">Batch 6 <span class="badge bg-primary"><?=$batch6total;?></span></a></li>
                        <?php }?>
                        <?php if($batch7total > "0"){?>
                        <li><a href="/cln-office/batch7.php">Batch 7 <span class="badge bg-primary"><?=$batch7total;?></span></a></li>
                        <?php }?>
                        <?php if($batch8total > "0"){?>
                        <li><a href="/cln-office/batch8.php">Batch 8 <span class="badge bg-primary"><?=$batch8total;?></span></a></li>
                        <?php }?>
                        <?php if($batch9total > "0"){?>
                        <li><a href="/cln-office/batch9.php">Batch 9 <span class="badge bg-primary"><?=$batch9total;?></span></a></li>
                        <?php }?>
                        <?php if($batch10total > "0"){?>
                        <li><a href="/cln-office/batch10.php">Batch 10 <span class="badge bg-primary"><?=$batch10total;?></span></a></li>
                        <?php }?>
                        <?php if($batch11total > "0"){?>
                        <li><a href="/cln-office/batch11.php">Batch 11 <span class="badge bg-primary"><?=$batch11total;?></span></a></li>
                        <?php }?>
                        <?php if($batch12total > "0"){?>
                        <li><a href="/cln-office/batch12.php">Batch 12 <span class="badge bg-primary"><?=$batch12total;?></span></a></li>
                        <?php }?>
                        <?php if($batch13total > "0"){?>
                        <li><a href="/cln-office/batch13.php">Batch 13 <span class="badge bg-primary"><?=$batch13total;?></span></a></li>
                        <?php }?>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-users"></i>
                        <span>Manage Members <span><i class="fa fa-angle-down"></i></span></span>
                    </a>
                    <ul class="sub">
                        <li>
                            <a href="/cln-office/replace_members.php">
                                <i class="fa fa-check"></i>
                                <span>Replace members</span>
                            </a>
                        </li>
                        <li>
                            <a href="/cln-office/active_members.php">
                                <i class="fa fa-check"></i>
                                <span>Active members</span>
                            </a>
                        </li>
                        <li>
                            <a href="/cln-office/blocked_members.php">
                                <i class="fa fa-times"></i>
                                <span>Blocked members</span>
                            </a>
                        </li>

                        <li>
                            <a href="/cln-office/no_sponsor.php">
                                <i class="fa fa-users"></i>
                                <span>No Sponsor members</span>
                            </a>
                        </li>
                        <li>
                            <a href="/cln-office/all_members.php">
                                <i class="fa fa-users"></i>
                                <span>All members</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- transactions -->
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-dollar"></i>
                        <span>Transactions <span><i class="fa fa-angle-down"></i></span></span>
                    </a>
                    <ul class="sub">
                        <li>
                            <a href="/cln-office/view_deposits.php">
                                <i class="fa fa-dollar"></i>
                                <span>View Deposits <span class="badge bg-success"><?=$totalDeposits?></span></span>
                            </a>
                        </li>

                        <li>
                            <a href="/cln-office/view_withdrawals.php">
                                <i class="fa fa-dollar"></i>
                                <span>View Withdrawals <span class="badge bg-danger"><?=$totalWithdrawals;?></span></span>
                            </a>
                        </li>

                        <li>
                            <a href="/cln-office/view_transactions.php">
                                <i class="fa fa-dollar"></i>
                                <span>All Transactions <span class="badge bg-primary"><?=$totalTrasactions;?></span></span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="/cln-office/genealogy.php">
                        <i class=" fa fa-sitemap"></i>
                        <span>Genealogy</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-bullhorn"></i>
                        <span>Announcements <span><i class="badge bg-angle-down"></i></span></span>
                    </a>
                    <ul class="sub">
                        <li><a href="/cln-office/new_announcement.php">Create Announcements  <span class="badge bg-primary">0</span></a></li>
                        <li><a href="/cln-office/view_announcements.php">View Announcements</a></li>
                    </ul>
                </li>

                <!--<li class="sub-menu">-->
                <!--    <a href="javascript:;">-->
                <!--        <i class="fa fa-envelope"></i>-->
                <!--        <span>Messages <span class="badge bg-primary"><?=$userUnreadMsgs;?></span></span>-->
                <!--    </a>-->
                <!--    <ul class="sub">-->
                <!--        <li><a href="/cln-office/inbox.php">Inbox  <span class="badge bg-primary"><?=$userUnreadMsgs;?></span></a></li>-->
                <!--    </ul>-->
                <!--</li>-->
                
                <li>
                    <a href="/cln-office/logout.php">
                        <i class="fa fa-key"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>