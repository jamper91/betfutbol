<?php
echo $this->Form->create('User', array(
    'action' => 'login',
    'class' => 'mws-form'
));
?>

<div class="mws-form-row">
    <div class="mws-form-item large">
        <input type="text" class="mws-login-username mws-textinput" placeholder="username" name="data[User][username]" />
    </div>
</div>
<div class="mws-form-row">
    <div class="mws-form-item large">
        <input type="password" class="mws-login-password mws-textinput" placeholder="password" name="data[User][password]" />
    </div>
</div>
<div class="mws-form-row">
    <input type="submit" value="Login" class="mws-button green mws-login-button" />
</div>
</form>