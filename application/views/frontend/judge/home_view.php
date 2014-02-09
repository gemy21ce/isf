<script src="<?php echo base_url(); ?>assets/backend/js/jquery/table/jquery.dataTables.min.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript">
    var projects = [];
    $('#tableData').ready(function() {
        $("#projects").find("span").each(function() {
            projects.push($(this).text());
            $(".proEv#proj-" + $(this).text()).removeClass("proEv");
        });
        $(".proEv").removeAttr("href").text("---");
        $('#tableData').dataTable({
        });
    });
</script>
<div style="display: none;" id="projects">
    <?php
    foreach ($evalprojects as $ev) {
        echo '<span>' . $ev->project_id . "</span>";
    }
    ?>
</div>
<div class="intel-tab" id="tabs" init="true">
    <ul style="margin-top: 10px;">
        <li><a href="<?= base_url(); ?>judge/home" tab="#admins" class="active">المشاريع</a></li>
        <li><a href="<?= base_url(); ?>judge/home/schedule" tab="#sched">جدول التحكيم</a></li>
        <li><a href="<?= base_url(); ?>judge/home/evalresults" tab="#results">نتائج التحكيم</a></li>
        <!--<li><a href="javascript:void(0);" tab="#tab5">More...</a></li>-->
    </ul>
    <hr class="intel-tab-divider">
</div>
<article class="intel-tab-content">
    <section class="active" id="teams">
        <span class="Content-body">
            <h2 id="Admin">المشاريع</h2>

            <hr/>
            <div class="contant-contaner">
                <table cellpadding="0" cellspacing="0" border="0" class="intel-table" id="tableData">
                    <thead>
                        <tr class="">
                            <th style="cursor: pointer;" class="">اسم المشروع</th>
                            <th style="cursor: pointer;" class="">عرض</th>
                            <th style="cursor: pointer;" class="">تحكيم</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($projects as $project) { ?>
                            <tr>
                                <td><?= $project->name ?></td>
                                <td>
                                    <a href="<?= base_url() ?>judge/home/showproject/<?= $project->id ?>">عرض المشروع</a>
                                </td>
                                <td>
                                    <a class="proEv" id="proj-<?= $project->id ?>" href="<?= base_url() . "judge/home/evaluateproject/" . $project->id ?>">قيم المشروع</a>
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