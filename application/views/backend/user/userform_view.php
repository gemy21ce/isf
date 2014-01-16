<h1>Create an admin</h1>
<fieldset>
    <legend>personal information</legend>
    <?php echo validation_errors('<p class="error">'); ?>
    <?php
    echo form_open('backend/usermanager/saveuser');
    ?>
    <?php
    if (!empty($user)):
    ?>
        <input type="hidden" id="id" name="id" value="<?= $user->id; ?>" />
        <p>    
            <label>Name</label>
            <input type="text" id="name" name="name" value="<?= $user->name; ?>" />
        </p>
        <p>
            <label>Email</label>
            <input type="text" id="email" name="email" value="<?= $user->email; ?>" />
        </p>
        <p>
            <label>Password</label>
            <input type="password" id="password" name="password" value="<?= $user->password; ?>" />
        </p>
        <p>
            <label>Confirm Password</label>
            <input type="password" id="password2" name="password2" value="<?= $user->password; ?>" />
        </p>
    <?php
        else :
    ?>
            <p>
                <label>Name</label>
                <input type="text" id="name" name="name" value="" />
            </p>
            <p>
                <label>Email</label>
                <input type="text" id="email" name="email" value="" />
            </p>
            <p>
                <label>Password</label>
                <input type="password" id="password" name="password" value="" />
            </p>
            <p>
                <label>Confirm Password</label>
                <input type="password" id="password2" name="password2" value="" />
            </p>
    <?php
            endif;
    ?>
    <?php
            echo form_submit('submit', 'save');
            echo form_close();
    ?>
</fieldset>

