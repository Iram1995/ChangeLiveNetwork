<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0" >
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image" style=" background: url('https://www.topratedlinks.com/wp-content/uploads/2018/03/Top-Tips-To-Build-Your-Health-and-Wellness-MLM-Business.jpg')no-repeat center;"></div>
          <div class="col-lg-7" style="background: #ffffff;"> 
            <div class="p-5">
                  <div class="text-center">
                        <img src="/changelivesnetwork_white.png" style="width:150px;">
                        <h1 class="h4 text-gray-900 mb-4" style="font-size: 18px;">New account registration</h1>
                  </div>
                  <div class="status"><?php echo $errMsg;?></div>
              <form class="user" id="register" method="post" action="register.php">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="firstname" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name" required="">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="lastname" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name" required="">
                  </div>
                </div>
                <div class="form-group">
                  <span class="errors" id="emailErr"><?php echo $emailErr;?></span>
                  <input type="email" name="emailaddress" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" required="">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <span class="errors" id="usernameErr"><?php echo $usernameErr;?></span>
                    <input type="text" name="username" class="form-control form-control-user" id="exampleFirstName" placeholder="Username" required="">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="phone" class="form-control form-control-user" id="exampleLastName" placeholder="Phone" required="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                         <span class="errors" id="passwordErr"><?php echo $passwordErr;?></span>
                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required="">
                  </div>
                  <div class="col-sm-6">
                         <span class="errors" id="confirmpasswordErr"><?php echo $confirmpasswordErr;?></span>
                    <input type="password" name="confirmpassword" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" required="">
                  </div>
                  <div class="form-group">
                        <?php
                       $readonly = "";
                      if(isset($_REQUEST["id"])){
                          $readonly = "readonly='readonly'";
                       $sponsorid = $_REQUEST["id"];
                      }?>
                        <span class="errors" id="sponsoridErr"><?php echo $sponsoridErr;?></span>
                        <input type="text" name="sponsorid" id="sponsorid" class='sponsorid form-control form-control-user' <?php echo $readonly; ?>placeholder="Enter Sponsor ID" value="<?php echo $sponsorid;?>">
                  </div>

                  <div class="form-group">
                        <?php if(!isset($_REQUEST["id"])){?>
                        <input type="checkbox" name="checksponsor" id="checksponsor" style="float: left;margin-left: 5px;margin-top: 3px;">
                        <label style="float: left;font-size: 0.90em;margin-left: 5px;">Tick this box if you do not have a sponsor.</label>
                        <?php } ?>
                  </div>
                  
                  <div class="form-group">
                        <input type="checkbox" name="terms" value='1' style="float: left;margin-left: 5px;margin-top:10px;" required="">
                        <label style="float: left;font-size: 0.90em;margin-left: 5px;"><span class="required">*</span>Accept Our Terms and Conditions</label>
                  </div>
                </div>

                <button type="submit" name="doregister"  class="btn btn-primary btn-user btn-block">Register Account</button>
                <!-- <a href="login.html" class="btn btn-primary btn-user btn-block">
                  Register Account
                </a> -->
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="/forgotpassword.php">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="/login.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>