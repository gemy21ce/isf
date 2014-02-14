<script src="<?php echo base_url(); ?>assets/backend/js/jquery/table/jquery.dataTables.min.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<div class="intel-tab" id="tabs" init="true">
    <ul style="margin-top: 10px;">
        <li><a href="<?= base_url(); ?>judgeshead/home" tab="#admins" >Projects</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/judges" tab="#judges">Judges</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/schedule" tab="#judges">Judging Schedule</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/groups" tab="#judges">Groups</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/categories/home" tab="#judges">Categories</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/scores" class="active" tab="#judges">Scores</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/finalwinners" tab="#judges">Finals</a></li>
    </ul>
    <hr class="intel-tab-divider">
</div>
<article class="intel-tab-content">
    <section class="active" id="teams">
        <span class="Content-body">
            <h2 id="Admin" style="">Group <?= $group->name ?> Results</h2>

            <hr/>
            <div class="contant-contaner">
                <div style="display: none;">
                    <div id="eval">
                        <?php
                        foreach ($schedules as $sch) {
                            $sch->judge->get();
                            $sch->project->get();
                            ?>
                            <div class="<?= $sch->project->name ?>" title="P-<?= $sch->project_id ?>">
                                <a class="judges"><?= $sch->judge->name ?></a>
                                <a title="P-<?= $sch->project->id ?>" class="score"><?= $sch->eval_total ?></a>
                                <a class="project">P-<?= $sch->project->id ?></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div id="chart_div" style="width: 95%; height: 700px;"></div>
                <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                <script type="text/javascript">
                    jui.jloading("جاري تحميل البيانات");
                    google.load("visualization", "1", {packages: ["corechart"]});
                    google.setOnLoadCallback(drawChart);
                    chart = null;
                    function drawChart() {
                        var header = new Array();
                        header.push('<?= $group->name_ar ?>');
                        var projects = new Array();
                        $(".judges").each(function() {
                            if ($.inArray($(this).text(), header) === -1)
                                header.push($(this).text());
                        });
                        $(".project").each(function() {
                            if ($.inArray($(this).text(), projects) === -1) {
                                projects.push($(this).text());
                            }
                        });
                        header.push({role: 'annotation'});
                        var duelArray = new Array();
                        duelArray.push(header);
                        for (var i = 0; i < projects.length; i++) {
                            var p = new Array();
                            p.push(projects[i]);

                            $("a[title='" + projects[i] + "']").each(function() {
                                p.push(parseInt($(this).text()));
                            });
                            p.push($("div[title='" + projects[i] + "']").attr("class"));
                            duelArray.push(p);
                        }

                        var data = google.visualization.arrayToDataTable(duelArray);

                        var options = {
//                            width: '100%',
//                            height: 600,
//                            tooltip: {isHtml: true},
                            legend: 'none',
                            bar: {groupWidth: '50%'}//,
//                            isStacked: true
                        };
                        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
                        google.visualization.events.addListener(chart, "ready", function() {
                            jui.jHide();
                        });
                        chart.setAction({
                            id: 'id', // An id is mandatory for all actions.
                            text: "انقر علي العمود لتسجل نجاح المشروع", // The text displayed in the tooltip.
                            action: function() {
                            }
                        });
                        google.visualization.events.addListener(chart, "select", function() {
                            var selection = chart.getSelection();
                            if (selection.length > 0) {
                                var id = data.getFormattedValue(selection[0].row, 0).substr(2);
                                jui.jconfirm("اضافة : \"" + $("div[title='" + data.getFormattedValue(selection[0].row, 0) + "']").attr("class") + " \" الي ناجحي المجموعة؟",
                                        function() {
                                            jui.jloading("جاري حفظ المشروع");
                                            $.ajax({
                                                url: "<?= base_url() ?>judgeshead/home/projectwinning",
                                                type: "post",
                                                data: {
                                                    id: id
                                                },
                                                success: function() {
                                                    jui.jHide();
                                                }
                                            });
                                        }, null, "أضف", "الغاء");
                            }
                        });
                        chart.draw(data, options);
                    }
                </script>
            </div>
        </span>
    </section>
</article>