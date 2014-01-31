<article class="intel-tab-content" id="tabCnt183903f0-a9a1-bba8-f6e1-669583d98b4c">
    <section class="active" id="teams">
        <span class="Content-body">
            <h2 id="Admin">Projects</h2>
            <hr/>
            <div class="contant-contaner">
                <!--<link type="text/css"  rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/js/jquery/table/table.css" />-->
                <style type="text/css">
                    table.display td{
                        text-align: center;
                    }
                </style>
                <script src="<?php echo base_url(); ?>assets/backend/js/jquery/table/jquery.dataTables.min.js" language="javascript" type="text/javascript"></script>
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
                                $('td:eq(6)', nRow).html('<a href="<?php echo base_url(); ?>admin/projectcontroller/edit/' + aData[6] + '">Edit</a>');
                                $('td:eq(7)', nRow).html('<a href="<?php echo base_url(); ?>admin/projectcontroller/delete/' + aData[7] + '"><img src="<?= base_url() ?>assets/backend/image/delete_small.png"/></a>');
                                return nRow;
                            },
                            "fnInitComplete": function(oSettings, json) {

                            }
                        });
                    });

                </script>


                <span class="creat-botton-contaner">
                    <span class="creat-content-icon"></span>
<!--                    <span class="creat-botton">
                        <a href="<?php echo base_url(); ?>admin/projectcontroller/add">Add Project</a>
                    </span>-->

                </span>
                <table cellpadding="0" cellspacing="0" border="0" class="intel-table"  id="tableData">
                    <thead>
                        <tr>
                            <th width="20%">Project name</th>
                            <th width="20%">Leader name</th>
                            <th width="15%">School</th>
                            <th width="15%">Adult sponsor</th>
                            <th width="15%">Start date</th>
                            <th width="15%">End date</th>
                            <th width="15%">Edit</th>
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
                            <th width="20%">Leader Name</th>
                            <th width="15%">School</th>
                            <th width="15%">Adult Sponsor</th>
                            <th width="15%">Start Date</th>
                            <th width="15%">End Date</th>
                            <th width="15%">Edit</th>
                            <th width="15%">Delete</th>
                        </tr>
                    </tfoot>
                </table>
                <?= anchor(base_url()."admin/projectcontroller/add", 'Add New Admin','class="intel-btn intel-btn-action"') ?>
            </div>
        </span>
    </section>
</article>

