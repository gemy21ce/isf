<script src="<?php echo base_url(); ?>assets/backend/js/jquery/table/jquery.dataTables.min.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript">
    $('#tableData').ready(function() {
        $('#tableData').dataTable({
        });
    });
</script>
<div class="intel-tab" id="tabs" init="true">
    <ul style="margin-top: 10px;">
        <li><a href="<?= base_url(); ?>judgeshead/home" tab="#admins" class="active">المشاريع</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/judges" tab="#judges">المحكمين</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/schedule" tab="#judges">جدول التحكيم</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/groups" tab="#judges">المجموعات</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/home/scores" tab="#judges">النتائج</a></li>
    </ul>
    <hr class="intel-tab-divider">
</div>
<article class="intel-tab-content">
    <section class="active" id="teams">
        <span class="Content-body">
            <h2 id="Admin">المشاريع</h2>

            <hr/>
            <div class="contant-contaner">
                <table cellpadding="0" cellspacing="0" border="0" class="intel-table" id="tableData">
                    <thead>
                        <tr class="">
                            <th style="cursor: pointer;" class="">اسم المشروع</th>
                            <th style="cursor: pointer;" class="">عرض</th>
                            <!--<th style="cursor: pointer;" class="">تحكيم</th>-->
                        </tr>
                    </thead>
                    <tbody>
                         <?php foreach ($projects as $project) { ?>
                            <tr>
                                <td><?= $project->name ?></td>
                                <td>
                                    <a href="<?= base_url() ?>judgeshead/home/showproject/<?= $project->id ?>">عرض المشروع</a>
                                </td>
                            </tr>
                        <? } ?>
                    </tbody>
                    <tfoot></tfoot>

                </table>
            </div>
        </span>
    </section>
</article>