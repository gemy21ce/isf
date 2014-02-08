<script src="<?php echo base_url(); ?>assets/backend/js/jquery/table/jquery.dataTables.min.js" language="javascript" type="text/javascript"></script>
<?php if (!isset($error)) { ?>
    <script type="text/javascript">
        $('#tableData').ready(function() {
            $('#tableData').dataTable();
        });
    </script>
<?php } ?>

<script type="text/javascript" >
    $(function() {
        $(".gener").click(function() {

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
                                        <?= $cat->type ?>
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
                                            foreach ($cat->category as $c) {
                                                ?>
                                                <option value="<?= $c->id ?>"><?= $c->name ?></option>
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
                <?php
                echo anchor('', 'انشأ مجموعة جديدة', 'class="gener intel-btn intel-btn-action"');
                ?>
            </div>
            <div style="display: none;" id="createGroupForm">
                <form class="intel-form pure-form-stacked">
                    <fieldset>
                        <div class="pure-u-1-3">
                            <label>اسم المجموعة</label>
                            <input type="text" name="name" placeholder="اسم المجموعة">
                        </div>
                        <div class="pure-u-1-3">
                            <label>نوع المجموعة</label>
                            
                        </div>
                    </fieldset>
                </form>
            </div>
        </span>
    </section>
</article>