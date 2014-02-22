<?= $this->load->view("frontend/superjudge/includes/menu") ?>
<script type="text/javascript">
    $(function() {
        $("a.active").removeClass("active");
        $("a[tab='#scores']").addClass('active');
    });
</script>
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
                            <div class="<?= $sch->project->name ?>" title="<?= $sch->project->code ?>">
                                <a class="judges"><?= $sch->judge->name ?></a>
                                <a title="<?= $sch->judge->name ?>-<?= $sch->project->code ?>" class="score"><?= $sch->eval_total ?></a>
                                <a class="project"><?= $sch->project->code ?></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div style="width: 99%;overflow-x: scroll;">
                    <div id="chart_div" style="width: 300%; height: 700px;"></div>
                </div>
                <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                <script type="text/javascript">
                    var avg = function(array) {
                        var avg = 0;
                        for (a in array) {
                            avg += array[a];
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
                            rowArray.push(avg(rowArray.slice(1, rowArray.length)));
                            duelArray.push(rowArray);
                        }
                        duelArray.sort(function(a, b) {
                            return b[b.length - 1] - a[a.length - 1];
                        });
                        console.log(duelArray);

                        var data = google.visualization.arrayToDataTable(duelArray);

                        var options = {
                            width: '300%',
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
                                var code = data.getFormattedValue(selection[0].row, 0);
                                jui.jconfirm("Add \"" + $("div[title='" + data.getFormattedValue(selection[0].row, 0) + "']").attr("class") + " \" to winners",
                                        function() {
                                            jui.jloading("Saving project");
                                            $.ajax({
                                                url: "<?= base_url() ?>judgeshead/scores/projectwinning",
                                                type: "post",
                                                data: {
                                                    code: code
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