<script src="<?php echo base_url(); ?>assets/backend/js/jquery/table/jquery.dataTables.min.js" language="javascript" type="text/javascript"></script>
<?php if (!isset($error)) { ?>
    <script type="text/javascript">
        $('#tableData').ready(function() {
    //            $('#tableData').dataTable();
        });
    </script>
<?php } ?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<div class="intel-tab" id="tabs" init="true">
    <ul style="margin-top: 10px;">
        <li><a href="<?= base_url(); ?>judgeshead/home" tab="#admins" >المشاريع</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/judges" tab="#judges">المحكمين</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/schedule" tab="#judges">جدول التحكيم</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/groups" tab="#judges">المجموعات</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/scores" tab="#judges" class="active">النتائج</a></li>
    </ul>
    <hr class="intel-tab-divider">
</div>
<article class="intel-tab-content">
    <section class="active" id="teams">
        <span class="Content-body">
            <h2 id="Admin">نتائج التحكيم</h2>

            <hr/>
            <div class="contant-contaner">
                <div style="display: none;">
                    <div id="eval">
                        <?php
                        $category->schedule->order_by("project_id");
                        $category->schedule->get();
                        foreach ($category->schedule as $sch) {
                            $sch->judge->get();
                            $sch->project->get();
                            ?>
                            <div class="evalr" title="<?= $sch->project_id ?>">
                                <a class="judges"><?= $sch->judge->name ?></a>
                                <a title="<?= $sch->project->name ?>" class="score"><?= $sch->eval_total ?></a>
                                <a class="project"><?= $sch->project->name ?></a>
                            </div>
                        <? } ?>
                    </div>
                </div>

                <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                <script type="text/javascript">
                    jui.jloading("جاري تحميل البيانات");
                    google.load("visualization", "1", {packages: ["corechart"]});
                    google.setOnLoadCallback(drawChart);
                    function drawChart() {
                        var header = new Array();
                        header.push('<?= $category->name ?>');
                        var projects = new Array();
                        $(".judges").each(function() {
                            if ($.inArray($(this).text(),header)===-1)
                                header.push($(this).text());
                        });
                        $(".project").each(function() {
                            if ($.inArray($(this).text(),projects)===-1){
                                projects.push($(this).text());
                            }
                        });
                        header.push({role: 'annotation'});
                        var duelArray = new Array();
                        duelArray.push(header);
                        for(var i = 0; i<projects.length;i++){
                            var p = new Array();
                            p.push(projects[i]);
                            
                            $("a[title='"+projects[i]+"']").each(function(){
                                p.push(parseInt($(this).text()));
                            });
                            p.push('');
                            duelArray.push(p);
                        }
//                        console.log(duelArray);
                        var data = google.visualization.arrayToDataTable(duelArray);

                        var options = {
//                            width: '100%',
//                            height: 600,
                            legend: {position: 'top', maxLines: 6},
                            bar: {groupWidth: '50%'}//,
//                            isStacked: true
                        };
                        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
                        google.visualization.events.addListener(chart, "ready", function() {
                            jui.jHide();
                        });
                        chart.draw(data, options);
                    }
                </script>
                <div id="chart_div" style="width: 95%; height: 700px;"></div>
            </div>
        </span>
    </section>
</article>