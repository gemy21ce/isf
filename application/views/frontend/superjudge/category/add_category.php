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
    function edit_item(element)
    {
        $.fancybox({
            href: "<?php echo base_url(); ?>judgeshead/categories/edit_subcategory?cat_id=" + $(element).attr("cat_id") + "&id=" + $(element).attr("item_id"),
            type: "ajax",
            scrolling: "no",
            onClosed: function() {
                loadSubCategory();
            }
        });
    }

    function delete_item(element)
    {
        $.fancybox('<div id="popupMessage">هل أنت متأكدة من ازالة ' + $(element).html() + '</div>',
                {
                    'autoDimensions': true,
                    'transitionIn': 'none',
                    'transitionOut': 'none',
                    'onComplete': function() {
                        var deleteButton = $('<button/>',
                                {
                                    text: 'حذف',
                                    click: function() {
                                        $.fancybox.close();
                                        $.ajax({
                                            url: "<?php echo base_url(); ?>judgeshead/categories/delete_subcategory/",
                                            data: {
                                                'id': $(element).attr("item_id"),
                                                'cat_id': $(element).attr("cat_id")
                                            },
                                            success: function($ret) {
                                                if ($ret === "TRUE") {
                                                    loadSubCategory();
                                                    $.fancybox('تم حذف القائمة',
                                                            {
                                                                'autoDimensions': true,
                                                                'transitionIn': 'none',
                                                                'transitionOut': 'none',
                                                                'onComplete': function() {
                                                                    setTimeout(function() {
                                                                        $.fancybox.close();
                                                                    }, 3000);

                                                                }
                                                            }
                                                    );
                                                } else {
//                        alert("thank you.");
                                                    $.fancybox('لم يتم حذف القائمة برجاء المحاولة مرة أخري',
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
            var id ='<?= checkInput("id") ?>';
            $("#subCategory").load("<?= base_url() ?>judgeshead/categories/load_subcategories?id=" + id);
        }
        $(function() {
            loadSubCategory();
            $("#tabs").find("a.active").removeClass("active");
            $("a[tab='#category']").addClass("active");
        });
        function loadAddPage() {
            $.fancybox({
                href: "<?= base_url() ?>judgeshead/categories/add_subcategory?cat_id=<?= $_POST["id"] ?>",
                type: "ajax",
                scrolling: "no"
            });
        }

<?php } else { ?>
        var id ='<?= checkInput("id") ?>';
<?php } ?>

</script>
<div class="intel-tab" id="tabs" init="true">
    <ul style="margin-top: 10px;">
        <li><a href="<?= base_url(); ?>judgeshead/home" tab="#admins" >المشاريع</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/judges" tab="#judges">المحكمين</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/schedule" tab="#judges">جدول التحكيم</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/groups" tab="#judges">المجموعات</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/categories/home" class="active" tab="#judges">القوائم</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/scores" tab="#judges">النتائج</a></li>
    </ul>
    <hr class="intel-tab-divider">
</div>
<article class="intel-tab-content">
    <section id="teams" class="active">
        <span class="Content-body">
            <h2>Category information</h2>
            <hr/>
            <div class="contant-contaner">
                <style>
                    input[type="text"]{
                        width:300px;
                    }
                    textarea{
                        width: 300px;
                        height: 60px;
                    }
                    .error{
                        color: red;
                    }
                </style>


                <?php echo validation_errors('<p class="error">'); ?>

                <?php
                echo form_open('judgeshead/categories/save', array("id" => "categoryForm", "class" => "intel-form pure-form-stacked"));
                ?>

                <?php if (checkInputVal("id")) { ?>
                    <input type="hidden" id="id" name="id" value="<?= $_POST["id"] ?>" />
                <?php } ?>

                <label>Name<span class="error">*</span>:</label>
                <?php if (isset($errors)) echo "<p class='error' >" . $errors['name']['error'] . "</p>"; ?>
                <input type="text" id="name" name="name" value="<?= checkInput("name") ?>" />

                <label>Group <span class="error">*</span>:</label>
                <?php if (isset($errors)) echo "<p class='error' >" . $errors['description']['error'] . "</p>"; ?>
                <div class="intel-select">
                    <select name="group_id" id="group_id">
                        <option value="-1">اختر المجموعة</option>
                        <?php foreach ($groups as $group) { ?>
                            <option value="<?= $group->id ?>" <?= checkInputVal("group_id") ? "selected" : "" ?> ><?= $group->name ?></option>
                        <?php } ?>
                    </select>
                </div>

                <label>Code <span class="error">*</span>:</label>
                <?php if (isset($errors)) echo "<p class='error' >" . $errors['code']['error'] . "</p>"; ?>
                <input type="text" id="Code" name="code" value="<?= checkInput("code") ?>" />

                <label>الوصف <span class="error">*</span>:</label>
                <?php if (isset($errors)) echo "<p class='error' >" . $errors['description']['error'] . "</p>"; ?>
                <textarea id="description" name="description" ><?= checkInput("description") ?></textarea>

                <?php if (isset($category)) { ?>
                    <div  id="subCategory">

                    </div>
                <?php } ?>

                <?php
                echo form_close();
                ?>
                <a style="cursor: pointer" class="intel-btn intel-btn-action" onclick="$('#categoryForm').submit();"> حفظ </a>
            </div>
        </span>
    </section>
</article>


