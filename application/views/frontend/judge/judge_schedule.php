<script src="<?php echo base_url(); ?>assets/backend/js/jquery/table/jquery.dataTables.min.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript">
    $('#tableData').ready(function() {
        $('#tableData').dataTable();
    });
</script>
<div class="intel-tab" id="tabs" init="true">
    <ul style="margin-top: 10px;">
        <li><a href="<?= base_url(); ?>judge/home" tab="#admins">المشاريع</a></li>
        <li><a href="<?= base_url(); ?>judge/home/schedule" class="active" tab="#sched">جدول التحكيم</a></li>
        <!--<li><a href="javascript:void(0);" tab="#tab4">Tasks</a></li>-->
        <!--<li><a href="javascript:void(0);" tab="#tab5">More...</a></li>-->
    </ul>
    <hr class="intel-tab-divider">
</div>
<article class="intel-tab-content">
    <section class="active" id="teams">
        <span class="Content-body">
            <h2 id="Admin">جدول التحكيم</h2>

            <hr/>
            <div class="contant-contaner">
                <table cellpadding="0" cellspacing="0" border="0" class="intel-table" id="tableData">
                    <thead>
                        <tr class="">
                            <th style="cursor: pointer;" class="">الفريق</th>
                            <th style="cursor: pointer;" class="">رقم المنفذ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($schedule as $sched) { ?>
                            <tr>
                                <td>
                                    <?php
                                    $sched->project->get();
                                    echo $sched->project->name ?>
                                </td>
                                <td>
                                    <?php
                                    echo $sched->slotnumber ?>
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