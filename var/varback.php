<?php 
    //$userid ="";
ini_set("display_errors", 0);

    // system vars
    $sqlAdminSET = mysqli_query($con,"SELECT * FROM mlmsystemsettings");
        while ($row = mysqli_fetch_assoc($sqlAdminSET)) {
            $systemActivationFee=$row['activationfee'];
            $systemMinWithdrawal=$row['minwithdrawal'];
            $systemMaxWithdrawal=$row['maxwithdrawal'];
            $siteName = $row['sitename'];
            $siteURL = $row['siteurl'];
            $siteSupportMail = $row['supportmail'];
            $siteSecurityMail = $row['securitymail'];
            $siteInfoMail = $row['infomail'];
            $siteWithdrawalsMail = $row['withdrawalsmail'];
        }

        //  user vars
    $sqlUU = mysqli_query($con,"SELECT * FROM mlmmembers WHERE userid=$userid");
        while ($row = mysqli_fetch_assoc($sqlUU)) {
            $fullname=$row['firstname'] . " " . $row['lastname'];
            //$status=$_SESSION['status']=$rows['status'];
            $firstname=$row['firstname'];
            $lastname=$row['lastname'];
            $myuserid=$row['userid'];
            $username=$row['username'];
            $emailaddress=$row['emailaddress'];
            $phoneno=$row['phoneno'];
            $userPhase=$row['currentstage'];
            $userRank=$row['memberregno'];
            $userWalletName=$row['walletname'];
            $userBitAddress=$row['bitress'];
            $userdirectdownliners=$row['directdownliners'];

            $batchno=$row['batch'];
            $userCurrentStage=$row['currentstage'];
            $datecreated=$row['datecreated'];
            $lastupdate=$row['lastupdate'];
            $apass=$row['password'];

            $userActStatus=$row['activation'];
            $userBatchStatus=$row['batchstatus'];

            $profileid=$_SESSION['profileid']=$row['profileid'];
            $userid=$_SESSION['userid']=$row['userid'];
            $parentid=$_SESSION['parentid']=$row['parentid'];

            $userStatus=$row['status'];
            $otpForBitChange=$row['otpforbitchange'];
            $otpBitStatus=$row['otpbitstatus'];
            $newBitAddress=$row['newbitaddress'];
            $newWalletName=$row['newwalletname'];

            $targetDate = $row['targetdate'];
            $dueDate = $row['duedate'];
            $suspendUserWithdrawals = $row['suspenduserwithdrawals'];
            $suspendUserRegistrations = $row['suspenduserregistrations'];

            $userphase1completed  = $row['phase1completed'];
            $userphase2completed  = $row['phase2completed'];
            $userphase3completed  = $row['phase3completed'];
        }

           //  parent user vars
    $sqlUUpare = mysqli_query($con,"SELECT * FROM mlmmembers WHERE userid=$parentid");
        while ($rowpa = mysqli_fetch_assoc($sqlUUpare)) {
            $par_fullname=$rowpa['firstname'] . " " . $rowpa['lastname'];
            //$status=$_SESSION['status']=$rows['status'];
            $par_firstname=$rowpa['firstname'];
            $par_lastname=$rowpa['lastname'];
            $par_emailaddress=$rowpa['emailaddress'];
            $par_phoneno=$rowpa['phoneno'];

            $par_userphase1completed  = $rowpa['phase1completed'];
    }

          //  random user vars
    $sqlUUrandom = mysqli_query($con,"SELECT * FROM mlmmembers WHERE status='1'");
        while ($rowrand = mysqli_fetch_assoc($rowrand)) {
            $random_username=$rowrand['username'];

            $random_userphase1completed  = $rowrand['phase1completed'];
    }

    // phase 1 members
    $SqlPhase1Members = mysqli_query($con,"SELECT * FROM mlmmembers WHERE currentstage='Phase 1'");
    $phase1Members = mysqli_num_rows($SqlPhase1Members);
    // phase 2 members
    $SqlPhase2Members = mysqli_query($con,"SELECT * FROM mlmmembers WHERE currentstage='Phase 2'");
    $phase2Members = mysqli_num_rows($SqlPhase2Members);
    // phase 3 members
    $SqlPhase3Members = mysqli_query($con,"SELECT * FROM mlmmembers WHERE currentstage='Phase 3'");
    $phase3Members = mysqli_num_rows($SqlPhase3Members);


    // user 3 downliners
    $SqlUser3Downliners = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$userid'");
    $user3Downliners = mysqli_num_rows($SqlUser3Downliners);
    while ($downL = mysqli_fetch_assoc($SqlUser3Downliners)) {
        $dl_Userid = $downL['userid'];
        $dl_Username = $downL['username'];
    }
    // user 9 grand children downliners
    // $SqlUser9Downliners = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$dl_Userid'");
    // $user9Downliners = mysqli_num_rows($SqlUser9Downliners);
    // while ($downL = mysqli_fetch_assoc($SqlUser9Downliners)) {
    //     $dl_Userid = $downL['userid'];
    //     $dl_Username = $downL['username'];
    // }


    // direct downliners
    $directDownlinerss = mysqli_query($con,"SELECT * FROM mlmmembers WHERE sponsorid='$username'");
    $directDownliners = mysqli_num_rows($directDownlinerss);

    // active direct downliners
    $SQLuserActiveDLs = mysqli_query($con,"SELECT * FROM mlmmembers WHERE sponsorid='$username' AND activation='Paid'");
    $userActiveDLs = mysqli_num_rows($SQLuserActiveDLs);

    // active members
    $SQLactiveMems = mysqli_query($con,"SELECT * FROM mlmmembers WHERE activation='Paid'");
    $totalActiveMembers = mysqli_num_rows($SQLactiveMems);

    // Total members
    $SQLtotMembers = mysqli_query($con,"SELECT * FROM mlmmembers");
    $totalMembers = mysqli_num_rows($SQLtotMembers);

    // LaST Registered member
    $SQLlastMemberRegNo = mysqli_query($con,"SELECT * FROM mlmmembers order by userid DESC LIMIT 1");
        while ($zROWS = mysqli_fetch_assoc($SQLlastMemberRegNo)){
            $lastMemberRegNo = $zROWS['userid'];
        }

    // Potential earning for system
    $systemPotentialEarnings = $totalMembers*40;

    // Real earnings for system
    $realSystemEarnings = $totalActiveMembers*40;

    //  batch numbers Var
    $batch1 = "Batch 1" ;
    $batch2 = "Batch 2" ;
    $batch3 = "Batch 3" ;
    $batch4 = "Batch 4" ;
    $batch5 = "Batch 5" ;
    $batch6 = "Batch 6" ;
    $batch7 = "Batch 7" ;
    $batch8 = "Batch 8" ;
    $batch9 = "Batch 9" ;
    $batch10 = "Batch 10" ;
    $batch11 = "Batch 11" ;
    $batch12 = "Batch 12" ;
    
    $SQLbatch1total = mysqli_query($con,"SELECT * FROM mlmmembers WHERE batch='1'");
    $batch1total = mysqli_num_rows($SQLbatch1total);

    $SQLbatch2total = mysqli_query($con,"SELECT * FROM mlmmembers WHERE batch='2'");
    $batch2total = mysqli_num_rows($SQLbatch2total);

    $SQLbatch3total = mysqli_query($con,"SELECT * FROM mlmmembers WHERE batch='3'");
    $batch3total = mysqli_num_rows($SQLbatch3total);

    $SQLbatch4total = mysqli_query($con,"SELECT * FROM mlmmembers WHERE batch='4'");
    $batch4total = mysqli_num_rows($SQLbatch4total);

    $SQLbatch5total = mysqli_query($con,"SELECT * FROM mlmmembers WHERE batch='5'");
    $batch5total = mysqli_num_rows($SQLbatch5total);

    $SQLbatch6total = mysqli_query($con,"SELECT * FROM mlmmembers WHERE batch='6'");
    $batch6total = mysqli_num_rows($SQLbatch6total);

    $SQLbatch7total = mysqli_query($con,"SELECT * FROM mlmmembers WHERE batch='7'");
    $batch7total = mysqli_num_rows($SQLbatch7total);

    $SQLbatch8total = mysqli_query($con,"SELECT * FROM mlmmembers WHERE batch='8'");
    $batch8total = mysqli_num_rows($SQLbatch8total);

    $SQLbatch9total = mysqli_query($con,"SELECT * FROM mlmmembers WHERE batch='9'");
    $batch9total = mysqli_num_rows($SQLbatch9total);

    $SQLbatch10total = mysqli_query($con,"SELECT * FROM mlmmembers WHERE batch='10'");
    $batch10total = mysqli_num_rows($SQLbatch10total);

    $SQLbatch11total = mysqli_query($con,"SELECT * FROM mlmmembers WHERE batch='11'");
    $batch11total = mysqli_num_rows($SQLbatch11total);

    $SQLbatch12total = mysqli_query($con,"SELECT * FROM mlmmembers WHERE batch='12'");
    $batch12total = mysqli_num_rows($SQLbatch12total);

    $SQLbatch13total = mysqli_query($con,"SELECT * FROM mlmmembers WHERE batch='13'");
    $batch13total = mysqli_num_rows($SQLbatch13total);

    $SQLbatch14total = mysqli_query($con,"SELECT * FROM mlmmembers WHERE batch='14'");
    $batch14total = mysqli_num_rows($SQLbatch14total);

    $SQLbatch15total = mysqli_query($con,"SELECT * FROM mlmmembers WHERE batch='15'");
    $batch15total = mysqli_num_rows($SQLbatch15total);

    $SQLbatch16total = mysqli_query($con,"SELECT * FROM mlmmembers WHERE batch='16'");
    $batch16total = mysqli_num_rows($SQLbatch16total);

    $SQLbatch17total = mysqli_query($con,"SELECT * FROM mlmmembers WHERE batch='17'");
    $batch17total = mysqli_num_rows($SQLbatch17total);

    $SQLbatch18total = mysqli_query($con,"SELECT * FROM mlmmembers WHERE batch='18'");
    $batch18total = mysqli_num_rows($SQLbatch18total);

    $SQLbatch19total = mysqli_query($con,"SELECT * FROM mlmmembers WHERE batch='19'");
    $batch19total = mysqli_num_rows($SQLbatch19total);

    $SQLbatch20total = mysqli_query($con,"SELECT * FROM mlmmembers WHERE batch='20'");
    $batch20total = mysqli_num_rows($SQLbatch20total);

    $SQLbatch21total = mysqli_query($con,"SELECT * FROM mlmmembers WHERE batch='21'");
    $batch21total = mysqli_num_rows($SQLbatch21total);

    $SQLbatch22total = mysqli_query($con,"SELECT * FROM mlmmembers WHERE batch='22'");
    $batch22total = mysqli_num_rows($SQLbatch22total);

    $SQLbatch23total = mysqli_query($con,"SELECT * FROM mlmmembers WHERE batch='23'");
    $batch23total = mysqli_num_rows($SQLbatch23total);

    $SQLbatc24total = mysqli_query($con,"SELECT * FROM mlmmembers WHERE batch='24'");
    $batch24total = mysqli_num_rows($SQLbatch23total);

    // $totalBatches = $batch1total+$batch2total+$batch3total+$batch4total+$batch5total+$batch6total+$batch7total+$batch8total+$batch9total+$batch10total+$batch11total+$batch12total+$batch13total+$batch14total+$batch15total+$batch16total+$batch17total+$batch18total+$batch19total+$batch20total+$batch21total+$batch22total+$batch23total+$batch24total;
    
    // 
    $SQLtotaldeposits = mysqli_query($con,"SELECT creditamount FROM mlmledger WHERE creditamount>'0'");
    $totalDeposits = mysqli_num_rows($SQLtotaldeposits);

    $SQLtotalwithdrawals = mysqli_query($con,"SELECT debitamount FROM mlmledger WHERE debitamount>'0'");
    $totalWithdrawals = mysqli_num_rows($SQLtotalwithdrawals);

    $SQLtotalTransactions = mysqli_query($con,"SELECT * FROM mlmledger");
    $totalTrasactions = mysqli_num_rows($SQLtotalTransactions);

    // UserTotalEarnings
    $sqlUserTotalEarnings= mysqli_query($con,"SELECT * FROM mlmmemberledger WHERE userid=$userid AND creditamount>'0'");
    $UserTotalEarnings = mysqli_num_rows($sqlUserTotalEarnings);

    // UserTotal withdrawals
    $sqlUserWithdrawals= mysqli_query($con,"SELECT * FROM mlmwithdrawals WHERE userid=$userid");
    $UserWithdrawals = mysqli_num_rows($sqlUserWithdrawals);

    // UserTotalCredit
    $sqlCred= mysqli_query($con,"SELECT SUM(creditamount) as credit FROM mlmmemberledger WHERE userid=$userid");        
    if($sqlCred){
        $rows=mysqli_fetch_assoc($sqlCred);
        $UserTotalCredit=$rows['credit'];       
    }

    // UserTotalDebit
    $sqlDeb= mysqli_query($con,"SELECT SUM(debitamount) as debit FROM mlmmemberledger WHERE userid=$userid");        
    if($sqlDeb){
        $rows=mysqli_fetch_assoc($sqlDeb);
        $UserTotalDebit=$rows['debit'];
    }

    // User Available Balance for withdrawal
    $sqlCredA= mysqli_query($con,"SELECT SUM(creditamount) as credit FROM mlmmemberledger WHERE userid=$userid AND status='Available'");       
    if($sqlCredA){
        $rows=mysqli_fetch_assoc($sqlCredA);
        $UserAvalBal=$rows['credit'];       
    }

    // User withdrawn credit
    $sqlCredWit= mysqli_query($con,"SELECT SUM(creditamount) as credit FROM mlmmemberledger WHERE userid=$userid AND status='Withdrawn'");        
    if($sqlCredWit){
        $rows=mysqli_fetch_assoc($sqlCredWit);
        $UserTotalWithdrawals=$rows['credit'];       
    }
    // System Pending withdrawals
    $sqlPenWithd= mysqli_query($con,"SELECT SUM(amount) as amt FROM mlmwithdrawals WHERE status='Pending'");        
    if($sqlPenWithd){
        $rows=mysqli_fetch_assoc($sqlPenWithd);
        $systemPendingWithdrawals=$rows['amt']; 
    }

    // System Paid withdrawals
    $sqlPaidWithd= mysqli_query($con,"SELECT SUM(amount) as amt FROM mlmwithdrawals WHERE status='Paid'");        
    if($sqlPaidWithd){
        $rows=mysqli_fetch_assoc($sqlPaidWithd);
        $systemPaidWithdrawals=$rows['amt']; 
    }

    $systemProfits=$realSystemEarnings-$systemPaidWithdrawals;

    // PendingWithdrawals
    $sqlpwithdrwals= mysqli_query($con,"SELECT * FROM mlmwithdrawals WHERE status='Pending'");        
    $pendingWithdrawals=mysqli_num_rows($sqlpwithdrwals);

    // PeaidWithdrawals
    $sqlpaidwithdrwals= mysqli_query($con,"SELECT * FROM mlmwithdrawals WHERE status='Paid'");        
    $paidWithdrawals=mysqli_num_rows($sqlpaidwithdrwals);

    // user total messages stats
    $sqlUserMsgs= mysqli_query($con,"SELECT * FROM mlmtickets WHERE sender='user' AND userid=$userid");
    $userMsgs = mysqli_num_rows($sqlUserMsgs);

    // user unread messages stats
    $sqlUserUnreadMsg= mysqli_query($con,"SELECT * FROM mlmtickets WHERE sender='admin' AND userid=$userid");
    $userInboxMsgs = $userUnreadMsgs = mysqli_num_rows($sqlUserUnreadMsg);

    // user sent messages stats
    $sqlUserSentMsg= mysqli_query($con,"SELECT * FROM mlmtickets WHERE sender='user' AND userid=$userid");
    $userSentMsgs = mysqli_num_rows($sqlUserSentMsg);

    // total active announcements
    $sqlNewss= mysqli_query($con,"SELECT * FROM mlmupdates WHERE upstatus='1'");
    if($totalNewsUpdates = mysqli_num_rows($sqlNewss) > "0"){
        $totalNewsUpdates = $totalNewsUpdates;
    }else{
         $totalNewsUpdates = "0";
    }
    $sqlNewss= mysqli_query($con,"SELECT * FROM mlmupdates ORDER BY upid DESC LIMIT 1");
    while ($row = mysqli_fetch_assoc($sqlNewss)) {
            $newsID=$row['upid'];
            $newsTitle=$row['upsubject'];
            $newsAnnouncement=$row['upmessage'];
            $newsStatus=$row['upstatus'];
            $newsPubDate=$row['updatetime'];
        }

    $sqlBatchSts = mysqli_query($con,"SELECT * FROM mlmsystem");
        while ($row = mysqli_fetch_assoc($sqlBatchSts)) {
            $batch1status=$row['batch1status'];
            $batch2status=$row['batch2status'];
            $batch3status=$row['batch3status'];
            $batch4status=$row['batch4status'];
            $batch5status=$row['batch5status'];
            $batch6status=$row['batch6status'];
            $batch7status=$row['batch7status'];
            $batch8status=$row['batch8status'];
            $batch9status=$row['batch9status'];  
            $batch10status=$row['batch10status'];
            $batch11status=$row['batch11status'];
            $batch12status=$row['batch12status'];
            $batch13status=$row['batch13status'];
            $batch14status=$row['batch14status'];
            $batch15status=$row['batch15status'];
            $batch16status=$row['batch16status'];
            $batch17status=$row['batch17status'];
            $batch18status=$row['batch18status'];
            $batch19status=$row['batch19status'];
            $batch20status=$row['batch20status'];
            $batch21status=$row['batch21status'];
            $batch22status=$row['batch22status'];
            $batch23status=$row['batch23status'];  
            $batch24status=$row['batch24status'];
        }

            ///////////////// PHASE1 //////////////////////////////
                    // / get child 1
                    $zSQL1 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$myuserid' order by userid ASC LIMIT 0,1");
                    while ($zROWS1 = mysqli_fetch_assoc($zSQL1)){
                        $child1_Userid = $zROWS1['userid'];
                        $child1_Username = $zROWS1['username'];
                        $child1_userphase1completed  = $zROWS1['phase1completed'];
                    }
                    // / get child 2
                    $zSQL2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$myuserid' order by userid ASC LIMIT 1,1");
                    while ($zROWS2 = mysqli_fetch_assoc($zSQL2)){
                        $child2_Userid = $zROWS2['userid'];
                        $child2_userphase1completed  = $zROWS2['phase1completed'];
                    }
                    // / get child 3
                    $zSQL2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$userid' order by userid ASC LIMIT 2,1 ");
                    while ($zROWS3 = mysqli_fetch_assoc($zSQL2)){
                        $child3_Userid = $zROWS3['userid'];
                        $child3_userphase1completed  = $zROWS3['phase1completed'];
                    }

                    //child 1 DLs
                    $zSQLchild1 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid=$child1_Userid");
                    $child1DLS = mysqli_num_rows($zSQLchild1);

                    //child 2 DLs
                    $zSQLchild2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid=$child2_Userid");
                    $child2DLS = mysqli_num_rows($zSQLchild2);

                    //child 3 DLs
                    $zSQLchild3 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid=$child3_Userid");
                    $child3DLS = mysqli_num_rows($zSQLchild3);

                    $user9Downliners = $child1DLS+$child2DLS+$child3DLS;



                    // //////////////// GRAND CHILDREN //////////
                    // / get grand child 1
                    $grandSQL1 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$child1_Userid' order by userid ASC LIMIT 0,1");
                    while ($zROWS1 = mysqli_fetch_assoc($grandSQL1)){
                        $grandchild1_Userid = $zROWS1['userid']."<br>";
                    }
                    // / get grand child 2
                    $grandSQL2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$child1_Userid' order by userid ASC LIMIT 1,1");
                    while ($zROWS2 = mysqli_fetch_assoc($grandSQL2)){
                        $grandchild2_Userid = $zROWS2['userid']."<br>";
                    }
                    // / get grand child 3
                    $grandSQL3 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$child1_Userid' order by userid ASC LIMIT 2,1");
                    while ($zROWS3 = mysqli_fetch_assoc($grandSQL3)){
                        $grandchild3_Userid = $zROWS3['userid']."<br>";
                    }
                    // / get grand child 4
                    $grandSQL4 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$child2_Userid' order by userid ASC LIMIT 0,1");
                    while ($zROWS1 = mysqli_fetch_assoc($grandSQL4)){
                         $grandchild4_Userid = $zROWS1['userid']."<br>";
                    }
                    // / get grand child 5
                    $grandSQL5 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$child2_Userid' order by userid ASC LIMIT 1,1");
                    while ($zROWS2 = mysqli_fetch_assoc($grandSQL5)){
                        $grandchild5_Userid = $zROWS2['userid']."<br>";
                    }
                    // / get grand child 6
                    $grandSQL6 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$child2_Userid' order by userid ASC LIMIT 2,1");
                    while ($zROWS3 = mysqli_fetch_assoc($grandSQL6)){
                        $grandchild6_Userid = $zROWS3['userid']."<br>";
                    }
                    // / get grand child 7
                    $grandSQL7 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$child3_Userid' order by userid ASC LIMIT 0,1");
                    while ($zROWS1 = mysqli_fetch_assoc($grandSQL7)){
                        $grandchild7_Userid = $zROWS1['userid']."<br>";
                    }
                    // / get grand child 8
                    $grandSQL8 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$child3_Userid' order by userid ASC LIMIT 1,1");
                    while ($zROWS2 = mysqli_fetch_assoc($grandSQL8)){
                        $grandchild8_Userid = $zROWS2['userid']."<br>";
                    }
                    // / get grand child 9
                    $grandSQL9 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$child3_Userid' order by userid ASC LIMIT 2,1");
                    while ($zROWS3 = mysqli_fetch_assoc($grandSQL9)){
                        $grandchild9_Userid = $zROWS3['userid']."<br>";
                    }

                    // grandchild 1 DLs
                    $zSQLgrandchild1 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild1_Userid' order by userid ASC");
                    $grandchild1DLs = mysqli_num_rows($zSQLgrandchild1);

                    //grandchild 2 DLs
                    $zSQLgrandchild2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild2_Userid' order by userid ASC");
                    $grandchild2DLs = mysqli_num_rows($zSQLgrandchild2);

                    //grandchild 3 DLs
                    $zSQLgrandchild3 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild3_Userid' order by userid ASC");
                    $grandchild3DLs = mysqli_num_rows($zSQLgrandchild3);

                    //grandchild 4 DLs
                    $zSQLgrandchild4 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild4_Userid' order by userid ASC");
                    $grandchild4DLs = mysqli_num_rows($zSQLgrandchild4);

                    //grandchild 5 DLs
                    $zSQLgrandchild5 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild5_Userid' order by userid ASC");
                    $grandchild5DLs = mysqli_num_rows($zSQLgrandchild5);

                    //grandchild 6 DLs
                    $zSQLgrandchild6 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild6_Userid' order by userid ASC");
                    $grandchild6DLs = mysqli_num_rows($zSQLgrandchild6);

                    //grandchild 7 DLs
                    $zSQLgrandchild7 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild7_Userid' order by userid ASC");
                    $grandchild7DLs = mysqli_num_rows($zSQLgrandchild7);

                    //grandchild 8 DLs
                    $zSQLgrandchild8 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild8_Userid' order by userid ASC");
                    $grandchild8DLs = mysqli_num_rows($zSQLgrandchild8);

                    //grandchild 9 DLs
                    $zSQLgrandchild9 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild9_Userid' order by userid ASC");
                    $grandchild9DLs = mysqli_num_rows($zSQLgrandchild9);

                    $user27Downliners = $grandchild1DLs+$grandchild2DLs+$grandchild3DLs+$grandchild4DLs+$grandchild5DLs+$grandchild6DLs+$grandchild7DLs+$grandchild8DLs+$grandchild9DLs;






                    // //////////////// LEVEL 4 - GREAT CHILDREN PHASE 1 //////////
                    // / get great child 1
                    $greatSQL1 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild1_Userid' order by userid ASC LIMIT 0,1");
                    while ($zROWS1 = mysqli_fetch_assoc($greatSQL1)){
                        $greatchild1_Userid = $zROWS1['userid']."<br>";
                    }
                    // / get grand child 2
                    $greatSQL2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild1_Userid' order by userid ASC LIMIT 1,1");
                    while ($zROWS2 = mysqli_fetch_assoc($greatSQL2)){
                        $greatchild2_Userid = $zROWS2['userid']."<br>";
                    }
                    // / get great child 3
                    $greatSQL3 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild1_Userid' order by userid ASC LIMIT 2,1");
                    while ($zROWS3 = mysqli_fetch_assoc($greatSQL3)){
                        $greatchild3_Userid = $zROWS3['userid']."<br>";
                    }
                    // / get great child 4
                    $greatSQL4 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild2_Userid' order by userid ASC LIMIT 0,1");
                    while ($zROWS1 = mysqli_fetch_assoc($greatSQL4)){
                         $greatchild4_Userid = $zROWS1['userid']."<br>";
                    }
                    // / get great child 5
                    $greatSQL5 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild2_Userid' order by userid ASC LIMIT 1,1");
                    while ($zROWS2 = mysqli_fetch_assoc($greatSQL5)){
                        $greatchild5_Userid = $zROWS2['userid']."<br>";
                    }
                    // / get great child 6
                    $greatSQL6 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild2_Userid' order by userid ASC LIMIT 2,1");
                    while ($zROWS3 = mysqli_fetch_assoc($greatSQL6)){
                        $greatchild6_Userid = $zROWS3['userid']."<br>";
                    }
                    // / get great child 7
                    $greatSQL7 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild3_Userid' order by userid ASC LIMIT 0,1");
                    while ($zROWS1 = mysqli_fetch_assoc($greatSQL7)){
                        $greatchild7_Userid = $zROWS1['userid']."<br>";
                    }
                    // / get great child 8
                    $greatSQL8 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild3_Userid' order by userid ASC LIMIT 1,1");
                    while ($zROWS2 = mysqli_fetch_assoc($greatSQL8)){
                        $greatchild8_Userid = $zROWS2['userid']."<br>";
                    }
                    // / get great child 9
                    $greatSQL9 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild3_Userid' order by userid ASC LIMIT 2,1");
                    while ($zROWS3 = mysqli_fetch_assoc($greatSQL9)){
                        $greatchild9_Userid = $zROWS3['userid']."<br>";
                    }
                    // / get great child 10
                    $greatSQL10 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild4_Userid' order by userid ASC LIMIT 0,1");
                    while ($zROWS1 = mysqli_fetch_assoc($greatSQL10)){
                        $greatchild10_Userid = $zROWS1['userid']."<br>";
                    }
                    // / get great child 11
                    $greatSQL11 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild4_Userid' order by userid ASC LIMIT 1,1");
                    while ($zROWS2 = mysqli_fetch_assoc($greatSQL11)){
                        $greatchild11_Userid = $zROWS2['userid']."<br>";
                    }
                    // / get great child 12
                    $greatSQL12 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild4_Userid' order by userid ASC LIMIT 2,1");
                    while ($zROWS3 = mysqli_fetch_assoc($greatSQL12)){
                        $greatchild12_Userid = $zROWS3['userid']."<br>";
                    }
                    // / get great child 13
                    $greatSQL13 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild5_Userid' order by userid ASC LIMIT 0,1");
                    while ($zROWS1 = mysqli_fetch_assoc($greatSQL13)){
                        $greatchild13_Userid = $zROWS1['userid']."<br>";
                    }
                    // / get great child 14
                    $greatSQL14 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild5_Userid' order by userid ASC LIMIT 1,1");
                    while ($zROWS2 = mysqli_fetch_assoc($greatSQL14)){
                        $greatchild14_Userid = $zROWS2['userid']."<br>";
                    }
                    // / get great child 15
                    $greatSQL15 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild5_Userid' order by userid ASC LIMIT 2,1");
                    while ($zROWS3 = mysqli_fetch_assoc($greatSQL15)){
                        $greatchild15_Userid = $zROWS3['userid']."<br>";
                    }

                    // / get great child 16
                    $greatSQL16 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild6_Userid' order by userid ASC LIMIT 0,1");
                    while ($zROWS1 = mysqli_fetch_assoc($greatSQL16)){
                        $greatchild16_Userid = $zROWS1['userid']."<br>";
                    }
                    // / get great child 17
                    $greatSQL17 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild6_Userid' order by userid ASC LIMIT 1,1");
                    while ($zROWS2 = mysqli_fetch_assoc($greatSQL17)){
                        $greatchild17_Userid = $zROWS2['userid']."<br>";
                    }
                    // / get great child 18
                    $greatSQL18 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild6_Userid' order by userid ASC LIMIT 2,1");
                    while ($zROWS3 = mysqli_fetch_assoc($greatSQL18)){
                        $greatchild18_Userid = $zROWS3['userid']."<br>";
                    }

                    // / get great child 19
                    $greatSQL19 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild7_Userid' order by userid ASC LIMIT 0,1");
                    while ($zROWS1 = mysqli_fetch_assoc($greatSQL19)){
                        $greatchild19_Userid = $zROWS1['userid']."<br>";
                    }
                    // / get great child 20
                    $greatSQL20 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild7_Userid' order by userid ASC LIMIT 1,1");
                    while ($zROWS2 = mysqli_fetch_assoc($greatSQL20)){
                        $greatchild20_Userid = $zROWS2['userid']."<br>";
                    }
                    // / get great child 21
                    $greatSQL21 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild7_Userid' order by userid ASC LIMIT 2,1");
                    while ($zROWS3 = mysqli_fetch_assoc($greatSQL21)){
                        $greatchild21_Userid = $zROWS3['userid']."<br>";
                    }

                    // / get great child 22
                    $greatSQL22 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild8_Userid' order by userid ASC LIMIT 0,1");
                    while ($zROWS1 = mysqli_fetch_assoc($greatSQL22)){
                        $greatchild22_Userid = $zROWS1['userid']."<br>";
                    }
                    // / get great child 23
                    $greatSQL23 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild8_Userid' order by userid ASC LIMIT 1,1");
                    while ($zROWS2 = mysqli_fetch_assoc($greatSQL23)){
                        $greatchild23_Userid = $zROWS2['userid']."<br>";
                    }
                    // / get great child 24
                    $greatSQL24 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild8_Userid' order by userid ASC LIMIT 2,1");
                    while ($zROWS3 = mysqli_fetch_assoc($greatSQL24)){
                        $greatchild24_Userid = $zROWS3['userid']."<br>";
                    }

                    // / get great child 25
                    $greatSQL25 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild9_Userid' order by userid ASC LIMIT 0,1");
                    while ($zROWS1 = mysqli_fetch_assoc($greatSQL25)){
                        $greatchild25_Userid = $zROWS1['userid']."<br>";
                    }
                    // / get great child 26
                    $greatSQL26 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild9_Userid' order by userid ASC LIMIT 1,1");
                    while ($zROWS2 = mysqli_fetch_assoc($greatSQL26)){
                        $greatchild26_Userid = $zROWS2['userid']."<br>";
                    }
                    // / get great child 27
                    $greatSQL27 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild9_Userid' order by userid ASC LIMIT 2,1");
                    while ($zROWS3 = mysqli_fetch_assoc($greatSQL27)){
                        $greatchild27_Userid = $zROWS3['userid']."<br>";
                    }

                    // greatchild 1 DLs
                    $zSQLgreatchild1 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild1_Userid' order by userid ASC");
                    $greatchild1DLs = mysqli_num_rows($zSQLgreatchild1);
                    // greatchild 2 DLs
                    $zSQLgreatchild2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild2_Userid' order by userid ASC");
                    $greatchild2DLs = mysqli_num_rows($zSQLgreatchild2);
                    // greatchild 3 DLs
                    $zSQLgreatchild3 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild3_Userid' order by userid ASC");
                    $greatchild3DLs = mysqli_num_rows($zSQLgreatchild3);
                    // greatchild 4 DLs
                    $zSQLgreatchild4 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild4_Userid' order by userid ASC");
                    $greatchild4DLs = mysqli_num_rows($zSQLgreatchild4);
                    // greatchild 5 DLs
                    $zSQLgreatchild5 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild5_Userid' order by userid ASC");
                    $greatchild5DLs = mysqli_num_rows($zSQLgreatchild5);
                    // greatchild 6 DLs
                    $zSQLgreatchild6 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild6_Userid' order by userid ASC");
                    $greatchild6DLs = mysqli_num_rows($zSQLgreatchild6);
                    // greatchild 7 DLs
                    $zSQLgreatchild7 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild7_Userid' order by userid ASC");
                    $greatchild7DLs = mysqli_num_rows($zSQLgreatchild7);
                    // greatchild 8 DLs
                    $zSQLgreatchild8 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild8_Userid' order by userid ASC");
                    $greatchild8DLs = mysqli_num_rows($zSQLgreatchild8);
                    // greatchild 9 DLs
                    $zSQLgreatchild9 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild9_Userid' order by userid ASC");
                    $greatchild9DLs = mysqli_num_rows($zSQLgreatchild9);
                    // greatchild 10 DLs
                    $zSQLgreatchild10 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild10_Userid' order by userid ASC");
                    $greatchild10DLs = mysqli_num_rows($zSQLgreatchild10);
                    // greatchild 11 DLs
                    $zSQLgreatchild11 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild11_Userid' order by userid ASC");
                    $greatchild11DLs = mysqli_num_rows($zSQLgreatchild11);
                    // greatchild 12 DLs
                    $zSQLgreatchild12 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild12_Userid' order by userid ASC");
                    $greatchild12DLs = mysqli_num_rows($zSQLgreatchild12);
                    // greatchild 13 DLs
                    $zSQLgreatchild13 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild13_Userid' order by userid ASC");
                    $greatchild13DLs = mysqli_num_rows($zSQLgreatchild13);
                    // greatchild 14 DLs
                    $zSQLgreatchild14 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild14_Userid' order by userid ASC");
                    $greatchild14DLs = mysqli_num_rows($zSQLgreatchild14);
                    // greatchild 15 DLs
                    $zSQLgreatchild15 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild15_Userid' order by userid ASC");
                    $greatchild15DLs = mysqli_num_rows($zSQLgreatchild15);
                    // greatchild 16 DLs
                    $zSQLgreatchild16 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild16_Userid' order by userid ASC");
                    $greatchild16DLs = mysqli_num_rows($zSQLgreatchild16);
                    // greatchild 17 DLs
                    $zSQLgreatchild17 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild17_Userid' order by userid ASC");
                    $greatchild17DLs = mysqli_num_rows($zSQLgreatchild17);
                    // greatchild 18 DLs
                    $zSQLgreatchild18 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild18_Userid' order by userid ASC");
                    $greatchild18DLs = mysqli_num_rows($zSQLgreatchild18);
                    // greatchild 19 DLs
                    $zSQLgreatchild19 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild19_Userid' order by userid ASC");
                    $greatchild19DLs = mysqli_num_rows($zSQLgreatchild19);
                    // greatchild 20 DLs
                    $zSQLgreatchild20 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild20_Userid' order by userid ASC");
                    $greatchild20DLs = mysqli_num_rows($zSQLgreatchild20);
                    // greatchild 21 DLs
                    $zSQLgreatchild21 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild21_Userid' order by userid ASC");
                    $greatchild21DLs = mysqli_num_rows($zSQLgreatchild21);
                    // greatchild 22 DLs
                    $zSQLgreatchild22 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild22_Userid' order by userid ASC");
                    $greatchild22DLs = mysqli_num_rows($zSQLgreatchild22);
                    // greatchild 23 DLs
                    $zSQLgreatchild23 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild23_Userid' order by userid ASC");
                    $greatchild23DLs = mysqli_num_rows($zSQLgreatchild23);
                    // greatchild 24 DLs
                    $zSQLgreatchild24 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild24_Userid' order by userid ASC");
                    $greatchild24DLs = mysqli_num_rows($zSQLgreatchild24);
                    // greatchild 25 DLs
                    $zSQLgreatchild25 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild25_Userid' order by userid ASC");
                    $greatchild25DLs = mysqli_num_rows($zSQLgreatchild25);
                    // greatchild 26 DLs
                    $zSQLgreatchild26 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild26_Userid' order by userid ASC");
                    $greatchild26DLs = mysqli_num_rows($zSQLgreatchild26);
                    // greatchild 27 DLs
                    $zSQLgreatchild27 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild27_Userid' order by userid ASC");
                    $greatchild27DLs = mysqli_num_rows($zSQLgreatchild27);

                    $user81Downliners = $greatchild1DLs+$greatchild2DLs+$greatchild3DLs+$greatchild4DLs+$greatchild5DLs+$greatchild6DLs+$greatchild7DLs+$greatchild8DLs+$greatchild9DLs+$greatchild10DLs+$greatchild11DLs+$greatchild12DLs+$greatchild13DLs+$greatchild14DLs+$greatchild15DLs+$greatchild16DLs+$greatchild17DLs+$greatchild18DLs+$greatchild19DLs+$greatchild20DLs+$greatchild21DLs+$greatchild22DLs+$greatchild23DLs+$greatchild24DLs+$greatchild25DLs+$greatchild26DLs+$greatchild27DLs;



                    ///////////////// PHASE2 //////////////////////////////
                    // LEVEL 1 CHILD user 3 downliners phase 2
                    $text_Phase2 = "Phase 2";
                    $SqlUser_3Downliners = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$userid' AND currentstage='$text_Phase2' order by userid ASC");
                    $user3_Downliners = mysqli_num_rows($SqlUser_3Downliners);
                    while ($down_L = mysqli_fetch_assoc($SqlUser_3Downliners)) {
                        $dl__Userid = $down_L['userid'];
                        $dl__Username = $down_L['username'];
                    }

                    /// get child 1
                    $zSQL1p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$userid' AND currentstage='$text_Phase2' order by userid ASC LIMIT 0,1");
                    while ($zROWS1 = mysqli_fetch_assoc($zSQL1p2)){
                        $child1_Useridp2 = $zROWS1['userid']."<br>";
                    }
                    /// get child 2
                    $zSQL2p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$userid' AND currentstage='$text_Phase2' order by userid ASC LIMIT 1,1");
                    while ($zROWS2 = mysqli_fetch_assoc($zSQL2p2)){
                        $child2_Useridp2 = $zROWS2['userid']."<br>";
                    }
                    /// get child 3
                    $zSQL2p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$userid' AND currentstage='$text_Phase2' order by userid ASC LIMIT 2,1 ");
                    while ($zROWS3 = mysqli_fetch_assoc($zSQL2p2)){
                        $child3_Useridp2 = $zROWS3['userid']."<br>";
                    }

                    //child 1 DLs
                    $zSQLchild1p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$child1_Useridp2' AND currentstage='$text_Phase2' order by userid ASC");
                    $child1DLsp2 = mysqli_num_rows($zSQLchild1p2);

                    //child 2 DLs
                    $zSQLchild2p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$child2_Useridp2' AND currentstage='$text_Phase2' order by userid ASC");
                    $child2DLsp2 = mysqli_num_rows($zSQLchild2p2);

                    //child 3 DLs
                    $zSQLchild3p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$child3_Useridp2' AND currentstage='$text_Phase2' order by userid ASC");
                    $child3DLsp2 = mysqli_num_rows($zSQLchild3p2);

                    $user9_Downliners = $child1DLsp2+$child2DLsp2+$child3DLsp2;

                    // //////////////// LEVEL 2 GRAND CHILDREN - PHASE 2 //////////
                    // / get grand child 1
                    $grandSQL1p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$child1_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 0,1");
                    while ($zROWS1p2 = mysqli_fetch_assoc($grandSQL1p2)){
                        $grandchild1_Useridp2 = $zROWS1p2['userid']."<br>";
                    }
                    // / get grand child 2
                    $grandSQL2p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$child1_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 1,1");
                    while ($zROWS2p2 = mysqli_fetch_assoc($grandSQL2p2)){
                        $grandchild2_Useridp2 = $zROWS2p2['userid']."<br>";
                    }
                    // / get grand child 3
                    $grandSQL3p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$child1_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 2,1");
                    while ($zROWS3p2 = mysqli_fetch_assoc($grandSQL3p2)){
                        $grandchild3_Useridp2 = $zROWS3p2['userid']."<br>";
                    }
                    // / get grand child 4
                    $grandSQL4p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$child2_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 0,1");
                    while ($zROWS1p2 = mysqli_fetch_assoc($grandSQL4p2)){
                         $grandchild4_Useridp2 = $zROWS1p2['userid']."<br>";
                    }
                    // / get grand child 5
                    $grandSQL5p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$child2_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 1,1");
                    while ($zROWS2p2 = mysqli_fetch_assoc($grandSQL5p2)){
                        $grandchild5_Useridp2 = $zROWS2p2['userid']."<br>";
                    }
                    // / get grand child 6
                    $grandSQL6p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$child2_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 2,1");
                    while ($zROWS3p2 = mysqli_fetch_assoc($grandSQL6p2)){
                        $grandchild6_Useridp2 = $zROWS3p2['userid']."<br>";
                    }
                    // / get grand child 7
                    $grandSQL7p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$child3_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 0,1");
                    while ($zROWS1p2 = mysqli_fetch_assoc($grandSQL7p2)){
                        $grandchild7_Useridp2 = $zROWS1p2['userid']."<br>";
                    }
                    // / get grand child 8
                    $grandSQL8p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$child3_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 1,1");
                    while ($zROWS2p2 = mysqli_fetch_assoc($grandSQL8p2)){
                        $grandchild8_Useridp2 = $zROWS2p2['userid']."<br>";
                    }
                    // / get grand child 9
                    $grandSQL9p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$child3_Userid' AND currentstage='Phase 2' order by userid ASC LIMIT 2,1");
                    while ($zROWS3p2 = mysqli_fetch_assoc($grandSQL9p2)){
                        $grandchild9_Useridp2 = $zROWS3p2['userid']."<br>";
                    }

                    // grandchild 1 DLs
                    $zSQL_grandchild1p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$child1_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $grandchild1_DLsp2 = mysqli_num_rows($zSQL_grandchild1p2);

                    //grandchild 2 DLs
                    $zSQL_grandchild2p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$child2_Useridp2' AND currentstage='Phase 2'order by userid ASC");
                    $grandchild2_DLsp2 = mysqli_num_rows($zSQL_grandchild2p2);

                    //grandchild 3 DLs
                    $zSQL_grandchild3p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$child3_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $grandchild3_DLsp2 = mysqli_num_rows($zSQL_grandchild3p2);

                    //grandchild 4 DLs
                    $zSQL_grandchild4p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$child1_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $grandchild4_DLsp2 = mysqli_num_rows($zSQL_grandchild4p2);

                    //grandchild 5 DLs
                    $zSQL_grandchild5p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$child2_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $grandchild5_DLsp2 = mysqli_num_rows($zSQL_grandchild5p2);

                    //grandchild 6 DLs
                    $zSQL_grandchild6p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$child3_Useridp2' AND currentstage='Phase 2'order by userid ASC");
                    $grandchild6_DLsp2 = mysqli_num_rows($zSQL_grandchild6p2);

                    //grandchild 7 DLs
                    $zSQL_grandchild7p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$child1_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $grandchild7_DLsp2 = mysqli_num_rows($zSQL_grandchild7p2);

                    //grandchild 8 DLs
                    $zSQL_grandchild8p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$child2_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $grandchild8_DLsp2 = mysqli_num_rows($zSQL_grandchild8p2);

                    //grandchild 9 DLs
                    $zSQL_grandchild9p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$child3_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $grandchild9_DLsp2 = mysqli_num_rows($zSQL_grandchild9p2);

                    $user27_Downliners = $grandchild1_DLsp2+$grandchild2_DLsp2+$grandchild3_DLsp2+$grandchild4_DLsp2+$grandchild5_DLsp2+$grandchild6_DLsp2+$grandchild7_DLsp2+$grandchild8_DLsp2+$grandchild9_DLsp2;


                    // //////////////// LEVEL 4 - GREAT CHILDREN PHASE 2 //////////
                    // / get great child 1
                    $greatSQL1p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild1_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 0,1");
                    while ($zROWS1p2 = mysqli_fetch_assoc($greatSQL1p2)){
                        $greatchild1_Useridp2 = $zROWS1p2['userid']."<br>";
                    }
                    // / get grand child 2
                    $greatSQL2p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild1_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 1,1");
                    while ($zROWS2p2 = mysqli_fetch_assoc($greatSQL2p2)){
                        $greatchild2_Useridp2 = $zROWS2p2['userid']."<br>";
                    }
                    // / get great child 3
                    $greatSQL3p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild1_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 2,1");
                    while ($zROWS3p2 = mysqli_fetch_assoc($greatSQL3p2)){
                        $greatchild3_Useridp2 = $zROWS3p2['userid']."<br>";
                    }
                    // / get great child 4
                    $greatSQL4p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild2_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 0,1");
                    while ($zROWS1p2 = mysqli_fetch_assoc($greatSQL4p2)){
                         $greatchild4_Useridp2 = $zROWS1p2['userid']."<br>";
                    }
                    // / get great child 5
                    $greatSQL5p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild2_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 1,1");
                    while ($zROWS2p2 = mysqli_fetch_assoc($greatSQL5p2)){
                        $greatchild5_Useridp2 = $zROWS2p2['userid']."<br>";
                    }
                    // / get great child 6
                    $greatSQL6p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild2_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 2,1");
                    while ($zROWS3p2 = mysqli_fetch_assoc($greatSQL6p2)){
                        $greatchild6_Useridp2 = $zROWS3p2['userid']."<br>";
                    }
                    // / get great child 7
                    $greatSQL7p2= mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild3_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 0,1");
                    while ($zROWS1p2 = mysqli_fetch_assoc($greatSQL7p2)){
                        $greatchild7_Useridp2 = $zROWS1p2['userid']."<br>";
                    }
                    // / get great child 8
                    $greatSQL8p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild3_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 1,1");
                    while ($zROWS2p2 = mysqli_fetch_assoc($greatSQL8p2)){
                        $greatchild8_Useridp2 = $zROWS2p2['userid']."<br>";
                    }
                    // / get great child 9
                    $greatSQL9p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild3_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 2,1");
                    while ($zROWS3p2 = mysqli_fetch_assoc($greatSQL9p2)){
                        $greatchild9_Useridp2 = $zROWS3p2['userid']."<br>";
                    }
                    // / get great child 10
                    $greatSQL10p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild4_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 0,1");
                    while ($zROWS1p2 = mysqli_fetch_assoc($greatSQL10p2)){
                        $greatchild10_Useridp2 = $zROWS1p2['userid']."<br>";
                    }
                    // / get great child 11
                    $greatSQL11p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild4_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 1,1");
                    while ($zROWS2p2 = mysqli_fetch_assoc($greatSQL11p2)){
                        $greatchild11_Useridp2 = $zROWS2p2['userid']."<br>";
                    }
                    // / get great child 12
                    $greatSQL12p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild4_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 2,1");
                    while ($zROWS3p2 = mysqli_fetch_assoc($greatSQL12p2)){
                        $greatchild12_Useridp2 = $zROWS3p2['userid']."<br>";
                    }
                    // / get great child 13
                    $greatSQL13p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild5_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 0,1");
                    while ($zROWS1p2 = mysqli_fetch_assoc($greatSQL13p2)){
                        $greatchild13_Useridp2 = $zROWS1p2['userid']."<br>";
                    }
                    // / get great child 14
                    $greatSQL14p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild5_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 1,1");
                    while ($zROWS2p2 = mysqli_fetch_assoc($greatSQL14p2)){
                        $greatchild14_Useridp2 = $zROWS2p2['userid']."<br>";
                    }
                    // / get great child 15
                    $greatSQL15p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild5_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 2,1");
                    while ($zROWS3p2 = mysqli_fetch_assoc($greatSQL15p2)){
                        $greatchild15_Useridp2 = $zROWS3p2['userid']."<br>";
                    }

                    // / get great child 16
                    $greatSQL16p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild6_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 0,1");
                    while ($zROWS1p2 = mysqli_fetch_assoc($greatSQL16p2)){
                        $greatchild16_Useridp2 = $zROWS1p2['userid']."<br>";
                    }
                    // / get great child 17
                    $greatSQL17p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild6_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 1,1");
                    while ($zROWS2p2 = mysqli_fetch_assoc($greatSQL17p2)){
                        $greatchild17_Useridp2 = $zROWS2p2['userid']."<br>";
                    }
                    // / get great child 18
                    $greatSQL18p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild6_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 2,1");
                    while ($zROWS3p2 = mysqli_fetch_assoc($greatSQL18p2)){
                        $greatchild18_Useridp2 = $zROWS3p2['userid']."<br>";
                    }

                    // / get great child 19
                    $greatSQL19p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild7_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 0,1");
                    while ($zROWS1p2 = mysqli_fetch_assoc($greatSQL19p2)){
                        $greatchild19_Useridp2 = $zROWS1p2['userid']."<br>";
                    }
                    // / get great child 20
                    $greatSQL20p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild7_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 1,1");
                    while ($zROWS2p2 = mysqli_fetch_assoc($greatSQL20p2)){
                        $greatchild20_Useridp2 = $zROWS2p2['userid']."<br>";
                    }
                    // / get great child 21
                    $greatSQL21p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild7_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 2,1");
                    while ($zROWS3p2 = mysqli_fetch_assoc($greatSQL21p2)){
                        $greatchild21_Useridp2 = $zROWS3p2['userid']."<br>";
                    }

                    // / get great child 22
                    $greatSQL22p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild8_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 0,1");
                    while ($zROWS1p2 = mysqli_fetch_assoc($greatSQL22p2)){
                        $greatchild22_Useridp2 = $zROWS1p2['userid']."<br>";
                    }
                    // / get great child 23
                    $greatSQL23p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild8_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 1,1");
                    while ($zROWS2p2 = mysqli_fetch_assoc($greatSQL23p2)){
                        $greatchild23_Useridp2 = $zROWS2p2['userid']."<br>";
                    }
                    // / get great child 24
                    $greatSQL24p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild8_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 2,1");
                    while ($zROWS3p2 = mysqli_fetch_assoc($greatSQL24p2)){
                        $greatchild24_Useridp2 = $zROWS3p2['userid']."<br>";
                    }

                    // / get great child 25
                    $greatSQL25p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild9_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 0,1");
                    while ($zROWS1p2 = mysqli_fetch_assoc($greatSQL25p2)){
                        $greatchild25_Useridp2 = $zROWS1p2['userid']."<br>";
                    }
                    // / get great child 26
                    $greatSQL26p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild9_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 1,1");
                    while ($zROWS2p2 = mysqli_fetch_assoc($greatSQL26p2)){
                        $greatchild26_Useridp2 = $zROWS2p2['userid']."<br>";
                    }
                    // / get great child 27
                    $greatSQL27p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$grandchild9_Useridp2' AND currentstage='Phase 2' order by userid ASC LIMIT 2,1");
                    while ($zROWS3p2 = mysqli_fetch_assoc($greatSQL27p2)){
                        $greatchild27_Useridp2 = $zROWS3p2['userid']."<br>";
                    }

                    // greatchild 1 DLs
                    $zSQLgreatchild1p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild1_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $greatchild1DLsp2 = mysqli_num_rows($zSQLgreatchild1p2);
                    // greatchild 2 DLs
                    $zSQLgreatchild2p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild2_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $greatchild2DLsp2 = mysqli_num_rows($zSQLgreatchild2p2);
                    // greatchild 3 DLs
                    $zSQLgreatchild3p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild3_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $greatchild3DLsp2 = mysqli_num_rows($zSQLgreatchild3p2);
                    // greatchild 4 DLs
                    $zSQLgreatchild4p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild4_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $greatchild4DLsp2 = mysqli_num_rows($zSQLgreatchild4p2);
                    // greatchild 5 DLs
                    $zSQLgreatchild5p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild5_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $greatchild5DLsp2 = mysqli_num_rows($zSQLgreatchild5p2);
                    // greatchild 6 DLs
                    $zSQLgreatchild6p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild6_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $greatchild6DLsp2 = mysqli_num_rows($zSQLgreatchild6p2);
                    // greatchild 7 DLs
                    $zSQLgreatchild7p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild7_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $greatchild7DLsp2 = mysqli_num_rows($zSQLgreatchild7p2);
                    // greatchild 8 DLs
                    $zSQLgreatchild8p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild8_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $greatchild8DLsp2 = mysqli_num_rows($zSQLgreatchild8p2);
                    // greatchild 9 DLs
                    $zSQLgreatchild9p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild9_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $greatchild9DLsp2 = mysqli_num_rows($zSQLgreatchild9p2);
                    // greatchild 10 DLs
                    $zSQLgreatchild10p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild10_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $greatchild10DLsp2 = mysqli_num_rows($zSQLgreatchild10p2);
                    // greatchild 11 DLs
                    $zSQLgreatchild11p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild11_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $greatchild11DLsp2 = mysqli_num_rows($zSQLgreatchild11p2);
                    // greatchild 12 DLs
                    $zSQLgreatchild12p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild12_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $greatchild12DLsp2 = mysqli_num_rows($zSQLgreatchild12p2);
                    // greatchild 13 DLs
                    $zSQLgreatchild13p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild13_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $greatchild13DLsp2 = mysqli_num_rows($zSQLgreatchild13p2);
                    // greatchild 14 DLs
                    $zSQLgreatchild14p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild14_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $greatchild14DLsp2 = mysqli_num_rows($zSQLgreatchild14p2);
                    // greatchild 15 DLs
                    $zSQLgreatchild15p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild15_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $greatchild15DLsp2 = mysqli_num_rows($zSQLgreatchild15p2);
                    // greatchild 16 DLs
                    $zSQLgreatchild16p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild16_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $greatchild16DLsp2 = mysqli_num_rows($zSQLgreatchild16p2);
                    // greatchild 17 DLs
                    $zSQLgreatchild17p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild17_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $greatchild17DLsp2 = mysqli_num_rows($zSQLgreatchild17p2);
                    // greatchild 18 DLs
                    $zSQLgreatchild18p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild18_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $greatchild18DLsp2 = mysqli_num_rows($zSQLgreatchild18p2);
                    // greatchild 19 DLs
                    $zSQLgreatchild19p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild19_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $greatchild19DLsp2 = mysqli_num_rows($zSQLgreatchild19p2);
                    // greatchild 20 DLs
                    $zSQLgreatchild20p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild20_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $greatchild20DLsp2 = mysqli_num_rows($zSQLgreatchild20p2);
                    // greatchild 21 DLs
                    $zSQLgreatchild21p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild21_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $greatchild21DLsp2 = mysqli_num_rows($zSQLgreatchild21p2);
                    // greatchild 22 DLs
                    $zSQLgreatchild22p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild22_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $greatchild22DLsp2 = mysqli_num_rows($zSQLgreatchild22p2);
                    // greatchild 23 DLs
                    $zSQLgreatchild23p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild23_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $greatchild23DLsp2 = mysqli_num_rows($zSQLgreatchild23p2);
                    // greatchild 24 DLs
                    $zSQLgreatchild24p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild24_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $greatchild24DLsp2 = mysqli_num_rows($zSQLgreatchild24p2);
                    // greatchild 25 DLs
                    $zSQLgreatchild25p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild25_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $greatchild25DLsp2 = mysqli_num_rows($zSQLgreatchild25p2);
                    // greatchild 26 DLs
                    $zSQLgreatchild26p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild26_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $greatchild26DLsp2 = mysqli_num_rows($zSQLgreatchild26p2);
                    // greatchild 27 DLs
                    $zSQLgreatchild27p2 = mysqli_query($con,"SELECT * FROM mlmmembers WHERE parentid='$greatchild27_Useridp2' AND currentstage='Phase 2' order by userid ASC");
                    $greatchild27DLsp2 = mysqli_num_rows($zSQLgreatchild27p2);

                    $user81_Downliners = $greatchild1DLsp2+$greatchild2DLsp2+$greatchild3DLsp2+$greatchild4DLsp2+$greatchild5DLsp2+$greatchild6DLsp2+$greatchild7DLsp2+$greatchild8DLsp2+$greatchild9DLsp2+$greatchild10DLsp2+$greatchild11DLsp2+$greatchild12DLsp2+$greatchild13DLsp2+$greatchild14DLsp2+$greatchild15DLsp2+$greatchild16DLsp2+$greatchild17DLsp2+$greatchild18DLsp2+$greatchild19DLsp2+$greatchild20DLsp2+$greatchild21DLsp2+$greatchild22DLsp2+$greatchild23DLsp2+$greatchild24DLsp2+$greatchild25DLsp2+$greatchild26DLsp2+$greatchild27DLsp2;


    // Phase 1 Downliners 
    $phase1_downliners = $user3Downliners+$user9Downliners+$user27Downliners+$user81Downliners;
    // Phase 2 Downliners 
    $phase2_downliners = $user3_Downliners+$user9_Downliners+$user27_Downliners+$user81_Downliners;
    // Phase 3 Downliners 
    #$phase3_downliners = $user3__Downliners+$user9__Downliners+$user27__Downliners+$user81__Downliners;
    $userTotalDownliners = $phase1_downliners + $phase2_downliners;

    // Phase 1 Potential Earnings 
    $phase1_Pontential_Earnings = $user3Downliners*10+$user9Downliners*7+$user27Downliners*4+$user81Downliners*1.30;
    // Phase 2 Potential Earnings 
    $phase2_Pontential_Earnings = $user3_Downliners*198+$user9_Downliners*62+$user27_Downliners*102+$user81_Downliners*68;
    // Phase 3 Potential Earnings 
   //$phase3_Pontential_Earnings = $user3__Downliners*3700+$user9__Downliners*3000+$user27__Downliners*2260+$user81__Downliners*2057;

   $userTotalPotentialsEarnings = $phase1_Pontential_Earnings + $phase2_Pontential_Earnings;



    function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
        $url = 'https://www.gravatar.com/avatar/';
        $url .= md5( strtolower( trim( $email ) ) );
        $url .= "?s=$s&d=$d&r=$r";
        if ( $img ) {
            $url = '<img src="' . $url . '"';
            foreach ( $atts as $key => $val )
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        return $url;
    }
    /*function mychildren($id){       

        global $array;
        $sql="SELECT * FROM mlmmembers WHERE parentid=$id ORDER BY userid ASC";
        $result=mysql_query($sql) or die(mysql_error());

        while($rows=mysql_fetch_assoc($result)){
            $array[]=$rows;
            $userid=$rows['userid'];
            mychildren($userid);
        }

        return $array;
    }*/



    function getExtension($str){
        $i=strpos($str,'.');
        if(!$i){
            return "";
        }
        $l=strlen($str)-$i;
        $ext=substr($str,$i+1,$l);
        return $ext;
    }


    function directmembers($profileid){
        $sql="SELECT * FROM mlmmembers WHERE sponsorid='$profileid'";
        $result=mysql_query($sql) or die(mysql_error());
        //if($result){
       return $count = mysql_num_rows($result);       
    }

    function referralbonus($sponsorid,$userid,$bonustype='Referral'){
        $sql="SELECT * FROM mlmmembers WHERE profileid='$sponsorid'";
        
        $result=mysql_query($sql) or die(mysql_error());
        if($result){ 
            $rows=mysql_fetch_array($result);
            $sponsoruserid=$rows['userid'];
            
            //$sql="SELECT * FROM mlmbonus WHERE bonustype='$bonustype";
            //$result
            $bonusamount=0;

            $transdescription='Referral bonus received on  ' .  getmember($userid);       
            
            $sql="INSERT INTO mlmmemberledger(userid, transdate,transdescription,creditamount,type) VALUES ($sponsoruserid,CURDATE(),'$transdescription',$bonusamount,'Referral Bonus')";
            $result=mysql_query($sql) or die(mysql_error());
            $transrefid=mysql_insert_id();

            //debit company ledger
            $debitamount=$bonusamount;
            $transdescription='Referral bonus paid to ' . getmember($sponsoruserid) . ' on ' . getmember($userid);
            $sql="INSERT INTO mlmledger(beneficiaryid,transdate, debitamount, transdescription, transrefid,type) VALUES ($sponsoruserid, CURDATE(), $debitamount, '$transdescription', $transrefid,'Referral Bonus')";
            $result=mysql_query($sql) or die(mysql_error());

        }
    }


    
    function memberwallet($userid){

        $sql="SELECT sum(creditamount) as credit, sum(debitamount) as debit FROM mlmmemberledger WHERE userid=$userid";

        $result = mysqli_query($sql);

        while ($row = mysqli_fetch_assoc($result))
        { 
           $credit = $row['credit'];
           $debit = $row['debit'];
           return number_format(($credit-$debit),2);
        }

                
    }

    // function totalsales(){
        $sqlTotsal= mysqli_query($con,"SELECT SUM(creditamount) as balance FROM mlmledger WHERE type='Sales'");
        
        if($sqlTotsal){
            $rows=mysqli_fetch_assoc($sqlTotsal);
            $totalsales = $rows['balance'];
            if ($totalsales=="") {
                # code...
                $totalsales= "0";
            }
        }else{
            $totalsales = "0";
        }
                
    // }

    function totaldebit($userid){
        $sql="SELECT SUM(debitamount) as balance FROM mlmmemberledger WHERE userid=$userid";
        $result=mysql_query($sql) or die(mysql_error());
        
        if($result){
            $rows=mysql_fetch_array($result);
            return $rows[0];
        }else{
            return 0;
        }
                
    }

    function totalreceived($userid){
        $sql="SELECT SUM(creditamount) as balance FROM mlmmemberledger WHERE userid=$userid AND type='Received'";
        $result=mysql_query($sql) or die(mysql_error());
        
        if($result){
            $rows=mysql_fetch_array($result);
            return $rows[0];
        }else{
            return 0;
        }
                
    }
    

    function gettickets($recipientemail){
        $sql="SELECT * FROM mlmtickets WHERE recipientemail='$recipientemail'";
        $result=mysql_query($sql) or die(mysql_error());
        $count=mysql_num_rows($result);
        return $count;
    }
    
    function getpinbalance($username){
        $sql="SELECT * FROM mlmepins WHERE createdby='$username' AND status='NOT USED'";
        $result=mysql_query($sql) or die(mysql_error());
        $no=mysql_num_rows($result);
        return $no;        
    }

     function countknight($id){

        global $count,$members;
        //$counter=array();
        //$siblinguserid=$id;
        $sqlrook="SELECT * FROM mlmmembers WHERE userid=$id AND currentstage = 'Knight Star'";
        $resultrook=mysql_query($sqlrook) or die(mysql_error());
        $count+=mysql_num_rows($resultrook);

        //echo getmember($id) . ": " . currentstage($id) . "</br>";

        $members[]=$id;
        

        while($rowsrook=mysql_fetch_array($resultrook)){
            $parentuserid=getparentuserid($id);
            $uid=$rowsrook['userid'];
            $id2=findsibling($parentuserid,$uid);
            //echo getmember($id2) . ": " . currentstage($id2) ."</br>";
            $sql2="SELECT * FROM mlmmembers WHERE userid=$id2 AND currentstage = 'Knight Star'";
            $result2=mysql_query($sql2) or die(mysql_error());

            $count+=mysql_num_rows($result2);
            $members[]=$id2;

            $sql3="SELECT * FROM mlmmembers WHERE parentid=$id2";
            $result3=mysql_query($sql3) or die(mysql_error());

            if($result3){
                while($rows3=mysql_fetch_array($result3)){
                    $userid3=$rows3['userid'];
                    //echo getmember($userid3) . ": " . currentstage($userid3) . "</br>";
                    $sql4="SELECT * FROM mlmmembers WHERE userid=$userid3 AND currentstage='Knight Star'";
                    //$currentstage=currentstage($userid3);
                    //if($currentstage='Rook Star'){
                    //    $count++;
                    //}
                    $result4=mysql_query($sql4) or die(mysql_error());

                    if(mysql_num_rows($result4)==1){
                         $count++;
                         $members[]=$userid3;
                    }
                }
            }
        
            
            $id=$rowsrook['parentid'];
            countknight($id);
        }

        sort($members);
        $memberid=$members[1];
        //if($count==14){
            $counter[0]=$count;
            $counter[1]=$memberid;
        //}

        //echo "<pre>";
            //print_r($members);
        //echo "</pre>";
        return $counter;
    }

    function findsibling($parentid,$siblinguserid){
        $sql1="SELECT * FROM mlmmembers WHERE parentid=$parentid AND userid <> $siblinguserid";
        $result1=mysql_query($sql1) or die(mysql_error());
        if($result1){
            $rows=mysql_fetch_array($result1);
            return $rows['userid'];
        }

    }
    function countqueen($id){

        global $count;
        $sql="SELECT * FROM mlmmembers WHERE parentid=$id AND currentstage='Queen Star'";
        $result=mysql_query($sql) or die(mysql_error());
        $count+=mysql_num_rows($result);

        while($rows=mysql_fetch_array($result)){
            $id=$rows['userid'];
            countqueen($id);
        }

        return $count;
    }

        
   

    

    

    

    

    function mychildren($id){       

        global $array;
        $sql="SELECT userid, username, profileid, passport, currentstage, l_member, r_member, firstname, lastname, emailaddress, parentid FROM mlmmembers WHERE parentid=$id";
        $result=mysql_query($sql) or die(mysql_error());

        while($rows=mysql_fetch_assoc($result)){
            $array[]=$rows;
            $userid=$rows['userid'];
            mychildren($userid);
        }
        return $array;       
    }

    function mychildren2($id){       

        global $array;
        $sql="SELECT * FROM mlmmembers WHERE userid=$id ORDER BY userid ASC";
        $result=mysql_query($sql) or die(mysql_error());

        while($rows=mysql_fetch_assoc($result)){
            $array[]=$rows;
            $userid=$rows['userid'];
            mychildren2($userid);
        }
        return $array; 
    }

    function setparentid_new($profileid,$userid){
        
        $sponsoruserid=getuserid($profileid);
        $newuserid=$userid;

        $sql="SELECT * FROM mlmmembers WHERE parentid=$sponsoruserid";
        

        $result=mysql_query($sql) or die(mysql_error());
        $count=mysql_num_rows($result);
        //echo "sponsoruserid= " . $sponsoruserid . " and No. of record: " . $count . "<br/>";

        if($count==3){                        
            //while ($rows=mysql_fetch_array($result)) {                    
            //    $profileid=$rows['profileid'];
            //   setparentid_old($profileid,$userid);              
            //}
            $mynewarray=array();
            $mynewarray=mychildren($sponsoruserid);
            foreach ($mynewarray as $key => $row)
            {
                $array_depth[$key] = $row['depth'];
                $array_userid[$key] = $row['userid'];
            }
            array_multisort($array_depth, SORT_ASC, $array_depth, SORT_ASC, $mynewarray); 
            //echo "<pre>";
            //print_r($mynewarray)   ;
            //echo "</pre>";
            foreach ($mynewarray as $key => $row) {
                $count=0;            
                $childuserid=$row['userid'];
                $sql="SELECT * FROM mlmmembers WHERE parentid=$childuserid";
                $result=mysql_query($sql) or die(mysql_error());
                $count=mysql_num_rows($result);
                if($count<3){
                    $sql="UPDATE mlmmembers SET parentid=$childuserid WHERE userid=$newuserid";
                    $rst=mysql_query($sql) or die(mysql_error());
                    $parentid=$childuserid;
                    break;
                }

            }
        }else{
            $parentid=$sponsoruserid;
            $sqlupdate="UPDATE mlmmembers SET parentid='$parentid' WHERE userid=" . $newuserid;

            $rstUpdate=mysql_query($sqlupdate) or die(mysql_error()); 
            $parentid=$sponsoruserid;           
        } 

        //set dept
        $depth=depth($newuserid);
        $sql="UPDATE mlmmembers SET depth=$depth WHERE userid=$newuserid";
        $result=mysql_query($sql) or die(mysql_error());;
        unset($depth);

        //update leg valuesd
        //$parentid=$parentid;
        $sql="SELECT * FROM mlmmembers WHERE parentid=$parentid";
        $result=mysql_query($sql) or die(mysql_error());
        $count=mysql_num_rows($result);

        if($count==1){
            $sqlupdate="UPDATE mlmmembers SET l_member=1 WHERE userid=$newuserid";
        }elseif($count==2){
            $sqlupdate="UPDATE mlmmembers SET r_member=1 WHERE userid=$newuserid";
        }
        
        $rstUpdate=mysql_query($sqlupdate) or die(mysql_error());
             
        $sql20="SELECT parentid FROM mlmmembers WHERE userid=$newuserid";
        $result20=mysql_query($sql20) or die(mysql_error());
        $rows20=mysql_fetch_array($result20);
        return $rows20['parentid']; 
    }

    function depth($userid){
        global $d; 
        $sql="SELECT * FROM mlmmembers WHERE userid=$userid";
        $result=mysql_query($sql) or die(mysql_error());

        if($result && mysql_num_rows($result)>0){
            
            while($rows=mysql_fetch_array($result)){
                $d++;
                $parentid=$rows['parentid'];
                depth($parentid);
            }
        }

        return $d;      

    }
    function setparentid_old($profileid,$userid){
        
        $sponsoruserid=getuserid($profileid);
        $userid=$userid;

        $sql="SELECT * FROM mlmmembers WHERE parentid=$sponsoruserid";

        $result=mysql_query($sql) or die(mysql_error());
        $count=mysql_num_rows($result);
        //echo "sponsoruserid= " . $sponsoruserid . " and No. of record: " . $count . "<br/>";

        if($count==2){                        
            while ($rows=mysql_fetch_array($result)) {                    
                $profileid=$rows['profileid'];
                setparentid_old($profileid,$userid);              
            }
        }else{
            $parentid=$sponsoruserid;
            $sqlupdate="UPDATE mlmmembers SET parentid='$parentid' WHERE userid=" . $userid;

            $rstUpdate=mysql_query($sqlupdate) or die(mysql_error());            
        } 

        //update leg valuesd

            //die('Stopped by  user');
        $parentid2=$sponsoruserid;
        $sql="SELECT * FROM mlmmembers WHERE parentid=$parentid2";
        $result=mysql_query($sql) or die(mysql_error());
        $count=mysql_num_rows($result);

        if($count==1){
            $sqlupdate="UPDATE mlmmembers SET l_member=1 WHERE userid=$userid";
        }elseif($count==2){
            $sqlupdate="UPDATE mlmmembers SET r_member=1 WHERE userid=$userid";
        }
        
        $rstUpdate=mysql_query($sqlupdate) or die(mysql_error());

        //computermatrixbonus
        //return $parentid2;      
        $sql20="SELECT parentid FROM mlmmembers WHERE userid=$userid";
        $result20=mysql_query($sql20) or die(mysql_error());
        $rows20=mysql_fetch_array($result20);
        return $rows20['parentid']; 
    }

    function get_all_children($parentid,$grand_child=false){
        $child_result=mysql_query("SELECT * FROM mlmmembers WHERE parentid=".$parentid);

        if(mysql_num_rows($child_result)>0){
            ?>
                <ul>
                    <?php
                        while($rows=mysql_fetch_array($child_result)){
                            ?>
                            <li class="collapsed"><?php echo $rows['username'];?>
                            <?php get_all_children($rows['userid'],true);?> 
                        </li>
                        <?php
                        }
                    ?>
                </ul>
            <?php
        }
    }

    function registrationcalculation($userid,$bonustype='Welcome'){
        
        $sql="SELECT * FROM mlmmembers WHERE userid=$userid";
        $result=mysql_query($sql) or die(mysql_error());
        $count=mysql_num_rows($result);
        if($result){
            $rows=mysql_fetch_array($result);
            $currentstage=$rows['currentstage'];
            $profileid=$rows['profileid'];
            $sponsorid=$rows['sponsorid'];

            $sql="SELECT * FROM mlmbonus WHERE bonustype='$bonustype'";
            $res=mysql_query($sql) or die(mysql_error());
            $rows=mysql_fetch_array($res);
            
            if($currentstage == "Lily"){
                $bonusamount = 0;
            }elseif($currentstage == "Rose"){
                $bonusamount = 1400;
            }elseif($currentstage == "Petunia"){
                $bonusamount = 3400;
            }elseif($currentstage == "Daisy"){
                $bonusamount = 8200;
            }elseif($currentstage == "Heather"){
                $bonusamount = 16000;
            }elseif($currentstage == "Azalea"){
                $bonusamount = 44000;
            }elseif($currentstage == "Begonia"){
                $bonusamount = 320000;
            }elseif($currentstage == "Carnation"){
                $bonusamount = 2200000;
            }elseif($currentstage == "Infinity"){
                $bonusamount = 20700000;
            }else{
                $bonusamount = 0;   
            }
            
            
            
            
            
           // if(!empty($rows['bonusamount'])){
            //    $bonusamount=$rows['bonusamount'];
           // }

            $transdescription='Membership Welcome bonus';
            $sql="INSERT INTO mlmmemberledger(userid,transdate, creditamount, transdescription,type) VALUES ($userid,CURDATE(),$bonusamount,'$transdescription','Bonus')";
            $result=mysql_query($sql) or die(mysql_error() . " - " . mysql_errno());
            $transrefid=mysql_insert_id();

            $debitamount=$bonusamount;
            $transdescription='Welcome bonus paid to ' . getmember($userid);
            $sql="INSERT INTO mlmledger(beneficiaryid,transdate, debitamount, transdescription, transrefid,type) VALUES ($userid, CURDATE(), $debitamount, '$transdescription', $transrefid,'Bonus')";
            $result=mysql_query($sql) or die(mysql_error());

            //credit company ledger
            $creditamount=300;
            $transdescription='Membership registration fees for ' . getmember($userid);
            $sql="INSERT INTO mlmledger(beneficiaryid,transdate, creditamount, transdescription, transrefid,type) VALUES ($userid, CURDATE(), $creditamount, '$transdescription', $transrefid,'Registration')";
            $result=mysql_query($sql) or die(mysql_error());
        }
    }

    function downlinemembers2($userid){
        global $count;
        $sql="SELECT * FROM mlmmembers WHERE parentid=$userid";
        $result=mysql_query($sql) or die(mysql_error());        
                
        $count=+mysql_num_rows($result);
        while($rows=mysql_fetch_array($result)){ 
            //$count+=1;     
            $id=$rows['userid'];                   
            //downlinemembers($rows['userid']);
            $sql="SELECT * FROM mlmmembers WHERE parentid=$userid";
            $result=mysql_query($sql) or die(mysql_error());        
                    
            $count=+mysql_num_rows($result);

        }
        return $count;
    }

    function countall($id){
        global $count;
        $sql="SELECT * FROM mlmmembers WHERE parentid=$id";
        $result=mysql_query($sql) or die(mysql_error());
        $count+=mysql_num_rows($result);

        while($rows=mysql_fetch_array($result)){
            $id=$rows['userid'];
            countall($id);
        }

        return $count;
    }

    function getparentid($profileid){
        $sql="SELECT * FROM mlmmembers WHERE profileid='$profileid'";
        $result=mysql_query($sql) or die(mysql_error());

        if($result){
            $rows=mysql_fetch_array($result);
            return $rows['parentid'];
        }
    }

    function getparentuserid($userid){
        $sql="SELECT * FROM mlmmembers WHERE userid='$userid'";
        $result=mysql_query($sql) or die(mysql_error());

        if($result){
            $rows=mysql_fetch_array($result);
            return $rows['parentid'];
        }
    }

    function getuserid($profileid){
        $sql="SELECT * FROM mlmmembers WHERE profileid='$profileid'";
        $result=mysql_query($sql) or die(mysql_error());

        if($result){
            $rows=mysql_fetch_array($result);
            return $rows['userid'];
        }
    }

    function setparentid3($parentid,$userid){
        $sql="SELECT * FROM mlmmembers WHERE parentid=$parentid";
        $child_result=mysql_query($sql) or die(mysql_error());      

        if(mysql_num_rows($child_result)<2){
            $rows=mysql_fetch_array($child_result);
            $myuserid=$rows['userid'];
            return $parentid=$myuserid;            
        }else{
            $sql="SELECT * mlmmembers WHERE parentid=$parentid";
            $result=mysql_query($sql) or die(mysql_error());
            while($rows=mysql_fetch_array($result)){
                
                setparentid3($rows['userid'],$userid);
            }
        }

        /*$sqlupdate="UPDATE mlmmembers SET parentid='$parentid' WHERE userid=" . $userid;
        $rstUpdate=mysql_query($sqlupdate) or die(mysql_error());*/
    }

    function setsponsorid($sponsorid,$userid){
        $sql="UPDATE mlmmembers SET sponsorid='$sponsorid' WHERE userid=$userid";
        $result=mysql_query($sql) or die(mysql_error());
   
    }

    function leftcount($id)   //Function to calculate all left children count
    {
        $sql = "SELECT userid,username,sponsoridid,parentid,l_member,r_member FROM mlmmembers WHERE userid = '$id'";
        $execsql = mysql_query($sql);
        $array = mysql_fetch_array($execsql);
        (array_count_values($array));
        $count = 0;
        if(!empty($array['l_member']))
        {
            $count += allcount($array['l_member']) +1;
        }
        return $count;
    }
    function rightcount($id)   //Function to calculate all right children count
    {
        $sql = "SELECT userid,username,sponsoridid,parentid,l_member,r_member FROM mlmmembers WHERE userid = '$id'";
        $execsql = mysql_query($sql);
        $array = mysql_fetch_array($execsql);
        (array_count_values($array));
        $count = 0;
        if(!empty($array['r_member']))
        {
            $count += allcount($array['r_member']) +1;
        }
        return $count;
    }

    function allcount($id)   //Function to calculate all children count
    {
        $sql = "SELECT userid,username,sponsoridid,parentid,l_member,r_member FROM mlmmembers WHERE userid = '$id'";
        $execsql = mysql_query($sql);
        $array = mysql_fetch_array($execsql);
        (array_count_values($array));
        $count = 0;
        if(!empty($array['l_member']))
        {
            $count += allcount($array['l_member']) +1;
        }
        if(!empty($array['r_member']))
        {
            $count += allcount($array['r_member']) +1;
        }
        return $count;
    }

    function sendmail2 ($to,$msg,$subject){        
        require_once "Mail.php";
        $from = $sitemail;
        $to = $to;
        $subject = $subject;
        $body = $msg;

        $headers = array(
            'From' => $from,
            'To' => $to,
            'Subject' => $subject
        );

        $smtp = Mail::factory('smtp', array(
                'host' => 'rs12.cphost.co.za"',
                'port' => '465',
                'auth' => true,
                'username' => $sitemail,
                'password' => 'Global!!!!'
            ));

        $mail = $smtp->send($to, $headers, $body);

       if (PEAR::isError($mail)) {
            return 0;
            //echo('<p>' . $mail->getMessage() . '</p>');
        } else {
            return 1;
            //echo "<p>" . $statusmsg . "</p>";
        }
    }

    function sendmail ($to,$msg,$subject,$statusmsg='Your message has successfully been sent'){        
        require_once "Mail.php";
        $from = $sitemail;
        $to = $to;
        $subject = $subject;
        $body = $msg;

        $headers = array(
            'From' => $from,
            'To' => $to,
            'Subject' => $subject
        );

        $smtp = Mail::factory('smtp', array(
                'host' => 'rs12.cphost.co.za"',
                'port' => '465',
                'auth' => true,
                'username' => $sitemail,
                'password' => 'Global!!!!'
            ));

        $mail = $smtp->send($to, $headers, $body);

       if (PEAR::isError($mail)) {
            //return 0;
            echo('<p>' . $mail->getMessage() . '</p>');
        } else {
            //return 1;
            echo "<p>" . $statusmsg . "</p>";
        }
    }

    

    function getchildren($id){
        global $string;
        $sql="SELECT * FROM mlmmembers WHERE parentid=$id";
        $result=mysql_query($sql) or die(mysql_error());
        $count=mysql_num_rows($result);

        if($count<2){
            $string.="<option value='" . $id . "'><" . $id . "</option>";
        }

        while($rows=mysql_fetch_array($result)){
            $id=$rows['userid'];
            getchildren($id);
        }

        echo $string;
    }

    function totalmembers(){
        $sql="SELECT * FROM mlmmembers";
        $result=mysql_query($sql) or die(mysql_error());
        return mysql_num_rows(($result));
    }

    // function registrationincome (){
        $sqlRegInc= mysqli_query($con,"SELECT SUM(creditamount) as registration FROM mlmledger WHERE type='Registration'");
        
        if($sqlRegInc){
            $rows=mysqli_fetch_assoc($sqlRegInc);
            $registrationIncome =number_format($rows['registration'],2);
        }else{
            $registrationIncome = "0";
        }
    // }

        // $sqlCredWit= mysqli_query($con,"SELECT SUM(creditamount) as credit FROM mlmmemberledger WHERE userid=$userid AND status='Withdrawn'");        
        //     if($sqlCredWit){
        //         $rows=mysqli_fetch_assoc($sqlCredWit);
        //         $UserTotalWithdrawals=$rows['credit'];       
        //     }


    function unusedepins(){
        $sql="SELECT * FROM mlmepins WHERE status='NOT USED'";
        $result=mysql_query($sql) or die(mysql_error());

        if($result){
            return mysql_num_rows($result);
        }else{
            return 0;
        }
    }
    function memberunusedepins(){
        $sql="SELECT * FROM mlmepins WHERE createdby='$username' AND status='NOT USED'";
        $result=mysql_query($sql) or die(mysql_error());

        if($result){
            return mysql_num_rows($result);
        }else{
            return 0;
        }
    }
    function transfers(){
        $sql="SELECT * FROM mlmmemberledger WHERE userid='$userid' AND type='Transfer'";
        $result=mysql_query($sql) or die(mysql_error());

        if($result){
            return mysql_num_rows($result);
        }else{
            return 0;
        }
    }

    function matrixbonuspaid(){
        $sql="SELECT SUM(creditamount) as matrixbonuspaid FROM mlmmemberledger WHERE type='Matrix Bonus'";
        $result=mysql_query($sql) or die(mysql_error());
        
        if($result){
            $rows=mysql_fetch_array($result);
            return $rows[0];
        }else{
            return 0;
        }
                
    }

    function stepoutbonuspaid(){
        $sql="SELECT SUM(creditamount) as stepoutbonuspaid FROM mlmmemberledger WHERE type='StepOut Bonus'";
        $result=mysql_query($sql) or die(mysql_error());
        
        if($result){
            $rows=mysql_fetch_array($result);
            return $rows[0];
        }else{
            return 0;
        }
                
    }
   
   function referralbonuspaid(){
        $sql="SELECT SUM(creditamount) as referralbonuspaid FROM mlmmemberledger WHERE type='Referral Bonus'";
        $result=mysql_query($sql) or die(mysql_error());
        
        if($result){
            $rows=mysql_fetch_array($result);
            return $rows[0];
        }else{
            return 0;
        }
                
    }

    function welcomebonuspaid(){
        $sql="SELECT SUM(creditamount) as welcomebonuspaid FROM mlmmemberledger WHERE type='Bonus'";
        $result=mysql_query($sql) or die(mysql_error());
        
        if($result){
            $rows=mysql_fetch_array($result);
            return $rows[0];
        }else{
            return 0;
        }
                
    }

    // function profit(){

        $sqlcompInc= mysqli_query($con,"SELECT SUM(creditamount) registration FROM mlmledger");
        
        if($sqlcompInc){
            $rows=mysqli_fetch_assoc($sqlcompInc);
             $companyIncome= $rows['registration'];
        }else{
            $companyIncome= 0;
        }

        $sqlCoProf=mysqli_query($con,"SELECT SUM(creditamount) credit FROM mlmmemberledger");
        
        if($sqlCoProf){
            $rows2=mysqli_fetch_assoc($sqlCoProf);
            $companyPayout=$rows2['credit'];
        }else{
            $companyPayout=0;
        }
        $companyProfit=$companyIncome-$companyPayout;
                
    // }

    function unreadmails(){
        $sql="SELECT * FROM mlmtickets WHERE status !='Read'";
        $result=mysql_query($sql) or die(mysql_error());

        if($result){
            echo mysql_num_rows($result);
        }
    }

    function newwithdrawals(){
        $sql="SELECT * FROM mlmmemberledger WHERE type='Withdrawal' AND status ='PENDING'";
         //$sql="SELECT SUM(debitamount) as credit FROM mlmmemberledger WHERE type='Withdrawal' AND status ='PENDING'";
        $result=mysql_query($sql) or die(mysql_error());

        if($result){
            echo mysql_num_rows($result);
        }
    }
    function newwithdrawalamount(){
        // $sql="SELECT SUM(creditamount) as balance FROM mlmmemberledger WHERE status ='Pending'";
        $transde="Withdrawal from e-Wallet";
        $sql="SELECT SUM(debitamount) as newwithdrawalamount FROM mlmmemberledger WHERE type='Withdrawal' AND status ='Pending'";
        $result=mysql_query($sql) or die(mysql_error());
        
        if($result){
            $rows=mysql_fetch_array($result);
            return $rows[0];
        }else{
            return 0;
        }
    }


    function memberemail($profileid){
        $sql="SELECT * FROM mlmmembers WHERE profileid='$profileid'";
        $result=mysql_query($sql) or die(mysql_error());

        $rows=mysql_fetch_assoc($result);
        echo $rows['emailaddress'];
    }
?>