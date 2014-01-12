<?php include __DIR__ .'/../header.php'   ?>

<?php echo validation_errors(); ?>
<div>
    <h2>login:</h2>
    
    <?php echo form_open('login/loginuser');  ?>
    
    <h5>Username</h5>
    <input type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" />

    <h5>Password</h5>
    <input type="password" name="password" value="<?php echo set_value('password'); ?>" size="50" />

    <div><input type="submit" value="Login" /></div>
</form>
</div>


<?php include __DIR__ .'/../footer.php'   ?>

 