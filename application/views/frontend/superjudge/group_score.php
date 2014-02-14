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
                            $sch->project->category->get();
                            ?>
                            <div class="<?= $sch->project->name ?>" title="<?= $sch->project->category->code ?>-<?= $sch->project_id ?>">
                                <a class="judges"><?= $sch->judge->name ?></a>
                                <a title="<?= $sch->judge->name ?>-<?= $sch->project->category->code ?>-<?= $sch->project->id ?>" class="score"><?= $sch->eval_total ?></a>
                                <a class="project"><?= $sch->project->category->code ?>-<?= $sch->project->id ?></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div id="chart_div" style="width: 95%; height: 700px;"></div>
                <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                <script type="text/javascript">
                    var avg = function(array){
                        var avg = 0;
                        for(a in array){
                            avg+=array[a];
                        }
                        avg = avg / array.length;
                        return avg;
                    };
                    jui.jloading("Loading Data");
                    google.load("visualization", "1", {packages: ["corechart"]});
                    google.setOnLoadCallback(drawChart);
                    chart = null;
                    function drawChart() {
                        var header = new Array();
                        header.push('<?= $group->name ?>');
                        var judges = new Array();
                        var projects = new Array();
                        $(".judges").each(function() {
                            if ($.inArray($(this).text(), header) === -1) {
                                header.push($(this).text());
                                judges.push($(this).text());
                            }
                        });
                        $(".project").each(function() {
                            if ($.inArray($(this).text(), projects) === -1) {
                                projects.push($(this).text());
                            }
                        });
                        header.push({role: 'tooltip'});

                        var duelArray = new Array();
                        duelArray.push(header);

                        for (var p in projects) {
                            var rowArray = new Array();
                            rowArray.push(projects[p]);
                            for (var j in judges) {
                                var el = $(".score[title='" + judges[j] + "-" + projects[p] + "']");
                                if (el.length > 0) {
                                    rowArray.push(parseInt($(el).text()));
                                } else {
                                    rowArray.push(0);
                                }
                            }
                            rowArray.push(avg(rowArray.slice(1,rowArray.length)));
                            duelArray.push(rowArray);
                        }
                        duelArray.sort(function(a,b){
                            return b[b.length-1]-a[a.length-1];
                        });
                        console.log(duelArray);

                        var data = google.visualization.arrayToDataTable(duelArray);

                        var options = {
//                            width: '100%',
//                            height: 600,
//                            tooltip: {isHtml: true},
                            legend: {position: 'top', maxLines: 6},
                            bar: {groupWidth: '50%'}//,
//                            isStacked: true
                        };
                        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
                        google.visualization.events.addListener(chart, "ready", function() {
                            jui.jHide();
                        });
                        chart.setAction({
                            id: 'id', // An id is mandatory for all actions.
                            text: "Click to add to winners", // The text displayed in the tooltip.
                            action: function() {
                            }
                        });
                        google.visualization.events.addListener(chart, "select", function() {
                            var selection = chart.getSelection();
                            if (selection.length > 0) {
                                var id = data.getFormattedValue(selection[0].row, 0).substr(3);
                                jui.jconfirm("Add \"" + $("div[title='" + data.getFormattedValue(selection[0].row, 0) + "']").attr("class") + " \" to winners",
                                        function() {
                                            jui.jloading("Saving project");
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
                                        }, null, "Add", "Cancel");
                            }
                        });
                        chart.draw(data, options);
                    }
                </script>
            </div>
        </span>
    </section>
</article>