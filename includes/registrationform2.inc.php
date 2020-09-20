<div class="registrationform">
      <h2>Create a new Account</h2>
      <form name="register" id="register" method="post" action="/register/">
            <p>Choose Username: <span class="errors" id="usernameErr"><?php echo $usernameErr;?></span></p>
            <input type="text" name="username" id="username" placeholder="Choose Username" value="<?php echo $username;?>">
            <p>First Name: <span class="errors" id="firstnameErr"><?php echo $firstnameErr;?></span></p>
            <input type="text" name="firstname" id="firstname" placeholder="Enter First Name" value="<?php echo $firstname;?>">
            <p>Last Name: <span class="errors" id="lastnameErr"><?php echo $lastnameErr;?></span></p>
            <input type="text" name="lastname" id="lastname" placeholder="Enter Last Name" value="<?php echo $lastname;?>">
            <p>Email Address:<span class="errors" id="emailErr"><?php echo $emailErr;?></span></p>
            <input type="text" name="emailaddress" placeholder="Enter email" value="<?php echo $emailaddress;?>">
            <p>Phone No:<span class="errors" id="phoneErr"><?php echo $phoneErr;?></span></p>
            <input type="text" name="phoneno" placeholder="Enter Phone" value="<?php echo $phoneno;?>">
            <p>Password:<span class="errors" id="passwordErr"><?php echo $passwordErr;?></span></p>
            <input type="password" name="password" placeholder="Enter Password">
            <p>Confirm Password:<span class="errors" id="confirmpasswordErr"><?php echo $confirmpasswordErr;?></span></p>
            <input type="password" name="confirmpassword" placeholder="Confirm Password">      
            <input type="submit" name="submit" value="Create Account">
      </form>
</div><!--registrationform-->  