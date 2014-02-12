<script src="<?php echo base_url(); ?>assets/backend/js/jquery/table/jquery.dataTables.min.js" language="javascript" type="text/javascript"></script>
<?php if (!isset($error)) { ?>
    <script type="text/javascript">
        $('#tableData').ready(function() {
            //            $('#tableData').dataTable();
        });
    </script>
<?php } ?>
<script src="<?php echo base_url(); ?>assets/jquery.validate.min.js"></script>
<script type="text/javascript" >
    $(function() {
        $(".gener").click(function(e) {
            e.preventDefault();
            $("#table").hide();
            $("#createGroupForm").show();
            return false;
        });
        $("form").validate({
            rules: {
                name: {
                    required: true
                },
                name_ar: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "يجب ادخال اسم المجموعة"
                },
                name_ar: {
                    required: "يجب ادخال اسم المجموعة"
                }
            }
        });
        $(".edit").click(function(event) {
            event.preventDefault();
            var el = this;
            var id = $(el).attr("href");
            $.ajax({
                url: "getGroup",
                type: "get",
                data: {
                    id: id
                },
                success: function(res) {
                    var group = JSON.parse(res);
                    $("#editForm input[name='id']").val(group.id);
                    $("#editForm input[name='name_ar']").val(group.name_ar);
                    $("#editForm input[name='name']").val(group.name);
                    $("#editForm select[name='type']").val(group.type);
                    $("#table").hide();
                    $("#createGroupForm").show();
                    $("#saveGroup").unbind("click").click(function() {
                        if ($("form").valid()) {
                            jui.jloading("جاري حفظ المجموعة");
                            $.ajax({
                                url: '<?= base_url() . "judgeshead/home/updategroup" ?>',
                                type: "post",
                                data: $("form").serialize(),
                                success: function() {
                                    window.location.reload();
                                }
                            });
                        }
                    });
                }
            });
        });
        $(".delete").click(function(event) {
            event.preventDefault();
            var el = this;
            var id = $(el).attr("href");
            if (id === "1") {
                jui.jalert("لا يمكن حذف المجموعة الافتراضية", function() {
                }, "حسنا");
                return;
            }
            jui.jconfirm("هل أنت متأكد من حذف هذة المجموعة؟ جميع القوائم بها ستتحول الي المجموعة الافتراضية", function() {
                $.ajax({
                    url: "deletegroup",
                    type: "post",
                    data: {
                        id: id
                    },
                    success: function() {
                        $(el).parent("td").parent("tr").remove();
                    }
                });
            }, function() {
            }, "متأكد", "الغاء");
        });
        $("#saveGroup").click(function() {
            if ($("form").valid()) {
                jui.jloading("جاري حفظ المجموعة");
                $.ajax({
                    url: '<?= base_url() . "judgeshead/home/savegroup" ?>',
                    type: "post",
                    data: $("form").serialize(),
                    success: function() {
                        window.location.reload();
                    }
                });
            }
        });

    });
</script>
<div class="intel-tab" id="tabs" init="true">
    <ul style="margin-top: 10px;">
        <li><a href="<?= base_url(); ?>judgeshead/home" tab="#admins" >المشاريع</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/judges" tab="#judges">المحكمين</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/schedule" tab="#judges">جدول التحكيم</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/groups" class="active" tab="#judges">المجموعات</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/categories/home" tab="#judges">القوائم</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/scores" tab="#judges">النتائج</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/finalwinners" tab="#judges">النهائي</a></li>
    </ul>
    <hr class="intel-tab-divider">
</div>
<article class="intel-tab-content">
    <section class="active" id="teams">
        <span class="Content-body">
            <h2 id="Admin">مجموعات القوائم</h2>

            <hr/>
            <div class="contant-contaner">
                <div id="table">
                    <table cellpadding="0" cellspacing="0" border="0" class="intel-table" id="tableData">
                        <thead>
                            <tr class="">
                                <th style="cursor: pointer;" class="">النوع</th>
                                <th style="cursor: pointer;" class="">الاسم</th>
                                <th style="cursor: pointer;" class="">القوائم</th>
                                <th style="cursor: pointer;" class="">تعديل</th>
                                <th style="cursor: pointer;" class="">حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($error)) {
                                ?>
                                <tr>
                                    <td colspan="5"><p>لا يوجد أي مجموعات </p></td>
                                </tr>
                                <?php
                            } else {
                                foreach ($groups as $g) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $g->type == 'engineering' ? "هندسية" : "علمية" ?>
                                        </td>
                                        <td>
                                            <?= $g->name_ar ?>
                                        </td>
                                        <td>
                                            <?php
                                            $g->category->get();
                                            foreach ($g->category as $cat) {
                                                ?>
                                                <?= $cat->name ?><br/>
                                            <? } ?>
                                        </td>
                                        <td>
                                            <a class="edit" href="<?= $g->id ?>">تعديل</a>
                                        </td>
                                        <td>
                                            <a class="delete" href="<?= $g->id ?>">حذف</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                        <tfoot></tfoot>
                    </table>
                    <!--                    <div style="direction: rtl">
                                            <a class="gener intel-btn intel-btn-action">حفظ قوائم المجموعات</a>
                                        </div>-->
                    <hr/>
                    <?php
                    echo anchor('', 'انشأ مجموعة جديدة', 'class="gener intel-btn intel-btn-action"');
                    ?>
                </div>
                <div style="display: none;" id="createGroupForm">
                    <form id="editForm" class="intel-form pure-form-aligned">
                        <fieldset>
                            <input type="hidden" name="id" value=""/>
                            <div class="pure-control-group">
                                <label>اسم المجموعة</label>
                                <input type="text" name="name_ar" placeholder="اسم المجموعة">
                            </div>
                            <div class="pure-control-group">
                                <label>اسم المجموعة بالانجليزية</label>
                                <input type="text" name="name" placeholder="اسم المجموعة">
                            </div>
                            <div class="pure-control-group">
                                <label>نوع المجموعة</label>
                                <div class="intel-select">													
                                    <select name="type">
                                        <option value="engineering">هندسية</option>
                                        <option value="scientific">علمية</option>
                                    </select>
                                </div>
                            </div>
                            <button type="button" id="saveGroup" class="intel-btn intel-btn-action">
                                حفظ
                            </button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </span>
    </section>
</article>