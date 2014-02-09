<script type="text/javascript">
    $(function() {
        $("table.intel-table").css("marginLeft", Math.max(0, (($("#contant-contaner").width() - $("table.intel-table").outerWidth()) / 2)));
    });
</script>
<div class="intel-tab" id="tabs" init="true">
    <ul style="margin-top: 10px;">
        <li><a href="<?= base_url(); ?>judge/home" tab="#admins">المشاريع</a></li>
        <li><a href="<?= base_url(); ?>judge/home/schedule" tab="#sched">جدول التحكيم</a></li>
        <li><a href="<?= base_url(); ?>judge/home/evalresults" class="active" tab="#results">نتائج التحكيم</a></li>
        <!--<li><a href="javascript:void(0);" tab="#tab5">More...</a></li>-->
    </ul>
    <hr class="intel-tab-divider">
</div>
<article class="intel-tab-content">
    <section class="active" id="teams">
        <span class="Content-body">
            <h2 id="Admin">نتائج التحكيم</h2>
            <hr/>

            <div id="contant-contaner" class="contant-contaner">
                <div style="direction: rtl;">
                    <p>
                        <span>اسم المحكم:</span>
                        <?= $judge->name ?>
                        <br/>
                        <span>
                            القائمة:
                        </span>
                        <?php
                        $judge->category->get();
                        echo "<span dir='ltr' style='direction:ltr;'>" . $judge->category->name . "</span>";
                        ?>
                        <br/>
                        <span>
                            القائمة الفرعية:
                        </span>
                        <?php
                        $judge->subcategory->get();
                        echo "<span dir='ltr' style='direction:ltr;'>" . $judge->subcategory->name . "</span>";
                        ?>
                    </p>
                </div>
                <?php
                if (isset($evals)) {
                    ?>
                    <table class="intel-table" style="width: 50%">
                        <thead>
                        <td>رقم المقابلة</td>
                        <td>النتيجة</td>
                        <td>النتيجة المعيارية</td>
                        <td>رقم المشروع</td>
                        <td>اسم المشروع</td>
                        </thead>
                        <tbody>
                            <?php
                            $scores = array();
                            foreach ($evals as $ev) {
                                array_push($scores, $ev->eval_total);
                            }
                            ?>
                            <?php
                            foreach ($evals as $ev) {
                                ?>
                                <tr>
                                    <td><?= $ev->slotnumber ?></td>
                                    <td><?= $ev->eval_total ?></td>
                                    <td><?= number_format(zscore($ev->eval_total, $scores), 2) ?></td>
                                    <td><?= $ev->project_id ?></td>
                                    <td>
                                        <?php
                                        $ev->project->get();
                                        echo $ev->project->name
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div>
                        <p style="direction: rtl;">
                            <span>
                                <label>عدد المشاريع التي تم التحكيم عليها:</label>
                                <?= count($scores) ?>
                            </span>
                            <br/>
                            <span>
                                <label>النتيجة المتوسطة:</label>
                                <?= number_format(mean($scores), 2) ?>
                            </span>
                            <br/>
                            <span>
                                <label>أعلي نتيجة:</label>
                                <?= max($scores) ?>
                            </span>
                            <br/>
                            <span>
                                <label>أقل نتيجة:</label>
                                <?= min($scores) ?>
                            </span>
                            <br/>
                            <span>
                                <label>الرقم الأوسط للنتائج:
                                </label>
                                <?= calculate_median($scores) ?>
                            </span>
                        </p>
                    </div>

                <?php } else { ?>
                <div dir="rtl" style="text-align: center">
                        <p>
                            لم يتم التحكيم علي أي مشاريع بعد
                        </p>
                    </div>
                <?php } ?>

                <?php

                function calculate_median($arr) {
                    sort($arr);
                    $count = count($arr); //total numbers in array
                    $middleval = floor(($count - 1) / 2); // find the middle value, or the lowest middle value
                    if ($count % 2) { // odd number, middle is the median
                        $median = $arr[$middleval];
                    } else { // even number, calculate avg of 2 medians
                        $low = $arr[$middleval];
                        $high = $arr[$middleval + 1];
                        $median = (($low + $high) / 2);
                    }
                    return $median;
                }

                function mean($array) {
                    return $mean = array_sum($array) / count($array);
                }

                function Segma($array) {
                    $powArray = array();
                    $mean = mean($array);
                    foreach ($array as $a) {
                        array_push($powArray, pow($a - $mean, 2));
                    }
                    return sqrt(mean($powArray));
                }

                function zscore($x, $scores) {
                    return ($x - mean($scores)) / Segma($scores);
                }
                ?>
            </div>
        </span>
    </section>
</article>