<script src="<?php echo base_url(); ?>assets/backend/js/jquery/table/jquery.dataTables.min.js" language="javascript" type="text/javascript"></script>
<link type="text/css"  rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/js/jquery/table/table.css" />
<script type="text/javascript">
    var table = null;
    $('#tableData').ready(function() {
        $(".delete").click(function(event) {
            event.preventDefault();
            var el = this;
            var url = $(el).attr("href");
            jui.jconfirm("Are you sure you want to cancel this judging interview?", function() {
                $.ajax({
                    url: url,
                    type: "post",
                    success: function() {
                        table.fnDeleteRow(table.fnGetPosition($(el).parent("td")[0])[0]);
                    }
                });
            }, function() {
            }, "Ok", "Cancel");
        });
        var table = $('#tableData').dataTable();
    });
</script>
<div class="intel-tab" id="tabs" init="true">
    <ul style="margin-top: 10px;">
        <li><a href="<?= base_url(); ?>judgeshead/home" tab="#admins" >Projects</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/judges" tab="#judges">Judges</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/schedule" class="active" tab="#judges">Judging Schedule</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/groups" tab="#judges">Groups</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/categories/home" tab="#judges">Categories</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/scores" tab="#judges">Scores</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/finalwinners" tab="#judges">Finals</a></li>
    </ul>
    <hr class="intel-tab-divider">
</div>
<article class="intel-tab-content">
    <section class="active" id="teams">
        <span class="Content-body">
            <h2 id="Admin">Judging Schedule</h2>

            <hr/>
            <div class="contant-contaner">
                <table cellpadding="0" cellspacing="0" border="0" class="intel-table intel-table-zebra intel-sortable" id="tableData">
                    <thead>
                        <tr class="">
                            <th style="cursor: pointer;" class="">Judge</th>
                            <th style="cursor: pointer;" class="">Project Code</th>
                            <th style="cursor: pointer;" class="">Project Name</th>
                            <th style="cursor: pointer;" class="">Slot/Interview Number</th>
                            <th style="cursor: pointer;" class="">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $category = $group->category->get();
                        $category->schedule->get();
                        foreach ($category->schedule as $sched) {
                            ?>
                            <tr>
                                <td>
                                    <?php
                                    $sched->judge->get();
                                    echo $sched->judge->name
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $sched->project->get();
                                    $sched->project->category->get();
                                    echo $sched->project->category->code . "-" . $sched->project->id
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $sched->project->get();
                                    echo $sched->project->name
                                    ?>
                                </td>
                                <td>
                                    <?php echo $sched->slotnumber ?>
                                </td>
                                <td>
                                    <a class="delete" href="<?= base_url() ?>judgeshead/schedules/removeinterview/<?= $sched->id ?>">remove</a>
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