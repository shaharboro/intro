<?php include __DIR__ .'/../header.php'   ?>

<?php echo validation_errors(); ?>
<div>
    <h2>Register:</h2>
    
    <?php echo form_open('register/registeruser');  ?>
    
    <h5>Username</h5>
<input type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" />

<h5>Password</h5>
<input type="password" name="password" value="<?php echo set_value('password'); ?>" size="50" />

<h5>Password Confirm</h5>
<input type="password" name="passconf" value="<?php echo set_value('passconf'); ?>" size="50" />

<h5>Email Address</h5>
<input type="text" name="email" value="<?php echo set_value('email'); ?>" size="50" />

<div><input type="submit" value="Register" /></div>
</form>
</div>


<?php include __DIR__ .'/../footer.php'   ?>

 