<article class="intel-tab-content" id="tabCnt183903f0-a9a1-bba8-f6e1-669583d98b4c">
    <section class="active" id="tab1">
        <span class="Content-body">
            <h2 id="Admin">Judges</h2>
            <hr/>
            <div class="contant-contaner">

                <link type="text/css"  rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/js/jquery/table/table.css" />

                <script src="<?php echo base_url(); ?>assets/backend/js/jquery/table/jquery.dataTables.min.js" language="javascript" type="text/javascript"></script>

                <script language="javascript" type="text/javascript">
                    $(function() {
                        $("#generatePasswords").click(function(event) {
                            var url = $(this).attr("href");
                            event.preventDefault();
                            jui.jconfirm("Are you sure you want to re-generate all judges passwords!!<br/>\n\
                                        This action will case change all judges passwords", function() {
                                window.location.href = url;
                            });
                            return false;
                        });
                        $('#tableData').ready(function() {

                            $('#tableData').dataTable({
                                "aaSorting": [],
                                "bProcessing": true,
                                "bServerSide": true,
                                "sAjaxSource": "<?php echo base_url(); ?>judge/managejudge/pages",
                                "fnRowCallback": function(nRow, aData, iDisplayIndex) {
                                    $('td:eq(9)', nRow).html('<a href="<?php echo base_url(); ?>judge/managejudge/edit/' + aData[9] + '">Edit</a>');
                                    $('td:eq(10)', nRow).
                                            html('<a href="<?php echo base_url(); ?>judge/managejudge/delete/' + aData[10] + '"><img src="<?= base_url() ?>assets/backend/image/delete_small.png"/></a>').
                                            click(function(e) {
                                        e.preventDefault();
                                        var url = $(this).attr("href");
                                        var row = $(this).parents("tr");
                                        jui.jconfirm("Are you sure you want to delete this judge", function() {
                                            $.ajax({
                                                url: url,
                                                success: function() {
                                                    jui.jHide();
                                                    row.remove();
                                                }
                                            });
                                        });
                                        return false;
                                    });
                                    ;
                                    return nRow;
                                },
                                "fnInitComplete": function(oSettings, json) {

                                }
                            });
                        });


                        $("#tabs").find("a.active").removeClass("active");
                        $("a[tab='#judges']").addClass("active");

                        //prevent delete action
//                        $(".delete")

                    });
                </script>
                <!--<span class="creat-botton-contaner"><span class="creat-user-icon"></span><span class="creat-botton"></span></span>-->

                <table cellpadding="0" cellspacing="0" border="0" class="intel-table intel-table-zebra intel-sortable" id="tableData">
                    <thead>
                        <tr class="">
                            <th style="cursor: pointer;" class="">Name</th>
                            <th style="cursor: pointer;" class="">Phone</th>
                            <th style="cursor: pointer;" class="">Email</th>
                            <th style="cursor: pointer;" class="">Mobile</th>
                            <th style="cursor: pointer;" class="">Governorate</th>
                            <th style="cursor: pointer;" class="">category 1</th>
                            <th style="cursor: pointer;" class="">category 2</th>
                            <th style="cursor: pointer;" class="">Last Login</th>
                            <th style="cursor: pointer;" class="">Fair</th>
                            <th style="cursor: pointer;" class="">Edit</th>
                            <th style="cursor: pointer;">Delete</th>
                        </tr>

                    </thead>

                    <tbody>


                        <tr>
                            <td colspan="5" class="dataTables_empty">Loading data from server</td>
                        </tr>

                    </tbody>
                    <tfoot>
                    <th style="cursor: pointer;" class="">Name</th>
                    <th style="cursor: pointer;" class="">Phone</th>
                    <th style="cursor: pointer;" class="">Email</th>
                    <th style="cursor: pointer;" class="">Mobile</th>
                    <th style="cursor: pointer;" class="">Governorate</th>
                    <th style="cursor: pointer;" class="">category 1</th>
                    <th style="cursor: pointer;" class="">category 2</th>
                    <th style="cursor: pointer;" class="">Last Login</th>
                    <th style="cursor: pointer;" class="">Fair</th>
                    <th style="cursor: pointer;" class="">Edit</th>
                    <th style="cursor: pointer;">Delete</th>
                    </tfoot>

                </table>

                <div style="clear: both;">
                    <hr/>
                    <?= anchor('judge/managejudge/regenerateJudgesPassword', 'Regenrate All Judges Passwords ', 'id="generatePasswords" class="intel-btn intel-btn-action"') ?>
                    <?= anchor('judge/managejudge/add', 'Add Judge', 'class="intel-btn intel-btn-action"') ?>
                    <?= anchor('judge/importcontroller/import_form', 'Import Judges', 'class="intel-btn intel-btn-action"') ?>
                </div>
            </div>
        </span>
    </section>
</article>
