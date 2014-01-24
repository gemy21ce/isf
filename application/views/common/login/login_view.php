
<div id="login_form">
    <span class="login-form-logo"></span>
    <?php
    if(isset($errormessage)){
        echo '<b>user name or password error</b>';
    }
    echo form_open('home/login');
    echo form_input('email', 'email');
    echo form_password('password', 'password');
    echo form_submit('submit', 'login');
    echo form_close();
    ?>
</div>


