<form name="adminloginform" method="post" action="/cln-office/login.php?section=login">
    <h2 style="font-weight: normal;color: #ddd;text-align: center;">Welcome, Administrator</h2>
    <div class="input-group">
        <label>Username</label><input type="text" name="username" placeholder="Enter your Username" value="<?php echo $username;?>">
    </div>

    <div class="input-group">
        <label>Password</label><input type="password" name="password">
    </div>
    <div class="input-group">
        <input type="submit" class="btn" name="submit" value="Login" />
        
    </div>
    
    <div id="status"><span style="color: red; font-size: 12px;text-align: center;"><?php echo $errMsg;?></span></div>
</form>