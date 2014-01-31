<?php

function checkInput($var, $otherValue = "") {
    echo isset($_POST[$var]) ? $_POST[$var] : $otherValue;
}

function checkInputVal($var) {
    return isset($_POST[$var]) ? $_POST[$var] : false;
}
?>

<script type="text/javascript">
    $(function(){
        $("#tabs").find("a.active").removeClass("active");
        $("a[tab='#teams']").addClass("active");
                   
        $("#category_id").change(function(){        
            $("#sub_category_div").load("<?= base_url(); ?>admin/projectcontroller/loadSubCategories/"+$(this).val());
        });
        
        
        $( "#start_date" ).datepicker({
            showOn: "button",
            buttonImage: "<?= base_url(); ?>assets/backend/image/calendar.gif",
            buttonImageOnly: true,
            dateFormat:"yy/mm/dd"
        });
        $( "#end_date" ).datepicker({
            showOn: "button",
            buttonImage: "<?= base_url(); ?>assets/backend/image/calendar.gif",
            buttonImageOnly: true,
            dateFormat:"yy/mm/dd"
        });
    });
</script>

<style>
    .error{
        color: red;
    }
</style>


<article class="intel-tab-content">
    <section id="teams" class="active">
    <span class="Content-body">
        <h2>Project information</h2>
        <hr/>


        <?php
        echo form_open('admin/projectcontroller/save',array("class"=>"intel-form pure-form-stacked","id"=>"project_form"));
        ?>

        <?php if (checkInputVal("id")) { ?>
            <input type="hidden" id="id" name="id" value="<?= $_POST["id"] ?>" />
        <?php } ?>
           
            <label>Project name<span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['name']['error'] . "</div>"; ?>
            <input type="text" id="name" name="name" value="<?= checkInput("name") ?>" />
        
            
            <label>Number of students <span class="error">*</span>:</label>
            <?php if (isset($erhome_viewrors)) echo "<div >" . $errors['num_of_students']['error'] . "</div>"; ?>
            <div class="intel-select">
                <select  id="num_of_students" name="num_of_students">
                    <?php for($i=1; $i<4 ; $i++) {?>
                    <option value="<?=$i?>" <?=  checkInputVal("num_of_students")?$_POST['num_of_students']==$i?"selected":"":""?>><?=$i?></option>
                    <?php } ?>
                </select>
            </div>
        
            
            <label>Team leader name<span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['team_leader_name']['error'] . "</div>"; ?>
            <input type="text" id="team_leader_name" name="team_leader_name" value="<?= checkInput("team_leader_name") ?>" />
           
        
            <label>Team leader email<span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['team_leader_email']['error'] . "</div>"; ?>
            <input type="text" id="team_leader_email" name="team_leader_email" value="<?= checkInput("team_leader_email") ?>" />
            
            
            <label>Grade<span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['grade_id']['error'] . "</div>"; ?>
            <div class="intel-select">
                <select id="grade_id" name="grade_id">
                    <?php foreach($grades as $grade) {?>
                    <option value="<?=$grade->id?>" <?=  checkInputVal("grade_id")?$_POST['grade_id']==$grade->id?"selected":"":""?>><?=$grade->name?></option>
                        <?php } ?>
                </select>
            </div>
           
            
            <label>Exhibition<span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['grade_id']['error'] . "</div>"; ?>
            <div class="intel-select">
                <select id="exhibition_id" name="exhibition_id">
                    <?php foreach($exhibitions as $exhibition) {?>
                    <option value="<?=$exhibition->id?>" <?=  checkInputVal("exhibition_id")?$_POST['exhibition_id']==$exhibition->id?"selected":"":""?>><?=$exhibition->name?></option>
                    <?php } ?>
                </select>
            </div>
            
            
            <label>Phone<span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['phone']['error'] . "</div>"; ?>
            <input type="text" id="phone" name="phone" value="<?= checkInput("phone") ?>" />
        

            <label>Category <span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['category_id']['error'] . "</div>"; ?>
            <div class="intel-select">
                <select id="category_id" name="category_id">
                    <?php foreach($categories as $category) {?>
                    <option value="<?=$category->id?>" <?=  checkInputVal("category_id")?$_POST['category_id']==$category->id?"selected":"":""?>><?=$category->name?></option>
                    <?php } ?>
                </select>
            </div>

            <label>Sub Category:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['sub_category_id']['error'] . "</div>"; ?>
            <div id="sub_category_div" class="intel-select">
                <select id="sub_category_id" name="sub_category_id">
                    <?php foreach($subcategories as $subcategory) {?>
                    <option value="<?=$subcategory->id?>" <?=  checkInputVal("sub_category_id")?$_POST['sub_category_id']==$category->id?"selected":"":""?>><?=$subcategory->name?></option>
                    <?php } ?>
                </select>
            </div>


            <label>Second team member name :</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['team_member_1_name']['error'] . "</div>"; ?>
            <input type="text" id="team_member_1_name" name="team_member_1_name" value="<?= checkInput("team_member_1_name") ?>" />


            <label>Third team member name :</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['team_member_2_name']['error'] . "</div>"; ?>
            <input type="text" id="team_member_2_name" name="team_member_2_name" value="<?= checkInput("team_member_2_name") ?>" />

            
            
            <label>School<span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['school']['error'] . "</div>"; ?>
            <input type="text" id="school" name="school" value="<?= checkInput("school") ?>" />
        
            
            <label>School Phone<span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['school_phone']['error'] . "</div>"; ?>
            <input type="text" id="school_phone" name="school_phone" value="<?= checkInput("school_phone") ?>" />
        
            
            <label>School Address<span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['school_address']['error'] . "</div>"; ?>
            <input type="text" id="school_address" name="school_address" value="<?= checkInput("school_address") ?>" />
        
            
            <label>Adult sponsor name<span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['adult_sponsor_name']['error'] . "</div>"; ?>
            <input type="text" id="adult_sponsor_name" name="adult_sponsor_name" value="<?= checkInput("adult_sponsor_name") ?>" />
        
            
            <label>Adult sponsor phone:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['adult_sponsor_phone']['error'] . "</div>"; ?>
            <input type="text" id="adult_sponsor_phone" name="adult_sponsor_phone" value="<?= checkInput("adult_sponsor_phone") ?>" />
        
            
            <label>Adult sponsor email:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['adult_sponsor_email']['error'] . "</div>"; ?>
            <input type="text" id="adult_sponsor_email" name="adult_sponsor_email" value="<?= checkInput("adult_sponsor_email") ?>" />
        
            
            <label>Continuation project:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['continuation_project']['error'] . "</div>"; ?>
            <input type="checkbox" id="continuation_project" name="continuation_project" value="1" <?= checkInputVal("adult_sponsor_email")?'checked="true"':"" ?> />
        
            
            <label>Start date<span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['start_date']['error'] . "</div>"; ?>
            <input type="text" id="start_date" name="start_date" value="<?= checkInput("start_date") ?>" />


            <label>End date:</label>
            <?php if (isset($erhome_viewrors)) echo "<div class='error' >" . $errors['end_date']['error'] . "</div>"; ?>
            <input type="text" id="end_date" name="end_date" value="<?= checkInput("end_date") ?>" />


            <label>Project description <span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['description']['error'] . "</div>"; ?>
            <textarea id="description" name="description" ><?= checkInput("description") ?></textarea>


            <label>Project plan <span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['plan']['error'] . "</div>"; ?>
            <textarea id="plan" name="plan" ><?= checkInput("plan") ?></textarea>


            <label>Per-research results <span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['per_researchs_results']['error'] . "</div>"; ?>
            <textarea id="per_researchs_results" name="per_researchs_results" ><?= checkInput("per_researchs_results") ?></textarea>


            <label>Assumptions <span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['assumptions']['error'] . "</div>"; ?>
            <textarea id="assumptions" name="assumptions" ><?= checkInput("assumptions") ?></textarea>


            <label>Research resources <span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['research_resources']['error'] . "</div>"; ?>
            <textarea id="research_resources" name="research_resources" ><?= checkInput("research_resources") ?></textarea>
            
            
        <?php
        echo form_close();
        ?>
            <a href="javascript:void(0);" onclick="$('#project_form').submit();" class="intel-btn intel-btn-action"><?=checkInputVal("id")?"Update":"Add"?> Project</a>


    </span>

    </section>
</article>