<?php

function checkInput($var, $otherValue = "") {
    echo isset($_POST[$var]) ? $_POST[$var] : $otherValue;
}

function checkInputVal($var) {
    return isset($_POST[$var]) ? $_POST[$var] : false;
}
?>

<script type="text/javascript">
    $(function() {
        $("#tabs").find("a.active").removeClass("active");
        $("a[tab='#judges']").addClass("active");
    });
</script>

<article class="intel-tab-content">
    <section id="teams" class="active">
        <span class="Content-body">
            <h2>Project information</h2>
            <hr/>
            <style>
                input[type="text"]{
                    width:300px;
                }
                textarea{
                    width: 300px;
                    height: 60px;
                }
                .error {
                    color: red;
                }
            </style>
            
            
            
            <?php
                echo form_open('judge/managejudge/save',array("class"=>"intel-form pure-form-stacked","id"=>"judge_form","style"=>"padding-left: 25px;"));
            ?>
            <?php if (checkInputVal("id")) { ?>
                <input type="hidden" id="id" name="id" value="<?= $_POST["id"] ?>" />
            <?php } ?>
                
            <label>Judge's name<span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['name']['error'] . "</div>"; ?>
            <input type="text" id="name" name="name" value="<?= checkInput("name") ?>" />
            
                
            <label>Judge's Email<span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['email']['error'] . "</div>"; ?>
            <input type="text" id="email" name="email" value="<?= checkInput("email") ?>" />

            <label>Judge's password<span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['password']['error'] . "</div>"; ?>
            <input type="text" id="password" name="password" value="<?= checkInput("password") ?>" />
                
            <label>Judge's address <span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['address']['error'] . "</div>"; ?>
            <textarea id="address" name="address" ><?= checkInput("address") ?></textarea>
            
            
            <label>Judge's Governorate<span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['gov']['error'] . "</div>"; ?>
            <input type="text" id="name" name="gov" value="<?= checkInput("gov") ?>" />
            
            <label>Fair <span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['category_id']['error'] . "</div>"; ?>
            <div class="intel-select">
                <select id="fair_id" name="fair_id">
                    <option value="-1">Select Fair</option>
                    <?php foreach($fairs as $fair) {?>
                    <option value="<?=$fair->id?>" <?=  checkInputVal("fair_id")?$_POST['fair_id']==$fair->id?"selected":"":""?>><?=$fair->name?></option>
                    <?php } ?>
                </select>
            </div>
            
            
            <label>Judge's mobile <span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['mobile']['error'] . "</div>"; ?>
            <input type="text" id="mobile" name="mobile" value="<?= checkInput("mobile") ?>" />
            
            <label>Judge's phone <span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['phone']['error'] . "</div>"; ?>
            <input type="text" id="phone" name="phone" value="<?= checkInput("phone") ?>" />
            
            
            <label>Judge's general field <span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['field']['error'] . "</div>"; ?>
            <input type="text" id="field" name="field" value="<?= checkInput("field") ?>" />
            
            <label>Judge's specialist <span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['specialist']['error'] . "</div>"; ?>
            <input type="text" id="specialist" name="specialist" value="<?= checkInput("specialist") ?>" />
            
            <label>Judge's profession <span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['profession']['error'] . "</div>"; ?>
            <input type="text" id="profession" name="profession" value="<?= checkInput("profession") ?>" />
            
            <label>Judge's qualifications <span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['qualifications']['error'] . "</div>"; ?>
            <textarea id="qualifications" name="qualifications" ><?= checkInput("qualifications") ?></textarea>
            
            <label>Judge's years of experience <span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['years_of_experience']['error'] . "</div>"; ?>
            <input type="text" id="years_of_experience" name="years_of_experience" value="<?= checkInput("years_of_experience") ?>" />
            
            <label>Preferred category 1<span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['category_id']['error'] . "</div>"; ?>
            <div class="intel-select">
                <select id="category_id" name="category_id">
                    <?php foreach($categories as $category) {?>
                    <option value="<?=$category->id?>" <?=  checkInputVal("category_id")?$_POST['category_id']==$category->id?"selected":"":""?>><?=$category->name?></option>
                    <?php } ?>
                </select>
            </div>
            
            
            <label>Preferred category 2:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['category_2_id']['error'] . "</div>"; ?>
            <div class="intel-select">
                <select id="category_2_id" name="category_2_id">
                    <option value="-1" <?=  checkInputVal("category_2_id")?$_POST['category_2_id']==-1?"selected":"":""?>>Select one</option>
                    <?php foreach($categories as $category) {?>
                    <option value="<?=$category->id?>" <?=  checkInputVal("category_2_id")?$_POST['category_2_id']==$category->id?"selected":"":""?>><?=$category->name?></option>
                    <?php } ?>
                </select>
            </div>
            <?php
                echo form_close();
            ?>
            <a href="javascript:void(0);" onclick="$('#judge_form').submit();" class="intel-btn intel-btn-action"><?=checkInputVal("id")?"Update":"Add"?> Judge</a>

        </span>
    </section>
</article>