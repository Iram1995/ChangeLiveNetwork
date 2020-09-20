<form class="registrationform" method="post" action="/admin/?section=approvewithdrawal">
    <!--<div class="control-group">-->
    <!--    <div class="control">-->
    <!--        <p>Transaction ID</p>-->
    <!--        <input type="text" name="transid" value="<?php echo $transid;?>" readonly>-->
    <!--    </div>-->
    <!--    <div class="control">-->
    <!--        <p>Transaction Date</p>-->
    <!--        <input type="text" name="transdate" value="<?php echo $rows['transdate'];?>" readonly>-->
    <!--    </div>-->
    <!--</div>-->
    <div class="control-group">
        <div class="control">
            <p>Amount Requested</p>
            <input type="text" name="amount" value="<?php echo $rows['debitamount'];?>" readonly>
        </div>
        <div class="control">
            <p>Transaction Date</p>
            <input type="text" name="transdate" value="<?php echo $rows['transdate'];?>" readonly>
        </div>
        <!--<div class="control">-->
        <!--    <p>Transaction Description</p>-->
        <!--    <input type="text" name="transdescription" value="<?php echo $rows['transdescription'];?>" readonly>-->
        <!--</div>-->
    </div>
    <h1 class="sectionhead">Member Details</h1>
    <div class="control-group">
        <div class="control">
            <p>Full Name</p>
            <input type="text" name="fullname" value="<?php echo $rows['firstname'] . ", ". $rows['lastname'];?>" readonly>
        </div>
        <div class="control">
            <p>User Name</p>
            <input type="text" name="username" value="<?php echo $rows['username'];?>" readonly>
        </div>
    </div>

    <!--<div class="control-group">-->
    <!--    <div class="control double">-->
    <!--        <p>Full Name</p>-->
    <!--        <input type="text" name="fullname" value="<?php echo $rows['firstname'] . ", ". $rows['lastname'];?>" readonly>-->
    <!--    </div>                        -->
    <!--</div>-->
    <h1 class="sectionhead">Account Information</h1>
    <div class="control-group">
        <div class="control">
            <p>Account Name</p>
            <input type="text" name="accountname" value="<?php echo $rows['accountname'];?>" readonly>
        </div>
        <div class="control">
            <p>Account No</p>
            <input type="text" name="accountno" value="<?php echo $rows['accountno'];?>" readonly>
        </div>
    </div>
    <div class="control-group">
        <div class="control">
            <p>Bank Name:</p>
            <input type="text" name="bankname" value="<?php echo $rows['bankname'];?>" readonly>
        </div>
        <div class="control">
            <p>Branch Code: </p>
            <input type="text" name="bankswiftcode" value="<?php echo $rows['bankswiftcode'];?>" readonly>
        </div>
    </div>

    <div class="control-group">
        <div class="control double">
            <input type="submit" name="submit" value="Approve">
        </div>
    </div>
</form>