<script src="<?php echo base_url(); ?>assets/backend/js/jquery/table/jquery.dataTables.min.js" language="javascript" type="text/javascript"></script>
<link type="text/css"  rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/js/jquery/table/table.css" />
<?php if (!isset($error)) { ?>
    <script type="text/javascript">
        $('#tableData').ready(function() {
            $('#tableData').dataTable();
        });
    </script>
<?php } ?>
    
    <script type="text/javascript">
        $(function(){
            $(".gener").click(function(e){
                e.preventDefault();
                jui.jloading("جاري انشاء جدول التحكيم");
                var url = $(this).attr("href");
                $.ajax({
                    url:url,
                    success:function(){
                        window.location.reload();
                    }
                });
                return false;
            });
        });
    </script>
<div class="intel-tab" id="tabs" init="true">
    <ul style="margin-top: 10px;">
        <li><a href="<?= base_url(); ?>judgeshead/home" tab="#admins" >المشاريع</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/judges" tab="#judges">المحكمين</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/schedule" tab="#judges" class="active">جدول التحكيم</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/groups" tab="#judges">المجموعات</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/categories/home" tab="#judges">القوائم</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/scores" tab="#judges">النتائج</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/finalwinners" tab="#judges">النهائي</a></li>
    </ul>
    <hr class="intel-tab-divider">
</div>
<article class="intel-tab-content">
    <section class="active" id="teams">
        <span class="Content-body">
            <h2 id="Admin">جداول التحكيم</h2>

            <hr/>
            <div class="contant-contaner">
                <table cellpadding="0" cellspacing="0" border="0" class="intel-table intel-table-zebra intel-sortable" id="tableData">
                    <thead>
                        <tr class="">
                            <th style="cursor: pointer;" class="">المجموعة</th>
                            <th style="cursor: pointer;" class="">عرض الجدول</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($error)) {
                            ?>
                            <tr>
                                <td colspan="2"><p>لم يتم تجهيز الجدول بعد</p></td>
                            </tr>
                            <?php
                        } else {
                            foreach ($groups as $group) {
                                ?>
                                <tr>
                                    <td>
                                        <?= $group->name_ar; ?>
                                    </td>
                                    <td>
                                        <?php
//                                        $cat->schedule->get();
//                                        if ($cat->schedule) {
                                            echo anchor(base_url() . "judgeshead/home/groupschedule/" . $group->id, "عرض جدول المجموعة");
//                                        }
                                        ?>
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
                if (isset($error))
                    echo anchor(base_url() . 'judgeshead/home/generateschedule', 'انشأ جدول التحكيم', 'class="gener intel-btn intel-btn-action"');
                else
                    echo anchor(base_url() . 'judgeshead/home/generateschedule', 'أعد انشاء جدول التحكيم', 'class="gener intel-btn intel-btn-action"');
                ?>
            </div>
        </span>
    </section>
</article>