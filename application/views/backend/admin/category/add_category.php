<?php

function checkInput($var, $otherValue = "") {
    echo isset($_POST[$var]) ? $_POST[$var] : $otherValue;
}

function checkInputVal($var) {
    return isset($_POST[$var]) ? $_POST[$var] : false;
}
?>
<script type="text/javascript">
    function edit_item(element)
    {
        $.fancybox({
            href: "<?php echo base_url(); ?>admin/categorycontroller/edit_subcategory?cat_id=" + $(element).attr("cat_id")+"&id="+$(element).attr("item_id"),
            type: "ajax",
            scrolling: "no",
            onClosed: function() {
                loadSubCategory();
            }
        });
    }

    function delete_item(element)
    {
        $.fancybox('<div id="popupMessage">Are you sure you want to delete ' + $(element).html() + 'subCategory</div>',
                {
                    'autoDimensions': true,
                    'transitionIn': 'none',
                    'transitionOut': 'none',
                    'onComplete': function() {
                        var deleteButton = $('<button/>',
                                {
                                    text: 'Delete',
                                    click: function() {
                                        $.fancybox.close();
                                        $.ajax({
                                            url: "<?php echo base_url(); ?>admin/categorycontroller/delete_subcategory/",
                                            data: {
                                                'id': $(element).attr("item_id"),
                                                'cat_id': $(element).attr("cat_id")
                                            },
                                            success: function($ret) {
                                                if ($ret === "TRUE") {
                                                    loadSubCategory();
                                                    $.fancybox('subcategory Delete successfully',
                                                            {
                                                                'autoDimensions': true,
                                                                'transitionIn': 'none',
                                                                'transitionOut': 'none',
                                                                'onComplete': function(){
                                                                    setTimeout(function(){
                                                                        $.fancybox.close();
                                                                    },3000);
                                                                    
                                                                }
                                                            }
                                                    );
                                                } else {
//                        alert("thank you.");
                                                    $.fancybox('Sorry can\'t delete this subcategory at the moment, please try again later',
                                                            {
                                                                'autoDimensions': true,
                                                                'transitionIn': 'none',
                                                                'transitionOut': 'none'
                                                            }
                                                    );
                                                }
                                            }
                                        });
                                    }
                                });
                        var cancelButton = $('<button/>',
                                {
                                    text: 'Cancel',
                                    click: function() {
                                        $.fancybox.close();
                                    }
                                });
                        $('#popupMessage').append(deleteButton).append(cancelButton);
                    }
                });

    }

<?php if (checkInputVal("id")) { ?>

        function loadSubCategory()
        {
            var id =<?= checkInput("id") ?>;
            $("#subCategory").load("<?= base_url() ?>admin/categorycontroller/load_subcategories?id=" + id);
        }
        $(function() {
            loadSubCategory();
        });
        function loadAddPage(){
                $.fancybox({
                    href: "<?=base_url()?>admin/categorycontroller/add_subcategory?cat_id=<?= $_POST["id"] ?>",
                    type: "ajax",
                    scrolling: "no"
                });
        }
        
<?php } else { ?>
        var id =<?= checkInput("id") ?>;
<?php } ?>

</script>
<h1>Category</h1>

<fieldset>

    <legend>Category information</legend>

    <?php echo validation_errors('<p class="error">'); ?>

    <?php
    echo form_open('admin/categorycontroller/save');
    ?>

    <?php if (checkInputVal("id")) { ?>
        <input type="hidden" id="id" name="id" value="<?= $_POST["id"] ?>" />
    <?php } ?>
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
    <?php if (isset($category)) { ?>
        <p id="subCategory">

        </p>
    <?php } ?>

    <?php
    echo form_submit('submit', 'save');

    echo form_close();
    ?>

</fieldset>



