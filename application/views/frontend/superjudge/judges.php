<script src="<?php echo base_url(); ?>assets/backend/js/jquery/table/jquery.dataTables.min.js" language="javascript" type="text/javascript"></script>
<link type="text/css"  rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/js/jquery/table/table.css" />
<script type="text/javascript">
    $('#tableData').ready(function() {
        $('#tableData').dataTable();
    });
    $(function(){
        var createPrint = function() {
            var printbtn = document.createElement("button");
            printbtn.setAttribute("class", "intel-btn intel-btn-cancel");
            printbtn.setAttribute("style", "float:right");
            printbtn.innerHTML = "Print This Page";
            $(".contant-contaner").append(printbtn);
            $(printbtn).click(function() {
                $("body").children().hide();
                $("article").show();
                $(this).hide();
                var marginTop = $("article").css("margin-top");
                $("article").css("margin-top", "2em");
                window.print();
                $("body").children().show();
                $("article").css("margin-top", marginTop);
                $(this).show();
            });
        };
        createPrint();
    });
</script>
<div class="intel-tab" id="tabs" init="true">
    <ul style="margin-top: 10px;">
        <li><a href="<?= base_url(); ?>judgeshead/home" tab="#admins">Projects</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/judges" class="active" tab="#judges">Judges</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/schedules/schedule" tab="#judges">Judging Schedule</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/groups" tab="#judges">Groups</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/categories/home" tab="#judges">Categories</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/home/scores" tab="#judges">Results</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/finalwinners" tab="#judges">Finals</a></li>
    </ul>
    <hr class="intel-tab-divider">
</div>
<article class="intel-tab-content">
    <section class="active" id="teams">
        <span class="Content-body">
            <h2 id="Admin">Judges</h2>

            <hr/>
            <div class="contant-contaner">
                <table cellpadding="0" cellspacing="0" border="0" class="intel-table intel-table-zebra intel-sortable" id="tableData">
                    <thead>
                        <tr class="">
                            <th style="cursor: pointer;" class="">Judge Name</th>
                            <th style="cursor: pointer;" class="">Group</th>
                            <th style="cursor: pointer;" class="">Category</th>
                            <th style="cursor: pointer;" class="">Sub-category</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($judges as $judge) { ?>
                            <tr>
                                <td>
                                    <?= $judge->name ?>
                                </td>
                                <td>
                                    <?php $judge->category->get(); $judge->category->group->get() ?>
                                    <?= $judge->category->group->name_ar ?>
                                </td>
                                <td>
                                    <?php // $judge->category->get(); ?>
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