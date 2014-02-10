
<link type="text/css"  rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/js/jquery/table/table.css" />
<script src="<?php echo base_url(); ?>assets/backend/js/jquery/table/jquery.dataTables.min.js" language="javascript" type="text/javascript"></script>
<script language="javascript" type="text/javascript">
    $('#tableData').ready(function() {

        $('#tableData').dataTable({
            "aaSorting": [],
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "<?php echo base_url(); ?>judgeshead/categories/pages",
            "fnRowCallback": function(nRow, aData, iDisplayIndex) {
                $('td:eq(4)', nRow).html('<a href="<?php echo base_url(); ?>judgeshead/categories/edit/' + aData[4] + '">تعديل</a>');
                $('td:eq(5)', nRow).html('<a href="<?php echo base_url(); ?>judgeshead/categories/delete/' + aData[5] + '"><img src="<?= base_url() ?>assets/backend/image/delete_small.png"/></a>');
                return nRow;
            },
            "fnInitComplete": function(oSettings, json) {

            }
        });
    });

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
<article class="intel-tab-content" id="tabCnt183903f0-a9a1-bba8-f6e1-669583d98b4z">
    <section class="active" id="category">
        <span class="Content-body">
            <h2 id="Admin">القوائم</h2>
            <hr/>
            <div class="contant-contaner">
                <style type="text/css">
                    table.display td{
                        text-align: center;
                    }
                </style>

                <table cellpadding="0" cellspacing="0" border="0" class="intel-table intel-table-zebra intel-sortable"  id="tableData">
                    <thead>
                        <tr>
                            <th width="20%">الاسم</th>
                            <th width="50%">الوصف</th>
                            <th width="15%">الرمز</th>
                            <th width="15%">المجموعة</th>
                            <th width="15%">تعديل</th>
                            <th width="15%">حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="5" class="dataTables_empty">جاري تحميل البيانات</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="20%">الاسم</th>
                            <th width="50%">الوصف</th>
                            <th width="15%">الرمز</th>
                            <th width="15%">المجموعة</th>
                            <th width="15%">تعديل</th>
                            <th width="15%">حذف</th>
                        </tr>
                    </tfoot>
                </table>
                <a class="intel-btn intel-btn-action" href="<?php echo base_url(); ?>judgeshead/categories/add">اضف قائمة</a>


            </div>
        </span>
    </section>
</article>