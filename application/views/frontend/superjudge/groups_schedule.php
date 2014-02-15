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
    $(function() {
        $(".gener").click(function(e) {
            e.preventDefault();
            var url = $(this).attr("href");
            jui.jconfirm('<div>\n\
                    <label>select Fair</label>\n\
                    <div class="intel-select">\n\
                    <select  id="fair_id" name="fair_id">\n\
                    <option value="1" >الاسكندرية</option><option value="2" >الاقصر</option>\n\
                    </select></div><br/>\n\
                    Are you sure you want to generate new Schedule?<br/>\n\
                    This may cause remove all updates on the old schedule!', function() {
                jui.jloading("Generating Schedule");
                $.ajax({
                    url: url,
                    data:{
                        fair:$("#fair_id").val()
                    },
                    success: function() {
                        window.location.reload();
                    }
                });
            });
            return false;
        });
    });
</script>
<div class="intel-tab" id="tabs" init="true">
    <ul style="margin-top: 10px;">
        <li><a href="<?= base_url(); ?>judgeshead/home" tab="#admins" >Projects</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/judges" tab="#judges">Judges</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/schedules/schedule" class="active" tab="#judges">Judging Schedule</a></li>
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
                            <th style="cursor: pointer;" class="">Group</th>
                            <th style="cursor: pointer;" class="">Show Schedule</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($error)) {
                            ?>
                            <tr>
                                <td colspan="2"><p>Schedule is not generated yet!</p></td>
                            </tr>
                            <?php
                        } else {
                            foreach ($groups as $group) {
                                ?>
                                <tr>
                                    <td>
                                        <?= $group->name; ?>
                                    </td>
                                    <td>
                                        <?php
//                                        $cat->schedule->get();
//                                        if ($cat->schedule) {
                                        echo anchor(base_url() . "judgeshead/schedules/groupschedule/" . $group->id, "Show Schedule");
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
                    echo anchor(base_url() . 'judgeshead/schedules/generateschedule', 'Generate Schedule', 'id="genereateSchedule" class="gener intel-btn intel-btn-action"');
                else
                    echo anchor(base_url() . 'judgeshead/schedules/generateschedule', 'Re-generate Schedule', 'id="genereateSchedule" class="gener intel-btn intel-btn-action"');
                ?>
            </div>
        </span>
    </section>
</article>