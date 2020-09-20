<div class="loginbox">
  <h2 style="font-weight: normal;color: #ddd;text-align: center;">Password Reset</h2>
  <form name="reset" method="post" action="/admin/login.php?section=reset">
      <img src="/../images/avatar.png" alt="useravatar"class="user">  
      
      <p style="font-weight: normal;margin: 24px 0;text-align: center;font-size: 1em;line-height: 1.8">Enter the username and email address used when your account was created!</p>
      
      
      <div class="input-group">
        <label>Username</label><span class="errors"><?php echo $errUsername;?></span></p>
        <input type="text" name="username" placeholder="Enter Username..." value="<?php echo $username;?>">
      </div>
      <div class="input-group">
        <p>Email<span class="errors"><?php echo $errEmail;?></span></p>
        <input type="text" name="email" placeholder="Enter Email..." value="<?php echo $email;?>">
      </div>
                          
      <input type="submit" name="submit" value="Reset">
      <div class="input-group" style="text-align: center;font-size: 0.9em;"><a  style='text-decoration: none;color: #fff;' href="/admin/login.php?section=login">Return to Login Page</a></div>
      <div><p style="color: red;text-align: center;font-weight: normal;"><?php echo $status;?></p></div>
      
  </form>
</div><!--loginbox--> 