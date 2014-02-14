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
        $("#subcategory_form").bind("submit", function() {
            $.fancybox.showActivity();
            $.ajax({
                type: "POST",
                cache: false,
                url: "<?php echo base_url(); ?>judgeshead/categories/save_subcategory",
                data: $(this).serializeArray(),
                success: function(data) {
                    if (data === "TRUE") {
                        loadSubCategory();
                        $.fancybox("<div style='color:green'>subcategory saved</div>");
                        setTimeout(function() {
                            $.fancybox.close();
                        }, 3000);
                    } else {
                        $.fancybox.hideActivity();
                        $("#subCategory_error").html(data);
                    }
                },
                error: function(){
                    $.fancybox.hideActivity();
                        $("#subCategory_error").html("Server side error, please try again later");
                }
            });
            return false;
        });
    });
</script>
<h1>Sub-category</h1>

<fieldset>

    <legend>Sub-category information</legend>

    <?php
    echo form_open('judgeshead/categories/save_subcategory', array("id" => "subcategory_form"));
    ?>

    <?php if (checkInputVal("id")) { ?>
        <input type="hidden" id="id" name="id" value="<?= $_POST["id"] ?>" />
    <?php } ?>
    <input type="hidden" id="category_id" name="category_id" value="<?= $_POST["category_id"] ?>" />

    <p class="error" id="subCategory_error"/>
    <p>    
        <label>Name<span class="error">*</span>:</label>
        <?php if (isset($errors)) echo "<p class='error' >" . $errors['name']['error'] . "</p>"; ?>
        <input type="text" id="name" name="name" value="<?= checkInput("name") ?>" />
    </p>
    <p>
        <label>Code <span class="error">*</span>:</label>
        <?php if (isset($errors)) echo "<p class='error' >" . $errors['code']['error'] . "</p>"; ?>
        <input type="text" id="Code" name="code" value="<?= checkInput("code") ?>" />
    </p>
    <p >
        <label>Description <span class="error">*</span>:</label>
        <?php if (isset($errors)) echo "<p class='error' >" . $errors['description']['error'] . "</p>"; ?>
        <textarea id="description" name="description" ><?= checkInput("description") ?></textarea>
    </p>
    <?php
    echo form_submit('submit', 'save');

    echo form_close();
    ?>
</fieldset>