<script src="<?php echo base_url(); ?>assets/backend/js/jquery/table/jquery.dataTables.min.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript">
    $('#tableData').ready(function() {
        $('#tableData').dataTable();
    });
</script>
<div class="intel-tab" id="tabs" init="true">
    <ul style="margin-top: 10px;">
        <li><a href="<?= base_url(); ?>judgeshead/home" tab="#admins" >المشاريع</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/judges" tab="#judges" class="active">المحكمين</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/schedule" tab="#judges">جدول التحكيم</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/scores" tab="#judges">النتائج</a></li>
    </ul>
    <hr class="intel-tab-divider">
</div>
<article class="intel-tab-content">
    <section class="active" id="teams">
        <span class="Content-body">
            <h2 id="Admin">المحكمين</h2>

            <hr/>
            <div class="contant-contaner">
                <table cellpadding="0" cellspacing="0" border="0" class="intel-table" id="tableData">
                    <thead>
                        <tr class="">
                            <th style="cursor: pointer;" class="">اسم الحكم</th>
                            <th style="cursor: pointer;" class="">القائمة</th>
                            <th style="cursor: pointer;" class="">القائمة الفرعية</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($judges as $judge) { ?>
                            <tr>
                                <td>
                                    <?= $judge->name ?>
                                </td>
                                <td>
                                    <?php $judge->category->get(); ?>
                                    <?= $judge->category->name ?>
                                </td>
                                <td>
                                    <?php $judge->subcategory->get(); ?>
                                    <?= $judge->subcategory->name ?>
                                </td>
                            </tr>
                            <?php } ?>
                    </tbody>
                    <tfoot></tfoot>

                </table>
            </div>
        </span>
    </section>
</article>