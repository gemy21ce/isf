<article class="intel-tab-content" id="tabCnt183903f0-a9a1-bba8-f6e1-669583d98b4c">
    <section class="active" id="teams">
        <span class="Content-body">
            <h2 id="Admin"><?= $this->session->userdata('name') ?></h2>
            <hr/>
            <div class="contant-contaner">`
                <link type="text/css"  rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/js/jquery/table/table.css" />
                <script src="<?php echo base_url(); ?>assets/backend/js/jquery/table/jquery.dataTables.min.js" language="javascript" type="text/javascript"></script>
                <script language="javascript" type="text/javascript">

                    $('#tableData').ready(function() {

                        $('#tableData').dataTable({
                            "aaSorting": [],
                            "bProcessing": true,
                            "bServerSide": true,
                            "sAjaxSource": "<?php echo base_url(); ?>admin/categorycontroller/pages",
                            "fnRowCallback": function(nRow, aData, iDisplayIndex) {
                                $('td:eq(3)', nRow).html('<a href="<?php echo base_url(); ?>admin/categorycontroller/edit/' + aData[3] + '">Edit</a>');
                                $('td:eq(4)', nRow).html('<a href="<?php echo base_url(); ?>admin/categorycontroller/delete/' + aData[4] + '"><img src="<?= base_url() ?>assets/backend/image/delete_small.png"/></a>');
                                return nRow;
                            },
                            "fnInitComplete": function(oSettings, json) {

                            }
                        });
                    });

                </script>


                <span class="creat-botton-contaner">
                    <span class="creat-content-icon"></span>
                    <span class="creat-botton">
                        <a href="<?php echo base_url(); ?>admin/categorycontroller/add">Add Category</a>
                    </span>

                </span>
                <table cellpadding="0" cellspacing="0" border="0" class="display"  id="tableData">
                    <thead>
                        <tr>
                            <th width="20%">Name</th>
                            <th width="50%">Description</th>
                            <th width="15%">Code</th>
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
                            <th width="15%">Edit</th>
                            <th width="15%">Delete</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </span>
    </section>
</article>