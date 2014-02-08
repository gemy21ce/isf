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
                }
            },
            messages: {
                name: {
                    required: "يجب ادخال اسم المجموعة"
                }
            }
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
        <li><a href="<?= base_url(); ?>judgeshead/home/scores" tab="#judges">النتائج</a></li>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($error)) {
                                ?>
                                <tr>
                                    <td colspan="3"><p>لا يوجد أي مجموعات </p></td>
                                </tr>
                                <?php
                            } else {
                                foreach ($groups as $cat) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $cat->type == 'engineer'?"هندسية" :"علمية"  ?>
                                        </td>
                                        <td>
                                            <?= $cat->name ?>
                                        </td>
                                        <td>
                                            <?php
                                            $cat->category->get();
                                            ?>
                                            <select multiple="true">
                                                <?php
                                                foreach ($cats as $c) {
                                                    ?>
                                                    <option value="<?= $c->id ?>" <?= $c->group_id == $cat->id?"checked='true'":"" ?>><?= $c->name ?></option>
                                                <? } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                        <tfoot></tfoot>
                    </table>
                    <div style="direction: rtl">
                        <a class="gener intel-btn intel-btn-action">حفظ قوائم المجموعات</a>
                    </div>
                    <hr/>
                    <?php
                    echo anchor('', 'انشأ مجموعة جديدة', 'class="gener intel-btn intel-btn-action"');
                    ?>
                </div>
                <div style="display: none;" id="createGroupForm">
                    <form class="intel-form pure-form-aligned">
                        <fieldset>
                            <div class="pure-control-group">
                                <label>اسم المجموعة</label>
                                <input type="text" name="name" placeholder="اسم المجموعة">
                            </div>
                            <div class="pure-control-group">
                                <label>نوع المجموعة</label>
                                <div class="intel-select">													
                                    <select name="type">
                                        <option value="engineer">هندسية</option>
                                        <option value="science">علمية</option>
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