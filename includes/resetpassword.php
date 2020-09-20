
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                  </div>
                  <div><p style="color: red;text-align: center;"><?php echo $errFound;?></p></div>
                  <form name="reset" method="post" action="/forgotpassword.php">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="username" placeholder="Enter Username">
                      <span style="color: red;text-align: center;"><?php echo $errUsername;?></span>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputPassword" name="email" placeholder="Enter Email">
                      <span style="color: red;text-align: center;"><?php echo $errEmail;?></span>
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary btn-user btn-block">
                      Get Password
                    </button>
                    
                    <hr>
                    <a href="login.php" class="btn btn-danger btn-user btn-block">
                       Login
                    </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <p style="color: red;text-align: center;color: #efefef;font-weight: normal;"><?php echo $status;?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
