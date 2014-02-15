<script src="<?php echo base_url(); ?>assets/backend/js/jquery/table/jquery.dataTables.min.js" language="javascript" type="text/javascript"></script>
<link type="text/css"  rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/js/jquery/table/table.css" />
<script language="javascript" type="text/javascript">
                    $(function() {
                        $("#tabs").find("a.active").removeClass("active");
                        $("a[tab='#teams']").addClass("active");
                    });
                    $('#tableData').ready(function() {

                        $('#tableData').dataTable({
                            "aaSorting": [],
                            "bProcessing": true,
                            "bServerSide": true,
                            "sAjaxSource": "<?php echo base_url(); ?>admin/projectcontroller/pages",
                            "fnRowCallback": function(nRow, aData, iDisplayIndex) {
//                                $('td:eq(6)', nRow).html('<a href="<?php echo base_url(); ?>admin/projectcontroller/edit/' + aData[6] + '">Edit</a>');
                                $('td:eq(6)', nRow).html('<a href="<?php echo base_url(); ?>admin/projectcontroller/delete/' + aData[6] + '"><img src="<?= base_url() ?>assets/backend/image/delete_small.png"/></a>');
                                return nRow;
                            },
                            "fnInitComplete": function(oSettings, json) {

                            }
                        });
                    });

                </script>
<article class="intel-tab-content" id="tabCnt183903f0-a9a1-bba8-f6e1-669583d98b4c">
    <section class="active" id="teams">
        <span class="Content-body">
            <h2 id="Admin">Teams Projects</h2>
            <hr/>
            <div class="contant-contaner">
                <!--<link type="text/css"  rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/js/jquery/table/table.css" />-->
                <style type="text/css">
                    table.display td{
                        text-align: center;
                    }
                </style>
                
                <table cellpadding="0" cellspacing="0" border="0" class="intel-table intel-table-zebra intel-sortable"  id="tableData">
                    <thead>
                        <tr>
                            <th width="20%">Project name</th>
                            <th width="15%">Adult sponsor name</th>
                            <th width="15%">Adult sponsor gov</th>
                            <th width="15%">Educational administration</th>
                            <th width="15%">Category</th>
                            <th width="15%">Fair</th>
                            <!--<th width="15%">Edit</th> -->
                            <th width="15%">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="5" class="dataTables_empty">Loading data from server</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="20%">Project name</th>
                            <th width="15%">Adult sponsor name</th>
                            <th width="15%">Adult sponsor gov</th>
                            <th width="15%">Educational administration</th>
                            <th width="15%">Category</th>
                            <th width="15%">Fair</th>
                            <!--<th width="15%">Edit</th>-->
                            <th width="15%">Delete</th>
                        </tr>
                    </tfoot>
                </table>
                <!--<?= anchor(base_url()."admin/projectcontroller/add", 'Add Project','class="intel-btn intel-btn-action"') ?>-->
                <?= anchor(base_url()."admin/projectcontroller/import_form", 'Import Project','class="intel-btn intel-btn-action"') ?>
            </div>
        </span>
    </section>
</article>

