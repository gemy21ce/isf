
                <link type="text/css"  rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/js/jquery/table/table.css" />
                <script src="<?php echo base_url(); ?>assets/backend/js/jquery/table/jquery.dataTables.min.js" language="javascript" type="text/javascript"></script>
                <script language="javascript" type="text/javascript">
                    $(function() {
                        $("#tabs").find("a.active").removeClass("active");
                        $("a[tab='#category']").addClass("active");
                    });
                    $('#tableData').ready(function() {

                        $('#tableData').dataTable({
                            "aaSorting": [],
                            "bProcessing": true,
                            "bServerSide": true,
                            "sAjaxSource": "<?php echo base_url(); ?>admin/categorycontroller/pages",
                            "fnRowCallback": function(nRow, aData, iDisplayIndex) {
                                $('td:eq(4)', nRow).html('<a href="<?php echo base_url(); ?>admin/categorycontroller/edit/' + aData[4] + '">Edit</a>');
                                $('td:eq(5)', nRow).html('<a href="<?php echo base_url(); ?>admin/categorycontroller/delete/' + aData[5] + '"><img src="<?= base_url() ?>assets/backend/image/delete_small.png"/></a>');
                                return nRow;
                            },
                            "fnInitComplete": function(oSettings, json) {

                            }
                        });
                    });

                </script>
<article class="intel-tab-content" id="tabCnt183903f0-a9a1-bba8-f6e1-669583d98b4z">
    <section class="active" id="category">
        <span class="Content-body">
            <h2 id="Admin">Category</h2>
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
                            <th width="20%">Name</th>
                            <th width="50%">Description</th>
                            <th width="15%">Code</th>
                            <th width="15%">Group</th>
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
                            <th width="20%">Name</th>
                            <th width="50%">Description</th>
                            <th width="15%">Code</th>
                            <th width="15%">Group</th>
                            <th width="15%">Edit</th>
                            <th width="15%">Delete</th>
                        </tr>
                    </tfoot>
                </table>
                    <a class="intel-btn intel-btn-action" href="<?php echo base_url(); ?>admin/categorycontroller/add">Add Category</a>
                    

            </div>
        </span>
    </section>
</article>