<?php

function checkInput($var, $otherValue = "") {
    echo isset($_POST[$var]) ? $_POST[$var] : $otherValue;
}

function checkInputVal($var) {
    return isset($_POST[$var]) ? $_POST[$var] : false;
}
?>

<h1>Category</h1>

<fieldset>

    <legend>Project information</legend>


    <?php
    echo form_open('admin/projectcontroller/save');
    ?>

    <?php if (checkInputVal("id")) { ?>
        <input type="hidden" id="id" name="id" value="<?= $_POST["id"] ?>" />
    <?php } ?>
    <p>    
        <label>Project name<span class="error">*</span>:</label>
        <?php if (isset($errors)) echo "<p class='error' >" . $errors['name']['error'] . "</p>"; ?>
        <input type="text" id="name" name="name" value="<?= checkInput("name") ?>" />
    </p>
    
    <p>    
        <label>Number of students <span class="error">*</span>:</label>
        <?php if (isset($erhome_viewrors)) echo "<p class='error' >" . $errors['category_id']['error'] . "</p>"; ?>
        <select id="category_id" name="category_id">
            <?php for($i=1; $i<4 ; $i++) {?>
            <option value="<?=$i?>" <?=  checkInputVal("num_of_students")?$_POST['num_of_students']==$i?"selected":"":""?>><?=$i?></option>
            <?php } ?>
        </select>
    </p>
    <p>    
        <label>Team leader name<span class="error">*</span>:</label>
        <?php if (isset($errors)) echo "<p class='error' >" . $errors['team_leader_name']['error'] . "</p>"; ?>
        <input type="text" id="team_leader_name" name="team_leader_name" value="<?= checkInput("team_leader_name") ?>" />
    </p>
    
    <p>    
        <label>Team leader email<span class="error">*</span>:</label>
        <?php if (isset($errors)) echo "<p class='error' >" . $errors['team_leader_email']['error'] . "</p>"; ?>
        <input type="text" id="team_leader_email" name="team_leader_email" value="<?= checkInput("team_leader_email") ?>" />
    </p>
    
    <p>    
        <label>Grade<span class="error">*</span>:</label>
        <?php if (isset($errors)) echo "<p class='error' >" . $errors['grade']['error'] . "</p>"; ?>
        <input type="text" id="grade" name="grade" value="<?= checkInput("grade") ?>" />
    </p>
    
    <p>    
        <label>Phone<span class="error">*</span>:</label>
        <?php if (isset($errors)) echo "<p class='error' >" . $errors['phone']['error'] . "</p>"; ?>
        <input type="text" id="phone" name="phone" value="<?= checkInput("phone") ?>" />
    </p>
    
    
    <p>    
        <label>Second team member name :</label>
        <?php if (isset($errors)) echo "<p class='error' >" . $errors['team_member_1_name']['error'] . "</p>"; ?>
        <input type="text" id="team_member_1_name" name="team_member_1_name" value="<?= checkInput("team_member_1_name") ?>" />
    </p>
    
    <p>    
        <label>Third team member name :</label>
        <?php if (isset($errors)) echo "<p class='error' >" . $errors['team_member_2_name']['error'] . "</p>"; ?>
        <input type="text" id="team_member_2_name" name="team_member_2_name" value="<?= checkInput("team_member_2_name") ?>" />
    </p>
    
    
    
    <p>    
        <label>School<span class="error">*</span>:</label>
        <?php if (isset($errors)) echo "<p class='error' >" . $errors['school']['error'] . "</p>"; ?>
        <input type="text" id="school" name="school" value="<?= checkInput("school") ?>" />
    </p>
    
    <p>    
        <label>School Phone<span class="error">*</span>:</label>
        <?php if (isset($errors)) echo "<p class='error' >" . $errors['school_phone']['error'] . "</p>"; ?>
        <input type="text" id="school_phone" name="school_phone" value="<?= checkInput("school_phone") ?>" />
    </p>
    
    <p>    
        <label>School Address<span class="error">*</span>:</label>
        <?php if (isset($errors)) echo "<p class='error' >" . $errors['school_address']['error'] . "</p>"; ?>
        <input type="text" id="school_address" name="school_address" value="<?= checkInput("school_address") ?>" />
    </p>
    
    <p>    
        <label>Adult sponsor name<span class="error">*</span>:</label>
        <?php if (isset($errors)) echo "<p class='error' >" . $errors['adult_sponsor_name']['error'] . "</p>"; ?>
        <input type="text" id="adult_sponsor_name" name="adult_sponsor_name" value="<?= checkInput("adult_sponsor_name") ?>" />
    </p>
    
    <p>    
        <label>Adult sponsor phone:</label>
        <?php if (isset($errors)) echo "<p class='error' >" . $errors['adult_sponsor_phone']['error'] . "</p>"; ?>
        <input type="text" id="adult_sponsor_phone" name="adult_sponsor_phone" value="<?= checkInput("adult_sponsor_phone") ?>" />
    </p>
    
    <p>    
        <label>Adult sponsor email:</label>
        <?php if (isset($errors)) echo "<p class='error' >" . $errors['adult_sponsor_email']['error'] . "</p>"; ?>
        <input type="text" id="adult_sponsor_email" name="adult_sponsor_email" value="<?= checkInput("adult_sponsor_email") ?>" />
    </p>
    
    
    <p>    
        <label>Continuation project:</label>
        <input type="checkbox" id="continuation_project" name="continuation_project" value="1" checked="<?= checkInputVal("adult_sponsor_email")?"true":"false" ?>" />
    </p>
    
    
    <p>    
        <label>Start date<span class="error">*</span>:</label>
        <?php if (isset($errors)) echo "<p class='error' >" . $errors['start_date']['error'] . "</p>"; ?>
        <input type="text" id="start_date" name="start_date" value="<?= checkInput("start_date") ?>" />
    </p>
    <p>    
        <label>End date:</label>
        <?php if (isset($erhome_viewrors)) echo "<p class='error' >" . $errors['end_date']['error'] . "</p>"; ?>
        <input type="text" id="end_date" name="end_date" value="<?= checkInput("end_date") ?>" />
    </p>
    
    <p>    
        <label>Category <span class="error">*</span>:</label>
        <?php if (isset($erhome_viewrors)) echo "<p class='error' >" . $errors['category_id']['error'] . "</p>"; ?>
        <select id="category_id" name="category_id">
            <?php foreach($categories as $category) {?>
            <option value="<?=$category->id?>" <?=  checkInputVal("category_id")?$_POST['category_id']==$category->id?"selected":"":""?>><?=$category->name?></option>
            <?php } ?>
        </select>
    </p>
    
    <p>    
        <label>Sub Category:</label>
        <?php if (isset($erhome_viewrors)) echo "<p class='error' >" . $errors['sub_category_id']['error'] . "</p>"; ?>
        <span id="sub_category_div">
            <select id="sub_category_id" name="sub_category_id">
                <?php foreach($subcategories as $subcategory) {?>
                <option value="<?=$subcategory->id?>" <?=  checkInputVal("sub_category_id")?$_POST['sub_category_id']==$category->id?"selected":"":""?>><?=$subcategory->name?></option>
                <?php } ?>
            </select>
        </span>
    </p>
    
    <p>
        <label>Project description <span class="error">*</span>:</label>
        <?php if (isset($errors)) echo "<p class='error' >" . $errors['description']['error'] . "</p>"; ?>
        <textarea id="description" name="description" ><?= checkInput("description") ?></textarea>
    </p>
    <p>
        <label>Project plan <span class="error">*</span>:</label>
        <?php if (isset($errors)) echo "<p class='error' >" . $errors['plan']['error'] . "</p>"; ?>
        <textarea id="plan" name="plan" ><?= checkInput("plan") ?></textarea>
    </p>
    <p>
        <label>Per-research results <span class="error">*</span>:</label>
        <?php if (isset($errors)) echo "<p class='error' >" . $errors['per_researchs_results']['error'] . "</p>"; ?>
        <textarea id="per_researchs_results" name="per_researchs_results" ><?= checkInput("per_researchs_results") ?></textarea>
    </p>
    <p>
        <label>Assumptions <span class="error">*</span>:</label>
        <?php if (isset($errors)) echo "<p class='error' >" . $errors['assumptions']['error'] . "</p>"; ?>
        <textarea id="assumptions" name="assumptions" ><?= checkInput("assumptions") ?></textarea>
    </p>
    <p>
        <label>Research resources <span class="error">*</span>:</label>
        <?php if (isset($errors)) echo "<p class='error' >" . $errors['research_resources']['error'] . "</p>"; ?>
        <textarea id="research_resources" name="research_resources" ><?= checkInput("research_resources") ?></textarea>
    </p>
    
    <?php
    echo form_submit('submit', 'save');

    echo form_close();
    ?>

</fieldset>




