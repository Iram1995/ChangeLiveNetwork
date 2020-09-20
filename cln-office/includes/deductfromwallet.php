<div class="col" style="padding: 0 10px">
  <div style="background: red;" class="creditdebit">
      <p style="margin: 0;color: #fff;font-weight: bold; text-align: center;font-size: 1.5em;"><?php echo $name;?></p>
      <span  style="font-weight: bold; color: #fff; text-align: center;font-size: 1em;width: 100%;"><p style="margin: 0; padding: 10px;"> Wallet Balance: <?php echo memberwallet($id);?></p></span>
      <p style="margin: 0;color: #fff;font-weight: bold; text-align: center;font-size: 1.5em;">Deduct From Member Wallet </p>
  </div>
  <form class="registrationform" style="margin-top: 0;" id="deductfromwallet" method="post">
      <div class="control-group">
        <input type="hidden" name="memberid" value="<?php echo $id;?>">
          <div class="control double">
              <p>Member ID</p>
              <input type="text" name="profileid" value="<?php echo $memberid;?>" disabled>
          </div>
      </div>

      <div class="control-group">
          <div class="control double">
              <p>Amount <span class='errors'><?php echo $deductamountErr;?></span></p>
              <input type="text" name="deductamount" value="<?php echo($deductamount);?>" placeholder="Enter Amount to Deduct" class="amount">
          </div>
      </div>
      <div class="control-group">
          <div class="control double">
              <p>Description <span class='errors'><?php echo $deductdescriptionErr;?></span></p>
              <textarea name="deductdescription"><?php echo $deductdescription;?></textarea>
          </div>
      </div>
      <div class="control-group">
          <div class="control double">
              <input type="submit" name="submit" value="Deduct from Wallet">
          </div>
      </div>
      <p id="deductstatus" style="color: green; text-align: center;font-weight: normal;"><?php echo $deductStatus;?></p>
  </form>
</div>