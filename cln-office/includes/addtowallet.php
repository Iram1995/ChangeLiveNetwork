<div class="col" style="padding: 0 10px">
  <div style="background: royalblue;" class="creditdebit">
      <p style="margin: 0;color: #fff;font-weight: bold; text-align: center;font-size: 1.5em;"><?php echo $name;?></p>
      <span  style="font-weight: bold; color: #fff; text-align: center;font-size: 1em;width: 100%;"><p style="margin: 0; padding: 10px;"> Wallet Balance: <?php echo memberwallet($id);?></p></span>
      <p style="margin: 0;color: #fff;font-weight: bold; text-align: center;font-size: 1.5em;">Add to Member Wallet </p>
  </div>
  <form class="registrationform" style="margin-top: 0;" id="addtowallet" method="post">
      <div class="control-group">
        <input type="hidden" name="memberid" value="<?php echo $id;?>">
          <div class="control double">
              <p>Member ID</p>
              <input type="text" name="profileid" value="<?php echo $memberid;?>" disabled>
          </div>
      </div>

      <div class="control-group">
          <div class="control double">
              <p>Amount <span class='errors'><?php echo $addamountErr;?></span></p>
              <input type="text" name="addamount" value="<?php echo $addamount;?>" placeholder="Enter Amount to Add">
          </div>
      </div>
      <div class="control-group">
          <div class="control double">
              <p>Description <span class='errors'><?php echo $adddescriptionErr;?></span></p>
              <textarea name="adddescription"><?php echo $adddescription;?></textarea>
          </div>
      </div>
      <div class="control-group">
          <div class="control double">
              <input type="submit" name="submit" value="Add to Wallet">
          </div>
      </div>
      <p id="addstatus" style="color: green; text-align: center;font-weight: normal;"><?php echo $addStatus;?></p>
  </form>
</div>