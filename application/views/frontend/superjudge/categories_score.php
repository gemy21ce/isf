<script src="<?php echo base_url(); ?>assets/backend/js/jquery/table/jquery.dataTables.min.js" language="javascript" type="text/javascript"></script>
<?php if (!isset($error)) { ?>
    <script type="text/javascript">
        $('#tableData').ready(function() {
            $('#tableData').dataTable();
        });
    </script>
<?php } ?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<div class="intel-tab" id="tabs" init="true">
    <ul style="margin-top: 10px;">
        <li><a href="<?= base_url(); ?>judgeshead/home" tab="#admins" >المشاريع</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/judges" tab="#judges">المحكمين</a></li>
        <li><a href="<?= base_url(); ?>judgeshead/home/schedule" tab="#judges">جدول التحكيم</a></li>
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
<!--                <table cellpadding="0" cellspacing="0" border="0" class="intel-table" id="tableData">
                    <thead>
                        <tr class="">
                            <th style="cursor: pointer;" class="">القائمة</th>
                            <th style="cursor: pointer;" class="">عرض النتيجة</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                if (isset($error)) {
                    ?>
                                        <tr>
                                            <td colspan="2"><p>لم يتم التحكيم علي أي مشاريع بعد</p></td>
                                        </tr>
                    <?php
                } else {
                    foreach ($categories as $cat) {
                        ?>
                                                        <tr>
                                                            <td>
                        <?= $cat->name ?>
                                                            </td>
                                                            <td>
                        <?php
                        $cat->schedule->get();
                        if ($cat->schedule) {
                            echo anchor(base_url() . "judgeshead/home/categoryscore/" . $cat->id, "عرض نتيجة المجموعة");
                        }
                        ?>
                                                            </td>
                                                        </tr>
                        <?php
                    }
                }
                ?>
                    </tbody>
                    <tfoot></tfoot>
                </table>-->
                <script type="text/javascript">
                    jui.jloading("جاري تحميل البيانات");
                    google.load("visualization", "1", {packages: ["corechart"]});
                    google.setOnLoadCallback(drawChart);
                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Projects', 'Fantasy & Sci Fi', 'Romance', 'Mystery/Crime', 'General',
                                'Western', 'Literature', {role: 'annotation'}],
                            ['animal', 90, 90, 20, 32, 18, 5, ''],
                            ['2020', 16, 22, 23, 30, 16, 9, ''],
                            ['2030', 28, 19, 29, 30, 12, 13, ''],
                            ['2040', 28, 19, 29, 30, 12, 13, '']
                        ]);

                        var options = {
//                            width: 900,
//                            height: 600,
                            legend: {position: 'top', maxLines: 6},
                            bar: {groupWidth: '50%'}//,
//                            isStacked: true
                        };
                        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
                        google.visualization.events.addListener(chart,"ready",function(){
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