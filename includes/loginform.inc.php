
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image" style=" background: url('https://blog.cex.io/wp-content/uploads/2015/03/your-bitcoins-now-what.png')no-repeat center;"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <img src="changelivesnetwork_white.png" style="width:150px;">
                    <h1 class="h4 text-gray-900 mb-4">Login To Continue</h1>
                  </div>
                  <div><p style="color: red;text-align: center;"><?php echo $error;?></p></div>
                  <form class="user" name="mlmlogin" method="post" action="/login.php">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="username" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    
                    <!-- <hr>
                    <a href="register.php" class="btn btn-danger btn-user btn-block">
                       Create New Account
                    </a> -->
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="/forgotpassword.php">Forgot Password?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
