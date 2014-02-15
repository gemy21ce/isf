<?php

function checkInput($var, $otherValue = "") {
    echo isset($_POST[$var]) ? $_POST[$var] : $otherValue;
}

function checkInputVal($var) {
    return isset($_POST[$var]) ? $_POST[$var] : false;
}
?>
<script type="text/javascript" src="<?= base_url() ?>assets/backend/js/jquery/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.js"></script>
<script type = "text/javascript" src = "<?= base_url() ?>assets/backend/js/jquery/jquery.fancybox-1.3.4/fancybox/jquery.mousewheel-3.0.4.pack.js" ></script>
<link rel="stylesheet" href="<?= base_url() ?>assets/backend/js/jquery/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css" />
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
        
        
        $( "#adult_sponsor_birthday" ).datepicker({
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
         <?php if (checkInputVal("id")) { ?>
            $("#studentsDetails").load("<?= base_url(); ?>admin/projectcontroller/load_project_students/<?= $_POST["id"] ?>");    
        <?php } ?>
        
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
        <style>
            input[type="text"]{
                width:300px;
            }
            textarea{
                width: 300px;
                height: 60px;
            }
        </style>

        <?php
        echo form_open('admin/projectcontroller/save',array("class"=>"intel-form pure-form-stacked","id"=>"project_form","style"=>"padding-left: 25px;"));
        ?>

        <?php if (checkInputVal("id")) { ?>
            <input type="hidden" id="id" name="id" value="<?= $_POST["id"] ?>" />
        <?php } ?>
            
            <h3>Project details</h3>
            <hr/>
            <label>Project name<span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['name']['error'] . "</div>"; ?>
            <input type="text" id="name" name="name" value="<?= checkInput("name") ?>" />
        
            <label>Fair <span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['fair_id']['error'] . "</div>"; ?>
            <div class="intel-select">
                <select id="fair_id" name="fair_id">
                    <option value="-1">Select Fair</option>
                    <?php foreach($fairs as $fair) {?>
                    <option value="<?=$fair->id?>" <?=  checkInputVal("fair_id")?$_POST['fair_id']==$fair->id?"selected":"":""?>><?=$fair->name ?></option>
                    <?php } ?>
                </select>
            </div>
            
            <label>Exhibition<span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['exhibition_id']['error'] . "</div>"; ?>
            <div class="intel-select">
                <select id="exhibition_id" name="exhibition_id">
                    <?php foreach($exhibitions as $exhibition) {?>
                    <option value="<?=$exhibition->id?>" <?=  checkInputVal("exhibition_id")?$_POST['exhibition_id']==$exhibition->id?"selected":"":""?>><?=$exhibition->name?></option>
                    <?php } ?>
                </select>
            </div>
            

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
                    <?php 
                    if(checkInputVal('sub_category_id') == "" || checkInputVal('sub_category_id') == null)
                    {
                        $_POST['sub_category_id'] = -1;
                    }
                    foreach($subcategories as $subcategory) {?>
                        <option 
                            value="<?=$subcategory->id?>" 
                            <?=  checkInputVal("sub_category_id")!=false?  
                                (($_POST['sub_category_id'] == $subcategory->id) 
                                    || 
                            ($_POST['sub_category_id']== -1 && $subcategory->name =="Other")) 
                            ?"selected":"":""?>><?=$subcategory->name ?></option>
                    <?php } ?>
                </select>
            </div>
        
            <label>Continuation project:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['continuation_project']['error'] . "</div>"; ?>
            <input type="checkbox" id="continuation_project" name="continuation_project" value="1" <?= (checkInputVal("adult_sponsor_email"))?($_POST['adult_sponsor_email']==1)?'checked="true"':"":"" ?> />
        
            
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
            
            <h3>Students details</h3>
            <hr/>
            <div id="studentsDetails">
                
            </div>
            
            <h3>Adult sponsor details</h3>
            <hr/>
            
            
            <label>Adult sponsor arabic name<span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['adult_sponsor_name_ar']['error'] . "</div>"; ?>
            <input type="text" id="adult_sponsor_name_ar" name="adult_sponsor_name_ar" value="<?= checkInput("adult_sponsor_name_ar") ?>" />
            
            <label>Adult sponsor name<span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['adult_sponsor_name']['error'] . "</div>"; ?>
            <input type="text" id="adult_sponsor_name" name="adult_sponsor_name" value="<?= checkInput("adult_sponsor_name") ?>" />
        
            
            <label>Adult sponsor phone:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['adult_sponsor_phone']['error'] . "</div>"; ?>
            <input type="text" id="adult_sponsor_phone" name="adult_sponsor_phone" value="<?= checkInput("adult_sponsor_phone") ?>" />
        
            
            <label>Adult sponsor email:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['adult_sponsor_email']['error'] . "</div>"; ?>
            <input type="text" id="adult_sponsor_email" name="adult_sponsor_email" value="<?= checkInput("adult_sponsor_email") ?>" />
        
            
            <label>Adult sponsor governorate:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['adult_sponsor_gov']['error'] . "</div>"; ?>
            <input type="text" id="adult_sponsor_gov" name="adult_sponsor_gov" value="<?= checkInput("adult_sponsor_gov") ?>" />
        
            <label>Adult sponsor profession:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['adult_sponsor_profession']['error'] . "</div>"; ?>
            <input type="text" id="adult_sponsor_profession" name="adult_sponsor_profession" value="<?= checkInput("adult_sponsor_profession") ?>" />
        
            <label>Adult sponsor specialist:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['adult_sponsor_specialist']['error'] . "</div>"; ?>
            <input type="text" id="adult_sponsor_specialist" name="adult_sponsor_specialist" value="<?= checkInput("adult_sponsor_specialist") ?>" />
        
            <label>Adult sponsor work location:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['adult_sponsor_work_location']['error'] . "</div>"; ?>
            <input type="text" id="adult_sponsor_work_location" name="adult_sponsor_work_location" value="<?= checkInput("adult_sponsor_work_location") ?>" />
        
            <label>Adult sponsor educational administration:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['adult_sponsor_educational_administration']['error'] . "</div>"; ?>
            <input type="text" id="adult_sponsor_educational_administration" name="adult_sponsor_educational_administration" value="<?= checkInput("adult_sponsor_educational_administration") ?>" />
        
            <label>Adult sponsor birthday:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['adult_sponsor_birthday']['error'] . "</div>"; ?>
            <input type="text" id="adult_sponsor_birthday" name="adult_sponsor_birthday" value="<?= checkInput("adult_sponsor_birthday") ?>" />
            
            <label>Adult sponsor gender <span class="error">*</span>:</label>
            <?php if (isset($errors)) echo "<div class='error' >" . $errors['adult_sponsor_gender']['error'] . "</div>"; ?>
            <div class="intel-select">
                <select id="adult_sponsor_gender" name="adult_sponsor_gender">
                    <?php for($i = 1 ; $i < 3 ; $i++) {?>
                    <option value="<?=$i?>" <?=  checkInputVal("adult_sponsor_gender")?$_POST['adult_sponsor_gender']==$i?"selected":"":""?>><?=$i==1?"Male":"Female"?></option>
                    <?php } ?>
                </select>
            </div>
            
            
            
            
        <?php
        echo form_close();
        ?>
    <a href="javascript:void(0);" onclick="$('#project_form').submit();" class="intel-btn intel-btn-action"><?=checkInputVal("id")?"Update":"Add"?> Project</a>


    </span>

    </section>
</article>