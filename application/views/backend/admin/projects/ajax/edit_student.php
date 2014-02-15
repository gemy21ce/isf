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
        
        
        $( "#birthday" ).datepicker({
            showOn: "button",
            buttonImage: "<?= base_url(); ?>assets/backend/image/calendar.gif",
            buttonImageOnly: true,
            dateFormat:"yy/mm/dd"
        });
        
        $("#student_form").bind("submit", function() {
            $.fancybox.showActivity();
            $.ajax({
                type: "POST",
                cache: false,
                url: "<?php echo base_url(); ?>admin/projectcontroller/save_project_student",
                data: $(this).serializeArray(),
                success: function(data) {
                    if (data == "TRUE") {
                        $("#studentsDetails").load("<?= base_url(); ?>admin/projectcontroller/load_project_students/<?= $_GET["project_id"] ?>");  
                        $.fancybox("<div style='color:green'>student saved</div>");
                        setTimeout(function() {
                            $.fancybox.close();
                        }, 3000);
                    } else {
                        $.fancybox.hideActivity();
                        $("#student_error").html(data);
                    }
                },
                error: function() {
                    $.fancybox.hideActivity();
                    $("#student_error").html("Server side error, please try again later");
                }
            });
            return false;
        });
    });
</script>
<h1>Student</h1>

<fieldset>

    <legend>Student information</legend>

    <?php
    echo form_open('admin/projectcontroller/save_project_student', array("class"=>"intel-form pure-form-stacked","id" => "student_form"));
    ?>

    <?php if (checkInputVal("id")) { ?>
        <input type="hidden" id="id" name="id" value="<?= $_POST["id"] ?>" />
    <?php } ?>
    <input type="hidden" id="project_id" name="project_id" value="<?= $_GET["project_id"] ?>" />

    <p class="error" id="student_error"/>
    <p>    
        <label>Name<span class="error">*</span>:</label>
        <input type="text" id="name" name="name" value="<?= checkInput("name") ?>" />
    </p>

    <p>    
        <label>Name ar<span class="error">*</span>:</label>
        <input type="text" id="name_ar" name="name_ar" value="<?= checkInput("name_ar") ?>" />
    </p>

    <p>    
        <label>email<span class="error">*</span>:</label>
        <input type="text" id="email" name="email" value="<?= checkInput("email") ?>" />
    </p>

    <p>    
        <label>phone<span class="error">*</span>:</label>

        <input type="text" id="phone" name="phone" value="<?= checkInput("phone") ?>" />
    </p>

    <p>    
        <label>gov<span class="error">*</span>:</label>
        <input type="text" id="gov" name="gov" value="<?= checkInput("gov") ?>" />
    </p> 

    <p>    
        <label>educational_administration<span class="error">*</span>:</label>
        <input type="educational_administration" id="educational_administration" name="educational_administration" value="<?= checkInput("educational_administration") ?>" />
    </p>

    <p>    
        <label>school_ar<span class="error">*</span>:</label>
        <input type="text" id="school_ar" name="school_ar" value="<?= checkInput("school_ar") ?>" />
    </p>

    <p>    
        <label>school<span class="error">*</span>:</label>
        <input type="text" id="school" name="school" value="<?= checkInput("school") ?>" />
    </p>

    <p>    
        <label>grade<span class="error">*</span>:</label>
        <input type="text" id="grade_id" name="grade_id" value="<?= checkInput("grade_id") ?>" />
    </p>

    <p>    
        <label>birthday<span class="error">*</span>:</label>
        <input type="text" id="birthday" name="birthday" value="<?= checkInput("birthday") ?>" />
    </p>
    <p>    
    <label>Gender<span class="error">*</span>:</label>
    <div class="intel-select">
        <select id="gender" name="gender">
            <?php for ($i = 1; $i < 3; $i++) { ?>
                <option value="<?= $i ?>" <?= checkInputVal("gender") ? $_POST['gender'] == $i ? "selected" : "" : "" ?>><?= $i == 1 ? "Male" : "Female" ?></option>
            <?php } ?>
        </select>
    </div>
</p>


<?php
echo form_submit('submit', 'save');

echo form_close();
?>
</fieldset>