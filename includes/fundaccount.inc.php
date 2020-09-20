<div class="registrationform" style="border: none;">
    <h3>If you haven't paid yet, please choose your payment method to pay.</h3>
    <a target="_blank" href="/capitecdetails.png"><img src="https://media.licdn.com/dms/image/C560BAQGyocX6YiiMQg/company-logo_200_200/0?e=2159024400&v=beta&t=T9GhW0M2MLHK7Z8X0Cg4j3sW60o7CysKQgK8g3-3zeY"/></a>
    <a target="_blank" href="https://www.paypal.me/globalbusinessfund"><img src="/paypal.png"/></a>
    <a target="_blank" href="/fnbdetails.png"><img src="https://www.fnb.co.za/03images/logo.png"/></a>
    <form method="post" action="/?section=fundaccount" enctype="multipart/form-data">
        <h1 class="sectionhead" style="margin-top: 0">Payment Information</h1>
        <div class="control-group">
            <div class="control">
                <p>Reference  <span class="errors"><?php echo $tellernoErr;?></span></p>
                <input type="text" name="tellerno" value="<?php echo($tellerno);?>">
            </div>
            <div class="control">
                <p>Date <span class="errors"><?php echo $tellerdateErr;?></span></p>
                <input type="date" name="tellerdate" value="<?php echo($tellerdate);?>">
            </div>
        </div>
        <div class="control-group">
            <div class="control">
                <p>Amount<span class="errors"><?php echo $telleramountErr;?></span></p>
                <input type="text" name="telleramount" value="<?php echo($telleramount);?>">
            </div>
            
        </div>
        <h1 class="sectionhead">Payer's Details</h1>
        <div class="control-group">
            <div class="control">
                <p>Name <span class="errors"><?php echo $depositornameErr;?></span></p>
                <input type="text" name="depositorname" value="<?php echo($depositorname);?>">
            </div>
            <div class="control">
                <p>Phone Number <span class="errors"><?php echo $phonenumberErr;?></span></p>
                <input type="text" name="phoneno" value="<?php echo($phoneno);?>">
            </div>
        </div>
        <h1 class="sectionhead">Payment Mode</h1>
        <div class="control-group">
            <div class="control">
                <p>Mode of Payment <span class="errors"><?php echo $modeofpaymentErr;?></span></p>
                <select name="modeofpayment">
                    <option>Select Mode of Payment</option>
                    <option>ATM deposit</option>
                    <option>Mobile Transfer</option>
                    <option>Internet Banking</option>
                    <option>Bank Deposit</option>
                </select>
            </div>
            <div class="control">
                <p>Attach Proof<span class="errors"><?php echo $proofpaymentErr;?></span></p>
                <input type="file" name="file">
            </div>
        </div>
        <div class="control-group">
            <div class="control">
                
                <input type="submit" name="submit" value="Submit">
            </div>
        </div>
    </form>
</div>
