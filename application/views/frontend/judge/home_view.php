<script src="<?php echo base_url(); ?>assets/backend/js/jquery/table/jquery.dataTables.min.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript">
    var projects = [];
    var evaled = [];
    $('#tableData').ready(function() {
        $("#projects").find("span").each(function() {
            projects.push($(this).text());
            var el = $(".proEv#proj-" + $(this).text())
            el.removeClass("proEv");
            el.addClass("evaluated");
        });
        $(".proEv").removeAttr("href").text("You cannot evaluate")
                .css("text-decoration","blink").css("color","#53565a");
        $("#evaled").find("span").each(function() {
            projects.push($(this).text());
            $(".evaluated#proj-" + $(this).text()).removeClass("evaluated");
        });
        $(".evaluated").removeAttr("href").text("already evaluated")
                .css("text-decoration","blink").css("color","#53565a");
        $('#tableData').dataTable({});
    });
</script>
<div style="display: none;" id="projects">
    <?php
    foreach ($evalprojects as $ev) {
        echo '<span>' . $ev->project_id . "</span>";
    }
    ?>
</div>
<div style="display: none;" id="evaled">
    <?php
    foreach ($evaled as $ev) {
        echo '<span>' . $ev->project_id . "</span>";
    }
    ?>
</div>
<div class="intel-tab" id="tabs" init="true">
    <ul style="margin-top: 10px;">
        <li><a href="<?= base_url(); ?>judge/home" tab="#admins" class="active">Projects</a></li>
        <li><a href="<?= base_url(); ?>judge/home/schedule" tab="#sched">Evaluation Schedule</a></li>
        <li><a href="<?= base_url(); ?>judge/home/evalresults" tab="#results">Evaluation Results</a></li>
        <!--<li><a href="javascript:void(0);" tab="#tab5">More...</a></li>-->
    </ul>
    <hr class="intel-tab-divider">
</div>
<article class="intel-tab-content">
    <section class="active" id="teams">
        <span class="Content-body">
            <h2 id="Admin">Projects</h2>

            <hr/>
            <div class="contant-contaner">
                <table cellpadding="0" cellspacing="0" border="0" class="intel-table" id="tableData">
                    <thead>
                        <tr class="">
                            <th style="cursor: pointer;" class="">Projects Code</th>
                            <th style="cursor: pointer;" class="">Projects Name</th>
                            <th style="cursor: pointer;" class="">Show</th>
                            <th style="cursor: pointer;" class="">Evaluate</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($projects as $project) { ?>
                            <tr>
                                <td><?php $project->category->get(); echo $project->category->code . ' - ' . $project->id; ?></td>
                                <td><?= $project->name ?></td>
                                <td>
                                    <a href="<?= base_url() ?>judge/home/showproject/<?= $project->id ?>">Show Project</a>
                                </td>
                                <td>
                                    <a class="proEv" id="proj-<?= $project->id ?>" href="<?= base_url() . "judge/home/evaluateproject/" . $project->id ?>">Evaluate Project</a>
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